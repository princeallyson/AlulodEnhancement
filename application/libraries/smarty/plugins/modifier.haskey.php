<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_haskey($items, $key)
{   
    if (!is_array($items)) return false;

    return array_key_exists($key, $items);
}