<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once(__DIR__.'/../parents/default/MenuController.php');

use \Illuminate\Database\Capsule\Manager as DB;

class SidebarController extends MenuController
{
	public $tpl_dir = 'modules/default/sidebar';

	public $ctrl_model = AppSidebarMenu::class;

	public $title = 'Sidebar';
	
	public $title_field = 'name';
	
	function __construct()
	{
		parent::__construct();

		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			'name',
			'display_name',
			['parent_id', 'Parent', 'parent_name'], 
			['route_id', 'Route', 'route_name'], 
			'description', 
			Tableci::DATE_CREATED,
			Tableci::ACTIVE,
		]);
	}
}
