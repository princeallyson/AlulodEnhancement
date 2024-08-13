<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * API Routes
 *
 * This routes only will be available under AJAX requests. This is ideal to build APIs.
 */

Route::group('/', ['namespace' => NS_ADMIN, 'middleware' => [SESS, AUTH]], function() 
{
    Route::post('QHQRIJgZzgKjkENvZtlm', 'ResourcesController@new_csrf')->name('get.csrf');
});

# admin
Route::group('admin', ['middleware' => [SESS, AUTH, USER, ROUTE_AUTH]], function() 
{
    Route::group('/', ['namespace' => NS_ADMIN], function() 
    {
        # users.3
        Route::group('users', function() 
        {
            $name = 'users';
            $controller = 'UsersController';

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');
        });

        # roles
        Route::group('roles', function() 
        {
            $name = 'roles';
            $controller = 'RolesController';

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');
        });

        # routes
        Route::group('routes', function() 
        {
            $name = 'routes';
            $controller = 'RoutesController';

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');
        });

        # permissions
        Route::group('permissions', function() 
        {
            $name = 'permissions';
            $controller = 'PermissionsController';

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');
        });

        # sidebar
        Route::group('sidebar', function() 
        {
            $name = 'sidebar';
            $controller = 'SidebarController';

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');
        });

        # sidebar
        Route::group('navbar', function() 
        {
            $name = 'navbar';
            $controller = 'NavbarController';

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');
        });
    });
});

$apps_routes = glob(__DIR__.DS.'apps'.DS.'api_routes_*.php');

foreach ($apps_routes as $r)
    include_once($r);