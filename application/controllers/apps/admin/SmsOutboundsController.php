<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class SmsOutboundsController extends CrudController
{
	public $tpl_dir = 'modules/apps/admin/sms_outbounds';

	public $ctrl_model = SmsOutbound::class;

	public $title = 'Sms Outbound';
	
	public $title_field = '';

	function __construct()
	{
		parent::__construct();

		$this->settings['tableci']['index'] = (new Tableci)->add([
			# Tableci::REFERENCE,
			['contact_id', 'Contact', 'contact'],
			'mobile',
			'message', 
			'sent_at', 
			'error_at', 
			Tableci::DATE_CREATED,
			# Tableci::ACTIVE
		]);
	}
	public function pre_index(&$table)
	{
		$table = $this->ctrl_model::with('rel_contact')
		->select(find($this->settings, 'tableci.index')->sql_fields)
		->orderBy('id', 'desc')
		->get();

		$table->each(function($item, $key)
		{
			$item->contact = $item->rel_contact ? $item->rel_contact->name : null;
		});
	}
	public function pre_create(&$tuple=null)
	{
		$tags = Tag::select2('tag', null, [], false);

		$this->sm->assign('tags', $tags);
	}
	public function set_rules(&$rules, $vars)
	{
		$rules = 
		[
			rule('message', ['required']),
			rule('tags[]', ['required']),
		];
	}
	public function post_validate_entry()
	{
		$this->post_data['message'] 	= post('message', 'strCondense.trim');
		$this->post_data['active'] 		= post('active', 'asCheckbox.intval');
	}
	public function overwrite_tuple_before_transaction($tuple)
	{
		$contacts = Contact::from(Contact::as('con'))
		->whereExists(function ($query)
		{
			$query->select(DB::raw(1))
			->from(ContactTag::as('ct'))
			->whereIn('tag_id', post('tags[]'))
			->where('contact_id', DB::raw('con.id'));
		});

		# qx($contacts);

		$contacts = $contacts->get();

		if (!$contacts->count())
		{
			form_response(false, ['message' => 'No contact found']);
		}

		foreach ($contacts as $contact)
		{
			$sms_outbound 				= new $this->ctrl_model;
			$sms_outbound->contact_id 	= $contact->id;
			$sms_outbound->mobile 		= $contact->mobile;
			$sms_outbound->message 		= $this->post_data['message'];
			$sms_outbound->save();
		}

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://myhost14.com/brgy-alulod/api/sms/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET'
		));

		$response = curl_exec($curl);

		curl_close($curl);

		json_response(true, ['redirect' => route('admin--sms-outbounds'), 'message' => 'Sms successfully saved']);
	}
}
