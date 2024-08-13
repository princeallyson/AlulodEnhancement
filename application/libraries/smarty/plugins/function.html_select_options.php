<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spatie\HtmlElement\HtmlElement;

function smarty_function_html_select_options($params, $template)
{
    $debug = find($params, 'debug', false, true);

    if ($debug) dp($params);

    $options = array();

    $selected = find($params, 'selected');
    $selected = array_values(array_filter(is_array($selected) ? $selected : [$selected])); 
    $to_string = findItem($params, 'to_string', true);

    foreach (find($params, 'options', []) as $option) {
        $option = _array($option);

        $text = find($option, 'text', null, true);
        $text = $text ?? find($option, 0, '', true);

        if (is_null(findItem($option, 'value')))
            $option['value'] = $text;

        if (in_array($option['value'], $selected)) {
            unset($option['selected']);

            if (!in_array('selected', array_values($option), true))
                $option[] = 'selected';
        }

        SmartyH::normalizeAttr($option);        

        $options[] = HtmlElement::render('option', $option, $text);
    }
    
    return $to_string ? join($options) : $options;
}
