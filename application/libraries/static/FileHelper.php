<?php

class FileHelper
{
	private $ci;
	public $result;
	public $message;
	public $success;

	function __construct()
	{
		$this->ci =& get_instance();	
	}
	public static function hasFiles()
	{
		$name = $_FILES[array_key_first($_FILES)]['name'];

		if (is_array($name))
			return count($name) > 0;
		elseif (is_string($name))
			return strlen($name) > 0;
		else
			return false;
	}
	public static function upload($target_path=null, $name=null)
	{
		$me = new self;

		if (!self::hasFiles()) {
			$me->result = false;
			$me->message = 'No file selected';
			return $me;
		}

		$name = $name ?? findItem(array_keys($_FILES), 0);

		if (!$name) {
			$me->result = false;
			$me->message = 'Undefined form name';
			return $me;
		}

		$target_path = $target_path ?? APPPATH.'temp';

		if (!is_dir($target_path)) {
			$me->result = false;
			$me->message = 'Target path not found';
			return $me;
		}

		$files['name'] 		= strToArray($_FILES[$name]['name']);
		$files['type'] 		= strToArray($_FILES[$name]['type']);
		$files['tmp_name'] 	= strToArray($_FILES[$name]['tmp_name']);
		$files['error'] 	= strToArray($_FILES[$name]['error']);
		$files['size'] 		= strToArray($_FILES[$name]['size']);

		$config['upload_path'] 		= $target_path;
		$config['allowed_types']	= 'jpg|png';
		$config['image_library']    = 'gd2';
		$config['quality']      	= '30%';

		$allowed_types = explode('|', $config['allowed_types']);

		$me->ci->load->library('upload');

		for ($i = 0; $i < count($files['name']); $i++) {
			$__name = uuid();

			$_FILES[$__name]['name'] 		= findItem($files, 'name.'.$i);
			$_FILES[$__name]['type'] 		= findItem($files, 'type.'.$i);
			$_FILES[$__name]['tmp_name'] 	= findItem($files, 'tmp_name.'.$i);
			$_FILES[$__name]['error'] 		= findItem($files, 'error.'.$i);
			$_FILES[$__name]['size'] 		= findItem($files, 'size.'.$i);

			if ($_FILES[$__name]['error'] || $_FILES[$__name]['size'] == 0) {
				$me->result['failed'][] = [
					'filename' => $_FILES[$__name]['name'],
					'message' => 'Unable to upload file'
				];

				continue;
			}

			$extension = pathinfo($_FILES[$__name]['name'], PATHINFO_EXTENSION);

			if (!in_array($extension, $allowed_types)) {
				$me->result['failed'][] = [
					'filename' => $_FILES[$__name]['name'],
					'message' => 'Invalid file type ".'.$extension.'"'
				];

				continue;
			}

			$config['file_name'] = $__name.'.'.$extension;

			$me->ci->upload->initialize($config);

			if (!$me->ci->upload->do_upload($__name)) {
				$me->result['failed'][] = [
					'filename' => $_FILES[$__name]['name'],
					'message' => $me->ci->upload->display_errors('', '')
				];

				continue;
			}

			if (!file_exists($config['upload_path'].DS.$config['file_name'])) {
				$me->result['failed'][] = [
					'filename' => $_FILES[$__name]['name'],
					'message' => 'File not found. Please check folder permission'
				];
				
				continue;	
			}

			$me->result['success'][] = [
				'filename' => $config['file_name'],
				'filepath' => $config['upload_path']
			];
		}

		if (is_array($me->result)) {
			$me->success = !array_key_exists('failed', $me->result);
		}
		else {
			$me->success = $me->result !== false;
		}
		
		return $me;
	}
	public static function combine(array $item, $filename_key=null, $filepath_key=null)
	{
		$file = findItem($item, $filepath_key ?? 'filepath');
		$file .= strEndsWith($file, DS) ? '' : DS;
		$file .= findItem($item, $filename_key ?? 'filename');
		return $file;
	}
	public static function move($file, $target_path, $new_filename=null)
	{
		$filename = $new_filename ?? pathinfo(str_replace('\\', '/', $file), PATHINFO_BASENAME);
		rename($file, $target_path.DS.$filename);
		return file_exists($target_path.DS.$filename);
	}
	public function getAllFailedMessage($join=true, $delimiter='</br>')
	{
		$messages = array();

		if (findItem($this->result, 'failed')) {
			foreach ($this->result['failed'] as $item) {
				$messages[] = $item['message'];
			}
		}

		return !$messages ? null : ( $join ? join($delimiter, $messages) : $messages );
	}
	public static function deleteFile($id)
	{
		$file = AppFile::find($id);

		if ($file) {
			if (file_exists($file->dirname.DS.$file->basename)) {
				unlink($file->dirname.DS.$file->basename);
			}
			if (!file_exists($file->dirname.DS.$file->basename)) {
				$file->delete();	
			}
			else {
				$file->delete = 1;
				$file->save();
			}
		}
	}
}