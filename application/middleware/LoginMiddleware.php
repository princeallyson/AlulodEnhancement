<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginMiddleware implements Luthier\MiddlewareInterface
{
    public function run($args)
    {
        /*
         * When user access any route in login module except for [logout] and user is already logged in 
         * this middleware redirects user to home page
         */
        if ( is_logged_in() ) {
            redirect( route('home') );
        }
    }
}