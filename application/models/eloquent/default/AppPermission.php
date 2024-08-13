<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class AppPermission extends DefaultModel
{
	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];
}