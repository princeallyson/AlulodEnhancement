{extends 'templates/default/master.tpl'}

{block name='before-page-header'}
{/block}

{block name='before-page-footer'}
{/block}

{$ctrl_route 		= $ctrl_route|default:''|route_by_url}
{$form_route 		= $ctrl_route|concat:'.sort-update'}
{$form_action 		= $form_route|route}
{$can_entry			= $form_route|is_user_route}
{$new_item_route 	= $ctrl_route|concat:'.new'}
{$new_item_action 	= $new_item_route|route}
{$can_add 			= $new_item_route|is_user_route}

{if $can_entry}

{capture name='form_button_save'}
<button type="button" class="btn btn-primary btn-sm form-submit" target="#form-entry" swal-positive-text="Yes, update it!" swal-title="{$button_swal_title}">
	Update
</button>
{/capture}

{capture name='form_entry_start'}
<form action="{$form_action}" method="post" id="form-entry">
{csrf}
<input type="hidden" name="menus">
<input type="hidden" name="_method" value="patch">
{/capture}

{capture name='form_entry_end'}
</form>
{/capture}

{/if}

{block name='content'}
<div class="card mb-0">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">{$card_title}</h5>
		{html_block el='.header-elements > .btn-group'}
			{if $can_add}
				<button type="button" class="btn btn-success btn-sm" data-redirect="{$new_item_action}">{$button_add_text}</button>
			{/if}

			{$smarty.capture.form_button_save}
		{/html_block}
	</div>

	<div class="card-body">
		{include 'templates/default/alerts.tpl'}
		
		{$nestable|default:''}
		
		{$smarty.capture.form_entry_start}	

		{if $can_entry}
		<div class="text-right mt-3">
			{$smarty.capture.form_button_save}
		</div>
		{/if}
			
		{$smarty.capture.form_entry_end}
	</div>
</div>
{/block}

{block name='custom_styles'}
<style>
{if !$can_entry}
.dd-handle {
    pointer-events: none;
}
{/if}	
</style>
{/block}

{assign var='__assets' value=['nestable', 'ajax_form_submit']}

{block name='custom_scripts'}
<script>
	$(() => {
		$('.form-submit').formSubmit();

		$('#menus').nestable({
            maxDepth: 5,
            group: 1
        });

        function set() {
        	var items = JSON.stringify($('#menus').nestable('serialize'));
            
            $('input[name="menus"]').val(items);
        }

        $('#menus').on('change', () => {
            set();
        });

        set();
	});
</script>
{/block}