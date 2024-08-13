<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

if (!function_exists('__create_routes'))
{
    function __create_routes($__name, $__controller, $__method_routes)
    {
        foreach ($__method_routes as $__method_route)
        {
            $__method_route = explode(':', $__method_route);

            $__method = $__method_route[0];
            $__route = $__method_route[1];

            Route::$__method($__route, $__controller.'@'.$__route)->name($__name.'.'.$__route);
        }
    }
}

if (!function_exists('__create_resource'))
{
    function __create_resource($__name, $__controller)
    {
        Route::group('/', ['middleware' => [SMARTY, SIDEBAR, NAVBAR]], function() use ($__name, $__controller)
        {
            Route::get('/', $__controller.'@index')->name($__name);

            Route::get('new', $__controller.'@create')->name($__name.'.new');

            Route::get('{num:id}', $__controller.'@edit')->name($__name.'.edit');
        });

        __create_routes($__name, $__controller, ['delete:delete']);
    }
}

# middlewares
defined('SESS')         OR define('SESS', 'SessMiddleware'); # database and session library
defined('USER')         OR define('USER', 'UserMiddleware'); # user->routes(public/private), user->permissions
defined('SMARTY')       OR define('SMARTY', 'SmartyMiddleware'); # initialize smarty variables
defined('SIDEBAR')      OR define('SIDEBAR', 'SidebarMiddleware'); # initialize left sidebar
defined('NAVBAR')       OR define('NAVBAR', 'NavbarMiddleware'); # initialize top navbar
defined('LOGIN')        OR define('LOGIN', 'LoginMiddleware'); # prevent user to go back in login page
defined('AUTH')         OR define('AUTH', 'AuthMiddleware'); # prevent user to access if not logged in
defined('ROUTE_AUTH')   OR define('ROUTE_AUTH', 'RouteAuthMiddleware'); # prevent user to access routes
defined('FILE')         OR define('FILE', 'FileMiddleware'); # delete files

defined('NS_DEFAULT')   OR define('NS_DEFAULT', 'default');
defined('NS_ADMIN')     OR define('NS_ADMIN', NS_DEFAULT.'/admin');
defined('NS_APPS')      OR define('NS_APPS', 'apps');

Route::set('404_override', function() {
    route_redirect('not-found');
});

Route::set('translate_uri_dashes', FALSE);

# errors
Route::group('/', ['namespace' => NS_DEFAULT, 'middleware' => [SMARTY]], function() 
{
    $controller = 'ErrorsController';

    Route::get('eaRKGpvmcoTddVybUMQX', $controller.'@access_denied')->name('access-denied');
    Route::get('RwkLNhUSBTZMFIYoAvyZ', $controller.'@not_found')->name('not-found');
});

Route::group('/', ['namespace' => NS_DEFAULT], function() 
{
    Route::group('install', function() 
    {
        $controller = 'SchemaController';

        # Route::get('tables', $controller.'@app_install_tables')->name('app-install-tables');

        Route::get('seeds', $controller.'@app_install_seeds')->name('app-install-seeds');
         
        Route::get('new/table', $controller.'@new_table')->name('app-new-table');
    });
});

# login
Route::group('/', ['namespace' => NS_DEFAULT, 'middleware' => [SESS]], function() 
{
    Route::group('/', ['middleware' => [LOGIN]], function() 
    {
        Route::group('/', ['middleware' => [SMARTY]], function() 
        {
            Route::get('login', 'LoginController@login')->name('login');
            
            Route::get('forgot-password', 'LoginController@forgot_password')->name('login.forgot_password');
            
            Route::get('signup', 'LoginController@signup')->name('login.signup');
            
            Route::get('thankyou', 'LoginController@thankyou')->name('login.thankyou');

             Route::post('register', 'LoginController@register')->name('login.register');

             Route::post('new-password', 'LoginController@new_password')->name('login.new-password');

             Route::post('verification/resend', 'LoginController@verification_resend')->name('login.resend-verification');
        });

        Route::post('check', 'LoginController@check')->name('login.check');
        
        Route::get('verify/{any:code}', 'LoginController@verify')->name('login.verify');
    });

    Route::get('logout', 'LoginController@logout')->name('login.logout');
});

