<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url'] 					= 'https://myhost14.com/brgy-alulod';
$config['assets_url']					= $config['base_url'].'/public';

$config['index_page'] 					= '';
$config['uri_protocol']					= 'REQUEST_URI';
$config['url_suffix'] 					= '';
$config['language']						= 'english';
$config['charset'] 						= 'UTF-8';
$config['enable_hooks'] 				= true;
$config['subclass_prefix'] 				= 'MY_';
$config['composer_autoload'] 			= true;
$config['permitted_uri_chars'] 			= 'a-z 0-9~%.:_\-';
$config['enable_query_strings'] 		= false;
$config['controller_trigger'] 			= 'c';
$config['function_trigger'] 			= 'm';
$config['directory_trigger'] 			= 'd';
$config['allow_get_array'] 				= true;

$config['log_threshold'] 				= 1;
$config['log_path'] 					= '';
$config['log_file_extension'] 			= '';
$config['log_file_permissions'] 		= 0644;
$config['log_date_format'] 				= 'Y-m-d H:i:s';

$config['error_views_path'] 			= '';
$config['cache_path'] 					= '';
$config['cache_query_string'] 			= false;
$config['encryption_key'] 				= '';

$config['sess_driver'] 					= 'database';
$config['sess_cookie_name'] 			= 'vARdgpIDbXdwrMBDWZbP';
$config['sess_expiration'] 				= 7200;
$config['sess_save_path'] 				= 'app_sessions';
$config['sess_match_ip'] 				= false;
$config['sess_time_to_update'] 			= 300;
$config['sess_regenerate_destroy'] 		= false;

$config['cookie_prefix']				= '';
$config['cookie_domain']				= '';
$config['cookie_path']					= '/';
$config['cookie_secure']				= false;
$config['cookie_httponly'] 				= false;

$config['standardize_newlines'] 		= false;
$config['global_xss_filtering'] 		= false;

$config['csrf_protection'] 				= true;
$config['csrf_token_name'] 				= 'wtrHilrcGbgRhllywkzG';
$config['csrf_cookie_name'] 			= 'jbDqpvCRXOoiljNoaLVb';
$config['csrf_expire'] 					= 7200;
$config['csrf_regenerate'] 				= true;
$config['csrf_exclude_uris'] 			= array(
	'QHQRIJgZzgKjkENvZtlm',
	'api.*+',
	'files/api.*+'
);

$config['compress_output'] 				= false;
$config['time_reference'] 				= 'local';
$config['rewrite_short_tags'] 			= false;
$config['proxy_ips'] 					= '';

$config['password_salt']				= 'kIHSEjTxznhVmMDDHwYH';
$config['default_password']				= '12345';

$config['allow_user_registration']			= false;
$config['verify_registered_user']			= true;
$config['verification_expiration_minutes']	= 60;
$config['show_verification_test_link']		= false;

$config['verfication_sender_email']			= 'tekabu0622@gmail.com';
$config['verfication_sender_password']		= 'uisdrmhbxxjheokz';

$config['exclude_to_route_config_sync'] = [
	'login',
	'check',
	'recover',
	'logout',
	'signup',
	'register',
	'thankyou',
	'verify/(:any)',
	'verification/resend'
];