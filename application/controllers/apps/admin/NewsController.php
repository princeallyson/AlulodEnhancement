<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class NewsController extends CrudController
{
	public $tpl_dir = 'modules/apps/admin/news';

	public $ctrl_model = News::class;

	public $title = 'News';
	
	public $title_field = '';

	function __construct()
	{
		parent::__construct();

		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			'title',
			'short_text', 
			Tableci::DATE_CREATED,
			Tableci::ACTIVE
		]);
	}
	public function pre_index(&$table)
	{
		$table = $this->ctrl_model::select(find($this->settings, 'tableci.index')->sql_fields)
		->orderBy('id', 'desc')
		->get();
	}
	public function pre_validate_entry($operation)
	{
		$_POST['image'] = 'image'; # form validation extended function dont run if post data is not found
	}
	public function set_rules(&$rules, $vars)
	{
		$rules = 
		[
			rule('title', 'required'),
			rule('short_text', 'required'),
			rule('content', 'required'),
		];

		if (find($vars, 'op') == self::OP_CREATE) 
		{
			$rules[] = rule('image', 'file_required|file_errors|file_valid[jpg,png]');
		}
	}
	public function post_validate_entry()
	{
		$this->post_data['title'] 		= post('title', 'strProperCase.strNullWhenEmpty');
		$this->post_data['short_text'] 	= post('short_text', 'trim');
		$this->post_data['content'] 	= post('content', '', false);
		$this->post_data['active'] 		= post('active', 'asCheckbox.intval');
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
