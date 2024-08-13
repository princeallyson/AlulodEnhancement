<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class LocationCategoriesController extends CrudController
{
	public $tpl_dir = 'modules/apps/admin/location_categories';

	public $ctrl_model = LocationCategory::class;

	public $title = 'Location Category';
	
	public $title_field = '';

	function __construct()
	{
		parent::__construct();

		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			'category',
			'description', 
			Tableci::DATE_CREATED,
			# Tableci::ACTIVE
		]);
	}
	public function pre_index(&$table)
	{
		$table = $this->ctrl_model::select(find($this->settings, 'tableci.index')->sql_fields)
		->orderBy('id', 'desc')
		->get();
	}
	public function set_rules(&$rules, $vars)
	{
		$rules = 
		[
			rule('category', ['required', $this->ctrl_model::is_unique($this->post_data['id'], 'category')])
		];
	}
	public function post_validate_entry()
	{
		$this->post_data['category'] 	= post('category', 'strProperCase');
		$this->post_data['description'] = post('description', 'trim');
		$this->post_data['active'] 		= post('active', 'asCheckbox.intval');
	}
}
