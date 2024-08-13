<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class AppUser extends DefaultModel 
{	
	const EXTENSION = 1;
	const VERIFICATION = 2;

	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];

	public function getNameAttribute()
	{
		return $this->rel_user_extension ? ($this->rel_user_extension->first_name.' '.$this->rel_user_extension->last_name) : null;
	}
	public static function routes($user_id)
	{
		$public_routes = AppRoute::where(DB::raw('ifnull(public, 0)'), '=', 1);

		$routes = AppRoute::from(AppRoute::as('rt'))
		->select('rt.*')
		->join(AppRoleRoute::as('rr'), 'rr.route_id', 'rt.id')
		->join(AppRole::as('r'), 'r.id', 'rr.role_id')
		->join(AppUserRole::as('ur'), 'ur.role_id', 'r.id')
		->join(AppUser::as('u'), 'u.id', 'ur.user_id')
		->isActive('rt')
		->isActive('rr')
		->isActive('r')
		->isActive('ur')
		->isActive('u')
		->where('u.id', $user_id)
		->where(DB::raw('ifnull(public, 0)'), '<>', 1);

		$routes = $routes->union($public_routes)->get(); 
		
		return $routes;
	}
	public static function permissions($user_id)
	{
		$permissions = AppPermission::from(AppPermission::as('p'))
		->select('p.id', 'p.permission')
		->join(AppRolePermission::as('rp'), 'rp.permission_id', 'p.id')
		->join(AppRole::as('r'), 'r.id', 'rp.role_id')
		->join(AppUserRole::as('ur'), 'ur.role_id', 'r.id')
		->join(AppUser::as('u'), 'u.id', 'ur.user_id')
		->isActive('p')
		->isActive('rp')
		->isActive('r')
		->isActive('ur')
		->isActive('u')
		->where('u.id', $user_id)
		->get();

		return $permissions;
	}
	public function rel_user_extension()
	{
		return $this->hasOne(AppUserExtension::class, 'user_id', 'id');
	}
	public static function current()
	{
		return self::find(sess_id());
	}
	public function rel_shared_file()
	{
		return $this->hasMany(AppSharedFile::class, 'user_id', 'id');
	}
}