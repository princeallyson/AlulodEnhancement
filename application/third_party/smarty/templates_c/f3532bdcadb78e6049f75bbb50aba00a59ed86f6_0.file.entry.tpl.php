<?php
/* Smarty version 3.1.39, created on 2022-12-27 13:08:14
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/apps/admin/reports_h/entry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_63aa7dbedd4705_31034288',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f3532bdcadb78e6049f75bbb50aba00a59ed86f6' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/apps/admin/reports_h/entry.tpl',
      1 => 1672117685,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63aa7dbedd4705_31034288 (Smarty_Internal_Template $_smarty_tpl) {
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

<?php $_smarty_tpl->_assignInScope('can_activate', smarty_modifier_is_user_permission('activate-report'));?>

<?php $_smarty_tpl->_assignInScope('card_title', smarty_modifier_concat(smarty_modifier_iif((smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['can_entry']->value,'View')),$_smarty_tpl->tpl_vars['id']->value,'New'),' Report'));?>

<?php $_smarty_tpl->_assignInScope('button_text', smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['id']->value,'Save'));
$_smarty_tpl->_assignInScope('button_swal_positive_text', smarty_modifier_concat(smarty_modifier_concat('swal-positive-text="Yes, ',(smarty_modifier_iif('update',$_smarty_tpl->tpl_vars['id']->value,'save'))),' it!"'));
$_smarty_tpl->_assignInScope('button_swal_title', smarty_modifier_iif('swal-title="Update Report?"',$_smarty_tpl->tpl_vars['id']->value));
$_smarty_tpl->_assignInScope('button_swal_text', smarty_modifier_iif('',$_smarty_tpl->tpl_vars['id']->value,'swal-text="Save Report?"'));?>

<?php $_smarty_tpl->_assignInScope('delete_button_swal_title', 'swal-title="Delete Report?"');
$_smarty_tpl->_assignInScope('show_active', true);?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_210070877763aa7dbedcd4e3_52297207', 'form_fields');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('ajax_form_submit','select2'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_89611755863aa7dbedd3a59_84243918', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/form/entry/entry.tpl');
}
/* {block 'form_fields'} */
class Block_210070877763aa7dbedcd4e3_52297207 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_fields' => 
  array (
    0 => 'Block_210070877763aa7dbedcd4e3_52297207',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/function.form_input.php','function'=>'smarty_function_form_input',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/function.form_select.php','function'=>'smarty_function_form_select',),2=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/function.form_textarea.php','function'=>'smarty_function_form_textarea',),));
?>

<?php echo smarty_function_form_input(array('enabled'=>true,'field'=>'title','value'=>(($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['title'])===null||$tmp==='' ? '' : $tmp)),$_smarty_tpl);?>


<?php echo smarty_function_form_select(array('enabled'=>true,'field'=>'type','options'=>array('Bar','Bar Horizontal','Pie','Line'),'value'=>(($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['type'])===null||$tmp==='' ? false : $tmp)),$_smarty_tpl);?>


<?php echo smarty_function_form_textarea(array('enabled'=>true,'field'=>'description','value'=>(($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['description'])===null||$tmp==='' ? '' : $tmp),'required'=>false),$_smarty_tpl);?>


<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_activate_item');?>

<?php
}
}
/* {/block 'form_fields'} */
/* {block 'custom_scripts'} */
class Block_89611755863aa7dbedd3a59_84243918 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_89611755863aa7dbedd3a59_84243918',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('.form-submit').formSubmit();

		$('select[name="type"]').select2();
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
