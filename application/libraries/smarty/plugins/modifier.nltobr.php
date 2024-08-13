<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_nltobr(string $content)
{
    return $content ? str_replace("\r\n", '&#13;&#10;', $content) : $content;
}