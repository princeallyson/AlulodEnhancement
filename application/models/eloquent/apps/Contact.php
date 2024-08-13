<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class Contact extends BaseModel
{
	protected $table = 'tbl_contacts';

	protected $appends = ['id10', 'reference', 'date_created', 'active_badge', 'name'];

	public function getNameAttribute()
	{
		return strProperCase($this->first_name.' '.$this->last_name);
	}
	public function rel_contact_tags()
	{
		return $this->hasMany(ContactTag::class, 'contact_id', 'id');
	}
}