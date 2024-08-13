<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Support\Facades\Paginator;

class NotificationsController extends MY_Controller
{
	public $tpl_dir = 'modules/default/notifications';

	function __construct()
	{
		parent::__construct();
	}
	public function index() 
	{
		$current_page = get('page') ?? 1;
		$max_record_page_age = 10;

		$notifications = AppNotification::select('title', 'url', 'content', 'created_at')
		->where('user_id', sess_id())
		->isActive()
		->orderBy('created_at', 'desc')
		->paginate($max_record_page_age, ['*'], 'page', $current_page);

		$notifications = $notifications->toArray(); #dj($notifications);

		$last_page = $notifications['last_page'];
		$button_count = 5;
		$pages = [];

		for($i = $current_page - $button_count; $i <= $current_page + $button_count; $i++)
		{
		  if ($i < 1) continue;
		  
		  if ($i > $last_page) break;
		  
		  $pages[] = $i;
		}

		$pages = array_reverse($pages);
		$pages = array_splice($pages, 1, 5);
		$pages = array_reverse($pages);
		$pages[] = $last_page;

		if (!in_array(1, $pages)) array_unshift($pages, 1);

		$this->sm->assign([
			'pages' => $pages,
			'notifications' => $notifications
		]);

		display('notifications');
	}
}
