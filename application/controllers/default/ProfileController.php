<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class ProfileController extends CrudController
{
	public $tpl_dir = 'modules/default/profile';
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$user = AppUser::with('rel_user_extension')->find(sess_id());

		if (!$user) logout();

		$user->setAppends(['name']);

		$this->sm->addFlashStatusMessage()
		->assign([
			'user' 		=> $user,
			'prev_data'	=> flashdata('prev_data') ?? $user
		]);

		display('profile');
	}
	public function update()
	{
		$errors = array();

		$_first_name 			= post('rel_user_extension[first_name]', 'strProperCase.strNullWhenEmpty');
		$_middle_name 			= post('rel_user_extension[middle_name]', 'strProperCase.strNullWhenEmpty');
		$_last_name 			= post('rel_user_extension[last_name]', 'strProperCase.strNullWhenEmpty');
		$_extension_name 		= post('rel_user_extension[extension_name]', 'strProperCase.strNullWhenEmpty');
		$_email 				= post('rel_user_extension[email]', 'strLowerCase.strNullWhenEmpty');

		$_address 				= post('rel_user_extension[address]', 'strNullWhenEmpty');
		$_mobile 				= post('rel_user_extension[mobile]', 'strNullWhenEmpty');

		if (!strlen($_first_name)) $errors[] = 'First name is required.';
		if (!strlen($_last_name)) $errors[] = 'Last name is required.';
		if (!strlen($_email)) $errors[] = 'Email is required.';

		if ($errors) goto err;

		if (!is_email($_email)) $errors[] = "{$_email} is not an email";

		if ($errors) goto err;

		$user = AppUser::with('rel_user_extension')->find(sess_id());

		if (!$user) logout();

		$check_extension = AppUserExtension::where('email', $_email);

		if ($user->rel_user_extension) {
			$check_extension = $check_extension->where('id', '<>', $user->rel_user_extension->id);
		}

		$check_extension = $check_extension->count();

		if ($check_extension) 
		{
			$errors[] = "Email {$_email} already exists";
			goto err;
		}

		DB::beginTransaction();
			
		try
		{
			$extension 	= $user->rel_user_extension;

			$extension->email 			= $_email;
			$extension->first_name 		= $_first_name;
			$extension->middle_name 	= $_middle_name;
			$extension->last_name 		= $_last_name;
			$extension->extension_name 	= $_extension_name;

			$extension->address 	= $_address;
			$extension->mobile 		= $_mobile;

			$extension->save();

			DB::commit();
		}
		catch(\Exception $e) 
		{
			DB::rollback();

			$errors[] = implode(', ', array_filter($e->errorInfo ?? [], function ($item) { return !is_numeric($item); }));
			goto err;
		}

		setFlashdata('success_message', 'Profile updated.');

		goto end;

		err:
		
		setFlashdata('error_message', implode('<br>', $errors));
		setFlashdata('prev_data', post());

		end:

		redirect(referrerOrUrl());
	}
	public function change_password()
	{
		$errors = array();

		$_old_password 			= post('old_password', 'strNullWhenEmpty');
		$_new_password 			= post('new_password', 'strNullWhenEmpty');
		$_confirm_new_password	= post('confirm_new_password', 'strNullWhenEmpty');

		if (!strlen($_old_password) || !strlen($_new_password) || !strlen($_confirm_new_password)) $errors[] = 'Password did not match.';

		if ($errors) goto err;

		$user = AppUser::find(sess_id());

		if (!$user) logout();

		$match = Auth::verifyPassword($_old_password, $user->password ?? null);

		if (!$match)
		{
			$errors[] = 'Password did not match.';
			goto err;
		}

		if ($_new_password !== $_confirm_new_password)
		{
			$errors[] = 'Password did not match.';
			goto err;
		}

		$user->password = Auth::encryptPassword($_new_password);
		$user->save();

		setFlashdata('success_message', 'Password updated');

		goto end;

		err:
		
		setFlashdata('error_message', implode('<br>', $errors));
		setFlashdata('prev_data', post());

		end:

		redirect(referrerOrUrl());
	}
	public function update_photo()
	{
		$user = AppUser::with('rel_user_extension')->find(sess_id());

		if (!$user->rel_user_extension ?? null)
		{
			$user->rel_user_extension = AppUserExtension::createExtension($user->id);
		}

		if (!$user) logout();

		if (!find($_FILES, 'file_dp.size')) {
			setFlashdata('error_message', 'No selected file');
			redirect(base_url('settings/account'));
		}

		$extension = pathinfo(find($_FILES, 'file_dp.name'), PATHINFO_EXTENSION);

		$config['upload_path'] 		= $this->uploads_dir;
		$config['allowed_types']	= 'jpg|png';
		$config['image_library']    = 'gd2';
		$config['quality']      	= '30%';
		$config['file_name']		= uuid().'.'.$extension;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file_dp')) {
			setFlashdata('error_message', $this->upload->display_errors('', ''));
			redirect(base_url('settings/account'));
		}

		if ($user->rel_user_extension ?? null)
		{
			if (strlen($user->rel_user_extension->img_filename)) {
				if (file_exists($this->uploads_dir.DS.$user->rel_user_extension->img_filename)) {
					unlink($this->uploads_dir.DS.$user->rel_user_extension->img_filename);
				}
			}

			$user->rel_user_extension->img_filename = $config['file_name'];
			$user->rel_user_extension->save();
		}

		setFlashdata('success_message', 'Picture saved.');
		redirect(referrerOrUrl());
	}
	public function delete_photo()
	{
		$user = AppUser::with('rel_user_extension')->find(sess_id());

		if (!$user) logout();

		if (strlen($user->rel_user_extension->img_filename)) {
			if (file_exists($this->uploads_dir.DS.$user->rel_user_extension->img_filename)) {
				unlink($this->uploads_dir.DS.$user->rel_user_extension->img_filename);
			}
		}

		$user->rel_user_extension->img_filename = null;
		$user->rel_user_extension->save();

		setFlashdata('success_message', 'Picture deleted.');
		redirect(referrerOrUrl());
	}
}
