<?php
function delete_upload($file)
{
	if (strlen(trim($file))) 
	{
		$ci = ci();

		$file = $ci->uploads_dir.DS.$file;
		
		if (file_exists($file))	unlink($file);
	}
}
function upload_file($file, $dir=null, $allowed_types=null, $name=null)
{
	$ci = ci();

	$ci->load->library('upload');

	$extension = pathinfo(find($_FILES, $file.'.name'), PATHINFO_EXTENSION);

	$config['upload_path'] 		= $dir ?? $ci->uploads_dir;
	$config['allowed_types']	= $allowed_types ?? 'jpg|png';

	if (fnmatch('image*', mime_content_type(find($_FILES, $file.'.tmp_name'))))
	{
		$config['image_library']    = 'gd2';
		$config['quality']      	= '30%';	
	}

	$config['file_name']		= ($name ?? uuid()).'.'.$extension;

	$ci->upload->initialize($config);

	if ($ci->upload->do_upload($file)) 
	{
		$upload_data = $ci->upload->data();

		return ['status' => 1, 'filename' => $upload_data['file_name'], 'upload_data' => $upload_data];
	}
	
	return ['status' => 0, 'error' => $ci->upload->display_errors('', '')];
}
function copy_upload($file, $dir=null, $name=null)
{
	if (!strlen(trim($file))) ['status' => 0, 'error' => 'File not found'];

	$ci = ci();

	$d = $dir ?? $ci->uploads_dir;

	$f = $d.DS.$file;

	if (!file_exists($f)) ['status' => 0, 'error' => 'File '.$file.' not found'];

	$x = pathinfo($f, PATHINFO_EXTENSION);

	$n = $name ?? uuid();

	$n = $n.'.'.$x;

	$nf = $d.DS.$n;

	copy($f, $nf);

	if (file_exists($nf)) 
		return ['status' => 1, 'filename' => $n];

	return ['status' => 0, 'error' => 'Unable to copy file '.$file];
}
function hasFiles($file)
{
	$names = find($_FILES, "{$file}.name", []);

	$names = is_array($names) ? $names : [$names];
	
	$names = array_filter($names);

	return count($names) > 0;
}
function upload_cloudinary($filename, &$response, &$error, &$secure_url, $type="image")
{
	$cloudinary = ci()->config->item('cloudinary');

	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL 			=> 'https://api.cloudinary.com/v1_1/'.$cloudinary['name'].'/'.$type.'/upload',
		CURLOPT_RETURNTRANSFER 	=> true,
		CURLOPT_ENCODING 		=> '',
		CURLOPT_MAXREDIRS 		=> 10,
		CURLOPT_TIMEOUT 		=> 0,
		CURLOPT_FOLLOWLOCATION 	=> true,
		CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST 	=> 'POST',
		CURLOPT_SSL_VERIFYPEER 	=> false,
		CURLOPT_POSTFIELDS => [
			'public_id' 	=> time().rand(10000, 99999), 
			'api_key' 		=> $cloudinary['api_key'],
			'file'			=> new CURLFILE($filename),
			'upload_preset' => $cloudinary['upload_preset'],
			'folder' 		=> $cloudinary['folder']
		]
	));

	$response = curl_exec($curl);

	$error = curl_error($curl);

	curl_close($curl);

	if ("" != $error)
		return false;

	if (!$response)
		return false;

	$response_js = json_decode($response, true);

	if (!find($response_js, 'asset_id'))
	{
		$error = 'Invalid response';
		
		return false;
	}

	$secure_url = find($response_js, 'secure_url');

	return true;
}