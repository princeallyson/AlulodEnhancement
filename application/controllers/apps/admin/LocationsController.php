<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class LocationsController extends CrudController
{
	public $tpl_dir = 'modules/apps/admin/locations';

	public $ctrl_model = Location::class;

	public $title = 'Location';
	
	public $title_field = '';

	function __construct()
	{
		parent::__construct();

		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			'location',
			['location_category_id', 'Category', 'category'],
			'description', 
			Tableci::DATE_CREATED,
			# Tableci::ACTIVE
		]);
	}
	public function pre_index(&$table)
	{
		$table = $this->ctrl_model::with('rel_location_category')
		->select(find($this->settings, 'tableci.index')->sql_fields)
		->orderBy('id', 'desc')
		->get();

		$table->each(function ($item, $key)
		{
			$item->category = $item->rel_location_category ?? false
			? $item->rel_location_category->category
			: null;
		});
	}
	public function pre_create(&$tuple=null)
	{
		$location_categories = LocationCategory::select2('category', null, [], false);

		$this->sm->assign('location_categories', $location_categories);

		$puroks = array();

		for ($i = 1; $i <= 6; $i++)
		{
			$puroks[] = "Purok ".$i;
		}

		$this->sm->assign('puroks', $puroks);
	}
	public function set_rules(&$rules, $vars)
	{
		$rules = 
		[
			rule('location', ['required']),
			rule('location_category_id', ['required', LocationCategory::is_exists('Location Category')])
		];

		if (!post('latitude'))
		{
			json_response(false, ['message' => 'Invalid location on map']);
		}
	}
	public function post_validate_entry()
	{
		$this->post_data['location'] 				= post('location', 'strCondense');
		$this->post_data['purok'] 					= post('purok', 'trim');
		$this->post_data['location_category_id'] 	= post('location_category_id', 'intval');
		$this->post_data['description'] 			= post('description', 'trim');
		$this->post_data['latitude'] 				= post('latitude', 'trim.strNullWhenEmpty');
		$this->post_data['longitude'] 				= post('longitude', 'trim.strNullWhenEmpty');
		$this->post_data['active'] 					= post('active', 'asCheckbox.intval');
	}
}
