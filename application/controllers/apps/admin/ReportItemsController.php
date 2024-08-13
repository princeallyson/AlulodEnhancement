<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class ReportItemsController extends CrudController
{
	public $tpl_dir = 'modules/apps/admin/reports_d';

	public $ctrl_model = ReportD::class;

	public $title = 'Report Item';
	
	public $title_field = '';

	function __construct()
	{
		parent::__construct();

		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			['hid', 'Report', 'report'],
			'name',
			'value',
			Tableci::DATE_CREATED,
			# Tableci::ACTIVE
		]);
	}
	public function pre_index(&$table)
	{
		$table = $this->ctrl_model::with('rel_report')
		->select(find($this->settings, 'tableci.index')->sql_fields)
		->orderBy('id', 'desc')
		->get();

		$table->each(function ($item, $key)
		{
			$item->report = $item->rel_report ? $item->rel_report->title : null;
		});
	}
	public function pre_create(&$tuple=null)
	{
		$reports = ReportH::select2('title');

		$this->sm->assign('reports', $reports);
	}
	public function set_rules(&$rules, $vars)
	{
		$rules = 
		[
			rule('hid', ['required', ReportH::is_exists('Report')]),
			rule('name', ['required']),
			rule('value', ['required']),
		];
	}
	public function post_validate_entry()
	{
		$this->post_data['hid'] 		= post('hid', 'intval');
		$this->post_data['name'] 		= post('name', 'strCondense.ucfirst.trim');
		$this->post_data['value'] 		= post('value', 'floatval');
		$this->post_data['active'] 		= post('active', 'asCheckbox.intval');
	}
}
