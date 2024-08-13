<?php

class Validation
{
	const DEFAULT_PARAM = '{-arg-}';

	public $errors = [];

	public $defined_vars = null;

	private $message_formats = array(
		'required' => '{name} is required',
		'invalid' => 'Invalid {name} {value}'
	);

	function __construct($defined_vars=null)
	{
		$this->defined_vars = $defined_vars;
	}
	public static function _($defined_vars=null)
	{
		return new self($defined_vars);
	}
	/*
	 * @param: $args -> label | array
	 * @param: $arg -> value to validate
	 */
	public function addRequired(...$args)
	{
		foreach ($args as $arg) 
		{
			$name = '';

			if (is_string($arg)) {
				$name = $arg;

				if (!is_null($this->defined_vars)) {
					if (array_key_exists($arg, $this->defined_vars) && strlen(trim($this->defined_vars[$arg])))
						continue;
				}
			}
			elseif (is_array($arg) && count($arg) == 2) {
				$name = $arg[0];

				if (strlen(trim($arg[1])))
					continue;
			}
			else
				$name = 'Unknown';

			$this->errors[] = str_replace('{name}', ucfirst($this->_name($name)), $this->message_formats['required']);
		}

		return $this;
	}
	/*
	 * @param: $args -> condition
	 * @param: $arg1 -> name
	 * @param: $arg2 -> value
	 */
	public function addInvalid(...$args)
	{
		foreach ($args as $arg) {
			if (is_array($arg)) {
				if (boolval($arg[0])) continue;

				$name = $arg[1];
				$value = count($arg) == 3 ? $arg[2] : ( $this->defined_vars ? $this->defined_vars[$name] : "" );

				$this->errors[] = trim(str_replace(['{name}', '{value}'], [$this->_name($name), $value ? "\"{$value}\"" : ''], $this->message_formats['invalid']));
			}
		}

		return $this;
	}
	public function run($url=null)
	{
		if ($this->errors) {
			setFlashdata('error_message', $this->__toString());
			setFlashdata('prev_data', post());
			redirect($url ?? referrerOrUrl());
		}
	}
	public function __toString()
	{
		return implode('</br>', $this->errors);
	}
	private function _name($name)
	{
		$name = preg_replace('/[^a-zA-Z0-9\']/', ' ', $name);

		return strtolower(strCondense($name));
	}
}