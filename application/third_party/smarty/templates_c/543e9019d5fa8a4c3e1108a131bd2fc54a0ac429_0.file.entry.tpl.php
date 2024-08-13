<?php
/* Smarty version 3.1.39, created on 2022-10-13 08:52:45
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/default/users/entry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6347615dcd9777_67809294',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '543e9019d5fa8a4c3e1108a131bd2fc54a0ac429' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/default/users/entry.tpl',
      1 => 1664632435,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6347615dcd9777_67809294 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.iif.php','function'=>'smarty_modifier_iif',),2=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.concat.php','function'=>'smarty_modifier_concat',),3=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route.php','function'=>'smarty_modifier_route',),4=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),5=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is_user_permission.php','function'=>'smarty_modifier_is_user_permission',),6=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is.php','function'=>'smarty_modifier_is',),7=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/function.html_select_options.php','function'=>'smarty_function_html_select_options',),8=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.tag.php','function'=>'smarty_modifier_tag',),9=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/function.csrf.php','function'=>'smarty_function_csrf',),));
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

<?php $_smarty_tpl->_assignInScope('reset_route', smarty_modifier_iif(smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,('.reset-password')),$_smarty_tpl->tpl_vars['ctrl_route']->value));
$_smarty_tpl->_assignInScope('reset_action', smarty_modifier_route($_smarty_tpl->tpl_vars['reset_route']->value));?>

<?php $_smarty_tpl->_assignInScope('can_activate', smarty_modifier_is_user_permission('activate-user'));
$_smarty_tpl->_assignInScope('can_reset_password', (smarty_modifier_is_user_permission('reset-user-password') && smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['reset_route']->value)));?>

<?php $_smarty_tpl->_assignInScope('card_title', smarty_modifier_concat(smarty_modifier_iif((smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['can_entry']->value,'View')),$_smarty_tpl->tpl_vars['id']->value,'New'),' User'));?>

<?php $_smarty_tpl->_assignInScope('button_text', smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['id']->value,'Save'));
$_smarty_tpl->_assignInScope('button_swal_positive_text', smarty_modifier_concat(smarty_modifier_concat('swal-positive-text="Yes, ',(smarty_modifier_iif('update',$_smarty_tpl->tpl_vars['id']->value,'save'))),' it!"'));
$_smarty_tpl->_assignInScope('button_swal_title', smarty_modifier_iif('swal-title="Update User?"',$_smarty_tpl->tpl_vars['id']->value));
$_smarty_tpl->_assignInScope('button_swal_text', smarty_modifier_iif('',$_smarty_tpl->tpl_vars['id']->value,'swal-text="Save User?"'));?>

<?php $_smarty_tpl->_assignInScope('delete_button_swal_title', 'swal-title="Delete User?"');?>

<?php $_smarty_tpl->_assignInScope('change_user_roles', smarty_modifier_is_user_permission('change-user-roles'));?>

<?php if ($_smarty_tpl->tpl_vars['id']->value && $_smarty_tpl->tpl_vars['change_user_roles']->value) {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'user_tab_start', null, null);?>
<ul class="nav nav-tabs nav-tabs-highlight">
	<li class="nav-item">
		<a href="#tab-information" class="nav-link <?php echo smarty_modifier_iif('active',!(in_array((($tmp = @$_GET['t'])===null||$tmp==='' ? '' : $tmp),array('tab-roles'))));?>
" data-toggle="tab">
			Information
		</a>
	</li>
	<?php if ($_smarty_tpl->tpl_vars['change_user_roles']->value) {?>
	<li class="nav-item">
		<a href="#tab-roles" class="nav-link <?php echo smarty_modifier_iif('active',(smarty_modifier_is((($tmp = @$_GET['t'])===null||$tmp==='' ? '' : $tmp),'tab-roles')));?>
" data-toggle="tab">
			Roles
		</a>
	</li>
	<?php }?>
</ul>
<div class="tab-content">
	<div class="tab-pane fade <?php echo smarty_modifier_iif('show active',!(in_array((($tmp = @$_GET['t'])===null||$tmp==='' ? '' : $tmp),array('tab-roles'))));?>
" id="tab-information">
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'user_tab_end', null, null);?>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['change_user_roles']->value) {?>
	<div class="tab-pane fade <?php echo smarty_modifier_iif('show active',(smarty_modifier_is((($tmp = @$_GET['t'])===null||$tmp==='' ? '' : $tmp),'tab-roles')));?>
" id="tab-roles">
		<div class="form-group">
			<select class="select-user-roles" multiple="multiple">
				<?php echo smarty_function_html_select_options(array('options'=>(($tmp = @$_smarty_tpl->tpl_vars['user_roles']->value)===null||$tmp==='' ? false : $tmp)),$_smarty_tpl);?>

			</select>
			<?php echo smarty_modifier_iif(smarty_modifier_tag('input#user_roles[type=hidden][name=user_roles]'),$_smarty_tpl->tpl_vars['can_entry']->value);?>

		</div>
	</div>
	<?php }
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
}?>

<?php if ($_smarty_tpl->tpl_vars['id']->value && $_smarty_tpl->tpl_vars['can_reset_password']->value) {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'form_reset_password', null, null);?>
<form action="<?php echo $_smarty_tpl->tpl_vars['reset_action']->value;?>
" method="post" id="form-reset-password">
	<?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
	<input type="hidden" name="_method" value="patch">
</form>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'reset_password', null, null);?>
<button type="button" class="btn btn-success btn-sm form-submit" target="#form-reset-password" swal-title="Reset user password?" swal-positive-text="Yes, reset it!">Reset Password</button>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
}?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6088501516347615dccf010_54667628', 'form_top_actions');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_400517956347615dcd0931_02543250', 'before_form_fields');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12611675716347615dcd1799_42904032', 'form_fields');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('duallistbox','ajax_form_submit'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9029279566347615dcd7893_63288708', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/form/entry/entry.tpl');
}
/* {block 'form_top_actions'} */
class Block_6088501516347615dccf010_54667628 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_top_actions' => 
  array (
    0 => 'Block_6088501516347615dccf010_54667628',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'reset_password');?>

