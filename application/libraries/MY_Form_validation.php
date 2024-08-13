<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

class MY_Form_validation extends CI_Form_validation
{
	const DEBUG_ON_FAIL = false;

	protected $ci;

	function __construct($config = array())
	{
		parent::__construct($config);

		$this->ci =& get_instance();
	}
	public function valid_date($date, $format=null)
	{
		$format = $format ? $format : 'Y-m-d';

		if (!is_date($date, $format))
		{
			if (self::DEBUG_ON_FAIL) dj(__FUNCTION__, get_defined_vars());

			$this->ci->form_validation->set_message(__FUNCTION__, "{$date} is not a valid date.");

			return false;
		}

		return true;
	}
	public function valid_time($date, $format=null)
	{
		$format = $format ? $format : 'H:i:s';

		if (!is_time($date, $format))
		{
			if (self::DEBUG_ON_FAIL) dj(__FUNCTION__, get_defined_vars());

			$this->ci->form_validation->set_message(__FUNCTION__, "{$date} is not a valid time.");

			return false;
		}

		return true;
	}
	public function valid_mobile($str, $type)
	{
		if (!is_mobile($str))
		{
			if (self::DEBUG_ON_FAIL) dj(__FUNCTION__, get_defined_vars());

			$this->ci->form_validation->set_message(__FUNCTION__, "{$str} is not a mobile.");

			return false;
		}

		return true;
	}
	public function tuple_unique($str, $field)
	{	
		sscanf($field, '%[^.].%[^.].%[^.].%[^.]', $table, $key_name, $id, $fieldname);

		$q = DB::table(DB::raw($table))
		->where($fieldname, trim($str));

		if ($id) $q = $q->where('id', '<>', $id); #dj($field);

		$rows = $q->count();

		if ($rows)
		{
			if (self::DEBUG_ON_FAIL) dj(__FUNCTION__, get_defined_vars());

			$this->ci->form_validation->set_message(__FUNCTION__, "{$str} is already exists.");

			return false;	
		}

		return true;
	}
	public function tuple_exists($str, $field)
	{
		sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $label);

		$label = str_replace('_', ' ', $label);

		$q = DB::table(DB::raw($table))
		->where($field, trim($str));

		$rows = $q->count();

		if (!$rows)
		{
			if (self::DEBUG_ON_FAIL) dj(__FUNCTION__, get_defined_vars());

			$this->ci->form_validation->set_message(__FUNCTION__, "{$label} does not exists.");

			return false;	
		}

		return true;
	}
	public function tuple_required($str, $field)
	{
		sscanf($field, '%[^.].%[^.].%[^.]', $table, $field, $label);

		$label = str_replace('_', ' ', $label);

		$q = DB::table(DB::raw($table))
		->where($field, trim($str));

		$rows = $q->count();

		if (!$rows)
		{
			if (self::DEBUG_ON_FAIL) dj(__FUNCTION__, get_defined_vars());

			$this->ci->form_validation->set_message(__FUNCTION__, "This field is required.");

			return false;	
		}

		return true;
	}
	public function file_required($file)
	{
		$names = find($_FILES, $file.'.name');

		$names = is_array($names) ? $names : [$names];

		$names = array_filter($names);

		if (!$names)
		{
			if (self::DEBUG_ON_FAIL) dj(__FUNCTION__, get_defined_vars());

			$this->ci->form_validation->set_message(__FUNCTION__, "This field is required.");

			return false;	
		}

		return true;
	}
	public function file_errors($file)
	{
		$test_name = uuid();

		$_FILES[$test_name]['name'] 		= _array($_FILES[$file]['name']);
		$_FILES[$test_name]['type'] 		= _array($_FILES[$file]['type']);
		$_FILES[$test_name]['size'] 		= _array($_FILES[$file]['size']);
		$_FILES[$test_name]['tmp_name'] 	= _array($_FILES[$file]['tmp_name']);
		$_FILES[$test_name]['error'] 		= _array($_FILES[$file]['error']);

		foreach ($_FILES[$test_name]['name'] as $index => $name)
		{
			if (find($_FILES, $test_name.'.size.'.$index) == 0)
			{
				if (self::DEBUG_ON_FAIL) dj(__FUNCTION__, get_defined_vars());

				$this->ci->form_validation->set_message(__FUNCTION__, "{$name} has invalid file size.");

				return false;	
			}
			if (find($_FILES, $test_name.'.error.'.$index))
			{
				if (self::DEBUG_ON_FAIL) dj(__FUNCTION__, get_defined_vars());

				$this->ci->form_validation->set_message(__FUNCTION__, "{$name} has error.");

				return false;	
			}
		}

		return true;	
	}
	public function file_valid($file, $extensions)
	{
		$test_name = uuid();

		$_FILES[$test_name]['name'] 		= _array($_FILES[$file]['name']);
		$_FILES[$test_name]['type'] 		= _array($_FILES[$file]['type']);
		$_FILES[$test_name]['size'] 		= _array($_FILES[$file]['size']);
		$_FILES[$test_name]['tmp_name'] 	= _array($_FILES[$file]['tmp_name']);
		$_FILES[$test_name]['error'] 		= _array($_FILES[$file]['error']);

		$extensions = array_filter(array_map('strtolower', array_map('trim', explode(',', $extensions))));

		foreach ($_FILES[$test_name]['name'] as $index => $name)
		{
			$extension = pathinfo($name, PATHINFO_EXTENSION);

			if (!in_array($extension, $extensions))
			{
				if (self::DEBUG_ON_FAIL) dj(__FUNCTION__, get_defined_vars());

				$this->ci->form_validation->set_message(__FUNCTION__, "{$name} has invalid file type.");

				return false;
			}
		}

		return true;
	}
}