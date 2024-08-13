<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserMiddleware implements Luthier\MiddlewareInterface
{
    public function run($args)
    {
        $ci =& ci();

        $ci->user_routes = AppUser::routes(sess_id() ?? 0);

        $ci->user_permissions = AppUser::permissions(sess_id() ?? 0);
    }
}