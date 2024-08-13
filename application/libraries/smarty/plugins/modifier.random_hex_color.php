<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_random_hex_color($count)
{
    $colors = [];

    for ($i = 1; $i <= $count; $i++)
    {
        $colors[] = '#'.substr(str_shuffle('AABBCCDDEEFF00112233445566778899AABBCCDDEEFF00112233445566778899AABBCCDDEEFF00112233445566778899'), 0, 6);
    }

    return $colors;
}