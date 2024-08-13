<?php
/* Smarty version 3.1.39, created on 2022-10-06 12:45:53
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/default/profile/user_extension.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_633e5d81819616_46525423',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15834b7d490c24ce79d0bb6f9a61aeb188d2638b' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/default/profile/user_extension.tpl',
      1 => 1664632435,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_633e5d81819616_46525423 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.iif.php','function'=>'smarty_modifier_iif',),));
?>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>First name</label>
			<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="rel_user_extension[first_name]"',((($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp)),'readonly');?>
 placeholder="First name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['rel_user_extension']['first_name'])===null||$tmp==='' ? '' : $tmp);?>
">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Middle name</label>
			<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="rel_user_extension[middle_name]"',((($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp)),'readonly');?>
 placeholder="Middle name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['rel_user_extension']['middle_name'])===null||$tmp==='' ? '' : $tmp);?>
" <?php echo smarty_modifier_iif('readonly',!(($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp));?>
>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label>Last name</label>
			<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="rel_user_extension[last_name]"',((($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp)),'readonly');?>
 placeholder="Last name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['rel_user_extension']['last_name'])===null||$tmp==='' ? '' : $tmp);?>
" <?php echo smarty_modifier_iif('readonly',!(($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp));?>
>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label>Extension name</label>
			<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="rel_user_extension[extension_name]"',((($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp)),'readonly');?>
 placeholder="Extension name" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['rel_user_extension']['extension_name'])===null||$tmp==='' ? '' : $tmp);?>
" <?php echo smarty_modifier_iif('readonly',!(($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp));?>
>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="rel_user_extension[email]"',((($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp)),'readonly');?>
 placeholder="Email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['rel_user_extension']['email'])===null||$tmp==='' ? '' : $tmp);?>
" <?php echo smarty_modifier_iif('readonly',!(($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp));?>
>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Address</label>
			<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="rel_user_extension[address]"',((($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp)),'readonly');?>
 placeholder="Address" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['rel_user_extension']['address'])===null||$tmp==='' ? '' : $tmp);?>
" <?php echo smarty_modifier_iif('readonly',!(($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp));?>
>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Mobile</label>
			<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="rel_user_extension[mobile]"',((($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp)),'readonly');?>
 placeholder="Mobile" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['rel_user_extension']['mobile'])===null||$tmp==='' ? '' : $tmp);?>
" <?php echo smarty_modifier_iif('readonly',!(($tmp = @$_smarty_tpl->tpl_vars['can_update_profile']->value)===null||$tmp==='' ? false : $tmp));?>
>
		</div>
	</div>
</div><?php }
}
