{extends 'templates/default/master.tpl'}

{block name='before-page-header'}
{/block}

{block name='before-page-footer'}
{/block}

{block name='content'}
<div class="card mb-0">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">{$card_title}</h5>
		<div class="header-elements">
			<div class="btn-group">
				{if $can_add}
					{block name='table_top_buttons'}
					{/block}
					{if $button_add_text}
						<button type="button" class="btn btn-success btn-sm" data-redirect="{$new_item_action}">{$button_add_text}</button>
					{/if}
				{/if}
			</div>
		</div>
	</div>

	{include 'templates/default/alerts.tpl'}
	
	<table class="table dt-table table-xs w-100">
		<thead>
			<tr>{$tableci.html_table_columns}</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
{block name='content_bottom'}
{/block}
{/block}

{block name='custom_styles'}
<style>
div.alert {
	margin-left: 1.25rem;
	margin-right: 1.25rem;
	margin-bottom: 0;
}
</style>
{/block}

{assign var='__assets' value=['datatable']}

{block name='scripts'}
{/block}

{block name='custom_scripts'}
<script>
	$(() => {
		$('.dt-table').initDataTable({
			data: {$dt_data|default:'[]'},
			columns: {$tableci.datatable_columns},
			columnDefs: {$tableci.datatable_column_defs},
			stateSave: {$dt_save_state|default:'false'}
		});
	});
</script>
{block name='custom_scripts_bottom'}
{/block}
{/block}