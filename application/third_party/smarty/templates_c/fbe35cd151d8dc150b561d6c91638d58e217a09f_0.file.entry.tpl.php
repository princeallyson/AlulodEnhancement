<?php
/* Smarty version 3.1.39, created on 2022-10-13 08:58:39
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/default/permissions/entry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_634762bf5473e9_48593858',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbe35cd151d8dc150b561d6c91638d58e217a09f' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/default/permissions/entry.tpl',
      1 => 1664632435,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_634762bf5473e9_48593858 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.iif.php','function'=>'smarty_modifier_iif',),2=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.concat.php','function'=>'smarty_modifier_concat',),3=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route.php','function'=>'smarty_modifier_route',),4=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),5=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is_user_permission.php','function'=>'smarty_modifier_is_user_permission',),));
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

<?php $_smarty_tpl->_assignInScope('can_activate', smarty_modifier_is_user_permission('activate-permission'));?>

<?php $_smarty_tpl->_assignInScope('card_title', smarty_modifier_concat(smarty_modifier_iif((smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['can_entry']->value,'View')),$_smarty_tpl->tpl_vars['id']->value,'New'),' permission'));?>

<?php $_smarty_tpl->_assignInScope('button_text', smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['id']->value,'Save'));
$_smarty_tpl->_assignInScope('button_swal_positive_text', smarty_modifier_concat(smarty_modifier_concat('swal-positive-text="Yes, ',(smarty_modifier_iif('update',$_smarty_tpl->tpl_vars['id']->value,'save'))),' it!"'));
$_smarty_tpl->_assignInScope('button_swal_title', smarty_modifier_iif('swal-title="Update permission?"',$_smarty_tpl->tpl_vars['id']->value));
$_smarty_tpl->_assignInScope('button_swal_text', smarty_modifier_iif('',$_smarty_tpl->tpl_vars['id']->value,'swal-text="Save permission?"'));?>

<?php $_smarty_tpl->_assignInScope('delete_button_swal_title', 'swal-title="Delete permission?"');?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2120925724634762bf541fe2_06556869', 'form_fields');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('ajax_form_submit'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_902191672634762bf546762_85139410', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/form/entry/entry.tpl');
}
/* {block 'form_fields'} */
class Block_2120925724634762bf541fe2_06556869 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_fields' => 
  array (
    0 => 'Block_2120925724634762bf541fe2_06556869',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.iif.php','function'=>'smarty_modifier_iif',),));
?>

<div class="form-group">
	<label>Permission <span class="required">*</span></label>
	<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="permission" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Permission" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['permission'])===null||$tmp==='' ? '' : $tmp);?>
">
</div>

<div class="form-group">
	<label>Description</label>
	<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="description"',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Description" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['description'])===null||$tmp==='' ? '' : $tmp);?>
">
</div>

<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_activate_item');?>

<?php
}
}
/* {/block 'form_fields'} */
/* {block 'custom_scripts'} */
class Block_902191672634762bf546762_85139410 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_902191672634762bf546762_85139410',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('.form-submit').formSubmit();
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
