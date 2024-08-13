<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class LocationCategory extends BaseModel
{
	protected $table = 'tbl_location_categories';

	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];
}