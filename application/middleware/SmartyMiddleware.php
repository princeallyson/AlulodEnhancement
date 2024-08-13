<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spatie\HtmlElement\HtmlElement as el;

use Luthier\RouteBuilder;

use Luthier\Utils;

/*
 * Middleware for routes with gui.
 * Routes without gui should not load Smartyci library.
 */ 

class SmartyMiddleware implements Luthier\MiddlewareInterface
{
    public function run($args)
    { 
        $ci =& ci();

        $ci->load->library(['Smartyci' => 'sm']);

        $ci->sm->assign([
            'base_url'          => base_url(),
            'assets_url'        => $ci->config->item('assets_url'),
            'uploads_dir'       => $ci->uploads_dir ?? null,
            'uploads_url'       => $ci->uploads_url ?? null,
            'app_title'         => $ci->config->item('app_title'),
            'tpl_dir'           => $ci->tpl_dir ?? null,
            'ctrl_route'        => $ci->ctrl_route ?? null,
            'ctrl_url'          => base_url($ci->ctrl_route ?? null)
        ]);

        if ($ci->load->is_loaded('session') && is_logged_in()) {
            $user = AppUser::with('rel_user_extension')->find(sess_id());

            $profile['name'] = $user->username;

            if ($user->rel_user_extension) {
                if ($user->rel_user_extension->img_filename) {
                    if (file_exists($ci->uploads_dir.DS.$user->rel_user_extension->img_filename)) {
                        $profile['photo'] = $user->rel_user_extension->img_filename;
                    }
                }

                if ($user->rel_user_extension->first_name) {
                    $profile['name'] = $user->rel_user_extension->first_name;
                    $profile['fullname'] = $user->rel_user_extension->first_name.' '.$user->rel_user_extension->last_name;
                }
            }

            $ci->sm->assign('profile', $profile);

            $notifications = AppNotification::select('title', 'url', 'content', 'created_at')
            ->where('user_id', $user->id)
            # ->whereNull('view_at')
            ->isActive()
            ->orderBy('created_at', 'desc')
            ->limit(50)
            ->get();

            # dj($notifications);

            if ($notifications->count())
            {
                $notifications = $notifications->toArray();

                $ci->sm->assign('app_notifications', $notifications);

                $new_notifs = AppNotification::where('user_id', $user->id)
                ->whereNull('view_at')
                ->isActive()
                ->count();

                $ci->sm->assign('app_notifications_count', $new_notifs);                
            }
        }
    }
}