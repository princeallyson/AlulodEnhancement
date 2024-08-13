<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class LoginController extends MY_Controller
{
	const STATUS_REGISTERED 			= 1;
	const STATUS_VERIFIED 				= 2;
	const STATUS_NOT_VERIFIED 			= 3;
	const STATUS_EXPIRED_ACTIVATION 	= 4;
	const STATUS_RESEND_ACTIVATION 		= 5;
	const STATUS_NEW_PASSWORD 			= 6;

	const MISSING_UNKNOWN = 1;
	const MISSING_EXPIRED = 2;
	const MISSING_INACTIVE = 4;

	public $tpl_dir = 'modules/default/login';
	public $verification_tpl = 'modules/default/verification/verification';

	function __construct()
	{
		parent::__construct();
	}
	public function login()
	{
		$this->sm->addFlashStatusMessage()
		->assign([
			'allow_user_registration' => $this->config->item('allow_user_registration')
		]);

		if (get('uri')) $this->sm->assign('uri', get('uri'));

		display('login');
	}
	public function check()
	{
		$errors = array();

		$username = post('u') ?? '';

		$user = AppUser::with(['rel_user_extension.rel_verification' => function ($query)
		{
			$query->where('type', VERIFICATION_TYPE_USER_EXTENSION);
		}])
		->where('username', DB::raw("BINARY '{$username}'")) 
		->first();

		$match = Auth::verifyPassword(post('p'), $user->password ?? null);

		# user password

		if (!$match) $this->invalidUsernameOrPassword();

		$this->evaluateUser($user);
		
		if ($user->has_verification) {
			if ($user->verified === false) {
				setFlashdata('user_id', $user->id);
				setFlashdata('status', self::STATUS_NOT_VERIFIED);
				redirect(base_url('thankyou'));
			}
			elseif ($user->verification_missing) {
				setFlashdata('user_id', $user->id);
				setFlashdata('status', self::STATUS_EXPIRED_ACTIVATION);
				redirect(base_url('thankyou'));
			}
		}

		setUserdata(['__login'	 => true, '__login_id' => $user->id]);

		$user_routes = AppUser::routes(sess_id());

		if (!$user_routes->where('route', $this->config->item('login_success_route'))->first())
			route_redirect('profile');
		else
			route_redirect($this->config->item('login_success_route'));

		err:

		if ($errors) {
			setFlashdata('error_message', implode('<br>', $errors));	
		}

		redirect(base_url('login'));
	}
	public function forgot_password()
	{
		$this->sm->addFlashStatusMessage()
		->assign([
			'allow_user_registration' => $this->config->item('allow_user_registration')
		]);

		display('forgot_password');
	}
	public function new_password()
	{
		$user_extension = AppUserExtension::with('rel_user')
		->where('email', post('email'))
		->whereHas('rel_user', function ($query)
		{
			$query->isActive();
		})
		->first();

		if (!$user_extension)
		{
			setFlashdata('error_message', 'Email not found');

			redirect(base_url('forgot-password'));
		}

		$new_password = uniqid();

		$this->load->library(['Smartyci' => 'sm', 'Mailci']);

		$this->sm->assign([
			'first_name'	=> $user_extension->first_name,
			'new_password' 	=> $new_password,
		]);

		$body = $this->sm->_fetch($this->tpl_dir.'/new_password');

		$this->mailci->sendSimple(
			$user_extension->email,
			'New Password',
			$body,
			$this->config->item('verfication_sender_email'),
			$this->config->item('verfication_sender_password'),
			'No-Reply'
		);

		$user_extension->rel_user->password = Auth::encryptPassword($new_password);
		$user_extension->rel_user->save();

		setFlashdata('user_id', $user_extension->rel_user->id);
		setFlashdata('status', self::STATUS_NEW_PASSWORD);

		redirect(base_url('thankyou'));
	}
	public function logout()
	{ 	
		Auth::cleanUserSessions();

		redirect(route('home')); 
	}
	public function signup()
	{
		if ( ! $this->config->item('allow_user_registration') ) {
			redirect(base_url('login'));
		}

		initializeFrontEnd();

		$this->sm->addFlashStatusMessage()
		->addPrevPostData();

		display('signup');
	}
	public function register()
	{	
		$errors = array();

		$_first_name		= post('first_name', 'strProperCase.strNullWhenEmpty');
		$_last_name			= post('last_name', 'strProperCase.strNullWhenEmpty');
		$_email				= post('email', 'trim');
		$_username			= post('username', 'trim');
		$_password			= post('password', 'trim');
		$_confirm_password	= post('confirm_password', 'trim');
		// $_accept			= (int)(post('accept') == 'on');

		// if (!$_accept) {
		// 	$errors[] = 'Please accept term of service.';
		// 	goto err;
		// }

	    # required

		if (!strlen($_first_name))				$errors[] = 'First name is required.';
		if (!strlen($_last_name))				$errors[] = 'Last name is required.';
		if (!strlen($_email))					$errors[] = 'Email is required.';
		if (!strlen($_username))				$errors[] = 'Username is required.';
		if (!strlen($_password))				$errors[] = 'Password is required.';
		if (!strlen($_confirm_password))		$errors[] = 'Confirm password is required.';

		if ($errors) goto err;

	    # format

		if (!is_email($_email)) $errors[] = 'Invalid email format: '.$_email;

		if ($errors) goto err;

	    # password

		if ($_password != $_confirm_password) $errors[] = 'Password did not match.';

		if ($errors) goto err;

	    # unique: email | user

		$username_exists = AppUser::where('username', $_username)->count();
		$email_exists = AppUserExtension::where('email', $_email)->count();

		if ($username_exists) $errors[] = 'Username "'.$_username.'" already exists.';
		if ($email_exists) $errors[] = 'Email "'.$_email.'" already exists.';

		if ($errors) goto err;

		DB::beginTransaction();

		try
		{
			$user 						= new AppUser;
			$user->username 			= $_username;
			$user->password 			= Auth::encryptPassword($_password);
			$user->registered 			= 1;
			$user->save();

			$user_ext 						= new AppUserExtension;
			$user_ext->first_name 			= $_first_name;
			$user_ext->last_name 			= $_last_name;
			$user_ext->user_id 				= $user->id;
			$user_ext->email 				= $_email;

			if ( $this->config->item('verify_registered_user') )
			{
				$verification 						= new AppVerification;
				$verification->type 				= VERIFICATION_TYPE_USER_EXTENSION;
				$verification->code 				= uuid();
				$verification->expiration_at		= time() + (($this->config->item('verification_expiration_minutes') ?? 1) * 60);
				$verification->expiration_at		= date('Y-m-d H:i:s', $verification->expiration_at);
				$verification->save();

				$user_ext->verification_id = $verification->id;
			}

			$user_ext->save();

			$role = AppRole::where('role', 'default-user')->first();

			if ($role)
			{
				$user_role = new AppUserRole;
				$user_role->user_id = $user->id;
				$user_role->role_id = $role->id;
				$user_role->save();
			}

			if ($user_ext->verification_id) { 
				$this->load->library(['Smartyci' => 'sm', 'Mailci']);

				$this->sm->assign([
					'first_name'			=> $user_ext->first_name,
					'verification_link' 	=> base_url('verify/'.$verification->code),
					'expiration_datetime' 	=> date('M. d, Y h:i A', strtotime($verification->expiration_at)),
				]);

				$body = $this->sm->_fetch($this->verification_tpl);

				$status = $this->mailci->sendSimple(
					$user_ext->email,
					'Verify your Email',
					$body,
					$this->config->item('verfication_sender_email'),
					$this->config->item('verfication_sender_password'),
					'No-Reply'
				);
			}
			
			DB::commit();

			setFlashdata('user_id', $user->id);
			setFlashdata('status', self::STATUS_REGISTERED);
			redirect(base_url('thankyou'));
		}
		catch(\Exception $e) 
		{
			DB::rollback();

			$errors[] = implode(', ', array_filter($e->errorInfo ?? [], function ($item) { return !is_numeric($item); }));
			goto err;
		}

		err:

		if ($errors) {
			setFlashdata('error_message', implode('<br>', $errors));	
		}

		setFlashdata('prev_data', post()); 

		redirect(base_url('signup'));
	}
	public function thankyou()
	{
		$user_id 	= flashdata('user_id');
		$status 	= flashdata('status');

		#echo "user_id: $user_id";
		#echo PHP_EOL;
		#echo "status: $status";

		$user = AppUser::with(['rel_user_extension.rel_verification' => function ($query)
		{
			$query->where('type', VERIFICATION_TYPE_USER_EXTENSION);
		}])
		->where('id', $user_id)
		->first();

		#dj($user);

		$this->evaluateUser($user, false);

		$extension = $user->rel_user_extension;
		$verification = $user->has_verification ? $extension->rel_verification : null;

		switch ($status) {
			case self::STATUS_REGISTERED:
				initializeFrontEnd();

				if ($user->has_verification) {
					if (!$user->verified) {
						$this->sm->assign([
							'title' 	=> 'Thank You',
							'message' 	=> "Activation sent to <b>{$extension->email}</b></br>Please check your email for further instruction on how to complete your account setup.".$this->testActivationLink($verification)
						]);
					}
					else {
						# auto activation ?
						
						$this->sm->assign([
							'title' 	=> 'Thank You',
							'message' 	=> 'You have been successfully registered.'
						]);
					}
				}
				else {
					$this->sm->assign([
						'title' 	=> 'Thank You',
						'message' 	=> 'You have been successfully registered.'
					]);
				}

				display('thankyou');

				break;
			case self::STATUS_VERIFIED:
				initializeFrontEnd();

				$this->sm->assign([
					'title' 	=> 'Congratulations',
					'message' 	=> 'Your account has been activated successfully.</br>You can now sign in to your account.',
				]);	

				display('thankyou');

				break;
			case self::STATUS_NOT_VERIFIED:
				if ($user->has_verification) {
					if (boolval($user->verification_missing)) {
						setFlashdata('user_id', $user->id);
						setFlashdata('status', self::STATUS_EXPIRED_ACTIVATION);
						redirect(base_url('thankyou'));
					}
					else {
						initializeFrontEnd();

						$this->sm->assign([
							'title' 	=> 'Account Inactive',
							'message' 	=> "Your account has not yet been activated. Please check your email for further instruction on how to complete your account setup.".$this->testActivationLink($verification),
							'icon'		=>	'icon-cross2',
							'icon_bg'	=>	'danger',

							'resend_activation' => true,
							'user_id'			=> $user->id,
							'csrf'				=> Auth::csrf()
						]);	

						display('thankyou');
					}
				}
				else {
					$this->alreadyActivated();
				}

				break;
			case self::STATUS_EXPIRED_ACTIVATION:
				initializeFrontEnd();

				$this->sm->assign([
					'title' 	=> 'Activation Link Expired',
					'message' 	=> "Click resend activation to receive new activation email.".$this->testActivationLink($verification),
					'icon'		=>	'icon-cross2',
					'icon_bg'	=>	'danger',

					'resend_activation' => true,
					'user_id'			=> $user->id,
					'csrf'				=> Auth::csrf()
				]);	

				display('thankyou');

				break;
			case self::STATUS_RESEND_ACTIVATION:
				initializeFrontEnd();

				$this->sm->assign([
					'title' 	=> 'Thank You',
					'message' 	=> "Activation re-sent to your email.</br>Please check your email for further instruction on how to complete your account setup."
				]);	

				display('thankyou');

				break;
			case self::STATUS_NEW_PASSWORD:
				initializeFrontEnd();

				$this->sm->assign([
					'title' 	=> 'Thank You',
					'message' 	=> "New password is sent to your email.</br>Please check your email for complete details."
				]);	

				display('thankyou');

				break;
			default:
				redirect(base_url('login'));
		}
	}
	public function verify($code)
	{
		$user = AppUser::with('rel_user_extension.rel_verification')
		->whereHas('rel_user_extension.rel_verification', function ($query) use ($code)
		{
			$query->where('code', $code)
			->where('type', VERIFICATION_TYPE_USER_EXTENSION);
		})
		->first();

		if (!$user) {
			$this->somethingWentWrong();
		}

		$this->evaluateUser($user);

		if ($user->has_verification) {
			if ($user->verified) {
				$this->alreadyActivated();
			}
			else {
				if (boolval($user->verification_missing)) {
					setFlashdata('user_id', $user->id);	
					setFlashdata('status', self::STATUS_EXPIRED_ACTIVATION);	
					redirect(base_url('thankyou'));
				}
				else {
					$verification = $user->rel_user_extension->rel_verification;
					$verification->verified_at = date('Y-m-d H:i:s');
					$verification->save();

					# add default-user role
					
					$role = AppRole::where('role', 'default-user')->first();

					if ($role) {
						$user_role = AppUserRole::where('user_id', $user->id)
						->where('role_id', $role->id)
						->first();

						if (!$user_role) {
							$user_role = new AppUserRole;
							$user_role->user_id = $user->id;
							$user_role->role_id = $role->id;
							$user_role->save();
						}
					}

					setFlashdata('user_id', $user->id);	
					setFlashdata('status', self::STATUS_VERIFIED);	
					redirect(base_url('thankyou'));
				}
			}
		}
		else {
			$this->alreadyActivated();
		}
	}
	public function verification_resend()
	{
		$user = AppUser::with(['rel_user_extension.rel_verification' => function ($query)
		{
			$query->where('type', VERIFICATION_TYPE_USER_EXTENSION);
		}])
		->where('id', post('id'))
		->first();

		$this->evaluateUser($user);

		if ($user->has_verification) {
			if ($user->verification_missing > 1) { 
				$verification = $user->rel_user_extension->rel_verification;
				$verification->active = 0;
				$verification->save();
			}
			else {
				# user extension -> verification id exists but no relationship found.
				$verification = AppVerification::find($user->rel_user_extension->verification_id);

				if ($verification) {
					$verification->active = 0;
					$verification->save();			
				}
			}

			$verification 						= new AppVerification;
			$verification->type 				= VERIFICATION_TYPE_USER_EXTENSION;
			$verification->code 				= uuid();
			$verification->expiration_at		= time() + (($this->config->item('verification_expiration_minutes') ?? 1) * 60);
			$verification->expiration_at		= date('Y-m-d H:i:s', $verification->expiration_at);
			$verification->save();

			$extension = $user->rel_user_extension;

			$extension->verification_id = $verification->id;
			$extension->save();

			$this->load->library(['Smartyci' => 'sm', 'Mailci']);

			$this->sm->assign([
				'first_name'			=> $user->rel_user_extension->first_name,
				'verification_link' 	=> base_url('verify/'.$verification->code),
				'expiration_datetime' 	=> date('M. d, Y h:i A', strtotime($verification->expiration_at)),
			]);

			$body = $this->sm->_fetch($this->verification_tpl);

			$this->mailci->sendSimple(
				$user->rel_user_extension->email,
				'Verify your Email',
				$body,
				$this->config->item('verfication_sender_email'),
				$this->config->item('verfication_sender_password'),
				'No-Reply'
			);

			setFlashdata('user_id', $user->id);
			setFlashdata('status', self::STATUS_RESEND_ACTIVATION);
			redirect(base_url('thankyou'));
		}
		else {
			$this->alreadyActivated();
		}
	}
	private function evaluateUser(&$user, $send_error_message=true)
	{
		# check if user is active.
		# check if user has extension and check if its active.
		# check if user has extension and tag is need to verify its account.

		if (!$user || !$user->active) {
			$this->invalidAccount($send_error_message); 
		}

		if ($user->rel_user_extension ?? null) {
			$extension = $user->rel_user_extension;

			if (!$extension->active) {
				$this->invalidAccount($send_error_message); 
			}

			$user->has_verification = boolval($extension->verification_id);

			if (!is_null($extension->rel_verification)) {
				$verification = $extension->rel_verification;

				$user->verification_active 	= boolval($verification->active);
				$user->verified 			= boolval($verification->verified_at);
				$user->verification_expired = $verification->expiration_at ? time() > strtotime($verification->expiration_at) : true;
				$user->verification_expired = $user->verification_expired || $user->verified;
				
				$user->verification_missing = 0;
				$user->verification_missing = !$user->verification_active ? self::MISSING_INACTIVE : 0;

				if ($user->verification_active && $user->verification_expired) {
					if (!$verification->verified_at) {
						if ($user->verification_expired) {
							$verification->active = 0;
							$verification->save();

							$user->verification_missing = $user->verification_missing | self::MISSING_EXPIRED;
						}
					}
				}
			}
			else {
				$user->verification_missing = 1;
			}
		}
	}
	private function alreadyActivated()
	{
		setFlashdata('success_message', 'Account already activated.</br>Please sign in to your account.');	
		redirect(base_url('login'));
	}
	private function somethingWentWrong()
	{
		setFlashdata('error_message', 'Something went wrong.</br>Please try again later.');	
		redirect(base_url('login'));
	}
	private function invalidAccount($send_error_message=true)
	{
		if ($send_error_message) {
			setFlashdata('error_message', 'Invalid account!');		
		}
		
		redirect(base_url('login'));
	}
	private function invalidUsernameOrPassword($send_error_message=true)
	{
		if ($send_error_message) {
			setFlashdata('error_message', 'Invalid username or password!');		
		}
		
		redirect(base_url('login'));
	}
	private function testActivationLink($verification)
	{
		$test_activation_link = '';
						
		if ($this->config->item('show_verification_test_link')) {
			$test_activation_link = ' '.newTag()->a('Sample Activation')
			->href(base_url('verify/'.$verification->code))	
			->__toString();
		}

		return $test_activation_link;
	}
}
