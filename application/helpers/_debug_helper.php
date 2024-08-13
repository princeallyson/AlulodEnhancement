<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// function dd()
// {
// 	$args = func_get_args();

//     call_user_func_array(array('Kint', 'dump'), $args);

//     die();
// }
function dj(...$vars)
{
	header('Content-Type: application/json');
	echo json_encode($vars, 448);
	die();
}
function da($vars)
{
	dj(func_get_args());
}
function dv($vars)
{
	header('Content-Type: application/json');
	var_dump($vars);
	die();
}
function dp(...$vars)
{
	echo '<pre>';
	print_r($vars);
	echo '</pre>';
	die();
}
function dt($str)
{
	header('Content-Type: text/plain');
	echo $str;
	die();	
}
function dk($vars, $expand=false)
{
	if ($expand)
		!d($vars);
	else
		d($vars);

	die();
}
function dc($vars, $condition, $debug_function='dk')
{
	if ($condition)
		call_user_func($debug_function, $vars); 
}
function qx($model)
{
	dt(getQuery($model));
}
function vd(...$args)
{
	var_dump($args);
	die();
}