<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spatie\HtmlElement\HtmlElement;

function display($tpl, $dir=null, $fetch=false) 
{
    if (class_exists('smartyci')) 
    {
    	$dir = $dir ?? get_instance()->tpl_dir;	
    	
        $tpl = $dir.'/'.$tpl.'.tpl';

        if ($fetch)
    	   return get_instance()->sm->fetch($tpl);
        else
           get_instance()->sm->display($tpl); 
    }
}
function fetch($tpl)
{
    return display($tpl, null, true);
}
function badge($var) 
{
    $badge = $var ? 'primary' : 'danger';
    
    $badge = 'badge-'.$badge;
    
    return HtmlElement::render("span.badge.{$badge}", [], $var ? 'Yes' : 'No');
}
function badge_name($text, $bg='primary') 
{
    $badge = 'badge-'.$bg;
    
    return HtmlElement::render("span.badge.{$badge}", [], $text);
}
function table_options($options)
{
    $rows = array();

    foreach ($options as $option)
    {
        $rows[] = [
            'class' => $option->class,
            'data' => $option->build_data(),
            'icon' => $option->icon,
            'text' => $option->text
        ];
    }

    # dj($rows);

    ci()->sm->assign('options', $rows);

    return ci()->sm->fetch('templates/default/table/table_options/options.tpl');
}