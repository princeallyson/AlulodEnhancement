<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class ContactTag extends BaseModel
{
	protected $table = 'tbl_contact_tags';

	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];

	public function rel_tag()
	{
		return $this->hasOne(Tag::class, 'id', 'tag_id');
	}
}