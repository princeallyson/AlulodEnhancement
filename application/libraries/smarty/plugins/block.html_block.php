<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spatie\HtmlElement\HtmlElement;

function smarty_block_html_block($params, $content, &$smarty, &$repeat)
{
    $debug = find($params, 'debug', false, true);

    if ($debug) dp('SMARTY_PLUGIN_DEBUG_BEFORE_OUTPUT', $params);

    $omit_parent = find($params, 'omit_parent', false, true);
    $omit_child = find($params, 'omit_child', false, true);

    if ($omit_parent && $omit_child) return '';
    if ($omit_parent) return $content;
    if ($omit_child) $content = '';

    if (!$repeat) return HtmlElement::render(
        find($params, 'el', ''), 
        _array(find($params, 'attr', [])), 
        $content
    );
}