<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class ContactsController extends CrudController
{
	public $tpl_dir = 'modules/apps/admin/contacts';

	public $ctrl_model = Contact::class;

	public $title = 'Contact';
	
	public $title_field = '';

	function __construct()
	{
		parent::__construct();

		$this->settings['tableci']['index'] = (new Tableci)->add([
			Tableci::REFERENCE,
			'first_name',
			'last_name',
			'mobile', 
			'tags',
			Tableci::DATE_CREATED,
			# Tableci::ACTIVE
		])
		->addExclusion(['tags'], Tableci::HTML_DATATABLE);
	}
	public function pre_index(&$table)
	{
		$table = $this->ctrl_model::with('rel_contact_tags.rel_tag')
		->select(find($this->settings, 'tableci.index')->sql_fields)
		->orderBy('id', 'desc')
		->get();

		$table->each(function($item, $key)
		{
			$item->tags = null;

			if ($item->rel_contact_tags)
			{
				$item->rel_contact_tags->each(function ($contact_tag, $contact_tag_key)
				{
					$contact_tag->tag = $contact_tag->rel_tag ? $contact_tag->rel_tag->tag : null;
				});

				$item->tags = $item->rel_contact_tags->pluck('tag')->toArray();

				$item->tags = array_filter($item->tags);

				$item->tags = array_map(function ($arr) 
				{
					return badge_name($arr, 'dark');
				}, $item->tags);				

				$item->tags = join(' ', $item->tags);				
			}
		});
	}
	public function pre_create(&$tuple=null)
	{
		$tags = Tag::select2('tag', null, [], false);

		if ($tuple)
		{
			$contact_tags = ContactTag::where('contact_id', $tuple['id'])
			->get()
			->pluck('tag_id')
			->toArray();

			foreach ($tags as &$tag)
			{
				if (in_array($tag['value'], $contact_tags))
				{
					$tag['selected'] = true;
				}
			}
		}

		$this->sm->assign('tags', $tags);
	}
	public function set_rules(&$rules, $vars)
	{
		$rules = 
		[
			rule('first_name', ['required']),
			rule('last_name', ['required']),
			rule('mobile', ['required', 'valid_mobile', $this->ctrl_model::is_unique($this->post_data['id'], 'mobile')]),
			rule('tags[]', ['required']),
		];
	}
	public function post_validate_entry()
	{
		$this->post_data['first_name'] 		= post('first_name', 'strProperCase');
		$this->post_data['last_name'] 		= post('last_name', 'strProperCase');
		$this->post_data['mobile'] 			= post('mobile', 'trim');
		$this->post_data['active'] 			= post('active', 'asCheckbox.intval');
	}
	public function on_tuple_save_success($tuple)
	{
		ContactTag::where('contact_id', $tuple->id)
		->whereNotIn('tag_id', post('tags[]'))
		->delete();

		foreach (post('tags[]') as $tag)
		{
			$contact_tag = ContactTag::where('contact_id', $tuple->id)
			->where('tag_id', $tag)
			->first();

			if (!$contact_tag)
			{
				$contact_tag = new ContactTag;
				$contact_tag->contact_id = $tuple->id;
				$contact_tag->tag_id = $tag;
				$contact_tag->save();
			}
		}
	}
}
