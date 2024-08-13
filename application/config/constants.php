<?php
defined('BASEPATH') OR exit('No direct script access allowed');

defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

defined('ICON_VIEW')		OR define('ICON_VIEW', 'icon-eye');
defined('ICON_CREATE')		OR define('ICON_CREATE', 'icon-pencil7');
defined('ICON_EDIT')		OR define('ICON_EDIT', 'icon-pencil3');
defined('ICON_DELETE')		OR define('ICON_DELETE', 'icon-trash-alt');

defined('MSG_ITEM_NOT_FOUND') 	OR define('MSG_ITEM_NOT_FOUND', 'Item not found.');
defined('MSG_ITEM_DELETED') 	OR define('MSG_ITEM_DELETED', 'Item deleted.');
defined('MSG_ITEM_SAVED') 		OR define('MSG_ITEM_SAVED', 'Item saved.');
defined('MSG_ITEM_UPDATED') 	OR define('MSG_ITEM_UPDATED', 'Item updated.');
defined('MSG_ERROR_UNKNOWN')	OR define('MSG_ERROR_UNKNOWN', 'Something went wrong.');

defined('VERIFICATION_TYPE_USER_EXTENSION')	OR define('VERIFICATION_TYPE_USER_EXTENSION', 'user-extension');

defined('DS') OR define('DS', DIRECTORY_SEPARATOR);

defined('DATE_ENG') 			OR define('DATE_ENG', 'M. d, Y');
defined('TIME_ENG') 			OR define('TIME_ENG', 'h:i A');
defined('DATETIME_ENG') 		OR define('DATETIME_ENG', 'M. d, Y h:i A');
defined('SQL_DATE_ENG') 		OR define('SQL_DATE_ENG', '%b. %d, %Y');
defined('SQL_TIME_ENG') 		OR define('SQL_TIME_ENG', '%h:%i %p');
defined('SQL_DATETIME_ENG') 	OR define('SQL_DATETIME_ENG', '%b. %d, %Y %h:%i %p');

defined('ARRAY_TYPE_UNKNOWN') 	OR define('ARRAY_TYPE_UNKNOWN', -1);
defined('ARRAY_TYPE_LIST') 		OR define('ARRAY_TYPE_LIST', 1);
defined('ARRAY_TYPE_ASSOC') 	OR define('ARRAY_TYPE_ASSOC', 2);

defined('SMARTY_PLUGIN_DEBUG_ON_START') 				OR define('SMARTY_PLUGIN_DEBUG_ON_START', 1);
defined('SMARTY_PLUGIN_DEBUG_BEFORE_OUTPUT') 			OR define('SMARTY_PLUGIN_DEBUG_BEFORE_OUTPUT', 2);
defined('SMARTY_PLUGIN_DEBUG_BEFORE_NORMALIZE_ATTR') 	OR define('SMARTY_PLUGIN_DEBUG_BEFORE_NORMALIZE_ATTR', 3);

defined('ENV_DEV') OR define('ENV_DEV', 'DEVELOPMENT');
defined('ENV_PRD') OR define('ENV_PRD', 'PRODUCTION');