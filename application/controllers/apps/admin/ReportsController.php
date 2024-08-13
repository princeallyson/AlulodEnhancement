<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;
use Spatie\HtmlElement\HtmlElement as el;

class ReportsController extends CrudController
{
	public $tpl_dir = 'modules/apps/admin/reports_h';

	public $ctrl_model = ReportH::class;

	public $title = 'Report';
	
	public $title_field = '';

	function __construct()
	{
		parent::__construct();

		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			'title',
			'type',
			'description', 
			Tableci::DATE_CREATED,
			'upload',
			Tableci::ACTIVE
		])
		->addExclusion(['upload'], Tableci::HTML_DATATABLE);
	}
	public function pre_index(&$table)
	{
		$table = $this->ctrl_model::select(find($this->settings, 'tableci.index')->sql_fields)
		->orderBy('id', 'desc')
		->get()
		->each(function ($item, $key)
		{
			$item->upload = el::render('button.btn.btn-success.btn-xs.btn-upload', ['data-id' => $item->id], 'Upload');
		});
	}
	public function set_rules(&$rules, $vars)
	{
		$rules = 
		[
			rule('title', ['required']),
			rule('type', ['required']),
		];
	}
	public function post_validate_entry()
	{
		$this->post_data['title'] 		= post('title', 'strProperCase');
		$this->post_data['type'] 		= post('type');
		$this->post_data['description'] = post('description', 'trim');
		$this->post_data['active'] 		= post('active', 'asCheckbox.intval');
	}
	public function upload()
	{
		if ($_FILES['file_dp'] && $_FILES['file_dp']['size'])
		{
			$csv = array_map('str_getcsv', file($_FILES['file_dp']['tmp_name']));

			if ($csv)
			{
				$report = ReportH::find(post('id'));

				if ($report)
				{
					foreach ($csv as $index => $col) 
					{
						if (count($col) == 2)
						{
							$item = new ReportD;
							$item->hid = $report->id;
							$item->name = $col[0];
							$item->value = floatval($col[1]);
							$item->save();
						}
					}
				}
			}
		}

		route_redirect('admin--reports');
	}
}
