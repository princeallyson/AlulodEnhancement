<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function initializeFrontEnd()
{
	$ci = loadSmarty();

	$ci->sm->_assign([
		'base_url'			=> base_url(),
        'assets_url' 		=> $ci->config->item('assets_url'), #base_url('public'),
        'uploads_url'		=> $ci->uploadsPath ?? '',
        'app_title' 		=> $ci->config->item('app_title'),
        #'is_home'			=> Route::current() == $ci->router->default_controller,
        'module_tpl_dir'	=> $ci->tpl_dir
    ]);

    return $ci;
}
function noSidebar()
{
	$ci = loadSmarty();

	$ci->sm->_assign('sidebar_visible', false);
}
function noNavbar()
{
	$ci = loadSmarty();

	$ci->sm->_assign('navbar_visible', false);
}
function tagSidebarWithUrl(&$collection, $routes)
{
	$count = 0;

	$collection->each(function ($item, $key) use (&$collection, &$count, $routes)
	{
		$item->makeHidden(['created_at', 'updated_at', 'uuid', 'order', 'active']);

		$item->has_url = 0;

		if ($item->submenu->count())
		{
			$item->has_url += tagSidebarWithUrl($item->submenu, $routes);
			$item->route_id = null;
		}

		if ($item->route_id) 
		{
			$route_id = $item->route_id;

			if ($routes)
			{
				$route = $routes->filter(function ($route) use ($route_id)
				{
					return $route->id == $route_id;
				});	

				if ($route->count())
				{
					$item->url = $route->first()->route;
					$item->has_url++; # count child with url
				}
			}
		}

		$count += $item->has_url;
	});

	return $count;
}

function filterSidebarWithUrl(&$collection)
{
	$collection->each(function ($item, $key) use (&$collection)
	{
		if ($item->submenu->count())
			filterSidebarWithUrl($item->submenu);

			if (!$item->has_url) $collection->forget($key); # remove child without any url
		});
}

