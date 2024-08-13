<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-07-05 21:21:01 --> Severity: Notice --> Undefined property: LuthierController::$sidebar_visible C:\wamp64\www\apps\template_v2\application\middleware\SidebarMiddleware.php 18
ERROR - 2022-07-05 21:21:01 --> Severity: error --> Exception: SQLSTATE[42S22]: Column not found: 1054 Unknown column 'visible' in 'where clause' (SQL: select `id`, `username`, `created_at`, `active` from `app_users` where `visible` = 1 order by `id` asc) C:\wamp64\www\apps\template_v2\application\vendor\illuminate\database\Connection.php 669
