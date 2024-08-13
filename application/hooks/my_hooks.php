<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class my_hooks
{
	public function pre_method()
	{
		$this->run(__FUNCTION__);
	}
	public function post_method()
	{
		$this->run(__FUNCTION__);
	}
	private function run($point)
	{
		$ci =& ci();

		$method = $ci->router->fetch_method();
		
		$hooks = $ci->my_hooks[$point] ?? [];

		if (!$hooks) return;

		$hooks = $hooks[$method] ?? [];

		if (!$hooks) return;

		foreach ($hooks as $h) {
			if (method_exists($ci, $h)) $ci->{ $h }();
		}
	}
}