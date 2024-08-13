{extends 'templates/default/form/entry/entry.tpl'}

{$id 						= $prev_data.id|default:false}

{$ctrl_route				= $ctrl_route|default:''|route_by_url}

{$form_entry_route 			= $ctrl_route|concat:('.update'|iif:$id:'.store')|iif:$ctrl_route}}
{$form_entry_action 		= $form_entry_route|route}
{$can_entry					= $form_entry_route|is_user_route}

{$form_delete_route 		= $ctrl_route|concat:'.delete'}
{$form_delete_action 		= $form_delete_route|route}
{$can_delete				= $form_delete_route|is_user_route}

{$can_activate 				= 'activate-tag'|is_user_permission}

{$card_title 				= ('Update'|iif:$can_entry:'View')|iif:$id:'New'|concat:' Tag'}

{$button_text 				= 'Update'|iif:$id:'Save'}
{$button_swal_positive_text = 'swal-positive-text="Yes, '|concat:('update'|iif:$id:'save')|concat:' it!"'}
{$button_swal_title 		= 'swal-title="Update Tag?"'|iif:$id}
{$button_swal_text 			= ''|iif:$id:'swal-text="Save Tag?"'}

{$delete_button_swal_title 	= 'swal-title="Delete Tag?"'}

{block name='form_fields'}
<div class="form-group">
	<label>Tag <span class="required">*</span></label>
	<input class="form-control" type="text" {'name="tag" required'|iif:$can_entry:'readonly'} placeholder="Tag" value="{$prev_data.tag|default:''}">
</div>

<div class="form-group">
	<label>Description</label>
	<input class="form-control" type="text" {'name="description"'|iif:$can_entry:'readonly'} placeholder="Description" value="{$prev_data.description|default:''}">
</div>

{$smarty.capture.form_activate_item}
{/block}

{assign var='__assets' value=['ajax_form_submit']}

{block name='custom_scripts'}
<script>
	$(() => {
		$('.form-submit').formSubmit();
	});
</script>
{/block}