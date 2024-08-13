<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class Location extends BaseModel
{
	protected $table = 'tbl_locations';

	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];

	public function rel_location_category()
	{
		return $this->hasOne(LocationCategory::class, 'id', 'location_category_id');
	}
}