<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Spatie\HtmlElement\HtmlElement;

function smarty_function_csrf($params, &$template)
{
    $csrf = Auth::csrf();

    return HtmlElement::render('input.fk[type=hidden]', ['name'=>$csrf['name'], 'value'=>$csrf['hash']], '');
}