<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function referrerOrUrl($url=null) #returns previous url or given url or base url
{
	$ci =& get_instance();

	if (isLoaded($ci->agent) && strlen($ci->agent->referrer()))
		return $ci->agent->referrer() != base_url() ? $ci->agent->referrer() : base_url();
	else
		return $url ?? base_url();
}
function logout()
{
	redirect(route('login.logout'));
}