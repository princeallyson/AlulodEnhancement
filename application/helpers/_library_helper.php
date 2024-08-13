<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function isLoaded($class)
{
	return is_object($class);
}
function getClass($class)
{
	return is_object($class) ? get_class($class) : null;
}
function newTag()
{
	return new Tagsci;
}
function isCurrentMethodIn($methods)
{
	$ci =& get_instance();

	return in_array($ci->router->fetch_method(), $methods);
}
function loadSmarty()
{
	$ci =& get_instance();

	$ci->load->library(['Smartyci' => 'sm']);
		
	return $ci;
}