<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Luthier\Utils;

function smarty_function_current_url($params, $template)
{
    return Utils::currentUrl();
}