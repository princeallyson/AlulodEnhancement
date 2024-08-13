<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_realpath(string $path)
{
    return realpath($path);
}