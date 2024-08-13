<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class RolesController extends CrudController
{
	public $tpl_dir = 'modules/default/roles';

	public $ctrl_model = AppRole::class;

	public $title = 'Role';
	
	public $title_field = 'role';

	function __construct()
	{
		parent::__construct();

		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			'role',
			'description', 
			Tableci::DATE_CREATED,
			Tableci::ACTIVE
		]);
	}
	
	# hooks
	
	public function pre_index(&$table)
	{
		$table = $this->ctrl_model::select($this->settings['tableci']['index']->sql_fields)
		->orderBy('role')
		->get();
	}
	public function pre_create($prev_tuple=null)
	{
		if (!$prev_tuple) return;

		$role_routes = AppRoute::from(AppRoute::as('a'))
		->select('a.id as value', 'a.route as text', 'b.id as route_id')
		->leftJoin(AppRoleRoute::as('b'), function ($query) use ($prev_tuple)
		{
			$query->on('b.route_id', 'a.id')
			->on('b.role_id', DB::raw( find($prev_tuple, 'id') ));
		})
		->isActive('a')
		->where('a.route', 'not like', DB::raw("'login%'"))
		->where('a.route', 'not like', DB::raw("'profile%'"))
		->where('public', 0)
		->orderBy('a.route')
		->get()
		->each(function ($item, $key) 
		{
			$item->selected = !!$item->route_id;
			$item->makeHidden(['route_id']);
		})
		->toArray();

		$role_permissions = AppPermission::from(AppPermission::as('a'))
		->select('a.id as value', 'a.permission as text', 'b.id as permission_id')
		->leftJoin(AppRolePermission::as('b'), function ($query) use ($prev_tuple)
		{
			$query->on('b.permission_id', 'a.id')
			->on('b.role_id', DB::raw( find($prev_tuple, 'id') ));
		})
		->isActive('a')
		->orderBy('a.permission')
		->get()
		->each(function ($item, $key) 
		{
			$item->selected = !!$item->permission_id;
			$item->makeHidden(['permission_id']);
		})
		->toArray();

		$this->sm->addFlashStatusMessage()
		->assign([
			'role_routes'		=> $role_routes,
			'role_permissions'	=> $role_permissions
		]);
	}
	public function set_rules(&$rules)
	{
		$rules = 
		[
			rule('role', 
				[
					'required', 
					$this->ctrl_model::is_unique($this->post_data['id'], 'role')
				]
			)
		];
	}
	public function post_validate_entry()
	{
		$this->post_data['role'] 			= post('role', 'trim');
		$this->post_data['description'] 	= post('description', 'strCondense.ucfirst.strNullWhenEmpty');
		$this->post_data['active'] 			= post('active', 'asCheckbox.intval');
	}
	public function on_tuple_update_success($tuple, $vars)
	{
		# update role routes

		$role_routes = post('role_routes');

		if ($role_routes)
		{
			$role_routes = json_decode($role_routes, true);

			$query = DB::table(AppRoleRoute::getTableName())
			->where('role_id', $tuple->id);

			if ($role_routes) $query = $query->whereNotIn('route_id', $role_routes);

			$query->delete();

			foreach ($role_routes as $route_id)
			{
				$app_role_route = AppRoleRoute::where([
					['role_id', $tuple->id],
					['route_id', $route_id]
				])
				->first() ?? new AppRoleRoute;

				$app_role_route->role_id = $tuple->id;
				$app_role_route->route_id = $route_id;
				$app_role_route->save();
			}
		}

		# update role permissions

		$role_permissions = post('role_permissions');

		if ($role_permissions)
		{
			$role_permissions = json_decode($role_permissions, true);

			$query = DB::table(AppRolePermission::getTableName())
			->where('role_id', $tuple->id);

			if ($role_permissions) $query = $query->whereNotIn('permission_id', $role_permissions);

			$query->delete();

			foreach ($role_permissions as $permission_id)
			{
				$app_role_permission = AppRolePermission::where([
					['role_id', $tuple->id],
					['permission_id', $permission_id]
				])
				->first() ?? new AppRolePermission;

				$app_role_permission->role_id = $tuple->id;
				$app_role_permission->permission_id = $permission_id;
				$app_role_permission->save();
			}
		}
	}
	public function on_tuple_save_success($tuple, $vars)
	{
		$_bs_tab_name = post('bs_tab_name', 'trim.strToLower');
		$_bs_tab_name = !strStartsWith($_bs_tab_name, '#') ? '' : '?t='.ltrim($_bs_tab_name, '#');

		$title_field = find($vars, 'title_field');

		$sucess_suffix = find($vars, 'sucess_suffix');

		json_response(true, ['redirect' => base_url($this->ctrl_route.'/'.$tuple->id.$_bs_tab_name), 'message' => "{$this->title} \"{$title_field}\" {$sucess_suffix}"]);
	}
}
