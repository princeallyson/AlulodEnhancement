<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Illuminate\Database\Capsule\Manager as DB;

function tableName($model, $alias=null)
{
	return DB::raw($model::getTableNameWithPrefix($alias));
}
function getQuery($model)
{
	$sql = $model->toSql();

	foreach ($model->getBindings() as $value)
		$sql = preg_replace('/\?/', "'".$value."'", $sql, 1);

	return $sql;
}