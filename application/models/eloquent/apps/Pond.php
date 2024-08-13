<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class Pond extends BaseModel
{
	protected $table = 'tbl_ponds';

	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];
}