{if $success_message|default:false}
<div class="alert alert-success border-0 alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
	{$success_message}
</div>
{/if}
{if $error_message|default:false}
<div class="alert alert-danger border-0 alert-dismissible {if $success_message|default:false}mt-2{/if}">
	<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
	{$error_message}
</div>
{/if}
{if $info_message|default:false}
<div class="alert alert-info border-0 alert-dismissible {if $info_message|default:false}mt-2{/if}">
	<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
	{$info_message}
</div>
{/if}