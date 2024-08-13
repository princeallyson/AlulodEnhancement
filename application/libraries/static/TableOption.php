<?php

class TableOption
{
	public $text;
	public $icon;
	public $class;
	public $data = array();

	function __construct($text, $icon, $class="", $data=array())
	{
		$this->text = $text;
		$this->icon = $icon;
		$this->class = $class;
		$this->data = $data;
	}
	public function build_data()
	{
		$attr = array();

		foreach ($this->data as $k => $d)
		{
			$a = $k;

			if (strlen($d))
			{
				$a .= "=";
				$a .= "\"{$d}\"";
			}

			$attr[] = $a;
		}

		return join(" ", $attr);
	}
}