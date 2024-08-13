<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class SmsOutbound extends BaseModel
{
	protected $table = 'tbl_sms_outbounds';

	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];

	public function rel_contact()
	{
		return $this->hasOne(Contact::class, 'id', 'contact_id');
	}
}