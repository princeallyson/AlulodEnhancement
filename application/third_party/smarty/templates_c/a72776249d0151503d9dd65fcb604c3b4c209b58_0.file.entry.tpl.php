<?php
/* Smarty version 3.1.39, created on 2022-07-17 20:55:30
  from 'C:\wamp64\www\apps\fish-pond\application\views\modules\default\sidebar\entry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d406c27b8126_82907928',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a72776249d0151503d9dd65fcb604c3b4c209b58' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\modules\\default\\sidebar\\entry.tpl',
      1 => 1652160996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d406c27b8126_82907928 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.iif.php','function'=>'smarty_modifier_iif',),2=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.concat.php','function'=>'smarty_modifier_concat',),3=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),4=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),5=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.is_user_permission.php','function'=>'smarty_modifier_is_user_permission',),));
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

<?php $_smarty_tpl->_assignInScope('can_activate', smarty_modifier_is_user_permission('activate-sidebar'));?>

<?php $_smarty_tpl->_assignInScope('card_title', smarty_modifier_concat(smarty_modifier_iif((smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['can_entry']->value,'View')),$_smarty_tpl->tpl_vars['id']->value,'New'),' Menu'));?>

<?php $_smarty_tpl->_assignInScope('button_text', smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['id']->value,'Save'));
$_smarty_tpl->_assignInScope('button_swal_positive_text', smarty_modifier_concat(smarty_modifier_concat('swal-positive-text="Yes, ',(smarty_modifier_iif('update',$_smarty_tpl->tpl_vars['id']->value,'save'))),' it!"'));
$_smarty_tpl->_assignInScope('button_swal_title', smarty_modifier_iif('swal-title="Update Menu?"',$_smarty_tpl->tpl_vars['id']->value));
$_smarty_tpl->_assignInScope('button_swal_text', smarty_modifier_iif('',$_smarty_tpl->tpl_vars['id']->value,'swal-text="Save Menu?"'));?>

<?php $_smarty_tpl->_assignInScope('delete_button_swal_title', 'swal-title="Delete Menu?"');?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_172710587762d406c277fa63_20126625', 'form_fields');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('select2','ajax_form_submit'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_122717700762d406c27b6492_74112187', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/form/entry/entry.tpl');
}
/* {block 'form_fields'} */
class Block_172710587762d406c277fa63_20126625 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_fields' => 
  array (
    0 => 'Block_172710587762d406c277fa63_20126625',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.iif.php','function'=>'smarty_modifier_iif',),1=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\function.html_select_options.php','function'=>'smarty_function_html_select_options',),2=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.html_selected_option_text.php','function'=>'smarty_modifier_html_selected_option_text',),));
?>

<div class="form-group row">
	<div class="col-md-6">
		<label>Name <span class="required">*</span></label>
		<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="name" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['name'])===null||$tmp==='' ? '' : $tmp);?>
">
	</div>

	<div class="col-md-6">
		<label>Display Name <span class="required">*</span></label>
		<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="display_name" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Display Name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['display_name'])===null||$tmp==='' ? '' : $tmp);?>
">
	</div>
</div>

<div class="form-group">
	<label>Parent</label>
	<?php if ($_smarty_tpl->tpl_vars['can_entry']->value) {?>
	<select class="form-control bs-select2" name="parent_id">
		<?php echo smarty_function_html_select_options(array('options'=>(($tmp = @$_smarty_tpl->tpl_vars['menus']->value)===null||$tmp==='' ? false : $tmp),'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['parent_id'])===null||$tmp==='' ? false : $tmp)),$_smarty_tpl);?>

	</select>
	<?php } else { ?>
	<input class="form-control" type="text" readonly placeholder="Route" value="<?php echo smarty_modifier_html_selected_option_text((($tmp = @$_smarty_tpl->tpl_vars['menus']->value)===null||$tmp==='' ? array() : $tmp),((($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['parent_id'])===null||$tmp==='' ? false : $tmp)));?>
">
	<?php }?>
</div>

<div class="form-group">
	<label>Route</label>
	<?php if ($_smarty_tpl->tpl_vars['can_entry']->value) {?>
	<select class="form-control bs-select2" name="route_id">
		<?php echo smarty_function_html_select_options(array('options'=>(($tmp = @$_smarty_tpl->tpl_vars['routes']->value)===null||$tmp==='' ? false : $tmp),'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['route_id'])===null||$tmp==='' ? false : $tmp)),$_smarty_tpl);?>

	</select>
	<?php } else { ?>
	<input class="form-control" type="text" readonly placeholder="Route" value="<?php echo smarty_modifier_html_selected_option_text((($tmp = @$_smarty_tpl->tpl_vars['routes']->value)===null||$tmp==='' ? array() : $tmp),((($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['route_id'])===null||$tmp==='' ? false : $tmp)));?>
">
	<?php }?>
</div>

<div class="form-group row">
	<div class="col-md-6">
		<label>Icon</label>
		<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="icon"',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Icon" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['icon'])===null||$tmp==='' ? '' : $tmp);?>
">
	</div>

	<div class="col-md-6">
		<label>Order</label>
		<input class="form-control" type="number" <?php echo smarty_modifier_iif('name="order"',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Order" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['order'])===null||$tmp==='' ? '' : $tmp);?>
">
	</div>
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
class Block_122717700762d406c27b6492_74112187 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_122717700762d406c27b6492_74112187',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('.form-submit').formSubmit();
		$('.bs-select2').select2();
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
