{extends 'templates/default/master.tpl'}

{block name='before-page-header'}
{/block}

{block name='before-page-footer'}
{/block}

{include 'templates/default/form/entry/entry_captures.tpl'}

{block name='content'}
{block name='top_content'}
{/block}

<div class="card mb-0">
	<div class="card-header header-elements-inline">
		{"h6.card_title"|tag:$card_title}
		{html_block el=".header-elements > .btn-group"}
		{block name='form_top_actions'}
		{$smarty.capture.form_b4_button_save|default:''}
		{* {$smarty.capture.form_button_save} *}
		{/block}
		{/html_block}
	</div>

	<div class="card-body">
		{include 'templates/default/alerts.tpl'}

		{$smarty.capture.form_delete_item}

		{block name='before_form_fields'}
		{/block}	

		{$smarty.capture.form_entry_start}

		{block name='form_fields'}
		{/block}

		{block name='after_form_fields'}
		{/block}

		{$smarty.capture.form_bottom_actions}

		{$form_entry_end|default:''}

		{block name='card_footer'}
		{/block}
	</div>
</div>

{block name='bottom_content'}
{/block}
{/block}