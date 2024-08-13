<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class ReportD extends BaseModel
{
	protected $table = 'tbl_reports_d';

	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];

	public function rel_report()
	{
		return $this->hasOne(ReportH::class, 'id', 'hid');
	}
}