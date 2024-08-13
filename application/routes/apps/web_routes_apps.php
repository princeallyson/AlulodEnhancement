<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Route::group('/', ['namespace' => 'apps'], function() 
{
    Route::group('api', function() 
    {
        $name = 'api';
        $controller = 'ApiController';

        Route::get('sms/send', "{$controller}@send_sms")->name("{$name}.send_sms");

        Route::post('road', "{$controller}@road_api")->name("{$name}.road_api");
    });

	Route::group('/', ['middleware' => [SESS, USER, ROUTE_AUTH, SMARTY, SIDEBAR, NAVBAR]], function() 
	{
        # regular user

        // Route::group('skills', function() 
        // {
        //     $name = 'skills';
        //     $controller = 'SkillsController';

        //     __create_resource($name, $controller);

        //     Route::post('store', $controller.'@store')->name($name.'.store');
            
        //     Route::patch('update', $controller.'@update')->name($name.'.update');
        // });
	});

	Route::group('admin', ['namespace' => 'admin', 'middleware' => [SESS, AUTH, USER, ROUTE_AUTH, FILE]], function()
	{
        Route::group('print', function() 
        {
            $name = 'admin--print';
            $controller = 'PrintController';   

            Route::get('{num:hid}', $controller.'@print')->name($name);
        });

        Route::group('news', function() 
        {
            $name = 'admin--news';
            $controller = 'NewsController';

            __create_resource($name, $controller);

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');
        });

        Route::group('tags', function() 
        {
            $name = 'admin--tags';
            $controller = 'TagsController';

            __create_resource($name, $controller);

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');
        });

        Route::group('reports', function() 
        {
            $name = 'admin--reports';
            $controller = 'ReportsController';

            __create_resource($name, $controller);

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');

            Route::post('upload', $controller.'@upload')->name($name.'.upload');
        });

        Route::group('reports/items', function() 
        {
            $name = 'admin--report-items';
            $controller = 'ReportItemsController';

            __create_resource($name, $controller);

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');
        });

        Route::group('contacts', function() 
        {
            $name = 'admin--contacts';
            $controller = 'ContactsController';

            __create_resource($name, $controller);

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');
        });

        Route::group('locations', function() 
        {
            $name = 'admin--locations';
            $controller = 'LocationsController';

            __create_resource($name, $controller);

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');
        });

        Route::group('sms-outbounds', function() 
        {
            $name = 'admin--sms-outbounds';
            $controller = 'SmsOutboundsController';

            __create_resource($name, $controller);

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            # Route::patch('update', $controller.'@update')->name($name.'.update');
        });

        Route::group('locations/categories', function() 
        {
            $name = 'admin--location-categories';
            $controller = 'LocationCategoriesController';

            __create_resource($name, $controller);

            Route::post('store', $controller.'@store')->name($name.'.store');
            
            Route::patch('update', $controller.'@update')->name($name.'.update');
        });

        Route::group('dashboard', function() 
        {
            $name = 'admin--dashboard';
            $controller = 'DashboardController';

            Route::group('/', ['middleware' => [SMARTY, SIDEBAR, NAVBAR]], function() use ($name, $controller)
            {
                Route::get('/', "{$controller}@index")->name("{$name}");
            });
        });
	});
});

