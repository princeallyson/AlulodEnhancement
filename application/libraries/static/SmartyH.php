<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SmartyH
{
	private static $attribute_without_value = ['selected', 'required', 'checked'];

	public static function normalizeAttr(array &$attributes)
	{
		foreach ($attributes as $attribute_name => $attribute_value) {
			if (is_int($attribute_name))
				continue;

			if (is_null($attribute_value)) {
				unset($attributes[$attribute_name]);
				$attributes[] = str_replace('_', '-', $attribute_name);
				continue;
			}

			if (in_array($attribute_name, self::$attribute_without_value)) { 
				if (is_int($attribute_value) && in_array((int)$attribute_value, [1, 0]))
					$attribute_value = boolval($attribute_value);

				if ($attribute_name === $attribute_value || is_bool($attribute_value)) {
					# selected=selected | required=required
					# selected=true | required=true
					
					if (!is_bool($attribute_value) || $attribute_value === true) {
						$attributes[] = $attribute_name;	
					}
					
					unset($attributes[$attribute_name]);
				}
			}

			if (strpos($attribute_name, '_') !== false) {
				$attributes[str_replace('_', '-', $attribute_name)] = $attribute_value;
				unset($attributes[$attribute_name]);
			}
		}

		$attributes = $attributes ? $attributes : [];
	}
	public static function appendAttr(&$params, $name, $default_value, $omit_if_value_is_false=false) {
		if (!array_key_exists($name, $params)) {
			if (strlen($default_value))
				$params[$name] = $default_value;
		}
		else {
			# attr=false | attr="" | attr=null
			# attr=0 is not included
			if ($omit_if_value_is_false && !strlen($params[$name]))
				unset($params[$name]);
		}
	}
}