<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spatie\HtmlElement\HtmlElement as el;
use Luthier\RouteBuilder;
use Luthier\Utils;

class NavbarMiddleware implements Luthier\MiddlewareInterface
{
    public function run($args)
    {
        $ci =& ci();

        if (!($ci->navbar_visible ?? null)) return;

        $is_login = is_logged_in();

        $routes_id = $ci->user_routes ? array_unique( $ci->user_routes->pluck('id')->toArray() ) : array();

        # dj( AppRoute::select('route')->whereIn('id', $routes_id)->get() );

        $menus = AppNavbarMenu::with([
            'submenu' => function ($q)
            {
                $q->with([
                    'route' => function ($q)
                    {
                        $q->with('active_sidebar_route')->isActive();
                    },
                    'submenu' => function ($q)
                    {
                        $q->with([
                            'route' => function ($q)
                            {
                                $q->with('active_sidebar_route')->isActive();
                            }
                        ]);
                    }
                ]);
            }
        ])
        ->isParent()
        ->isActive()
        ->orderBy('order')
        ->get();

        if (!function_exists('__setup_navbar')) {
            function __setup_navbar(&$menus, $routes_id, $is_login)
            {
                foreach ($menus as $key => $menu) {
                    $text = strlen($menu->display_name) ? $menu->display_name : $menu->name;
                    $icon = strlen($menu->icon) ? '.'.$menu->icon : '';

                    if ($menu->submenu->count()) {
                        __setup_navbar($menu->submenu, $routes_id, $is_login);

                        if (!$menu->submenu->count())
                            $menus->forget($key);
                        else {
                            if ($menu->parent_id) {
                                # submenu
                                
                                $childs = $menu->submenu->pluck('html')->toArray();
                                
                                $menu->nav_active = !!array_filter($menu->submenu->pluck('nav_active')->toArray());

                                $class_active = $menu->nav_active ? '.active' : '';
                                
                                $menu->html = el::render('.dropdown-submenu', [], [
                                    el::render('a.dropdown-item.dropdown-toggle[href=#]'.$class_active, [], [
                                        strlen($icon) ? el::render('i.mr-2'.$icon, [], '') : '',
                                        $text
                                    ]),
                                    el::render('.dropdown-menu', [], join($childs))
                                ]);

                                $menu->makeHidden(['submenu']);
                            }
                            else {
                                # group
                                
                                $childs = $menu->submenu->pluck('html')->toArray();
                                
                                $menu->nav_active = !!array_filter($menu->submenu->pluck('nav_active')->toArray());

                                $class_active = $menu->nav_active ? '.active' : '';
                                
                                $menu->html = el::render('li.nav-item dropdown.nav-item-dropdown-xl', [], [
                                    el::render("a.navbar-nav-link.dropdown-toggle[href=#][data-toggle=dropdown]".$class_active, [], [
                                        strlen($icon) ? el::render('i.mr-2'.$icon, [], '') : '',
                                        $text
                                    ]),
                                    el::render('.dropdown-menu.dropdown-scrollable-xl', [], join($childs))
                                ]);

                                $menu->makeHidden(['submenu']);
                            }
                        }
                    }
                    elseif (!$menu->route_id) {
                        $menus->forget($key);
                    }
                    else {
                        if ($menu->route_id && !$menu->route)
                            $menus->forget($key);
                        else {
                            # create clickable menu
                        
                            if (!$menu->route ?? null) {
                                # dj(0, $menu);
                                # continue;
                            }
                            
                            if (!$menu->route->route ?? null) {
                                # dj(1, $menu);
                                # continue;
                            }

                            if (!route_exists($menu->route->route)) {
                                #dj(2, $menu);
                                # continue;
                            }

                            if (!in_array($menu->route->id, $routes_id)) {
                                if (!$menu->public) {
                                    $menus->forget($key);
                                    continue;      
                                }
                            }
                            
                            if (!route_exists($menu->route->route)) {
                                $menus->forget($key);
                                continue;      
                            }
                            
                            $current_url = Utils::currentUrl();

                            $route = RouteBuilder::getByUrl($current_url);

                            $route_name = $route->getName();

                            $menu->nav_active = $route_name == $menu->route->route;

                            // if (!$menu->nav_active && $menu->route->active_sidebar_route) 
                            // {
                            //     $menu->nav_active = $route_name == $menu->route->active_sidebar_route->route;
                            // }
                            
                            if (!$menu->nav_active && $menu->route->active_sidebar_route->count()) 
                            {
                                $active_sidebar_route = $menu->route->active_sidebar_route;

                                foreach ($active_sidebar_route as $asr)
                                {
                                    $menu->nav_active = $route_name == $asr->route;

                                    if ($menu->nav_active)
                                    {
                                        break;
                                    }
                                }
                            }

                            $class_active = $menu->nav_active ? '.active' : '';

                            $menu->html = el::render('a.dropdown-item'.$class_active, ['href' => route($menu->route->route), 'data-loading'], [
                                strlen($icon) ? el::render('i.mr-2'.$icon, [], '') : '',
                                $text
                            ]);

                            $menu->makeHidden(['submenu', 'route']);
                        }
                    }
                }
            }
        }

        __setup_navbar($menus, $routes_id, $is_login);

        #dj($menus);

        $ci->sm->assign([
            'navbar_visible' => true,
            'navbar_data'    => $menus->count() 
                ? join(array_values(array_filter($menus->pluck('html')->toArray()))) 
                : ''
        ]);
    }
}