<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_function_now($params, &$template)
{
    $format = $params['format'] ?? 'Y-m-d H:i:s';

    return date($format);
}