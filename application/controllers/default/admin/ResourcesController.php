<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResourcesController extends CI_Controller
{
	function __construct()
	{
		parent::__construct(); 
	}
	public function index()
	{

	}
	public function new_csrf()
	{
		json_response(true, ['csrf' => Auth::csrf()]);	
	}
}
