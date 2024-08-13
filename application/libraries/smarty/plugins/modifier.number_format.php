<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_number_format($number, $decimals=null, $decimalpoint=null, $separator=null)
{   
    return number_format($number, $decimals, $decimalpoint, $separator);
}