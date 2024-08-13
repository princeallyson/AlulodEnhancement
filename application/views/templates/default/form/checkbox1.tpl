{$___required = 'required'|iif:($__required|default:null|is_null):''}
{$___readonly = $__readonly|default:'disabled'}
{$___name = "`$__field`"}
{$___name = "name=\"`$___name`\""}
{$___name = "`$___name` `$___required`"}
<div class="form-group">
    <div class="custom-control custom-control-right custom-switch custom-control-inline">
        <input type="checkbox" class=" custom-control-input" id="{$__field}" {$___name|iif:$can_entry:$___readonly} {'checked'|iif:$prev_data.$__field|default:false}>
        <label class="custom-control-label" for="{$__field}">{$__label}</label>
    </div>
</div>