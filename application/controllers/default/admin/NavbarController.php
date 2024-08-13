<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once(__DIR__.'/../parents/default/MenuController.php');

use \Illuminate\Database\Capsule\Manager as DB;

class NavbarController extends MenuController
{	
	public $tpl_dir = 'modules/default/navbar';

	public $ctrl_model = AppNavbarMenu::class;

	public $title = 'Navbar';
	
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
			'public',
			Tableci::DATE_CREATED,
			Tableci::ACTIVE,
		])
		->addDatatableColumnDefs(['public'], [
			'width' 	=> 100,
			'className' => 'align-center'
		]);
	}
	public function _post_validate_entry($vars)
	{
		$this->post_data['public'] = post('public', 'asCheckbox.intval');
	}
}
