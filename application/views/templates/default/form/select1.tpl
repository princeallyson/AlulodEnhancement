{$___required = $__required|default:'required'}
{$___readonly = $__readonly|default:'readonly'}
{$___name = "`$__field`"}
{$___name = "name=\"`$___name`\""}
{$___name = "`$___name` `$___required`"}

<div class="form-group">
	<label>{$__label}{if $can_entry}{'<span class="required"> *</span>'|iif:($___required|is:'required')}{/if}</label>
	{if $can_entry}
	{*  *}<select id="{$__field}" class="form-control bs-select2" {$___name|iif:$can_entry:$___readonly}>
		{*  *}{html_select_options options=$__options|default:[] selected=$__selected|default:$prev_data.$__field|default:false}
	{*  *}</select>
	{else}
	<input class="form-control" type="text" readonly placeholder="{$__label}" value="{$__options|default:[]|html_selected_option_text:($prev_data.$__field|default:false)}">
	{/if}
</div>