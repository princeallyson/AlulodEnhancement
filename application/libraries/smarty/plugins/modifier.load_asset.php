<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_load_asset($key, $type)
{
    $ci =& get_instance();

    $asset = findItem($ci->config->item('assets'), $key.'.'.$type);

    if (!$asset) return '';

    $tag = new Tagsci;

    switch ($type) {
        case 'css':
            return minify_html($tag->link()
                ->href($ci->config->item('assets_url').'/'.$asset)
                ->rel('stylesheet')
                ->type('text/css'));
        break;
        
        case 'js':
            return minify_html($tag->script()
                ->src($ci->config->item('assets_url').'/'.$asset));
        break;
        
        default:
            return '';
        break;
    }
}

