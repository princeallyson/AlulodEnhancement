{if $can_entry}
	{capture name='form_button_save'}
		<button type="button" class="btn btn-primary btn-sm form-submit save-item" target="#form-entry" 
		{$button_swal_positive_text} 
		{$button_swal_title|default:''} 
		{$button_swal_text|default:''}>
		{$button_text}
		</button>
	{/capture}

	{if $id}
		{if $can_delete}
			{capture name='form_delete_item'}
				<form method="post" action="{$form_delete_action}" id="form-delete-item">
					{csrf}
					<input type="hidden" name="id" value="{$id}">
					<input type="hidden" name="_method" value="delete">
				</form>
			{/capture}
		{/if}
	{/if}

	{capture name='form_entry_start'}
		<form action="{$form_entry_action}" method="post" id="form-entry" {$form_entry_attr|default:''}>
		{csrf}
		{if $id}
			<input type="hidden" name="id" value="{$id}">
			<input type="hidden" name="_method" value="patch">
		{/if}
	{/capture}
	
	{capture name='form_entry_end'}
		</form>
	{/capture}

	{capture name='form_bottom_actions'}
		{if $can_delete and $id}
			<div class="d-flex justify-content-between mt-4">
				{if $id}
					<button type="button" class="btn btn-danger btn-sm form-submit delete-item" data-loading target="#form-delete-item" {$delete_button_swal_title} swal-positive-text="Yes, delete it!">
						Delete
					</button>
				{/if}
				{$smarty.capture.form_button_save}
			</div>
		{else}
			<div class="text-right mt-4">
				{$smarty.capture.form_button_save}
			</div>
		{/if}
	{/capture}
{/if}

{if $id and $prev_data|default:false|haskey:'active'}
	{capture name='form_activate_item'}
		<div class="form-group {''|iif:($show_active|default:false):'d-none'}">
            <div class="custom-control custom-control-right custom-switch custom-control-inline">
                <input type="checkbox" class=" custom-control-input" id="item-active" {'name="active"'|iif:($can_activate):'disabled'} {'checked'|iif:$prev_data.active|default:false}>
                <label class="custom-control-label" for="item-active">Active</label>
            </div>
		</div>
	{/capture}
{/if}