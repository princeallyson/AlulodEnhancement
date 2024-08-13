<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Luthier\Utils;

use Luthier\RouteBuilder;

use \Illuminate\Database\Capsule\Manager as DB;

class MY_Controller extends CI_Controller
{
	public $uploads_dir;

	public $uploads_url;

	public $tpl_dir;

	public $ctrl_route; # luthier ci prefix

	public $ctrl_model;

	public $settings = array();

	public $user_routes = array();

	public $user_permissions = array();

	public $navbar_visible = true;

	public $sidebar_visible = true;

	public $my_hooks = array();

	public $last_model = array();

	public $notifications = array();

	function __construct()
	{
		parent::__construct();

		$this->uploads_dir = realpath(APPPATH.'../public/uploads');

		$this->uploads_url = base_url('public/uploads');

		$default_hooks = array(
			'pre_method' => [
				'create' => ['pre_create'],
				'delete' => ['pre_delete'],
				'store' => ['pre_store', 'pre_save'],
				'update' => ['pre_update', 'pre_save']
			],
			'post_method' => [
				'delete' => ['post_delete'],
			]
		);

		foreach ($default_hooks as $point => $hook) {
			foreach ($hook as $method => $method_hook) {
				if (is_string($method_hook))
					$method_hook = [$method_hook];

				foreach ($method_hook as $mh)
					$this->addHook($point, $method, $mh);
			}
		}
	}
	function __destruct() {

		if (post('uri')) 
		{
			redirect(base_url(post('uri')));
		}
	}
	public function addHook($point, $method, $method_hook) 
	{
		if (is_array($point)) {
			foreach ($point as $p)
				$this->addHook($p, $method, $method_hook);

			return $this;
		}

		if (is_array($method)) {
			foreach ($method as $m)
				$this->addHook($point, $m, $method_hook);

			return $this;
		}

		if (is_array($method_hook)) {
			foreach ($method_hook as $mh)
				$this->addHook($point, $method, $mh);

			return $this;
		}

		if (!array_key_exists($point, $this->my_hooks))
			$this->my_hooks[$point] = array();

		if (!array_key_exists($method, $this->my_hooks[$point]))
			$this->my_hooks[$point][$method] = array();

		if (!in_array($method_hook, $this->my_hooks[$point][$method]))
			$this->my_hooks[$point][$method][] = $method_hook;

		return $this;
	}
	public function return_if_not_found($var) 
	{
		$title = isset($this->title) ? "{$this->title} does not exists." : null;

		if (!$var) 
		{
			setFlashdata('error_message', $title ?? MSG_ITEM_NOT_FOUND);

			redirect($this->ctrl_route ? base_url($this->ctrl_route) : referrerOrUrl());
		}

		if (method_exists($var, 'count')) 
		{
			if (!$var->count()) 
			{
				setFlashdata('error_message', $title ?? MSG_ITEM_NOT_FOUND);

				redirect($this->ctrl_route ? base_url($this->ctrl_route) : referrerOrUrl());		
			}
		}
	}
}

class CrudController extends MY_Controller
{
	const OP_CREATE = 1;
	const OP_READ = 2;
	const OP_UPDATE = 3;
	const OP_DELETE = 4;

	public $post_data = array();

