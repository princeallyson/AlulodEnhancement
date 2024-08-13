<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class TagsController extends CrudController
{
	public $tpl_dir = 'modules/apps/admin/tags';

	public $ctrl_model = Tag::class;

	public $title = 'Tag';
	
	public $title_field = '';

	function __construct()
	{
		parent::__construct();

		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			'tag',
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
			rule('tag', ['required', $this->ctrl_model::is_unique($this->post_data['id'], 'tag')])
		];
	}
	public function post_validate_entry()
	{
		$this->post_data['tag'] 		= post('tag', 'strCondense.strtolower');
		$this->post_data['description'] = post('description', 'trim');
		$this->post_data['active'] 		= post('active', 'asCheckbox.intval');
	}
}
