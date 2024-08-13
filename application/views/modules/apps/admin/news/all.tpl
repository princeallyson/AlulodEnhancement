{extends 'templates/default/table/table.tpl'}

{$ctrl_route = $ctrl_route|default:''|route_by_url}
{$new_item_route = $ctrl_route|concat:'.new'}
{$new_item_action = $new_item_route|route}
{$can_add = $new_item_route|is_user_route}
{$card_title = 'News'}
{$button_add_text = 'Add News'}
{$dt_save_state = 'true'}