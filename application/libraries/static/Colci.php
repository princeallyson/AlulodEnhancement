<?php

class Colci
{
	public $sql_field = null;
	public $html_table_colname = null;
	public $datatable_colname = null;

	function __construct()
	{
	}
	public function build()
	{
		if (!$this->html_table_colname || !$this->datatable_colname) {
			# example of possible values of sql_field [ field, a.field, field as field, func(field) as field ]
			# split and reverse sql_field to get the last statement

			# check for possible scenario [ field as field, func(field) as field ]
			$piece = $this->sql_field;
			$pieces = explode(' ', $piece);

			if (count($pieces) > 1) {
				$pieces = array_reverse($pieces); 
				$piece = array_shift($pieces); # from array to a single value string
			}

			# check for possible scenario [ a.field ]
			$pieces = explode('.', $piece);

			if (count($pieces) > 1) {
				$pieces = array_reverse($pieces);
				$piece = array_shift($pieces);	# from array to a single value string
			}

			# replace any special characters
			$piece = str_replace(['`'], '', $piece);

			if (!$this->html_table_colname) {
				# check for underscores
				$colname = explode('_', trim($piece));

				# remove any double white space between
				$colname = join(' ', array_values(array_filter($colname)));

				# proper case final value
				$this->html_table_colname = ucwords(strtolower($colname));
			}

			if (!$this->datatable_colname) {
				$this->datatable_colname = $piece;
			}
		}
	}
}