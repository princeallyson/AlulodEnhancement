<?php

class Tableci
{
	const SQL 			= 1;
	const HTML 			= 2;
	const DATATABLE 	= 4;
	const HTML_DATATABLE = 6;

	const REFERENCE 		= ['id', '#', 'reference'];
	const REFERENCE_VIEW 	= ['id', '#', 'reference_view'];
	const DATE_CREATED  	= ['created_at', 'Date Created', 'date_created'];
	const ACTIVE 			= ['active', null, 'active_badge'];

	public $data 					= array();
	private $exclusions 			= array();
	private $datatable_column_defs 	= array();

	private $set_defaults = true;

	function __construct($set_defaults=true)
	{
		$this->set_defaults = $set_defaults;
	}
	public function add($sql_field, $html_table_colname=null, $datatable_colname=null)
	{
		if (is_array($sql_field)) 
		{
			foreach ($sql_field as $colname) 
			{
				if (!$colname) continue;

				$this->add(
					is_array($colname) ? $colname[0] : $colname,
					is_array($colname) ? ($colname[1] ?? null) : null,
					is_array($colname) ? ($colname[2] ?? null) : null,
				);
			}

			return $this;	
		}
		
		if (!$sql_field) return $this;

		// $test = array_map(function ($item)
		// {
		// 	return is_array($item);
		// },
		// [$sql_field, $html_table_colname, $datatable_colname]);

		// if ($test) 
		// {
		// 	dj($sql_field, $html_table_colname, $datatable_colname);
		// }

		$colci 						= new Colci;
		$colci->sql_field 			= $sql_field;
		$colci->html_table_colname 	= $html_table_colname;
		$colci->datatable_colname 	= $datatable_colname;
		$colci->build();

		$this->data[$colci->datatable_colname] = $colci;

		if ($this->set_defaults)
		{
			if (in_array($datatable_colname, ['active_badge']))
			{
				$this->addDatatableColumnDefs($datatable_colname, [
					'width' 	=> 100,
					'className' => 'align-center'
				]);
			}

			if (in_array($datatable_colname, ['reference', 'reference_view']))
			{
				$this->addDatatableColumnDefs($datatable_colname, [
					'width' 	=> 100,
					'className' => 'align-center text-center',
					'orderable' => false
				]);
			}

			if (in_array($datatable_colname, ['date_created']))
			{
				$this->addDatatableColumnDefs($datatable_colname, [
					'className' => 'td-nowrap'
				]);
			}
		}
		
		return $this;
	}
	public function addExclusion($colnames, $exclusion_type)
	{
		if (!is_array($colnames)) $colnames = [$colnames];

		foreach ($colnames as $colname)
			$this->exclusions[$colname] = ($this->exclusions[$colname] ?? 0) + $exclusion_type;

		return $this;
	}
	public function getSqlFields($with_exlclusions=true)
	{
		return $this->get('sql_field', $with_exlclusions ? self::SQL : 0);
	}
	public function getHtmlTableColumns($with_exlclusions=true, $join=true)
	{
		$fields = array_map(function ($field) {
			return '<th>'.$field.'</th>';
		}, 
		$this->get('html_table_colname', $with_exlclusions ? self::HTML : 0));
		
		return $join ? join($fields) : $fields;
	}
	public function getDatatableColumns($with_exlclusions=true, $json_encode=true)
	{
		$fields = array_map(function ($field) {
			return ['data' => $field];
		}, 
		$this->get('datatable_colname', $with_exlclusions ? self::DATATABLE : 0));

		return $json_encode ? json_encode($fields) : $fields;
	}
	private function get($name, $type)
	{
		$fields = array();

		foreach ($this->data as $key => $colci) {
			if (array_key_exists($key, $this->exclusions) && $type) {
				if (!($this->exclusions[$key] & $type))
					continue;
			}

			$fields[] = $colci->{ $name };
		}

		return $fields;
	}
	public function addDatatableColumnDefs($colnames, $values)
	{
		if (!is_array($colnames)) $colnames = [$colnames];

		foreach ($colnames as $colname)
			$this->datatable_column_defs[$colname] = $values;

		return $this;
	}
	public function getDatatableColumnDefs($json_encode=true)
	{
		$datatable_fields = $this->getDatatableColumns(true, false);

		foreach ($this->datatable_column_defs as $key => &$column_defs) {
			foreach ($datatable_fields as $index => $field) {
				if ($key == $field['data']) {
					$column_defs['targets'] = $index;
					break;		
				}
			}
		}

		return $json_encode ? json_encode(array_values($this->datatable_column_defs)) : array_values($this->datatable_column_defs);
	}
	public function __get($name)
	{
		$name = 'get'.join(array_map('ucfirst', explode('_', $name)));
		
		if (method_exists($this, $name)) return $this->{ $name }();

		return '';
	}
	public function __set($name, $value)
	{
		$this->{ $name } = $value;
	}
	public function build()
	{
		return [
			'sql_fields' 				=> $this->getSqlFields(),
			'html_table_columns' 		=> $this->getHtmlTableColumns(),
			'datatable_columns' 		=> $this->getDatatableColumns(),
			'datatable_column_defs' 	=> $this->getDatatableColumnDefs(),
		];
	}
}