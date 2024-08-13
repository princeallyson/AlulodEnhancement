<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_concat(string $str1, $str2, $delimiter='')
{
    return $str1 ? $str1.(is_array($str2) ? join($delimiter, $str2) : $str2) : $str1;
}