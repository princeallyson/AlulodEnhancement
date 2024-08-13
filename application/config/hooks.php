<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook = Luthier\Hook::getHooks();

$hook['post_controller_constructor'][] = array(
	'class'    => 'my_hooks',
	'function' => 'pre_method',
	'filename' => 'my_hooks.php',
	'filepath' => 'hooks'
);

$hook['post_controller'][] = array(
	'class'    => 'my_hooks',
	'function' => 'post_method',
	'filename' => 'my_hooks.php',
	'filepath' => 'hooks'
);