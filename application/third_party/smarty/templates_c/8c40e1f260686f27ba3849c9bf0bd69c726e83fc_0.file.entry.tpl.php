<?php
/* Smarty version 3.1.39, created on 2022-07-06 10:27:31
  from 'C:\wamp64\www\apps\pet-adoption\application\views\modules\default\routes\entry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c4f3139207a1_42339324',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c40e1f260686f27ba3849c9bf0bd69c726e83fc' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\modules\\default\\routes\\entry.tpl',
      1 => 1652160975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c4f3139207a1_42339324 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.iif.php','function'=>'smarty_modifier_iif',),2=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.concat.php','function'=>'smarty_modifier_concat',),3=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),4=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),5=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.is_user_permission.php','function'=>'smarty_modifier_is_user_permission',),));
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

<?php $_smarty_tpl->_assignInScope('can_activate', smarty_modifier_is_user_permission('activate-route'));?>

<?php $_smarty_tpl->_assignInScope('card_title', smarty_modifier_concat(smarty_modifier_iif((smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['can_entry']->value,'View')),$_smarty_tpl->tpl_vars['id']->value,'New'),' Route'));?>

<?php $_smarty_tpl->_assignInScope('button_text', smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['id']->value,'Save'));
$_smarty_tpl->_assignInScope('button_swal_positive_text', smarty_modifier_concat(smarty_modifier_concat('swal-positive-text="Yes, ',(smarty_modifier_iif('update',$_smarty_tpl->tpl_vars['id']->value,'save'))),' it!"'));
$_smarty_tpl->_assignInScope('button_swal_title', smarty_modifier_iif('swal-title="Update Route?"',$_smarty_tpl->tpl_vars['id']->value));
$_smarty_tpl->_assignInScope('button_swal_text', smarty_modifier_iif('',$_smarty_tpl->tpl_vars['id']->value,'swal-text="Save Route?"'));?>

<?php $_smarty_tpl->_assignInScope('delete_button_swal_title', 'swal-title="Delete Route?"');?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2832436462c4f3138e95a4_10059815', 'form_fields');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('select2','ajax_form_submit'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_192466285462c4f31391de04_34992763', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/form/entry/entry.tpl');
}
/* {block 'form_fields'} */
class Block_2832436462c4f3138e95a4_10059815 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_fields' => 
  array (
    0 => 'Block_2832436462c4f3138e95a4_10059815',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.iif.php','function'=>'smarty_modifier_iif',),1=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\function.html_select_options.php','function'=>'smarty_function_html_select_options',),2=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.html_selected_option_text.php','function'=>'smarty_modifier_html_selected_option_text',),));
?>

<div class="form-group">
	<label>Route <span class="required">*</span></label>
	<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="route" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Route" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['route'])===null||$tmp==='' ? '' : $tmp);?>
">
</div>

<div class="form-group">
	<label>Function</label>
	<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="function"',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Function" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['function'])===null||$tmp==='' ? '' : $tmp);?>
">
</div>

<div class="form-group">
	<label>Active Sidebar Route</label>
	<?php if ($_smarty_tpl->tpl_vars['can_entry']->value) {?>
	<select class="form-control bs-select2" name="active_sidebar_route_id">
		<?php echo smarty_function_html_select_options(array('options'=>(($tmp = @$_smarty_tpl->tpl_vars['routes']->value)===null||$tmp==='' ? false : $tmp),'selected'=>(($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['active_sidebar_route_id'])===null||$tmp==='' ? false : $tmp)),$_smarty_tpl);?>

	</select>
	<?php } else { ?>
	<input class="form-control" type="text" readonly placeholder="Active Sidebar Route" value="<?php echo smarty_modifier_html_selected_option_text((($tmp = @$_smarty_tpl->tpl_vars['routes']->value)===null||$tmp==='' ? array() : $tmp),((($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['active_sidebar_route_id'])===null||$tmp==='' ? false : $tmp)));?>
">
	<?php }?>
</div>

<div class="form-group">
	<label>Description</label>
	<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="description"',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Description" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['description'])===null||$tmp==='' ? '' : $tmp);?>
">
</div>

<div class="form-group">
    <div class="custom-control custom-control-right custom-switch custom-control-inline">
        <input type="checkbox" class=" custom-control-input" id="public" <?php echo smarty_modifier_iif('name="public"',$_smarty_tpl->tpl_vars['can_entry']->value,'disabled');?>
 <?php echo (($tmp = @smarty_modifier_iif('checked',$_smarty_tpl->tpl_vars['prev_data']->value['public']))===null||$tmp==='' ? false : $tmp);?>
>
        <label class="custom-control-label" for="public">Public</label>
    </div>
</div>

<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_activate_item');?>

<?php
}
}
/* {/block 'form_fields'} */
/* {block 'custom_scripts'} */
class Block_192466285462c4f31391de04_34992763 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_192466285462c4f31391de04_34992763',
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
