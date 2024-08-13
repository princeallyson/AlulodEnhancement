<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class PermissionsController extends CrudController
{
	public $tpl_dir = 'modules/default/permissions';

	public $ctrl_model = AppPermission::class;

	public $title = 'Permission';
	
	public $title_field = 'permission';

	function __construct()
	{
		parent::__construct();

		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			'permission',
			'description', 
			Tableci::DATE_CREATED,
			Tableci::ACTIVE
		]);
	}

	# hooks
	
	public function pre_index(&$table)
	{ 	
		$table = $this->ctrl_model::select($this->settings['tableci']['index']->sql_fields)
		->orderBy('permission')
		->get();
	}
	
	public function set_rules(&$rules)
	{
		$rules = [
			rule('permission', [
				'required', 
				$this->ctrl_model::is_unique($this->post_data['id'], 'permission')
			])
		];
	}
	public function post_validate_entry()
	{
		$this->post_data['permission'] 	= post('permission', 'strCondense.strLowerCase');
		$this->post_data['description'] = post('description', 'strCondense.ucfirst.strNullWhenEmpty');
		$this->post_data['active']		= post('active', 'asCheckbox.intval');
	}
	public function on_tuple_create_success($tuple)
	{
		$admin_role = AppRole::where('role', 'admin')->first();

		if ($admin_role) {
			$app_role_permission = AppRolePermission::where('role_id', $admin_role->id)
			->where('permission_id', $tuple->id)
			->count();

			if (!$app_role_permission) {
				$app_role_permission = new AppRolePermission;
				$app_role_permission->role_id = $admin_role->id;
				$app_role_permission->permission_id = $tuple->id;
				$app_role_permission->save();
			}
		}
	}
}
