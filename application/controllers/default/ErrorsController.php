<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorsController extends MY_Controller
{
	public $tpl_dir = 'modules/default/error';

	function __construct()
	{
		parent::__construct();
	}
	public function access_denied()
	{	
		header("HTTP/1.0 403 Access Denied");

		$this->sm->assign([
			'error_title' => '403',
			'error_message' => "The page or resource you were trying to reach</br>is forbidden for some reason",
			'return_url' => referrerOrUrl()
		]);
		
		display('general');
	}
	public function not_found()
	{	
		header("HTTP/1.0 404 Not Found");
		
		$this->sm->assign([
			'error_title' => '404',
			'error_message' => 'The page or resource you were trying to reach is not found</br>on this server.',
			'return_url' => referrerOrUrl()
		]);
		
		display('general');
	}
}
