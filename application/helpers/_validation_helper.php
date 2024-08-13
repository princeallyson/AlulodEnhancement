<?php
function rule(string $field, $rules, $label=null, $custom_errors=array())
{
	$label = $label ?? strProperCase(str_replace('_', ' ', $field));
	
	$rule = [
		'field' => $field,
        'label' => $label,
        'rules' => is_array($rules) ? join('|', $rules) : $rules
	];

	if ($custom_errors) $rule['errors'] = $custom_errors;

	return $rule;
}