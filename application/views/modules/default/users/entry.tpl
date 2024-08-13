{extends 'templates/default/form/entry/entry.tpl'}

{$id 						= $prev_data.id|default:false}

{$ctrl_route				= $ctrl_route|default:''|route_by_url}

{$form_entry_route 			= $ctrl_route|concat:('.update'|iif:$id:'.store')|iif:$ctrl_route}}
{$form_entry_action 		= $form_entry_route|route}
{$can_entry					= $form_entry_route|is_user_route}

{$form_delete_route 		= $ctrl_route|concat:'.delete'}
{$form_delete_action 		= $form_delete_route|route}
{$can_delete				= $form_delete_route|is_user_route}

{$reset_route				= $ctrl_route|concat:('.reset-password')|iif:$ctrl_route}
{$reset_action				= $reset_route|route}

{$can_activate 				= 'activate-user'|is_user_permission}
{$can_reset_password 		= ('reset-user-password'|is_user_permission and $reset_route|is_user_route)}

{$card_title 				= ('Update'|iif:$can_entry:'View')|iif:$id:'New'|concat:' User'}

{$button_text 				= 'Update'|iif:$id:'Save'}
{$button_swal_positive_text = 'swal-positive-text="Yes, '|concat:('update'|iif:$id:'save')|concat:' it!"'}
{$button_swal_title 		= 'swal-title="Update User?"'|iif:$id}
{$button_swal_text 			= ''|iif:$id:'swal-text="Save User?"'}

{$delete_button_swal_title 	= 'swal-title="Delete User?"'}

{$change_user_roles			= 'change-user-roles'|is_user_permission}

{if $id and $change_user_roles}
{capture name='user_tab_start'}
<ul class="nav nav-tabs nav-tabs-highlight">
	<li class="nav-item">
		<a href="#tab-information" class="nav-link {'active'|iif:!($smarty.get.t|default:''|in_array:['tab-roles'])}" data-toggle="tab">
			Information
		</a>
	</li>
	{if $change_user_roles}
	<li class="nav-item">
		<a href="#tab-roles" class="nav-link {'active'|iif:($smarty.get.t|default:''|is:'tab-roles')}" data-toggle="tab">
			Roles
		</a>
	</li>
	{/if}
</ul>
<div class="tab-content">
	<div class="tab-pane fade {'show active'|iif:!($smarty.get.t|default:''|in_array:['tab-roles'])}" id="tab-information">
{/capture}

{capture name='user_tab_end'}
	</div>
	{if $change_user_roles}
	<div class="tab-pane fade {'show active'|iif:($smarty.get.t|default:''|is:'tab-roles')}" id="tab-roles">
		<div class="form-group">
			<select class="select-user-roles" multiple="multiple">
				{html_select_options options=$user_roles|default:false}
			</select>
			{'input#user_roles[type=hidden][name=user_roles]'|tag|iif:$can_entry}
		</div>
	</div>
	{/if}
{/capture}
{/if}

{if $id and $can_reset_password}
{capture name='form_reset_password'}
<form action="{$reset_action}" method="post" id="form-reset-password">
	{csrf}
	<input type="hidden" name="id" value="{$id}">
	<input type="hidden" name="_method" value="patch">
</form>
{/capture}

{capture name='reset_password'}
<button type="button" class="btn btn-success btn-sm form-submit" target="#form-reset-password" swal-title="Reset user password?" swal-positive-text="Yes, reset it!">Reset Password</button>
{/capture}
{/if}

{block name='form_top_actions'}
{$smarty.capture.reset_password}
{$smarty.capture.form_button_save}
{/block}

{block name='before_form_fields'}
{$smarty.capture.form_reset_password}
{/block}

{block name='form_fields'}
{$smarty.capture.user_tab_start}

<div class="form-group row">
	<div class="col-md-6">
		<label>First name <span class="required">*</span></label>
		<input class="form-control" type="text" {'name="rel_user_extension[first_name]" required'|iif:$can_entry:'readonly'} placeholder="First name" value="{$prev_data.rel_user_extension.first_name|default:''}">
	</div>
	<div class="col-md-6">
		<label>Last name <span class="required">*</span></label>
		<input class="form-control" type="text" {'name="rel_user_extension[last_name]" required'|iif:$can_entry:'readonly'} placeholder="Last name" value="{$prev_data.rel_user_extension.last_name|default:''}">
	</div>
</div>

<div class="form-group">
	<label>Username <span class="required">*</span></label>
	<input class="form-control" type="text" {'name="username" required'|iif:$can_entry:'readonly'} placeholder="Username" value="{$prev_data.username|default:''}">
</div>

{$smarty.capture.form_activate_item}

{$smarty.capture.user_tab_end}
{/block}

{assign var='__assets' value=['duallistbox', 'ajax_form_submit']}

{block name='custom_scripts'}
<script>
	$(() => {
		$('.form-submit').formSubmit();

		{if $id}

    	$('.select-user-roles').bootstrapDualListbox({
			selectorMinimalHeight: 300,
			preserveSelectionOnMove: 'moved',
			moveOnSelect: false
		});

		$('.select-user-roles').on('change', function () {
			$('#user_roles').val(JSON.stringify($(this).val()));
		});

		$('#user_roles').val(JSON.stringify($('.select-user-roles').val()));

		{if !$can_entry}
        	$('.bootstrap-duallistbox-container .btn-group button').prop('disabled', true);
        	$('.bootstrap-duallistbox-container select').prop('disabled', true);
        {/if}

		$(document).on('click', '.nav-tabs a[data-toggle="tab"]', function () {
			bsTabName($(this));
		});

		bsTabName($('.nav-tabs a[data-toggle="tab"].active'));

		var url = document.location.toString();
		
		if (url.match('#')) {
			if ($('.nav-tabs a[href="#'+url.split('#')[1]+'"]').length) $('.nav-tabs a[href="#'+url.split('#')[1]+'"]').tab('show');
		}
        
        {/if}
	});
</script>
{/block}