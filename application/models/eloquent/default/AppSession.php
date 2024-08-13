<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class AppSession extends DefaultModel 
{
	public $incrementing = false;

	public static function deleteOldSessions()
	{
		DB::table(self::getTableName())
		->whereNull('created_at')
        ->orWhere('created_at', '<', DB::raw('now() - interval 1 hour'))
        ->delete();
	}
	public static function updateSessionId($user_id=null)
	{
		if ($user_id) {
			$sessions = self::where('id', session_id())
			->whereNull('user_id')
			->get();

			if ($sessions->count()) {
				foreach ($sessions as $session) {
					$session->user_id = $user_id;
					$session->save();
				}
			}
		}
	}
}