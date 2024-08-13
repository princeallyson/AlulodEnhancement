<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Luthier\Utils;
use Luthier\RouteBuilder;

class AuthMiddleware implements Luthier\MiddlewareInterface
{
    public function run($args)
    {   
        if (!is_logged_in()) redirect(route('login').'?uri='.Utils::currentUrl());

        $id = sess_id();

        if ( !AppUser::where('id', $id)->isActive()->count() ) redirect(route('login.logout'));
    }
}