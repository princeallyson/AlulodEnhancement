<?php
function fill_tuple(&$tuple, $array, $excluded=array())
{
	foreach ($array as $key => $value) {
		if (!in_array($key, $excluded))
			$tuple->{ $key } = $value;
	}
}
function tuple_view_url($tuple, $route=null, $key=null)
{
	$ci = ci();

	$route = $route ?? $ci->ctrl_route;

	$url = rtrim(base_url($route), '/');

	return $url.'/'.$tuple->{ $key ?? 'id' };
}
function bindQueryParameter($query_log)
{
	$query_log = array_shift($query_log);
	$query = $query_log['query'];
	$bindings = $query_log['bindings'];

	foreach ($bindings as $value)
	{
		$query = preg_replace('/\?/', "'".$value."'", $query, 1);
	}
	
	return $query;	
}