<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class AppRoute extends DefaultModel 
{
	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];
	
	public function active_sidebar_route() 
	{
		# parent to child

		return $this->hasMany(self::class, 'active_sidebar_route_id', 'id');
	}
	public function rel_active_menu() 
	{
		# child to parent

		return $this->hasOne(self::class, 'id', 'active_sidebar_route_id');
	}
}