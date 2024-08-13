<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spatie\HtmlElement\Attributes;

function smarty_function_attr($params, &$template)
{
    $debug = find($params, 'debug', false, true);

    if ($debug == SMARTY_PLUGIN_DEBUG_ON_START) dp('SMARTY_PLUGIN_DEBUG_ON_START', $params);

    $list = find($params, 'list', [], true);

    $params = array_merge($params, $list);

    if ($debug == SMARTY_PLUGIN_DEBUG_BEFORE_NORMALIZE_ATTR) dp('SMARTY_PLUGIN_DEBUG_BEFORE_NORMALIZE_ATTR', $params);

    SmartyH::normalizeAttr($params);
    
    $attributes = new Attributes();
    $attributes->setAttributes($params);

    if ($debug == SMARTY_PLUGIN_DEBUG_BEFORE_OUTPUT) dp('SMARTY_PLUGIN_DEBUG_BEFORE_OUTPUT', $attributes);

    return $attributes->toString();

}