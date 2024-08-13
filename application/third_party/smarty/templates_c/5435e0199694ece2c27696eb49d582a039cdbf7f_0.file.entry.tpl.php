<?php
/* Smarty version 3.1.39, created on 2022-07-06 18:54:51
  from 'C:\wamp64\www\apps\pet-adoption\application\views\modules\default\roles\entry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c569fb393d11_98068911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5435e0199694ece2c27696eb49d582a039cdbf7f' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\modules\\default\\roles\\entry.tpl',
      1 => 1652160919,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c569fb393d11_98068911 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.iif.php','function'=>'smarty_modifier_iif',),2=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.concat.php','function'=>'smarty_modifier_concat',),3=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),4=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),5=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.is_user_permission.php','function'=>'smarty_modifier_is_user_permission',),6=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.is.php','function'=>'smarty_modifier_is',),7=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\function.html_select_options.php','function'=>'smarty_function_html_select_options',),8=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.tag.php','function'=>'smarty_modifier_tag',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_assignInScope('id', (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['id'])===null||$tmp==='' ? false : $tmp));?>

<?php $_smarty_tpl->_assignInScope('ctrl_route', smarty_modifier_route_by_url((($tmp = @$_smarty_tpl->tpl_vars['ctrl_route']->value)===null||$tmp==='' ? '' : $tmp)));?>

<?php $_smarty_tpl->_assignInScope('form_entry_route', smarty_modifier_iif(smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,(smarty_modifier_iif('.update',$_smarty_tpl->tpl_vars['id']->value,'.store'))),$_smarty_tpl->tpl_vars['ctrl_route']->value));?>}
<?php $_smarty_tpl->_assignInScope('form_entry_action', smarty_modifier_route($_smarty_tpl->tpl_vars['form_entry_route']->value));
$_smarty_tpl->_assignInScope('can_entry', smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['form_entry_route']->value));?>

<?php $_smarty_tpl->_assignInScope('form_delete_route', smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,'.delete'));
$_smarty_tpl->_assignInScope('form_delete_action', smarty_modifier_route($_smarty_tpl->tpl_vars['form_delete_route']->value));
$_smarty_tpl->_assignInScope('can_delete', smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['form_delete_route']->value));?>

<?php $_smarty_tpl->_assignInScope('can_activate', smarty_modifier_is_user_permission('activate-role'));?>

<?php $_smarty_tpl->_assignInScope('card_title', smarty_modifier_concat(smarty_modifier_iif((smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['can_entry']->value,'View')),$_smarty_tpl->tpl_vars['id']->value,'New'),' Role'));?>

<?php $_smarty_tpl->_assignInScope('button_text', smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['id']->value,'Save'));
$_smarty_tpl->_assignInScope('button_swal_positive_text', smarty_modifier_concat(smarty_modifier_concat('swal-positive-text="Yes, ',(smarty_modifier_iif('update',$_smarty_tpl->tpl_vars['id']->value,'save'))),' it!"'));
$_smarty_tpl->_assignInScope('button_swal_title', smarty_modifier_iif('swal-title="Update Role?"',$_smarty_tpl->tpl_vars['id']->value));
$_smarty_tpl->_assignInScope('button_swal_text', smarty_modifier_iif('',$_smarty_tpl->tpl_vars['id']->value,'swal-text="Save Role?"'));?>

<?php $_smarty_tpl->_assignInScope('delete_button_swal_title', 'swal-title="Delete Role?"');?>

<?php $_smarty_tpl->_assignInScope('change_role_routes', smarty_modifier_is_user_permission('change-role-routes'));
$_smarty_tpl->_assignInScope('change_role_permissions', smarty_modifier_is_user_permission('change-role-permissions'));?>

<?php if ($_smarty_tpl->tpl_vars['id']->value && ($_smarty_tpl->tpl_vars['change_role_routes']->value || $_smarty_tpl->tpl_vars['change_role_permissions']->value)) {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'routes_and_permissions_tab_start', null, null);?>
<ul class="nav nav-tabs nav-tabs-highlight">
	<li class="nav-item">
		<a href="#tab-information" class="nav-link <?php echo smarty_modifier_iif('active',!(in_array((($tmp = @$_GET['t'])===null||$tmp==='' ? '' : $tmp),array('tab-roles','tab-permissions'))));?>
" data-toggle="tab">
			Information
		</a>
	</li>
	<?php if ($_smarty_tpl->tpl_vars['change_role_routes']->value) {?>
	<li class="nav-item">
		<a href="#tab-roles" class="nav-link <?php echo smarty_modifier_iif('active',(smarty_modifier_is((($tmp = @$_GET['t'])===null||$tmp==='' ? '' : $tmp),'tab-roles')));?>
" data-toggle="tab">
			Routes
		</a>
	</li>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['change_role_permissions']->value) {?>
	<li class="nav-item">
		<a href="#tab-permissions" class="nav-link <?php echo smarty_modifier_iif('active',(smarty_modifier_is((($tmp = @$_GET['t'])===null||$tmp==='' ? '' : $tmp),'tab-permissions')));?>
" data-toggle="tab">
			Permissions
		</a>
	</li>
	<?php }?>
</ul>
<div class="tab-content">
	<div class="tab-pane fade <?php echo smarty_modifier_iif('show active',!(in_array((($tmp = @$_GET['t'])===null||$tmp==='' ? '' : $tmp),array('tab-roles','tab-permissions'))));?>
" id="tab-information">
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'routes_and_permissions_tab_end', null, null);?>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['change_role_routes']->value) {?>
	<div class="tab-pane fade <?php echo smarty_modifier_iif('show active',(smarty_modifier_is((($tmp = @$_GET['t'])===null||$tmp==='' ? '' : $tmp),'tab-roles')));?>
" id="tab-roles">
		<div class="form-group">
			<select class="select-role-routes" multiple="multiple">
				<?php echo smarty_function_html_select_options(array('options'=>(($tmp = @$_smarty_tpl->tpl_vars['role_routes']->value)===null||$tmp==='' ? false : $tmp)),$_smarty_tpl);?>

			</select>
			<?php echo smarty_modifier_iif(smarty_modifier_tag('input#role_routes[type=hidden][name=role_routes]'),$_smarty_tpl->tpl_vars['can_entry']->value);?>

		</div>
	</div>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['change_role_permissions']->value) {?>
	<div class="tab-pane fade <?php echo smarty_modifier_iif('show active',(smarty_modifier_is((($tmp = @$_GET['t'])===null||$tmp==='' ? '' : $tmp),'tab-permissions')));?>
" id="tab-permissions">
		<div class="form-group">
			<select class="select-role-permissions" multiple="multiple">
				<?php echo smarty_function_html_select_options(array('options'=>(($tmp = @$_smarty_tpl->tpl_vars['role_permissions']->value)===null||$tmp==='' ? false : $tmp)),$_smarty_tpl);?>

			</select>
			<?php echo smarty_modifier_iif(smarty_modifier_tag('input#role_permissions[type=hidden][name=role_permissions]'),$_smarty_tpl->tpl_vars['can_entry']->value);?>

		</div>
	</div>
	<?php }
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
}?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_137717638262c569fb37ad74_17261870', 'form_fields');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('duallistbox','ajax_form_submit'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_75634293662c569fb38b251_97940226', 'custom_scripts');
?>





<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/form/entry/entry.tpl');
}
/* {block 'form_fields'} */
class Block_137717638262c569fb37ad74_17261870 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_fields' => 
  array (
    0 => 'Block_137717638262c569fb37ad74_17261870',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.iif.php','function'=>'smarty_modifier_iif',),));
?>

<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'routes_and_permissions_tab_start');?>