function createHtmlElements(&$collection, $parentTag=null)
{
	$countActiveChild = 0;

	$collection->each(function (&$item, $key) use (&$collection, &$parentTag, &$countActiveChild)
	{
		$ci =& get_instance();

		$display_name = strlen($item->display_name) ? $item->display_name : $item->name;

		if ($item->route_id)
		{
			$active_sidebar_route = AppRoute::where('active_sidebar_route_id', $item->route_id)
			->isActive()
			->get();

			if ($active_sidebar_route->count()) 
			{
				$item->active_sidebar_route = $active_sidebar_route
				->pluck('route')
				->toArray();
			}

			#if ($item->url == 'users') dj($item->active_sidebar_route);
		}

		if ($item->submenu->count())
		{
			$childUrlParent = newTag()->ul()
			->class('nav nav-group-sub')
				->data('submenu-title', $display_name); # parent of childs with url

				$_countActiveChild = createHtmlElements($item->submenu, $childUrlParent);

				if ($_countActiveChild) $countActiveChild += $_countActiveChild;

				if (!$item->parent_id) # group
				{
					$item->html = newTag()->li(
						newTag()->div($display_name)->class('text-uppercase font-size-xs line-height-xs')
						.' '
						.newTag()->i()->class('icon-menu')->title($display_name)
					)
					->class('nav-item-header');
				}
				else # with submenu
				{
					$item->html = newTag()->li(
						newTag()->a(
							newTag()->i()->class($item->icon),
							' ',
							newTag()->span($display_name)
						)
						->href('#')
						->class('nav-link'),

						$childUrlParent
					)
					->class('nav-item nav-item-submenu'
						.($_countActiveChild ? ' nav-item-expanded nav-item-open' : '')
					);

					if ($parentTag) 
					{
						$parentTag->addContents($item->html);
						#$item->html = null;
					}
				}
			}
			else # child with url
			{
				$uriString = ltrim(uri_string(), '/');

				if (!strlen($uriString)) $uriString = $ci->router->default_controller;

				$isActive = $uriString == $item->url;

				# if menu url is not equal to current url try to check if other module has url related to this menu.
				
				if ($item->url == 'users') 
				{
					#dj($item->active_sidebar_route);
				}

				if (!$isActive && $item->active_sidebar_route)
				{	
					$currentRoute = Route::current();

					$isActive = !!array_filter($item->active_sidebar_route, function ($route) use ($currentRoute)
					{
						return $route == $currentRoute;
					});
				}

				#dj([Route::exists(uri_string()), uri_string(), Route::fromUri(uri_string())]);

				$isActive = $isActive && Route::exists(uri_string());

				$item->html = newTag()->li(
					newTag()->a(
						newTag()->i()->class($item->icon),
						newTag()->span($display_name)
					)
					->href(base_url($item->url))
					->class('nav-link'.($isActive ? ' active' : ''))
				)
				->class('nav-item');

				if ($parentTag) 
				{
					$parentTag->addContents($item->html);
					#$item->html = null;
				}

				$countActiveChild += (int)$isActive;
			}

			$item->html = $item->html ? $item->html->__toString() : '';
		});

	return $countActiveChild;
}
function loadSidebar()
{
	$ci = loadSmarty();

	$sidebar = AppSidebarMenu::with('submenu.submenu.submenu.submenu.submenu')
	->isParent()
	->isActive()
	->orderBy('order')
	->get();

	tagSidebarWithUrl($sidebar, $ci->user_routes ?? null);
	filterSidebarWithUrl($sidebar);
	createHtmlElements($sidebar);

	$sidebarData = array();

	foreach ($sidebar as $key => $sb) 
	{
		$sidebarData[] = $sb->html; # append group

		foreach ($sb->submenu as $submenu)
		{
			$sidebarData[] = $submenu->html; # append child menu
		}
	}

	$ci->sm->_assign([
		'navbar_visible'	=> true,
		'sidebar_visible' 	=> !!$sidebarData,
		'sidebar_data' 		=> $sidebarData
	]);

	loadNavbar();
}
function createNavbarHtmlElements(&$collection, $parentTag=null)
{
	$countActiveChild = 0;

	$collection->each(function (&$item, $key) use (&$collection, &$parentTag, &$countActiveChild)
	{
		$ci =& get_instance();

		$display_name = strlen($item->display_name) ? $item->display_name : $item->name;

		if ($item->route_id)
		{
			# active menu on item request

			$active_sidebar_route = AppRoute::where('active_sidebar_route_id', $item->route_id)
			->isActive()
			->get();

			if ($active_sidebar_route->count()) 
			{
				$item->active_sidebar_route = $active_sidebar_route
				->pluck('route')
				->toArray();
			}
		}

		if ($item->submenu->count())
		{
			if (!$item->parent_id) # group
			{
				$childParentContainer = newTag()->div()->class('dropdown-menu dropdown-scrollable-xl');

				$_countActiveChild = createNavbarHtmlElements($item->submenu, $childParentContainer);

				if ($_countActiveChild) $countActiveChild += $_countActiveChild;

				$item->html = newTag()->li(
					newTag()->a(
						($item->icon ? newTag()->i()->class($item->icon.' mr-2') : '').$display_name
					)
					->href('#')
					->class('navbar-nav-link dropdown-toggle'.($_countActiveChild ? ' active' : ''))
					->data('toggle', 'dropdown'),
					$childParentContainer
				)
				->class('nav-item dropdown nav-item-dropdown-xl');
			}
			else # with submenu
			{
				$childParentContainer = newTag()->div()->class('dropdown-menu');

				$_countActiveChild = createNavbarHtmlElements($item->submenu, $childParentContainer);

				if ($_countActiveChild) $countActiveChild += $_countActiveChild;

				$item->html = newTag()->div(
					newTag()->a(
						($item->icon ? newTag()->i()->class($item->icon.' mr-2') : '').$display_name
					)
					->href(base_url($item->url))
					->class('dropdown-item dropdown-toggle'.($_countActiveChild ? ' active' : '')),
					$childParentContainer
				)
				->class('dropdown-submenu');

				if ($parentTag) {
					$parentTag->addContents($item->html); 
					$item->html = null;
				}
			}
		}
		else # child with url
		{
			$uriString = ltrim(uri_string(), '/');

			if (!strlen($uriString)) $uriString = $ci->router->default_controller;

			$isActive = $uriString == $item->url;

			# if menu url is not equal to current url try to check if other module has url related to this menu.
			
			if ($item->url == 'users') 
			{
				#dj($item->active_sidebar_route);
			}

			if (!$isActive && $item->active_sidebar_route)
			{	
				$currentRoute = Route::current();

				$isActive = !!array_filter($item->active_sidebar_route, function ($route) use ($currentRoute)
				{
					return $route == $currentRoute;
				});
			}

			$isActive = $isActive && Route::exists(uri_string());

			$item->html = newTag()->a(
				($item->icon ? newTag()->i()->class($item->icon.' mr-2') : '').$display_name
			)
			->href(base_url($item->url))
			->class('dropdown-item'.($isActive ? ' active' : ''));

			if ($parentTag) {
				$parentTag->addContents($item->html); 
				$item->html = null;
			}

			$countActiveChild += (int)$isActive;
		}

		$item->html = $item->html ? $item->html->__toString() : '';
	});

	return $countActiveChild;
}
function loadNavbar()
{
	$ci = loadSmarty();

	$navbar = AppNavbarMenu::with('submenu.submenu.submenu.submenu.submenu')
	->isParent()
	->isActive()
	->orderBy('order')
	->get();

	tagSidebarWithUrl($navbar, $ci->user_routes ?? null);
	filterSidebarWithUrl($navbar);
	createNavbarHtmlElements($navbar); #dj($navbar);

	$navbarData = array();

	foreach ($navbar as $key => $sb) 
	{
		$navbarData[] = $sb->html; # append group

		foreach ($sb->submenu as $submenu)
		{
			$navbarData[] = $submenu->html; # append child menu
		}
	}

	// $html = '<!DOCTYPE html>
	// <html>
	// <head>
	// 	<meta charset="utf-8">
	// 	<title></title>
	// </head>
	// <body>
	// '.join($navbarData).'	
	// </body>
	// </html>';

	// dt(htmlIndent($html), true);

	$ci->sm->_assign([
		'navbar_menu_visible'	=> !!$navbarData,
		'navbar_data' 			=> $navbarData ? join($navbarData) : null
	]);
}
function page404()
{	
	$ci =& ci();

	$ci->sm->assign([
		'error_title' => '404',
		'error_message' => 'Oops, an error has occurred.</br>The resource requested could not be found</br>on this server.',
		'return_url' => referrerOrUrl()
	]);
	
	$ci->sm->_display('errors/offline');

	exit();
}
function pageAccessDenied()
{
	$ci = initializeFrontEnd();
	loadProfile();

	$ci->sm->assign([
		'error_title' => '403',
		'error_message' => 'Oops, an error has occurred.</br>Access to this resource is denied.',
		'return_url' => referrerOrUrl()
	]);
	
	$ci->sm->_display('errors/denied');

	exit();
}
function loadProfile($load_sidebar=true, $load_navbar=true)
{
	initializeFrontEnd();
	
	if ($load_sidebar) loadSidebar();
	if ($load_navbar) loadNavbar();

	$ci = loadSmarty();

	$ci->smartyRegisterPublicVars(get_class($ci));

	$user = AppUser::with('rel_user_extension')->find(Auth::sessionId());
	
	$ci->sm->assign([
		'profile' => [
			'name' 	=> $user->rel_user_extension->first_name ?? strProperCase($user->username),
			'photo'	=> $user->rel_user_extension->file_id ? base_url('file/'.$user->rel_user_extension->file_id) : null
		],
		'global_permissions' => [
			'account_settings' => Auth::userHasRoute('settings/account'),
		]
	]);

	#$ci->sm->dumpTplVars();
}
function createDatatableAction($icon, $label, $route, $class='')
{
	return newTag()->a(
		newTag()->i()->class($icon),
		' '
		.$label
	)
	->href($route)
	->class('dropdown-item '.$class);
}
function datatableActions($actions)
{
	if (!$actions) return '';
		
	$tags = newTag()->div(
		newTag()->div(
			newTag()->a(
				newTag()->i()->class('icon-menu9')
			)
			->href('#')
			->class('list-icons-item')
			->data('toggle', 'dropdown'),

			newTag()->div(
				join($actions)
			)
			->class('dropdown-menu dropdown-menu-right')
		)
		->class('dropdown')
	)
	->class('list-icons');

	return $tags->__toString();
}
function insertNothingSelected(&$array)
{
	if (is_array($array)) array_unshift($array, ['value' => 0, 'text' => 'Nothing selected']);
}
function setViewItemLink(&$model, $field, $template)
{
	if (is_null($model)) return;
	
	$model->each(function (&$item, $key) use ($field, $template)
	{
		preg_match_all("/{.*?}/i", $template, $matches);

		if ($matches)
		{
			$matches = $matches[0];

			if ($matches)
			{
				foreach ($matches as $match)
				{
					$referenceField = str_replace('{', '', $match);
					$referenceField = str_replace('}', '', $referenceField);

					$url = base_url(str_replace($match, $item->{ $referenceField }, $template));
					$item->{ $field } = newTag()->a( $item->{ $field } )->href($url)->__toString();
				}
			}
		}
	});
}