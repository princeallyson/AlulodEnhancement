{extends 'templates/default/form/entry/entry.tpl'}

{$id 						= $prev_data.id|default:false}

{$ctrl_route				= $ctrl_route|default:''|route_by_url}

{$form_entry_route 			= $ctrl_route|concat:('.update'|iif:$id:'.store')|iif:$ctrl_route}}
{$form_entry_action 		= $form_entry_route|route}
{$can_entry					= $form_entry_route|is_user_route}

{$form_delete_route 		= $ctrl_route|concat:'.delete'}
{$form_delete_action 		= $form_delete_route|route}
{$can_delete				= $form_delete_route|is_user_route}

{$can_activate 				= 'activate-route'|is_user_permission}

{$card_title 				= ('Update'|iif:$can_entry:'View')|iif:$id:'New'|concat:' Route'}

{$button_text 				= 'Update'|iif:$id:'Save'}
{$button_swal_positive_text = 'swal-positive-text="Yes, '|concat:('update'|iif:$id:'save')|concat:' it!"'}
{$button_swal_title 		= 'swal-title="Update Route?"'|iif:$id}
{$button_swal_text 			= ''|iif:$id:'swal-text="Save Route?"'}

{$delete_button_swal_title 	= 'swal-title="Delete Route?"'}

{block name='form_fields'}
<div class="form-group">
	<label>Route <span class="required">*</span></label>
	<input class="form-control" type="text" {'name="route" required'|iif:$can_entry:'readonly'} placeholder="Route" value="{$prev_data.route|default:''}">
</div>

<div class="form-group">
	<label>Function</label>
	<input class="form-control" type="text" {'name="function"'|iif:$can_entry:'readonly'} placeholder="Function" value="{$prev_data.function|default:''}">
</div>

<div class="form-group">
	<label>Active Sidebar Route</label>
	{if $can_entry}
	<select class="form-control bs-select2" name="active_sidebar_route_id">
		{html_select_options options=$routes|default:false selected=$prev_data.active_sidebar_route_id|default:false}
	</select>
	{else}
	<input class="form-control" type="text" readonly placeholder="Active Sidebar Route" value="{$routes|default:[]|html_selected_option_text:($prev_data.active_sidebar_route_id|default:false)}">
	{/if}
</div>

<div class="form-group">
	<label>Description</label>
	<input class="form-control" type="text" {'name="description"'|iif:$can_entry:'readonly'} placeholder="Description" value="{$prev_data.description|default:''}">
</div>

<div class="form-group">
    <div class="custom-control custom-control-right custom-switch custom-control-inline">
        <input type="checkbox" class=" custom-control-input" id="public" {'name="public"'|iif:$can_entry:'disabled'} {'checked'|iif:$prev_data.public|default:false}>
        <label class="custom-control-label" for="public">Public</label>
    </div>
</div>

{$smarty.capture.form_activate_item}
{/block}

{assign var='__assets' value=['select2', 'ajax_form_submit']}

{block name='custom_scripts'}
<script>
	$(() => {
		$('.form-submit').formSubmit();
		$('.bs-select2').select2();
	});
</script>
{/block}