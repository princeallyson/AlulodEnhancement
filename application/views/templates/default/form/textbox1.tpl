{$___can_entry = $__can_entry|default:$can_entry}
{$___required = 'required'|iif:($__required|default:null|is_null):''}
{$___readonly = $__readonly|default:'readonly'}
{$___name = "`$__field`"}
{$___name = "name=\"`$___name`\""}
{$___name = "`$___name` `$___required`"}
{$__step = "step=\"`$__step`\""|iif:$__step|default:false}
<div class="form-group">
	<label>{$__label}{if $___can_entry}{'<span class="required"> *</span>'|iif:($___required|is:'required')}{/if}</label>
	<input class="form-control" type="{$__type|default:'text'}" {$__step} {$___name|iif:$___can_entry:$___readonly} placeholder="{$__label}" value="{$prev_data.$__field|default:$__default:''}" id="{$__field}">
</div>