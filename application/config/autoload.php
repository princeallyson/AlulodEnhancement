<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('user_agent', 'form_validation');

$autoload['drivers'] = array();

$autoload['helper'] = array(
	'string', 
	'url', 
	'email', 
	'cookie',
	'_debug', 
	'_auth', 
	'_input', 
	'_session', 
	'_array', 
	'_library', 
	'_output', 
	'_string', 
	'_valid', 
	'_url', 
	'_sql',
	'_frontend',
	'_smarty',
	'_datetime',
	'_file',
	'_model',
	'_validation',
	'_form'
);

$autoload['config'] = array('app', 'assets');

$autoload['language'] = array();

$autoload['model'] = array();