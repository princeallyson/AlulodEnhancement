<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class AppSharedFile extends DefaultModel
{	
	protected $table = 'app_shared_files';

	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];

	public function rel_user()
	{
		return $this->hasOne(AppUser::class, 'id', 'user_id');
	}
	public function rel_file()
	{
		return $this->hasOne(AppFile::class, 'id', 'file_id');
	}
}