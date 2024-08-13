<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends MY_Controller
{
	public $tpl_dir = 'modules/apps/admin/dashboard';

	function __construct()
	{
		parent::__construct();
	}
	public function index() 
	{
		$total_pets = Pet::count();

		$adopted_pets = Pet::where('status', 'Adopted')->count();

		$total_owners = AppUser::where('registered', 1)->count();

		$total_staff = AppUser::where('registered', 0)->where('visible', 1)->count();

		$this->sm->assign('total_pets', number_format($total_pets, 0, '.', ','));

		$this->sm->assign('adopted_pets', number_format($adopted_pets, 0, '.', ','));

		$this->sm->assign('total_owners', number_format($total_owners, 0, '.', ','));

		$this->sm->assign('total_staff', number_format($total_staff, 0, '.', ','));

		display('dashboard');
	}
}