# user profile
Route::group('profile', ['namespace' => NS_DEFAULT, 'middleware' => [SESS, USER, ROUTE_AUTH]], function() 
{
    Route::get('/', 'ProfileController@index', ['middleware' => [SMARTY, SIDEBAR, NAVBAR]])->name('profile');

    Route::patch('update', 'ProfileController@update')->name('profile.update');

    Route::group('password', function() 
    {
        Route::patch('update', 'ProfileController@change_password')->name('profile.password-update');
    });
    
    Route::group('photo', function() 
    {
        Route::patch('update', 'ProfileController@update_photo')->name('profile.photo-update');
        
        Route::delete('delete', 'ProfileController@delete_photo')->name('profile.photo-delete');
    });
});

# admin
Route::group('admin', ['middleware' => [SESS, AUTH, USER, ROUTE_AUTH]], function() 
{
    Route::group('/', ['namespace' => NS_DEFAULT, 'middleware' => [SMARTY, SIDEBAR, NAVBAR]], function() 
    {
        # admin home | dashboard
        Route::get('/', 'AdminHomeController@index')->name('admin.home');
    });

    Route::group('/', ['namespace' => NS_ADMIN], function() 
    {
        # users.3
        Route::group('users', function() 
        {
            $name = 'users';
            $controller = 'UsersController';

            __create_resource($name, $controller);
            
            Route::patch('reset/password', $controller.'@reset_password')->name($name.'.reset-password');
        });

        # roles
        Route::group('roles', function() 
        {
            $name = 'roles';
            $controller = 'RolesController';

            __create_resource($name, $controller);
        });

        # routes
        Route::group('routes', function() 
        {
            $name = 'routes';
            $controller = 'RoutesController';

            __create_resource($name, $controller);
        });

        # permissions
        Route::group('permissions', function() 
        {
            $name = 'permissions';
            $controller = 'PermissionsController';

            __create_resource($name, $controller);
        });

        # sidebar
        Route::group('sidebar', function() 
        {
            $name = 'sidebar';
            $controller = 'SidebarController';

            __create_resource($name, $controller);

            Route::group('/', ['middleware' => [SMARTY, SIDEBAR, NAVBAR]], function() use ($name, $controller)
            {
                Route::get('sort', $controller.'@sort')->name($name.'.sort');
            });

            Route::patch('sort/update', $controller.'@save_sort')->name($name.'.sort-update');
        });

        # sidebar
        Route::group('navbar', function() 
        {
            $name = 'navbar';
            $controller = 'NavbarController';

            __create_resource($name, $controller);

            Route::group('/', ['middleware' => [SMARTY, SIDEBAR, NAVBAR]], function() use ($name, $controller)
            {
                Route::get('sort', $controller.'@sort')->name($name.'.sort');
            });

            Route::patch('sort/update', $controller.'@save_sort')->name($name.'.sort-update');
        });
    });
});

Route::group('/', ['middleware' => [SESS, USER]], function() 
{
    Route::group('/', ['middleware' => [SMARTY, SIDEBAR, NAVBAR]], function() 
    {
        Route::group('/', ['namespace' => NS_DEFAULT, 'middleware' => [USER, ROUTE_AUTH]], function() 
        {
            Route::get('notifications', 'NotificationsController@index')->name('notifications');
        });

        Route::group('/', ['middleware' => [USER, ROUTE_AUTH]], function() 
        {
            # Route::get('/', "HomeController@index")->name("home");

            Route::get('map', "HomeController@map")->name("map");

            # Route::get('news', "HomeController@index")->name("news");

            Route::get('news/{num:id}', 'HomeController@news')->name('news.view');

            Route::get('reports', 'HomeController@reports')->name('reports');
        });
    });

    Route::get('/', function ()
    {
        if (!is_logged_in())
            route_redirect('login');
        else
            route_redirect('reports');
    })
    ->name('home');
});

