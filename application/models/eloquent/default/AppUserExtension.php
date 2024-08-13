<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class AppUserExtension extends DefaultModel
{
	protected $appends = array('name');
	
	public function rel_verification()
	{
		return $this->hasOne(AppVerification::class, 'id', 'verification_id');
	}
	public function rel_patient()
	{
		return $this->hasOne(DentalPatient::class, 'user_extension_id', 'id');
	}
	public function getNameAttribute()
	{
		return $this->first_name.' '.$this->last_name;
	}
	public static function createExtension($user_id, $data=array())
	{
		$extension = new AppUserExtension;
		$extension->user_id = $user_id;
		$extension->first_name = $data['first_name'] ?? null;
		$extension->last_name = $data['last_name'] ?? null;
		$extension->save();

		return $extension;
	}
	public static function current()
	{
		return (new self)::where('user_id', sess_id())->first();
	}
	public function rel_user()
	{
		return $this->hasOne(AppUser::class, 'id', 'user_id');
	}
}