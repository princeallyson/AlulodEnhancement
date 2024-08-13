<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class HomeController extends MY_Controller
{
	public $tpl_dir = 'modules/home';

	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$news = News::isActive()->orderBy('created_at', 'desc')->get();

		$this->sm->assign('news', $news);

		display('home');
	}
	public function news($id) 
	{
		$news = News::find($id);

		if (!$news) redirect(route('home'));

		$this->sm->assign('news', $news);

		display('news');
	}
	public function map()
	{
		$filters = json_decode(base64_decode(get('p')), true);

		$location_category = find($filters, 'location_category');

		$this->sm->assign('location_category', $location_category);

		#

		$location_categories = LocationCategory::select2('category', null, [], false);

		array_unshift($location_categories, ['value' => 0, 'text' => 'All']);

		$this->sm->assign('location_categories', $location_categories);

		#

		$locations = Location::select('*');

		if ($location_category)
		{
			$locations = $locations->where('location_category_id', $location_category);
		}

		$locations = $locations->get();

		$this->sm->assign('dt_data', $locations->toJson());

		#

		$brgy_alulod = Location::where('location', 'Barangay Hall')->first();

		if ($brgy_alulod)
			$this->sm->assign('barangay_hall', $brgy_alulod->toArray());
		else
			$this->sm->assign('barangay_hall', $this->config->item('brgy_alulod_location'));

		#

		$puroks = array('Alulod');

		for ($i = 1; $i <= 6; $i++)
		{
			$puroks[] = "Purok ".$i;
		}

		$this->sm->assign('puroks', $puroks);

		display('map');
	}
	public function reports()
	{
		if (get('start') && get('end'))
		{
			$start_date = get('start');
			$end_date = get('end');
		}
		else
		{
			$start_date = ReportD::min('created_at');
			$end_date = ReportD::max('created_at');

			$start_date = date('Y-m-d', strtotime($start_date));
			$end_date = date('Y-m-d', strtotime($end_date));

			$this->sm->assign('s_date', $start_date);
			$this->sm->assign('e_date', $end_date);
		}

		$reports = ReportH::select('id', 'title', 'type')
		->with([
			'rel_report_items' => function ($query) use ($start_date, $end_date)
			{
				$query->whereBetween(DB::raw('date(created_at)'), [
					$start_date,
					$end_date
				]);
			}
		])
		->isActive()
		->get();

		$reports->each(function ($item, $key)
		{
			$item->setAppends([]);

			if (in_array($item->type, ['Bar', 'Bar Horizontal', 'Line']))
			{
				$item->labels = $item->rel_report_items->pluck('name')->toArray();

				$item->values = $item->rel_report_items->pluck('value')->toArray();
			}
			else
			{
				$item->data = $item->rel_report_items->toArray();

				$tmp_data = $item->data;

				foreach ($tmp_data as &$data)
				{
					$tmp = array_filter($data, function ($key)
					{
						return in_array($key, ['name', 'value']);
					}, ARRAY_FILTER_USE_KEY);

					$data = $tmp;
				}

				$item->data = $tmp_data;		
			}

			$item->makeHidden('rel_report_items');
		});

		# dj($reports);

		$this->sm->assign('reports', $reports);

		display('reports');
	}
}
