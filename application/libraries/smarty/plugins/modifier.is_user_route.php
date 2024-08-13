<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_is_user_route($route)
{
    # return true;

    $ci = ci();

    if (!$ci->user_routes) return false;

    if (is_string($route)) $route = explode('|', $route);

    $route = $ci->user_routes->whereIn('route', $route)->first();

    return !is_null($route);
}