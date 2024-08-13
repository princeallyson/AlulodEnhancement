<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Luthier\RouteBuilder;
use Luthier\Utils;

class SessMiddleware implements Luthier\MiddlewareInterface
{
    public function run($args)
    {   
        $ci =& ci();

        $ci->load->database();
        
        $ci->load->library('session');

        AppSession::deleteOldSessions();

        AppSession::updateSessionId(sess_id());

        #$ci->test[] = 'sess';

        #dd( RouteBuilder::$compiled['names'] );

        #dd(get_class());

        #dj(route_exists('users.editx'));

        #$current_url = Utils::currentUrl(); dj($current_url);

        #$route = rb::getByUrl($current_url); dk($route, true);

        #dj( Route::getRoutes() );

        #dj( RouteBuilder::getByUrl('admin/routes')->getName() );

        #dj(RouteBuilder::getByName('routes')->getName());

        #$this->create_sidebar();

        #$route = Route::getCurrentRoute();

        
        #dk(Route::getRoutes(), true);
        #dj(Utils::currentUrl(), $route->getName());
    }
    private function update_routes()
    {
        $routes = array_keys(rb::$compiled['names']);

        $admin_role = AppRole::where('role', 'admin')->first();

        foreach ($routes as $route) 
        {
            $app_route = AppRoute::where('route', $route)->first() ?? new AppRoute;
            $app_route->route = $route;
            $app_route->save();

            $app_role_route = AppRoleRoute::where('role_id', $admin_role->id)->where('route_id', $app_route->id)->first() ?? new AppRoleRoute;
            $app_role_route->role_id = $admin_role->id;
            $app_role_route->route_id = $app_route->id;
            $app_role_route->save();
        }

        die('done');
    }
    private function create_sidebar()
    {
        $sidebar = AppSidebarMenu::whereNotNull('parent_id')->get();

        foreach ($sidebar as $sd) 
        {
            $route = strtolower($sd->name);

            $app_route = AppRoute::where('route', $route)->first();

            if ($app_route) {
                $new_sd = new AppSidebarMenu;
                $new_sd->parent_id = $sd->id;
                $new_sd->name = ucwords('all '.$route);
                $new_sd->display_name = 'All';
                $new_sd->route_id = $app_route->id;
                $new_sd->save();
            }

            $app_route = AppRoute::where('route', $route.'.new')->first();

            if ($app_route) {
                $new_sd = new AppSidebarMenu;
                $new_sd->parent_id = $sd->id;
                $new_sd->name = ucwords('new '.$route);
                $new_sd->display_name = 'New';
                $new_sd->route_id = $app_route->id;
                $new_sd->save();
            }
        }

        die('done sidebar creation');
    }
}