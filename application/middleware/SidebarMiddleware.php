<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spatie\HtmlElement\HtmlElement as el;

use Luthier\RouteBuilder;

use Luthier\Utils;

class SidebarMiddleware implements Luthier\MiddlewareInterface
{
    public function run($args)
    {
        $ci =& ci();

        if (!is_logged_in()) return;

        if (!$ci->sidebar_visible) return;

        if (!$ci->user_routes || !$ci->user_routes->count()) 
            return;
        
        $routes_id = array_unique( $ci->user_routes->pluck('id')->toArray() ); #dj($routes_id);

        $menus = AppSidebarMenu::with([
            'submenu' => function ($q) use ($routes_id)
            {
                $q->with([
                    'route' => function ($q) use ($routes_id)
                    {
                        $q->with('active_sidebar_route')->isActive()->whereIn('id', $routes_id);
                    },
                    'submenu' => function ($q) use ($routes_id)
                    {
                        $q->with([
                            'route' => function ($q) use ($routes_id)
                            {
                                $q->with('active_sidebar_route')->isActive()->whereIn('id', $routes_id);
                            },
                            'submenu' => function ($q) use ($routes_id)
                            {
                                $q->with([
                                    'route' => function ($q) use ($routes_id)
                                    {
                                        $q->with('active_sidebar_route')->isActive()->whereIn('id', $routes_id);
                                    }
                                ]);
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

        # dj($menus);

        if (!function_exists('__setup_sidebar')) {
            function __setup_sidebar(&$menus, $routes_id, &$selected)
            {
                foreach ($menus as $key => $menu) {
                    $text = strlen($menu->display_name) ? $menu->display_name : $menu->name;
                    $icon = strlen($menu->icon) ? '.'.$menu->icon : '';

                    if ($menu->submenu->count()) {
                        __setup_sidebar($menu->submenu, $routes_id, $selected);

                        if (!$menu->submenu->count())
                            $menus->forget($key);
                        else {
                            if ($menu->parent_id) {
                                # submenu
                                
                                $childs = $menu->submenu->pluck('html')->toArray();
                                $menu->nav_active = !!array_filter($menu->submenu->pluck('nav_active')->toArray());

                                $class_active = $menu->nav_active ? '.nav-item-expanded.nav-item-open' : '';
                                
                                $menu->html = el::render('li.nav-item nav-item-submenu'.$class_active, [], [
                                    el::render('a.nav-link[href=#]', [], [
                                        el::render('i'.$icon, [], ''),
                                        el::render('span', [], $text)
                                    ]),
                                    el::render('ul.nav nav-group-sub', ['submenu-title' => $text], $childs)
                                ]);

                                $menu->makeHidden(['submenu']);
                            }
                            else {
                                # group
                                
                                $menu->html = el::render('li.nav-item-header', [], [
                                    el::render('div.text-uppercase font-size-xs line-height-xs', [], $text),
                                    el::render('i.icon-menu', ['title' => $text], '')
                                ]);

                                $menu->html .= join($menu->submenu->pluck('html')->toArray());

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
                            if (!in_array($menu->route->id, $routes_id)) {
                                $menus->forget($key);
                                continue;
                            }

                            if (!route_exists($menu->route->route)) {
                                $menus->forget($key);
                                continue;   
                            }

                            # create clickable menu
                            
                            // if (!$menu->route ?? null) {
                            //     dj(0, $menu);
                            // }
                            
                            // if (!$menu->route->route ?? null) {
                            //     dj(1, $menu);
                            // }

                            // if (!route_exists($menu->route->route)) {
                            //     dj(2, $menu);
                            // }
                            
                            $current_url = Utils::currentUrl();

                            $route = RouteBuilder::getByUrl($current_url);

                            $route_name = $route->getName();

                            $menu->nav_active = $route_name == $menu->route->route;

                            if ($menu->nav_active)
                            {
                                $selected = $menu;
                            }

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

                            $menu->html = el::render('li.nav-item', [], 
                                el::render('a.nav-link'.$class_active, ['href' => route($menu->route->route), 'data-loading'], [
                                    el::render('i'.$icon, [], ''),
                                    el::render('span', [], $text)
                                ])
                            );

                            $menu->makeHidden(['submenu', 'route']);
                        }
                    }
                }
            }
        }

        $selected = null;

        __setup_sidebar($menus, $routes_id, $selected);

        if ($menus->count()) {
            $ci->sm->assign([
                'sidebar_visible' => true,
                'sidebar_data'    => join(array_values(array_filter($menus->pluck('html')->toArray())))
            ]);
        }
    }
}