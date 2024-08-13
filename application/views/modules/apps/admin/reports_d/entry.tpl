{extends 'templates/default/form/entry/entry.tpl'}

{$id 						= $prev_data.id|default:false}

{$ctrl_route				= $ctrl_route|default:''|route_by_url}

{$form_entry_route 			= $ctrl_route|concat:('.update'|iif:$id:'.store')|iif:$ctrl_route}}
{$form_entry_action 		= $form_entry_route|route}
{$can_entry					= $form_entry_route|is_user_route}

{$form_delete_route 		= $ctrl_route|concat:'.delete'}
{$form_delete_action 		= $form_delete_route|route}
{$can_delete				= $form_delete_route|is_user_route}

{$can_activate 				= 'activate-report-item'|is_user_permission}

{$card_title 				= ('Update'|iif:$can_entry:'View')|iif:$id:'New'|concat:' Report Item'}

{$button_text 				= 'Update'|iif:$id:'Save'}
{$button_swal_positive_text = 'swal-positive-text="Yes, '|concat:('update'|iif:$id:'save')|concat:' it!"'}
{$button_swal_title 		= 'swal-title="Update Report Item?"'|iif:$id}
{$button_swal_text 			= ''|iif:$id:'swal-text="Save Report Item?"'}

{$delete_button_swal_title 	= 'swal-title="Delete Report Item?"'}

{block name='form_fields'}
{form_select enabled=true field='hid|Report' options=$reports|default:[] value=$prev_data.hid|default:false}

{form_input enabled=true field='name' value=$prev_data.name|default:''}

{form_input enabled=true field='value' value=$prev_data.value|default:'' type='number' step='0.01'}

{$smarty.capture.form_activate_item}
{/block}

{assign var='__assets' value=['ajax_form_submit', 'select2']}

{block name='custom_scripts'}
<script>
	$(() => {
		$('.form-submit').formSubmit();

		$('select[name="hid"]').select2();
	});
</script>
{/block}