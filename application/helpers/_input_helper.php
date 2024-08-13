<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function get($key=null)
{
	return get_instance()->input->get($key);
}
function post($key=null, $filters=null, $clean_xss=true)
{
	$data = get_instance()->input->post($key, $clean_xss);

	if (!is_null($filters)) strFilters($data, $filters);

	return $data;
}

# errors

function invalid_crud_operation($url=null)
{
	return_post($url ?? referrerOrUrl(), "Unknown operation");
}
function saving_failed($errors, $url)
{
	if (is_array($errors)) $errors = join('</br>', array_map('ucfirst', array_map('strtolower', $errors)));

	return_post($url, $errors);
}
function return_post($url, $errors)
{
	setFlashdata('error_message', $errors);
	
	if ($_POST) setFlashdata('prev_data', post());

	redirect($url);
}