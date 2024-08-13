<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class MenuController extends CrudController
{
	function __construct()
	{
		parent::__construct();
	}
	public function sort()
	{
		$menus = $this->ctrl_model::with('submenu.submenu.submenu.submenu.submenu')
		->isParent()
		->isActive()
		->orderBy('order')
		->get();

		$routes = AppRoute::isActive()->get();

		function iterate_nestable($array)
		{
			return array_map(function ($item) {

				$name = findItem($item, 'name');

				$li = newTag()->li(
					newTag()->div($name)->class('dd-handle')
				)
				->class('dd-item')->data('id', findItem($item, 'id'));

				if (findItem($item, 'submenu')) {
					$ol = newTag()->ol()->class('dd-list');

					$submenus = iterate_nestable(findItem($item, 'submenu'));

					foreach ($submenus as $submenu)
						$ol->addContents($submenu);

					$li->addContents($ol);
				}

				return $li;
			}, 
			$array);
		}

		tagSidebarWithUrl($menus, $routes);

		$nestable = newTag()->div(
			newTag()->ol(
				join(iterate_nestable($menus->toArray()))
			)
			->class('dd-list')
		)
		->id('menus')
		->class('dd')
		->data('max-depth', 10)
		->__toString();

		$this->sm->addFlashStatusMessage()
		->assign('nestable', $nestable);

		display('sort');
	}
	public function save_sort()
	{
		if (post('menus')) 
		{
			$sorting = json_decode(post('menus'));
			
			$this->ctrl_model::saveSort($sorting);
		}

		form_response(true, ['message' => "{$this->title} sorting saved.", 'redirect' => base_url("{$this->ctrl_route}/sort")]);

		// setFlashdata('success_message', "{$this->title} sorting saved.");
		
		// redirect(base_url("{$this->ctrl_route}/sort"));
	}

	# hooks
	
	public function pre_index(&$table)
	{
		$table = $this->ctrl_model::with('parent', 'route')
		->select($this->settings['tableci']['index']->sql_fields)
		->get()
		->each(function (&$tuple, $key) 
		{
			$tuple->append('parent_name');
			$tuple->append('route_name');

			if (!is_null($tuple->public))
			{
				$text 	= $tuple->public ? 'Yes' : 'No';
				$color 	= $tuple->public ? 'primary' : 'danger';
				$tuple->public = badge($text, $color);
			}
		});
	}
	public function pre_create($prev_tuple=null)
	{
		$filters = array(['route_id']);

		if ($prev_tuple) $filter[] = ['id', '<>', find($prev_tuple, 'id')];

		$menus = $this->ctrl_model::select2('name', null, $filters);

		$routes = AppRoute::select2('route');
		
		$this->sm->assign([
			'menus'	 => $menus,
			'routes' => $routes
		]);
	}
	public function set_rules(&$rules)
	{
		$rules = 
		[
			rule('name', 
				[
					'required', 
					$this->ctrl_model::is_unique($this->post_data['id'], 'name')
				]
			),
			rule('display_name', 'required')
		];

		if (post('parent_id'))
		{
			$rules[] = rule('parent_id', $this->ctrl_model::is_exists('parent'));
		}
		if (post('route_id'))
		{
			$rules[] = rule('route_id', AppRoute::is_exists('route'));
		}
	}
	public function post_validate_entry($vars)
	{
		$this->post_data['name'] 			= post('name', 'strProperCase');
		$this->post_data['display_name'] 	= post('display_name', 'strProperCase');
		$this->post_data['parent_id'] 		= post('parent_id', 'intval.strNullWhenZero');
		$this->post_data['route_id'] 		= post('route_id', 'intval.strNullWhenZero');
		$this->post_data['icon'] 			= post('icon', 'trim');
		$this->post_data['order'] 			= post('order', 'intval.strNullWhenZero');
		$this->post_data['description'] 	= post('description', 'strCondense.ucfirst.strNullWhenEmpty');
		$this->post_data['active'] 			= post('active', 'asCheckbox.intval');

		if (method_exists($this, '_'.__FUNCTION__))
		{
			$this->{ '_'.__FUNCTION__ }($vars);
		}
	}
}
