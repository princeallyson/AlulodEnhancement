<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_is($param1, $param2, $datatype_strict=false)
{
    return $datatype_strict ? $param1 === $param2 : $param1 == $param2;
}