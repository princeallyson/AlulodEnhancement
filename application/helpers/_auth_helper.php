<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function is_logged_in() 
{
	return (int)ci()->session->userdata('__login') === 1;
}
function sess_id() 
{
	return get_instance()->session->userdata('__login_id');
}
function is_user_route($route)
{
	if (is_string($route)) explode('|', $route);

	$ci = ci();

	if (!$ci->user_routes) return false;

	return $ci->user_routes->whereIn('route', $route)->count() > 0;
}
function is_user_permission($permission)
{
	if (is_string($permission)) explode('|', $permission);

	$ci = ci();

	if (!$ci->user_permissions) return false;

	return $ci->user_permissions->whereIn('permission', $permission)->count() > 0;
}