<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_button_save');?>

<?php
}
}
/* {/block 'form_top_actions'} */
/* {block 'before_form_fields'} */
class Block_400517956347615dcd0931_02543250 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before_form_fields' => 
  array (
    0 => 'Block_400517956347615dcd0931_02543250',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_reset_password');?>

<?php
}
}
/* {/block 'before_form_fields'} */
/* {block 'form_fields'} */
class Block_12611675716347615dcd1799_42904032 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_fields' => 
  array (
    0 => 'Block_12611675716347615dcd1799_42904032',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.iif.php','function'=>'smarty_modifier_iif',),));
?>

<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'user_tab_start');?>


<div class="form-group row">
	<div class="col-md-6">
		<label>First name <span class="required">*</span></label>
		<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="rel_user_extension[first_name]" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="First name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['rel_user_extension']['first_name'])===null||$tmp==='' ? '' : $tmp);?>
">
	</div>
	<div class="col-md-6">
		<label>Last name <span class="required">*</span></label>
		<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="rel_user_extension[last_name]" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Last name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['rel_user_extension']['last_name'])===null||$tmp==='' ? '' : $tmp);?>
">
	</div>
</div>

<div class="form-group">
	<label>Username <span class="required">*</span></label>
	<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="username" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Username" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['username'])===null||$tmp==='' ? '' : $tmp);?>
">
</div>

<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_activate_item');?>


<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'user_tab_end');?>

<?php
}
}
/* {/block 'form_fields'} */
/* {block 'custom_scripts'} */
class Block_9029279566347615dcd7893_63288708 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_9029279566347615dcd7893_63288708',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('.form-submit').formSubmit();

		<?php if ($_smarty_tpl->tpl_vars['id']->value) {?>

    	$('.select-user-roles').bootstrapDualListbox({
			selectorMinimalHeight: 300,
			preserveSelectionOnMove: 'moved',
			moveOnSelect: false
		});

		$('.select-user-roles').on('change', function () {
			$('#user_roles').val(JSON.stringify($(this).val()));
		});

		$('#user_roles').val(JSON.stringify($('.select-user-roles').val()));

		<?php if (!$_smarty_tpl->tpl_vars['can_entry']->value) {?>
        	$('.bootstrap-duallistbox-container .btn-group button').prop('disabled', true);
        	$('.bootstrap-duallistbox-container select').prop('disabled', true);
        <?php }?>

		$(document).on('click', '.nav-tabs a[data-toggle="tab"]', function () {
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
