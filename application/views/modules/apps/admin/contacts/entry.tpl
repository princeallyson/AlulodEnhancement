{extends 'templates/default/form/entry/entry.tpl'}

{$id 						= $prev_data.id|default:false}

{$ctrl_route				= $ctrl_route|default:''|route_by_url}

{$form_entry_route 			= $ctrl_route|concat:('.update'|iif:$id:'.store')|iif:$ctrl_route}}
{$form_entry_action 		= $form_entry_route|route}
{$can_entry					= $form_entry_route|is_user_route}

{$form_delete_route 		= $ctrl_route|concat:'.delete'}
{$form_delete_action 		= $form_delete_route|route}
{$can_delete				= $form_delete_route|is_user_route}

{$can_activate 				= 'activate-contact'|is_user_permission}

{$card_title 				= ('Update'|iif:$can_entry:'View')|iif:$id:'New'|concat:' Contact'}

{$button_text 				= 'Update'|iif:$id:'Save'}
{$button_swal_positive_text = 'swal-positive-text="Yes, '|concat:('update'|iif:$id:'save')|concat:' it!"'}
{$button_swal_title 		= 'swal-title="Update Contact?"'|iif:$id}
{$button_swal_text 			= ''|iif:$id:'swal-text="Save Contact?"'}

{$delete_button_swal_title 	= 'swal-title="Delete Contact?"'}

{block name='form_fields'}
{form_input enabled=true field='first_name' value=$prev_data.first_name|default:''}

{form_input enabled=true field='last_name' value=$prev_data.last_name|default:''}

{form_input enabled=true field='mobile' value=$prev_data.mobile|default:''}

{form_select enabled=true field='tags' options=$tags|default:[] attr=['multiple', 'name' => 'tags[]']}

{$smarty.capture.form_activate_item}
{/block}

{assign var='__assets' value=['ajax_form_submit', 'select2']}

{block name='custom_scripts'}
<script>
	$(() => {
		$('.form-submit').formSubmit();

		$('select[name="tags[]"]').select2();
	});
</script>
{/block}