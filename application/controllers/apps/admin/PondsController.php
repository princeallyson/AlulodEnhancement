<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class PondsController extends CrudController
{
	public $tpl_dir = 'modules/apps/admin/ponds';

	public $ctrl_model = Pond::class;

	public $title = 'Pond';
	
	public $title_field = '';

	function __construct()
	{
		parent::__construct();

		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			'title',
			'description', 
			'price', 
			'status', 
			// 'image', 
			Tableci::DATE_CREATED,
			Tableci::ACTIVE
		]);
	}
	public function pre_index(&$table)
	{
		$table = $this->ctrl_model::select(find($this->settings, 'tableci.index')->sql_fields)
		->where('owner_id', Auth::sessionId())
		->orderBy('id', 'desc')
		->get();
	}
	public function pre_create(&$tuple=null)
	{
		$transaction_types = TransactionType::select2('transaction_type', null, [], false);

		$this->sm->assign('transaction_types', $transaction_types);
	}
	public function pre_validate_entry($operation)
	{
		$_POST['image'] = 'image'; # form validation extended function dont run if post data is not found
	}
	public function set_rules(&$rules, $vars)
	{
		$rules = 
		[
			rule('transaction_type_id', ['required', TransactionType::is_exists('Transaction Type')]),
			rule('title', 'required'),
			rule('description', 'required'),
			rule('price', 'required')
		];

		if (find($vars, 'op') == self::OP_CREATE) 
		{
			$rules[] = rule('image', 'file_required|file_errors|file_valid[jpg,png]');
		}
		else
		{
			$rules[] = rule('status', 'required');
		}
	}
	public function post_validate_entry()
	{
		$this->post_data['transaction_type_id'] = post('transaction_type_id', 'intval');
		$this->post_data['title'] 				= post('title', 'strProperCase.strNullWhenEmpty');
		$this->post_data['description'] 		= post('description', 'trim', false);
		$this->post_data['price'] 				= post('price', 'trim');
		$this->post_data['status'] 				= post('status', 'trim');
		$this->post_data['active'] 				= post('active', 'asCheckbox.intval');
	}
	public function overwrite_tuple_before_create(&$tuple)
	{
		$tuple->owner_id = Auth::sessionId();
		$tuple->status = 'Available';
	}
	public function overwrite_tuple_before_save(&$tuple, $vars)
	{
		if (find($_FILES, 'image.size'))
		{
			$upload_res = upload_cloudinary($_FILES['image']['tmp_name'], $response, $error, $secure_url);

			if (!$upload_res)
				form_response(false, ['message' => 'Error uploading image', 'error' => $error]);

			$tuple->image = $secure_url;
		}
	}
}
