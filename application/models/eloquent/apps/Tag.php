<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class Tag extends BaseModel
{
	protected $table = 'tbl_tags';

	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];
}