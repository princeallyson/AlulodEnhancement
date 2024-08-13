<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class ApiController extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
	}
	public function send_sms()
	{
		$messages = SmsOutbound::select('message')
		->distinct()
		->whereNull('sent_at')	
		->whereNull('error_at')
		->whereNull('error_message')
		->get()
		->pluck('message')
		->toArray();

		if ($messages)
		{
			foreach ($messages as $message) 
			{
				$mobiles = SmsOutbound::select('mobile')
				->where('message', $message)
				->whereNull('sent_at')	
				->whereNull('error_at')
				->whereNull('error_message')
				->get()
				->pluck('mobile')
				->toArray();

				$curl = curl_init();

				$data = [
					"Email" => "alulodcontrolcenter@gmail.com",
					"Password" => "alulod123",
					"Recipients" => $mobiles,
					"Message" => $message,
					# "ApiCode" => "Api here"
					"ApiCode" => "Api here"
				];

				curl_setopt_array($curl, array(
					CURLOPT_URL => 'https://api.itexmo.com/api/broadcast',
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_ENCODING => '',
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 0,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => 'POST',
					CURLOPT_POSTFIELDS => json_encode($data),
					CURLOPT_HTTPHEADER => array(
						'Content-Type: application/json'
					),
				));

				$response = curl_exec($curl);

				curl_close($curl);
				
				$response = json_decode($response, true);

				if (find($response, 'Error', null) === false && find($response, 'ReferenceId'))
				{
					SmsOutbound::where('message', $message)
					->whereNull('sent_at')	
					->whereNull('error_at')
					->whereNull('error_message')
					->update([
						'sent_at' => date('Y-m-d H:i:s'),
						'response' => json_encode($response)
					]);
				}
				else
				{
					dj($response);
				}
			}
		}
	}
	public function road_api()
	{
		$curl = curl_init();

		$lat_from 	= post('lat_from');
		$lng_from 	= post('lng_from');
		$lat_to 	= post('lat_to');
		$lng_to 	= post('lng_to');

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://myhost14.com/gmap/road-api.php?lat1={$lat_from}&lng1={$lng_from}&lat2={$lat_to}&lng2={$lng_to}&key=apiKey here",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
		));

		$response = curl_exec($curl);

		curl_close($curl);
		
		header('Content-Type: application/json');
		echo json_encode(json_decode($response, true));
		exit;
	}
}
