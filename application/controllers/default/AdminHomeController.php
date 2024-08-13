<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHomeController extends MY_Controller
{
	public $tpl_dir = 'modules/default/home';

	function __construct()
	{
		parent::__construct();
	}
	public function index() 
	{
		display('home');
	}
}
