<?php
use Spatie\HtmlElement\HtmlElement;

function form_errors($errors)
{
	$errors = array_map('ucfirst', array_map('strtolower', $errors));

	return array_map('form_input_error', $errors);
}
function form_input_error($str)
{
	return HtmlElement::render(".validation-invalid-label.text-right.pr-4 mt-0.float-right", [], $str);
}
function form_response($status, ...$args)
{
	$args = array_merge(['form_key' => Auth::csrf()], ...$args);
 
    json_response($status, $args);
}