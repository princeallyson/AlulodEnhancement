<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spatie\HtmlElement\HtmlElement;

function smarty_function_html_inline($params, $template)
{
    $debug = find($params, 'debug', false, true);

    if ($debug) dp('SMARTY_PLUGIN_DEBUG_BEFORE_OUTPUT', $params);

    return HtmlElement::render(
        find($params, 'el', ''), 
        _array(find($params, 'attr', [])),
        find($params, 'content', '')
    );
}