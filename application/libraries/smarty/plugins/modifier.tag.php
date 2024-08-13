<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spatie\HtmlElement\HtmlElement as el;

function smarty_modifier_tag(string $el, $attributes=[], string $content='')
{
    $attributes = $attributes ?? [];

    if (empty($content) && is_string($attributes)) {
        $content = $attributes;
        $attributes = [];
    }
    else
        SmartyH::normalizeAttr($attributes);

    return el::render($el, $attributes, $content);
}