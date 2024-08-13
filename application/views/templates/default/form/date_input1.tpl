{$___required = 'required'|iif:($__required|default:null|is_null):''}
{$___readonly = $__readonly|default:'readonly'}
{$___name = "`$__field`"}
{$___name = "name=\"`$___name`\""}
{$___name = "`$___name` `$___required`"}
<div class="form-group">
	<label>{$__label}{if $can_entry}{'<span class="required"> *</span>'|iif:($___required|is:'required')}{/if}</label>
	<input class="form-control bs-datepicker" type="{$__type|default:'text'}" {$___name|iif:$can_entry:$___readonly} placeholder="{$__label}" value="{$prev_data.$__field|default:$__default:(now)|dateformat:'M. d, Y'}">
</div>