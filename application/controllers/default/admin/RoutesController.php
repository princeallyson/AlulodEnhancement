<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class RoutesController extends CrudController
{
	public $tpl_dir = 'modules/default/routes';

	public $ctrl_model = AppRoute::class;

	public $title = 'Route';
	
	public $title_field = 'route';

	function __construct()
	{
		parent::__construct(); 

		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			'route',
			['active_sidebar_route_id', 'Active Menu', 'active_menu'],
			'description', 
			'public',
			Tableci::DATE_CREATED,
			Tableci::ACTIVE,
		]);
	}
	
	# hooks
	
	public function pre_index(&$table)
	{
		$table = $this->ctrl_model::with('rel_active_menu')
		->select($this->settings['tableci']['index']->sql_fields)
		->orderBy('route')
		->get()
		->each(function ($tuple, $key)
		{
			$tuple->public = badge($tuple->public);

			$tuple->active_menu = $tuple->rel_active_menu ? $tuple->rel_active_menu->route : null;

			$tuple->active_route = $tuple->active_route ? implode(', </br>', $tuple->active_route) : null;
		});
	}
	public function pre_create($prev_tuple=null)
	{
		$filters = [];

		if ($prev_tuple) $filters[] = ['id', '<>', find($prev_tuple, 'id')];

		$routes = $this->ctrl_model::select2('route', null, $filters);

		$this->sm->assign('routes', $routes);
	}
	public function set_rules(&$rules)
	{
		$rules = 
		[
			rule('route', 
				[
					'required', 
					$this->ctrl_model::is_unique($this->post_data['id'], 'route')
				]
			)
		];

		if (post('active_sidebar_route_id'))
		{
			$rules[] = rule('active_sidebar_route_id', $this->ctrl_model::is_exists('active_sidebar_route'));
		}
	}
	public function post_validate_entry()
	{
		$this->post_data['route'] 						= post('route', 'strCondense.strLowerCase');
		$this->post_data['function'] 					= post('function', 'trim.strToLower');
		$this->post_data['active_sidebar_route_id'] 	= post('active_sidebar_route_id', 'intval.strNullWhenZero');
		$this->post_data['description'] 				= post('description', 'strCondense.ucfirst.strNullWhenEmpty');
		$this->post_data['public'] 						= post('public', 'asCheckbox.intval');
		$this->post_data['active'] 						= post('active', 'asCheckbox.intval');
	}
	public function on_tuple_create_success($tuple)
	{
		$admin_role = AppRole::where('role', 'admin')->first();

		if ($admin_role) {
			$app_role_route = AppRoleRoute::where('role_id', $admin_role->id)
			->where('route_id', $tuple->id)
			->count();

			if (!$app_role_route) {
				$app_role_route = new AppRoleRoute;
				$app_role_route->role_id = $admin_role->id;
				$app_role_route->route_id = $tuple->id;
				$app_role_route->save();
			}
		}
	}
	// public function update_from_config($ajax=false)
	// {
	// 	$routes = Route::ciRoutes();

	// 	if (!$routes) goto end;

	// 	$unknown_routes = AppRoute::select('route')
	// 	->distinct()
	// 	->whereNotIn('route', $routes)
	// 	->get()
	// 	->pluck('route')
	// 	->toArray();

	// 	$admin_role = AppRole::where('role', 'admin')->first();

	// 	$added_routes = array();

	// 	DB::beginTransaction();

	// 	try
	// 	{
	// 		$existing_routes = AppRoute::select('route')
	// 		->distinct()
	// 		->get()
	// 		->pluck('route')
	// 		->toArray();

	// 		$routes = array_filter($routes, function ($route) use ($existing_routes)
	// 		{
	// 			return !in_array($route, $existing_routes);
	// 		});

	// 		$routes = array_values($routes);

	// 		foreach ($routes as $route)
	// 		{
	// 			$new_route = AppRoute::where(DB::raw('lower(route)'), strtolower($route))->first();

	// 			if (!$new_route) 
	// 			{
	// 				$new_route = new AppRoute;
	// 				$new_route->route = $route;
	// 				$new_route->save();

	// 				$added_routes[] = $route;

	// 				if ($admin_role) {
	// 					$new_role = new AppRoleRoute;
	// 					$new_role->role_id = $admin_role->id;
	// 					$new_role->route_id = $new_route->id;
	// 					$new_role->save();
	// 				}
	// 			}
	// 		}

	// 		DB::commit();
	// 	}
	// 	catch(\Exception $e) 
	// 	{
	// 		DB::rollback();

	// 		setFlashdata('error_message', implode(', ', array_filter($e->errorInfo ?? [], function ($item) { return !is_numeric($item); })));
	// 		redirect(base_url($this->ctrl_route));
	// 	}

	// 	end:

	// 	if ($unknown_routes) {
	// 		setFlashdata('error_message', 'Unknown routes: '.implode(', ', $unknown_routes));			
	// 	}

	// 	$msg = 'Routes updated';
	// 	$msg .= $added_routes ? '</br>New routes: '.implode(', ', $added_routes) : '';

	// 	setFlashdata('success_message', $msg);
	// 	redirect(base_url($this->ctrl_route));
	// }
}