<div class="form-group">
	<label>Role <span class="required">*</span></label>
	<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="role" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Role" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['role'])===null||$tmp==='' ? '' : $tmp);?>
">
</div>

<div class="form-group">
	<label>Description</label>
	<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="description"',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Description" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['description'])===null||$tmp==='' ? '' : $tmp);?>
">
</div>

<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_activate_item');?>


<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'routes_and_permissions_tab_end');?>

<?php
}
}
/* {/block 'form_fields'} */
/* {block 'custom_scripts'} */
class Block_75634293662c569fb38b251_97940226 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_75634293662c569fb38b251_97940226',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('.form-submit').formSubmit();

		<?php if ($_smarty_tpl->tpl_vars['id']->value) {?>

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

        <?php if (!$_smarty_tpl->tpl_vars['can_entry']->value) {?>
        	$('.bootstrap-duallistbox-container .btn-group button').prop('disabled', true);
        	$('.bootstrap-duallistbox-container select').prop('disabled', true);
        <?php }?>

        $(document).on('click', '.nav-tabs a[data-toggle="tab"]', function ()
        {
        	bsTabName($(this));
        });

        bsTabName($('.nav-tabs a[data-toggle="tab"].active'));

        var url = document.location.toString();
		
		if (url.match('#')) {
			if ($('.nav-tabs a[href="#'+url.split('#')[1]+'"]').length) $('.nav-tabs a[href="#'+url.split('#')[1]+'"]').tab('show');
		} 
        
        <?php }?>
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
