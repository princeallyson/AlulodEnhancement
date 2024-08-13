<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function smarty_modifier_html_selected_option_text(array $options, string $selected)
{
    if ($options) 
    {
        foreach ($options as $option) 
        {
            if (is_string($option))
            {
                if ($option == $selected) 
                {
                    return $option;
                }
            }
            else
            {
                if (array_key_exists('value', $option) && find($option, 'value') == $selected) 
                {
                    return find($option, 'text') ?? find($option, 0, '');
                }
                else 
                {
                    if (find($option, 0) == $selected) 
                    {
                        return find($option, 0);
                    }
                    elseif ((is_string($option) || is_int($option)) && $option == $selected) 
                    {
                        return $option;
                    }
                }
            }
        }
    }
}