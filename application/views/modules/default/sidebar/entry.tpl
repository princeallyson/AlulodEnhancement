{extends 'templates/default/form/entry/entry.tpl'}

{$id 						= $prev_data.id|default:false}

{$ctrl_route				= $ctrl_route|default:''|route_by_url}

{$form_entry_route 			= $ctrl_route|concat:('.update'|iif:$id:'.store')|iif:$ctrl_route}}
{$form_entry_action 		= $form_entry_route|route}
{$can_entry					= $form_entry_route|is_user_route}

{$form_delete_route 		= $ctrl_route|concat:'.delete'}
{$form_delete_action 		= $form_delete_route|route}
{$can_delete				= $form_delete_route|is_user_route}

{$can_activate 				= 'activate-sidebar'|is_user_permission}

{$card_title 				= ('Update'|iif:$can_entry:'View')|iif:$id:'New'|concat:' Menu'}

{$button_text 				= 'Update'|iif:$id:'Save'}
{$button_swal_positive_text = 'swal-positive-text="Yes, '|concat:('update'|iif:$id:'save')|concat:' it!"'}
{$button_swal_title 		= 'swal-title="Update Menu?"'|iif:$id}
{$button_swal_text 			= ''|iif:$id:'swal-text="Save Menu?"'}

{$delete_button_swal_title 	= 'swal-title="Delete Menu?"'}

{block name='form_fields'}
<div class="form-group row">
	<div class="col-md-6">
		<label>Name <span class="required">*</span></label>
		<input class="form-control" type="text" {'name="name" required'|iif:$can_entry:'readonly'} placeholder="Name" value="{$prev_data.name|default:''}">
	</div>

	<div class="col-md-6">
		<label>Display Name <span class="required">*</span></label>
		<input class="form-control" type="text" {'name="display_name" required'|iif:$can_entry:'readonly'} placeholder="Display Name" value="{$prev_data.display_name|default:''}">
	</div>
</div>

<div class="form-group">
	<label>Parent</label>
	{if $can_entry}
	<select class="form-control bs-select2" name="parent_id">
		{html_select_options options=$menus|default:false selected=$prev_data.parent_id|default:false}
	</select>
	{else}
	<input class="form-control" type="text" readonly placeholder="Route" value="{$menus|default:[]|html_selected_option_text:($prev_data.parent_id|default:false)}">
	{/if}
</div>

<div class="form-group">
	<label>Route</label>
	{if $can_entry}
	<select class="form-control bs-select2" name="route_id">
		{html_select_options options=$routes|default:false selected=$prev_data.route_id|default:false}
	</select>
	{else}
	<input class="form-control" type="text" readonly placeholder="Route" value="{$routes|default:[]|html_selected_option_text:($prev_data.route_id|default:false)}">
	{/if}
</div>

<div class="form-group row">
	<div class="col-md-6">
		<label>Icon</label>
		<input class="form-control" type="text" {'name="icon"'|iif:$can_entry:'readonly'} placeholder="Icon" value="{$prev_data.icon|default:''}">
	</div>

	<div class="col-md-6">
		<label>Order</label>
		<input class="form-control" type="number" {'name="order"'|iif:$can_entry:'readonly'} placeholder="Order" value="{$prev_data.order|default:''}">
	</div>
</div>

<div class="form-group">
	<label>Description</label>
	<input class="form-control" type="text" {'name="description"'|iif:$can_entry:'readonly'} placeholder="Description" value="{$prev_data.description|default:''}">
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