	function __construct()
	{	
		parent::__construct(); 

		$this->ctrl_route = Route::getCurrentRoute()->getPrefix();
	}
	public function index()
	{
		$table = null;

		if (method_exists($this, 'pre_index')) 
		{
			$this->pre_index($table);
		}

		$this->sm->addFlashStatusMessage()
		->assign([
			'tableci' => $this->settings['tableci']['index']->build(),
			'dt_data' => $table ? $table->toJson() : []
		]); 

		display('all');
	}
	public function create()
	{
		# hook: pre_create
		
		$this->sm->addFlashStatusMessage()
		->addPrevPostData();

		if (method_exists($this, __FUNCTION__.'__before_display'))
		{
			$this->{ __FUNCTION__.'__before_display' }();
		}
		
		display(find($this->settings, __FUNCTION__.'.tpl', 'entry'));
	}
	public function edit($id)
	{
		$tuple = $this->ctrl_model::find($id);

		$this->return_if_not_found($tuple);

		$tuple = _array_merge($tuple->toArray(), flashdata('prev_data'));

		if (method_exists($this, 'pre_create'))
		{
			$this->pre_create($tuple);
		}

		$this->sm->addFlashStatusMessage()
		->assign('prev_data', $tuple);

		# dj( method_exists($this, 'edit__before_display'), get_called_class() );

		if (method_exists($this, __FUNCTION__.'__before_display'))
		{
			$this->{ __FUNCTION__.'__before_display' }( $tuple );
		}

		if (method_exists($this, __FUNCTION__.'__overwrite_display'))
		{
			$this->{ __FUNCTION__.'__overwrite_display' }( $tuple );

			exit;
		}

		display(find($this->settings, __FUNCTION__.'.tpl', 'entry'));
	}
	public function delete($ajax=false)
	{
		# hook: pre_delete

		$tuple = $this->ctrl_model::find(post($this->ctrl_model::keyName()));

		if (!$tuple && $ajax) 
		{
			json_response(false, ['error_message' => MSG_ITEM_NOT_FOUND]);
		}

		$this->return_if_not_found($tuple);

		if (method_exists($this, 'overwrite_tuple_before_delete'))
		{
			$this->overwrite_tuple_before_delete($tuple);
		}

		DB::beginTransaction();

		try
		{
			$tuple->delete();

			DB::commit();
		}
		catch(\Exception $e) 
		{
			DB::rollback();

			$db_errors = $e->errorInfo ?? [MSG_ERROR_UNKNOWN];
			
			$db_errors = array_filter($db_errors, function ($error) 
			{
				return !is_numeric($error);
			});

			if (method_exists($this, 'on_tuple_delete_fail')) 
			{
				$this->on_tuple_delete_fail($tuple, get_defined_vars());
			}

			if ($ajax) 
			{
				json_response(false, ['error_message' => implode('</br>', $db_errors)]);
			}

			setFlashdata('error_message', implode('</br>', $db_errors));
			
			redirect(referrerOrUrl());
		}

		#
		
		if (method_exists($this, 'on_tuple_delete_success'))
		{
			$this->on_tuple_delete_success($tuple); # post_delete_tuple
		}

		#

		$message = $tuple->_display_message ?? MSG_ITEM_DELETED;

		if (method_exists($this, 'overwrite_delete_success_message'))
		{
			$this->overwrite_delete_success_message($message, $tuple, get_defined_vars());
		}
		
		$redirect = $tuple->_redirect ?? $this->ctrl_route;

		if ($ajax) 
		{
			json_response(true, ['message' => $message]);
		}

		setFlashdata('success_message', $message);
		
		redirect($redirect);

		# hook: post_delete
	}
	public function store()
	{
		# hook: pre_store | pre_save

		$this->save(self::OP_CREATE);
	}
	public function update()
	{	
		# hook: pre_update | pre_save
		
		$this->save(self::OP_UPDATE);
	}
	public function save($op)
	{
		if (method_exists($this, 'validate_entry'))
		{
			$this->validate_entry($op);
		}

		if ($op == self::OP_CREATE) 
		{
			$tuple = new $this->ctrl_model;
			
			$sucess_suffix = 'created';
		}
		elseif ($op == self::OP_UPDATE) 
		{
			$tuple = $this->ctrl_model::find($this->post_data['id']);
			
			$sucess_suffix = 'updated';

			if (!$tuple) 
			{
				json_response(false, ['redirect' => base_url($this->ctrl_route), 'message' => "{$this->title} does not exists."]);
			}

			if (method_exists($this, 'on_tuple_found_before_update'))
			{
				$this->on_tuple_found_before_update($tuple, get_defined_vars());
			}
		}
		else 
		{
			json_response(false, ['redirect' => base_url($this->ctrl_route), 'error' => __FUNCTION__.'_err_op']);
		}

		if (method_exists($this, 'overwrite_tuple_before_transaction'))
		{
			$this->overwrite_tuple_before_transaction($tuple, get_defined_vars()); # pre_create_tuple
		}

		DB::beginTransaction(); # form_response(false, [$this->post_data, $_POST]);

		try
		{
			fill_tuple($tuple, $this->post_data, ['id', 'active']);

			if ($tuple->id && Auth::userHasPermission(str_replace(' ', '-', strtolower("activate-{$this->title}")))) 
			{
				$tuple->active = $this->post_data['active'];
			}

			#

			if ($op == self::OP_CREATE) 
			{
				if (method_exists($this, 'overwrite_tuple_before_create'))
				{
					$this->overwrite_tuple_before_create($tuple, get_defined_vars()); # pre_create_tuple
				}
			}
			elseif ($op == self::OP_UPDATE)
			{
				if (method_exists($this, 'overwrite_tuple_before_update'))
				{
					$this->overwrite_tuple_before_update($tuple, get_defined_vars()); # pre_update_tuple
				}
			}

			#

			if (method_exists($this, 'overwrite_tuple_before_save'))
			{
				$this->overwrite_tuple_before_save($tuple, get_defined_vars()); # pre_save_tuple
			}

			#

			$tuple->save();

			if (method_exists($this, 'before_save_commit'))
			{
				$this->before_save_commit($tuple, get_defined_vars());
			}

			DB::commit();

			$title_field = $tuple->{ $this->title_field };

			#

			if ($op == self::OP_CREATE) 
			{
				if (method_exists($this, 'on_tuple_create_success')) 
				{
					$this->on_tuple_create_success($tuple, get_defined_vars());	# post_create
				}
			}
			elseif ($op == self::OP_UPDATE) 
			{
				if (method_exists($this, 'on_tuple_update_success')) 
				{
					$this->on_tuple_update_success($tuple, get_defined_vars()); # post_update
				}
			}

			#
			
			$t = strlen($title_field) ? "\"{$title_field}\"" : "";

			$success_message = strCondense("{$this->title} {$t} {$sucess_suffix}");

			if (method_exists($this, 'overwrite_save_success_message'))
			{
				$this->overwrite_save_success_message($success_message, $tuple, get_defined_vars());
			}

			if (method_exists($this, 'on_tuple_save_success')) 
			{
				$this->on_tuple_save_success($tuple, get_defined_vars()); # post_save
			}

			#

			json_response(true, ['redirect' => base_url($this->ctrl_route.'/'.$tuple->id), 'message' => $success_message]);
		}
		catch(\Exception $e) 
		{
			DB::rollback();

			$db_errors = $e->errorInfo ?? [MSG_ERROR_UNKNOWN];

			$db_errors = array_filter($db_errors, function ($error) 
			{
				return !is_numeric($error);
			});

			if ($op == self::OP_CREATE) 
			{
				if (method_exists($this, 'on_tuple_create_fail')) 
				{
					$this->on_tuple_create_fail($tuple, get_defined_vars());
				}
			}
			elseif ($op == self::OP_UPDATE) 
			{
				if (method_exists($this, 'on_tuple_update_fail')) 
				{
					$this->on_tuple_update_fail($tuple, get_defined_vars());
				}
			}

			if (method_exists($this, 'on_tuple_save_fail')) 
			{
				$this->on_tuple_save_fail($tuple, get_defined_vars());
			}

			$message = join('<br>', $db_errors);

			if (method_exists($this, 'overwrite_save_fail_message'))
			{
				$this->overwrite_save_fail_message($message, $tuple, get_defined_vars());
			}

			form_response(false, ['message' => $message]);
		}
	}

