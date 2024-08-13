<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_uploads_img($filename)
{
    if (strlen($filename)) {
        $ci = ci();

        $file = $ci->uploads_dir.DS.$filename;

        return file_exists($file) ? ($ci->uploads_url.'/'.$filename) : '';
    }
}