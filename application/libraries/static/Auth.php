<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class Auth
{
	const LOAD_DB = 1;
	const LOAD_SESSION = 2;

	private static $instance;
	public $ci;

	function __construct($load_bit=0)
	{	
		$this->ci =& get_instance();

		if ($load_bit & self::LOAD_DB) {
			$this->ci->load->database();
		}

		if ($load_bit & self::LOAD_SESSION) {
			$this->ci->load->library('session');
		}
	}
	public static function getInstance($load_bit=0)
	{
		if ( is_null( self::$instance ) ) {
			self::$instance = new self($load_bit);
		}

		return self::$instance;
	}
	public static function isLoggedIn($clean_session_if_not_logged_id=true)
	{	
		$me = self::getInstance(self::LOAD_SESSION);
			
		$result = (int)$me->ci->session->userdata('__login') === 1;

		if (!$result && $clean_session_if_not_logged_id) {
			$me::cleanUserSessions();
		}
		
		return $result;
	}
	public static function isUserActive()
	{
		$me = self::getInstance(self::LOAD_SESSION);

		$user = AppUser::find($me::sessionId());
		
		$result = $user && (int)$user->active === 1;

		if (!$result) {
			$me::cleanUserSessions();
		}

		return $result;
	}
	public static function sessionId()
	{
		$me = self::getInstance(self::LOAD_SESSION);

		return (int)$me->ci->session->userdata('__login_id');
	}
	public static function cleanUserSessions()
	{	
		$user_id = self::sessionId();

		$me = self::getInstance(self::LOAD_SESSION);

		$sessions = array_keys($me->ci->session->all_userdata());

		$sessions = array_filter($sessions, function ($item) {
			return $item != '__ci_last_regenerate';
		});

		$session_id = $me->ci->session->session_id;

		if ($session_id) {
			$session = AppSession::find($session_id);

			if ($session) {
				$session->delete();
			}
		}

		$me->ci->session->unset_userdata($sessions);

		if (session_status() === PHP_SESSION_ACTIVE) {
			$me->ci->session->sess_destroy();
		}

		if ($user_id) {
			# clean previous session by user id
			DB::table(AppSession::getTableName())
			->where('user_id', $user_id)
			->delete();
		}
	}
	/*
		config helper
	 */

	public static function passwordSalt()
	{
		$me = self::getInstance();

		return $me->ci->config->item('password_salt');
	}

	/*
		security helper
	 */
	
	public static function csrf()
	{
		$me = self::getInstance();

		return array(
			'name' => $me->ci->security->get_csrf_token_name(),
			'hash' => $me->ci->security->get_csrf_hash(),
		);
	}

	/*
		encryption helper
	 */
	
	public static function encryptPassword($password)
	{
		return password_hash($password.self::passwordSalt(), PASSWORD_BCRYPT);
	}
	public static function verifyPassword($password, $encrypted_password)
	{	
		return password_verify($password.self::passwordSalt(), $encrypted_password);
	}
	public static function isPasswordSecure($password)
	{
		$re = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m';

		preg_match_all($re, $password, $matches);

		return count($matches[0] ?? null) > 0;
	}
	public static function userHasRoute($uri)
	{
		# can be use inside tpl files | see modifier is_user_route

		$me = self::getInstance(); 

		$route = Route::fromUri($uri);

		if (!$me->ci->user_routes) return false;

		if (is_null($me->ci->user_routes ?? null)) return false;

		# not connecting to database, just filtering the already loaded data
		return !!$me->ci->user_routes->whereIn('route', _array($route))->first();
	}
	public static function userHasPermission($permission)
	{
		# can be use inside tpl files | see modifier is_user_permission
		
		$me = self::getInstance();

		if (!$me->ci->user_permissions) return false;

		if (is_null($me->ci->user_permissions ?? null)) return false;

		# not connecting to database, just filtering the already loaded data
		return !!$me->ci->user_permissions->whereIn('permission', _array($permission))->first();
	}
	public static function randomString($len=10)
	{
		return bin2hex(openssl_random_pseudo_bytes($len));
	}
}