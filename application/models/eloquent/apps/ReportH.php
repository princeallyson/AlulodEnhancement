<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class ReportH extends BaseModel
{
	protected $table = 'tbl_reports_h';

	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];

	public function rel_report_items()
	{
		return $this->hasMany(ReportD::class, 'hid', 'id');
	}
}