<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class AppNavbarMenu extends DefaultModel 
{
	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];
	
	public function submenu()
	{
		return $this->hasMany(static::class, 'parent_id', 'id')
		->isActive()
		->orderBy('order');
	}
	public function scopeIsParent($query)
	{
		return $query->where(DB::raw('ifnull(parent_id, 0)'), 0);
	}
	public function parent()
	{
		return $this->hasOne(static::class, 'id', 'parent_id');
	}
	public function route()
	{
		return $this->hasOne(AppRoute::class, 'id', 'route_id');
	}
	public function getParentNameAttribute()
	{
		return $this->parent->name ?? null;
	}
	public function getRouteNameAttribute()
	{
		return $this->route->route ?? null;
	}
	public static function saveSort($sortedMenus, $parent_id=null)
	{
		$index = 1;

		foreach ($sortedMenus as $sort) 
		{
			$menu = self::find(findItem($sort, 'id'));

			if ($menu) {
				$menu->parent_id = $parent_id;
				$menu->order = $index;
				$menu->save();

				$index++;
			}

			if (count(findItem($sort, 'children', []))) {
				self::saveSort(findItem($sort, 'children'), findItem($sort, 'id'));
			}
		}
	}
}