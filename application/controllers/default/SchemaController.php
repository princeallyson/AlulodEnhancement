<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class SchemaController extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

        $this->load->database();
	}
    public function app_install_tables()
    {
        $this->load->helper('file');

        $prefix = DB::getTablePrefix();

        $prefix = trim($prefix, '_');

        $app_sql = file_get_contents(APPPATH.'sql/app.sql');

        $app_sql = str_replace('{app_name}', $prefix, $app_sql);
        
        # $this->db->simple_query($app_sql);

        dt($app_sql);

        # DB::unprepared($app_sql);

        dt('Done installing tables...');
    }
    public function app_install_seeds()
    {
        # DB::enableQueryLog();

        DB::beginTransaction();

		try
		{
            # create admin

            $admin_user = AppUser::where('username', 'admin')->first();

            if (!$admin_user)
            {
                $admin_user = new AppUser;

                $admin_user->username = 'admin';
                $admin_user->password = Auth::encryptPassword('admin$');
                $admin_user->save();
            }

            # create admin role

            $admin_role = AppRole::where('role', 'admin')->first();

            if (!$admin_role)
            {
                $admin_role = new AppRole;
                $admin_role->role = 'admin';
                $admin_role->save();
            }

            # add admin role to admin user

            $admin_user_role = AppUserRole::where('user_id', $admin_user->id)
            ->where('role_id', $admin_role->id)
            ->first();

            if (!$admin_user_role)
            {
                $admin_user_role = new AppUserRole;
                $admin_user_role->user_id = $admin_user->id;
                $admin_user_role->role_id = $admin_role->id;
                $admin_user_role->save();
            }
            
            # create routes

            $route_names = [
                ['login'],
                ['login.recover'],
                ['login.signup'],
                ['login.thankyou'],
                ['login.check'],
                ['login.register'],
                ['login.verify'],
                ['login.resend-verification'],
                ['login.logout'],
                ['login.forgot_password'],
                ['login.new-password'],
                ['profile'],
                ['profile.update'],
                ['profile.password-update'],
                ['profile.photo-update'],
                ['profile.photo-delete'],
                ['admin.home'],
                ['users'],
                ['users.new'],
                ['users.edit', 'users'],
                ['users.store'],
                ['users.update'],
                ['users.delete'],
                ['users.reset-password'],
                ['roles'],
                ['roles.new'],
                ['roles.edit', 'roles'],
                ['roles.store'],
                ['roles.update'],
                ['roles.delete'],
                ['routes'],
                ['routes.new'],
                ['routes.edit', 'routes'],
                ['routes.store'],
                ['routes.update'],
                ['routes.delete'],
                ['permissions'],
                ['permissions.new'],
                ['permissions.edit', 'permissions'],
                ['permissions.store'],
                ['permissions.update'],
                ['permissions.delete'],
                ['sidebar'],
                ['sidebar.new'],
                ['sidebar.edit', 'sidebar'],
                ['sidebar.sort'],
                ['sidebar.store'],
                ['sidebar.update'],
                ['sidebar.delete'],
                ['sidebar.sort-update'],
                ['navbar'],
                ['navbar.new'],
                ['navbar.edit', 'navbar'],
                ['navbar.sort'],
                ['navbar.store'],
                ['navbar.update'],
                ['navbar.delete'],
                ['navbar.sort-update'],
                ['home'],
                ['notifications'],
            ];

            foreach ($route_names as $route_name)
            {
                $name = $route_name[0] ?? null;
                $parent = $route_name[1] ?? null;

                if (!$name) continue;

                $route = AppRoute::where('route', $name)->first();

                if (!$route)
                {
                    $route = new AppRoute();
                    $route->route = $name;

                    if ($parent)
                    {
                        $parent_route = AppRoute::where('route', $parent)->first();

                        if ($parent_route)
                        {
                            $route->active_sidebar_route_id = $parent_route->id;
                        }
                    }

                    if (fnmatch('profile*', $route->route))
                    {
                        $route->public = 1;
                    }

                    $route->save();
                }

                if (fnmatch('login*', $route->route) || fnmatch('profile*', $route->route))
                {
                    continue;
                }

                # add admin role routes

                $admin_role_route = AppRoleRoute::where('role_id', $admin_role->id)
                ->where('route_id', $route->id)
                ->first();

                if (!$admin_role_route)
                {
                    $admin_role_route = new AppRoleRoute();
                    $admin_role_route->role_id = $admin_role->id;
                    $admin_role_route->route_id = $route->id;
                    $admin_role_route->save();
                }
            }

            # create permissions

            $permission_names = [
                'activate-navbar',
                'activate-user',
                'activate-route',
                'activate-role',
                'activate-permission',
                'activate-sidebar',
                'reset-user-password',
                'change-role-routes',
                'change-role-permissions',
                'change-user-roles',
            ];

            foreach ($permission_names as $permission_name) 
            {
                $permission = AppPermission::where('permission', $permission_name)->first();

                if (!$permission)
                {
                    $permission = new AppPermission();

                    $permission->permission = $permission_name;
                    $permission->save();
                }

                $admin_role_permission = AppRolePermission::where('role_id', $admin_role->id)
                ->where('permission_id', $permission->id)
                ->first();

                if (!$admin_role_permission)
                {
                    $admin_role_permission = new AppRolePermission;
                    $admin_role_permission->role_id = $admin_role->id;
                    $admin_role_permission->permission_id = $permission->id;
                    $admin_role_permission->save();
                }
            }

            # create sidebar

            function create_sidebar($name, $display_name, $parent_name, $icon, $route_name)
            {
                $sidebar = AppSidebarMenu::where('name', $name)->first();

                if (!$sidebar)
                {
                    $sidebar = new AppSidebarMenu;
                    $sidebar->name = $name;
                    $sidebar->display_name = $display_name;

                    if ($parent_name)
                    {
                        $parent_sidebar = AppSidebarMenu::where('name', $parent_name)->first();

                        if ($parent_sidebar)
                        {
                            $sidebar->parent_id = $parent_sidebar->id;
                        }
                    }

                    if ($route_name)
                    {
                        $route = AppRoute::where('route', $route_name)->first();

                        if ($route)
                        {
                            $sidebar->route_id = $route->id;
                        }
                    }

                    if (!$sidebar->name)
                    {
                        # dj(func_get_args(), $sidebar);
                        
                        return;
                    }

                    $sidebar->icon = $icon;
                    $sidebar->save();
                }
            }

            $sidebar_menus = [
                ['System', 'System Settings'],
                ['Main', 'Main'],
                
                ['Users', 'Users', 'System', 'icon-users4'],
                ['All User', 'All', 'Users', null, 'users'],
                ['New User', 'New', 'Users', null, 'users.new'],
                
                ['Roles', 'Roles', 'System', 'icon-user-check'],
                ['All Role', 'All', 'Roles', null, 'roles'],
                ['New Role', 'New', 'Roles', null, 'roles.new'],

                ['Routes', 'Routes', 'System', 'icon-link2'],
                ['All Route', 'All', 'Routes', null, 'routes'],
                ['New Route', 'New', 'Routes', null, 'routes.new'],

                ['Permissions', 'Permissions', 'System', 'icon-user-lock'],
                ['All Permission', 'All', 'Permissions', null, 'permissions'],
                ['New Permission', 'New', 'Permissions', null, 'permissions.new'],

                ['Navbar Menu', 'Navbar Menu', 'System', 'icon-list'],
                ['All Navbar Menu', 'All', 'Navbar Menu', null, 'navbar'],
                ['New Navbar Menu', 'New', 'Navbar Menu', null, 'navbar.new'],

                ['Sidebar Menu', 'Sidebar Menu', 'System', 'icon-indent-decrease2'],
                ['All Sidebar Menu', 'All', 'Sidebar Menu', null, 'sidebar'],
                ['New Sidebar Menu', 'New', 'Sidebar Menu', null, 'sidebar.new'],
                ['Sort Sidebar Menu', 'Sort', 'Sidebar Menu', null, 'sidebar.sort'],
            ];

            foreach ($sidebar_menus as $index => $sidebar_menu) 
            {
                create_sidebar(
                    $sidebar_menu[0] ?? null,
                    $sidebar_menu[1] ?? null,
                    $sidebar_menu[2] ?? null,
                    $sidebar_menu[3] ?? null,
                    $sidebar_menu[4] ?? null,
                );
            }

            DB::commit();

            # dt(bindQueryParameter(DB::getQueryLog()));

            dt('Done installing seeds...');
		}
		catch(\Exception $e) 
		{
			DB::rollback();

			dj($e->errorInfo);
		}
    }
    public function new_table()
    {
        $tablename = get('t');

        if (!$tablename) dj('table name required');

        $prefix = DB::getTablePrefix();

        $tablename = $prefix.$tablename;

        $query = "CREATE TABLE `fdms`.`{$tablename}`  (
          `id` int(11) NOT NULL AUTO_INCREMENT,
          `uuid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
          `active` tinyint(1) NULL DEFAULT 1,
          `created_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
          `updated_at` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
          PRIMARY KEY (`id`) USING BTREE
        ) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

        CREATE DEFINER = `root`@`localhost` TRIGGER `{$tablename}_uuid` BEFORE INSERT ON `{$tablename}` FOR EACH ROW BEGIN
          IF new.uuid IS NULL THEN
            SET new.uuid = uuid();
          END IF;
        END;";

        dt($query);
    }
}
