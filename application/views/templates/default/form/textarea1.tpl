{$___can_entry = $__can_entry|default:$can_entry}
{$___required = $__required|default:'required'}
{$___readonly = $__readonly|default:'readonly'}
{$___name = "`$__field`"}
{$___name = "name=\"`$___name`\""}
{$___name = "`$___name` `$___required`"}
<div class="form-group">
	<label>{$__label}{if $___can_entry}{'<span class="required"> *</span>'|iif:($___required|is:'required')}{/if}{$__label_end_html|default:''}</label>
	<textarea id="{$__field}" class="form-control" {$___name|iif:$___can_entry:$___readonly} placeholder="{$__label}" rows=5 cols=5>{$prev_data.$__field|default:''|nltobr}</textarea>
</div>