	# hooks
	
	public function overwrite_tuple_before_delete(&$tuple) 
	{
		$title = $tuple->{ $this->title_field };

		$title = strlen($title) ? "\"{$title}\"" : "";

		$tuple->_display_message = strCondense("{$this->title} {$title} deleted");
	}
	public function validate_entry($op)
	{	
		#
		
		if (method_exists($this, 'pre_'.__FUNCTION__)) 
		{
			$this->{ 'pre_'.__FUNCTION__ }($op);
		}

		#

		$this->post_data['id'] = post('id', 'intval.strNullWhenZero');

		if ($this->post_data['id']) 
		{
			$tuple = $this->ctrl_model::find($this->post_data['id']);

			if (!$tuple) 
			{
				json_response(false, ['redirect' => base_url($this->ctrl_route), 'message' => "{$this->title} does not exists.", 'error' => __FUNCTION__.'_tuple_nf']);
			}

			$this->form_validation->set_data(post()); # ci patch method is not recognized
		}

		$rules = array();

		#
		
		if (method_exists($this, 'set_rules')) 
		{
			$this->set_rules($rules, get_defined_vars());
		}

		#

		if ($rules)
		{
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() == false)
			{
				#
				
				if (method_exists($this, 'on_validation_fail')) 
				{
					$this->on_validation_fail($this->form_validation->error_array(), get_defined_vars()); # validation_failed
				}

				#
				
				form_response(false, ['form_error' => form_errors($this->form_validation->error_array())]);
			}
			else 
			{
				#
				
				if (method_exists($this, 'on_validation_success')) 
				{
					$this->on_validation_success($this->form_validation, get_defined_vars());
				}

				#
			}
		}

		#

		if (method_exists($this, 'post_'.__FUNCTION__)) 
		{
			$this->{ 'post_'.__FUNCTION__ }(get_defined_vars()); # set_post_data
		}

		#
	}
	public function update_notifications(string $parent_class, string $child_class, array $tuple)
	{
		// DB::enableQueryLog();
		// dt( bindQueryParameter(DB::getQueryLog()) );
			
		if ($parent_class == $child_class)
		{
			$notifs = AppNotification::where('user_id', sess_id())
			->where('table_reference', find($tuple, 'id'))
			->where('tablename', $this->ctrl_model::getTableNameWithPrefix())
			->whereNull('view_at')
			->get();

			if ($notifs->count())
			{
				DB::table(DB::raw(AppNotification::getTableNameWithPrefix()))
				->whereIn('id', $notifs->pluck('id')->toArray())				
				->update([
					'view_at' => date('Y-m-d H:i:s')
				]);

				redirect(base_url(Utils::currentUrl()));
			}
		}
	}
}

// public function smartyRegisterPublicVars($class)
// {
// 	if (class_exists('smartyci')) {
// 		$reflect = new ReflectionClass($class);
// 		$props   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);

// 		$props = array_filter($props, function ($item) use ($class)
// 		{
// 			return $item->class == $class;
// 		});

// 		foreach ($props as $prop) {
// 			$this->sm->assign($prop->name, $this->{ $prop->name });
// 		}	
// 	}
// }