Route::get('genpwd', function ()
{
    dj(Auth::encryptPassword(ci()->config->item('default_password')));
});

Route::group('/', ['middleware' => [SESS]], function() 
{   
    Route::get('create-menu', function ()
    {
        $module = get('module');

        if (!strlen($module)) return;

        $pieces = explode('-', str_replace('--', '-', $module));

        DB::beginTransaction();

        try
        {
            $pieces[1] = explode('_', $pieces[1]);
            $pieces[1] = array_map('ucwords', $pieces[1]);
            $pieces[1] = join(' ',$pieces[1]);

            $sidebar_parent = AppSidebarMenu::where('name', strProperCase($pieces[0]).' '.strProperCase($pieces[1]))->first();

            if (!$sidebar_parent)
            {
                $sidebar_main = AppSidebarMenu::where('name', 'Main')->first();

                $sidebar_parent                 = new AppSidebarMenu;
                $sidebar_parent->parent_id      = $sidebar_main->id;
                $sidebar_parent->name           = strProperCase($pieces[0]).' '.strProperCase($pieces[1]);
                $sidebar_parent->display_name   = strProperCase($pieces[1]);
                $sidebar_parent->icon           = 'icon-list';

                # dj($sidebar_parent);

                $sidebar_parent->save();
            }

            $role = AppRole::where('role', 'admin')->first();

            $methods = ['', '.new', '.store', '.edit', '.update', '.delete'];

            foreach ($methods as $method)
            {
                $route = AppRoute::where('route', $module.$method)->first();

                if (!$route)
                {
                    $route          = new AppRoute;
                    $route->route   = $module.$method;

                    if ($method == '.edit')
                    {
                        $parent_route = AppRoute::where('route', $module)->first();

                        if ($parent_route)
                        {
                            $route->active_sidebar_route_id = $parent_route->id;
                        }
                    }

                    $route->save();

                    $role_route             = new AppRoleRoute;
                    $role_route->role_id    = $role->id;
                    $role_route->route_id   = $route->id;
                    $role_route->save();

                    if (!strlen($method))
                    {
                        $sidebar_all = AppSidebarMenu::where('name', 'All '.strProperCase($pieces[1]))->first();

                        if (!$sidebar_all)
                        {
                            $sidebar_all                = new AppSidebarMenu;
                            $sidebar_all->parent_id     = $sidebar_parent->id;
                            $sidebar_all->name          = 'All '.strProperCase($pieces[1]);
                            $sidebar_all->display_name  = 'All';
                            $sidebar_all->route_id      = $route->id;

                            # dj($sidebar_all);

                            $sidebar_all->save();
                        }
                    }

                    if ($method == '.new')
                    {
                        $sidebar_new = AppSidebarMenu::where('name', 'New '.strProperCase($pieces[1]))->first();

                        if (!$sidebar_new)
                        {
                            $sidebar_new                = new AppSidebarMenu;
                            $sidebar_new->parent_id     = $sidebar_parent->id;
                            $sidebar_new->name          = 'New '.strProperCase($pieces[1]);
                            $sidebar_new->display_name  = 'New';
                            $sidebar_new->route_id      = $route->id;

                            # dj($sidebar_new);

                            $sidebar_new->save();
                        }
                    }
                }
            }

            DB::commit();

            dj('Module '.$module.' saved...');
        }
        catch(\Exception $e) 
        {
            DB::rollback();

            dj($e);
        }
    });
});

$apps_routes = glob(__DIR__.DS.'apps'.DS.'web_routes_*.php');

foreach ($apps_routes as $r)
    include_once($r);