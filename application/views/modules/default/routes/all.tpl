{extends 'templates/default/table/table.tpl'}

{$ctrl_route = $ctrl_route|default:''|route_by_url}
{$new_item_route = $ctrl_route|concat:'.new'}
{$new_item_action = $new_item_route|route}
{$can_add = $new_item_route|is_user_route}
{$card_title = 'Routes'}
{$button_add_text = 'Add Route'}
{$dt_save_state = 'true'}

{if 'sync-route-config'|is_user_permission}
{block name='table_top_buttons'}
<button type="button" class="btn btn-teal btn-sm" data-redirect="{$ctrl_route|concat:'/sync/config'|base_url}">
	Sync routes
</button>
{/block}
{/if}