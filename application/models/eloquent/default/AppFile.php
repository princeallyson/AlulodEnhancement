<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class AppFile extends DefaultModel
{	
	protected $table = 'app_files';

	protected $appends = ['id10', 'reference', 'date_created', 'active_badge'];

	public function rel_user()
	{
		return $this->hasOne(AppUser::class, 'id', 'user_id');
	}
}