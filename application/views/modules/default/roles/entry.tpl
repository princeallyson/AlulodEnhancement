{extends 'templates/default/form/entry/entry.tpl'}

{$id 						= $prev_data.id|default:false}

{$ctrl_route				= $ctrl_route|default:''|route_by_url}

{$form_entry_route 			= $ctrl_route|concat:('.update'|iif:$id:'.store')|iif:$ctrl_route}}
{$form_entry_action 		= $form_entry_route|route}
{$can_entry					= $form_entry_route|is_user_route}

{$form_delete_route 		= $ctrl_route|concat:'.delete'}
{$form_delete_action 		= $form_delete_route|route}
{$can_delete				= $form_delete_route|is_user_route}

{$can_activate 				= 'activate-role'|is_user_permission}

{$card_title 				= ('Update'|iif:$can_entry:'View')|iif:$id:'New'|concat:' Role'}

{$button_text 				= 'Update'|iif:$id:'Save'}
{$button_swal_positive_text = 'swal-positive-text="Yes, '|concat:('update'|iif:$id:'save')|concat:' it!"'}
{$button_swal_title 		= 'swal-title="Update Role?"'|iif:$id}
{$button_swal_text 			= ''|iif:$id:'swal-text="Save Role?"'}

{$delete_button_swal_title 	= 'swal-title="Delete Role?"'}

{$change_role_routes		= 'change-role-routes'|is_user_permission}
{$change_role_permissions	= 'change-role-permissions'|is_user_permission}

{if $id and ($change_role_routes or $change_role_permissions)}
{capture name='routes_and_permissions_tab_start'}
<ul class="nav nav-tabs nav-tabs-highlight">
	<li class="nav-item">
		<a href="#tab-information" class="nav-link {'active'|iif:!($smarty.get.t|default:''|in_array:['tab-roles', 'tab-permissions'])}" data-toggle="tab">
			Information
		</a>
	</li>
	{if $change_role_routes}
	<li class="nav-item">
		<a href="#tab-roles" class="nav-link {'active'|iif:($smarty.get.t|default:''|is:'tab-roles')}" data-toggle="tab">
			Routes
		</a>
	</li>
	{/if}
	{if $change_role_permissions}
	<li class="nav-item">
		<a href="#tab-permissions" class="nav-link {'active'|iif:($smarty.get.t|default:''|is:'tab-permissions')}" data-toggle="tab">
			Permissions
		</a>
	</li>
	{/if}
</ul>
<div class="tab-content">
	<div class="tab-pane fade {'show active'|iif:!($smarty.get.t|default:''|in_array:['tab-roles', 'tab-permissions'])}" id="tab-information">
{/capture}

{capture name='routes_and_permissions_tab_end'}
	</div>
	{if $change_role_routes}
	<div class="tab-pane fade {'show active'|iif:($smarty.get.t|default:''|is:'tab-roles')}" id="tab-roles">
		<div class="form-group">
			<select class="select-role-routes" multiple="multiple">
				{html_select_options options=$role_routes|default:false}
			</select>
			{'input#role_routes[type=hidden][name=role_routes]'|tag|iif:$can_entry}
		</div>
	</div>
	{/if}
	{if $change_role_permissions}
	<div class="tab-pane fade {'show active'|iif:($smarty.get.t|default:''|is:'tab-permissions')}" id="tab-permissions">
		<div class="form-group">
			<select class="select-role-permissions" multiple="multiple">
				{html_select_options options=$role_permissions|default:false}
			</select>
			{'input#role_permissions[type=hidden][name=role_permissions]'|tag|iif:$can_entry}
		</div>
	</div>
	{/if}
{/capture}
{/if}

{block name='form_fields'}
{$smarty.capture.routes_and_permissions_tab_start}

<div class="form-group">
	<label>Role <span class="required">*</span></label>
	<input class="form-control" type="text" {'name="role" required'|iif:$can_entry:'readonly'} placeholder="Role" value="{$prev_data.role|default:''}">
</div>

<div class="form-group">
	<label>Description</label>
	<input class="form-control" type="text" {'name="description"'|iif:$can_entry:'readonly'} placeholder="Description" value="{$prev_data.description|default:''}">
</div>

{$smarty.capture.form_activate_item}

{$smarty.capture.routes_and_permissions_tab_end}
{/block}

{assign var='__assets' value=['duallistbox', 'ajax_form_submit']}

{block name='custom_scripts'}
<script>
	$(() => {
		$('.form-submit').formSubmit();

		{if $id}

    	$('.select-role-routes').bootstrapDualListbox({
            selectorMinimalHeight: 650,
            preserveSelectionOnMove: 'moved',
        	moveOnSelect: false
        });

        $('.select-role-routes').on('change', function ()
        {
        	$('#role_routes').val(JSON.stringify($(this).val()));
        });

        $('#role_routes').val(JSON.stringify($('.select-role-routes').val()));

        //==============================================================
        
        $('.select-role-permissions').bootstrapDualListbox({
            selectorMinimalHeight: 650,
            preserveSelectionOnMove: 'moved',
        	moveOnSelect: false
        });

        $('.select-role-permissions').on('change', function ()
        {
        	$('#role_permissions').val(JSON.stringify($(this).val()));
        });

        $('#role_permissions').val(JSON.stringify($('.select-role-permissions').val()));

        {if !$can_entry}
        	$('.bootstrap-duallistbox-container .btn-group button').prop('disabled', true);
        	$('.bootstrap-duallistbox-container select').prop('disabled', true);
        {/if}

        $(document).on('click', '.nav-tabs a[data-toggle="tab"]', function ()
        {
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




