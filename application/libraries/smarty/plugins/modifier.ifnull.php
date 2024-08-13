<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_ifnull($str1, $str2)
{   
    return strlen($str1) ? $str1 : $str2;
}