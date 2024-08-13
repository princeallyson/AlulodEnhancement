<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Luthier\Utils;
use Luthier\RouteBuilder;

class RouteAuthMiddleware implements Luthier\MiddlewareInterface
{
    public function run($args)
    {
        $ci =& ci(); #dj('ok');
 
        if (!$ci->user_routes) redirect(route('access-denied'));

        $route = RouteBuilder::getByUrl(Utils::currentUrl())->getName();

        $app_route = $ci->user_routes->where('route', $route)->first();

        if (!$app_route) redirect(route('access-denied'));
    }
}