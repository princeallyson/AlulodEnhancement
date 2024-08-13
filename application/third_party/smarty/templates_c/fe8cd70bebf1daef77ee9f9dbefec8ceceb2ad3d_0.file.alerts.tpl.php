<?php
/* Smarty version 3.1.39, created on 2022-07-06 09:59:07
  from 'C:\wamp64\www\apps\pet-adoption\application\views\templates\default\alerts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c4ec6b84e4f8_13323360',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe8cd70bebf1daef77ee9f9dbefec8ceceb2ad3d' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\templates\\default\\alerts.tpl',
      1 => 1631432353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c4ec6b84e4f8_13323360 (Smarty_Internal_Template $_smarty_tpl) {
if ((($tmp = @$_smarty_tpl->tpl_vars['success_message']->value)===null||$tmp==='' ? false : $tmp)) {?>
<div class="alert alert-success border-0 alert-dismissible">
	<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
	<?php echo $_smarty_tpl->tpl_vars['success_message']->value;?>

</div>
<?php }
if ((($tmp = @$_smarty_tpl->tpl_vars['error_message']->value)===null||$tmp==='' ? false : $tmp)) {?>
<div class="alert alert-danger border-0 alert-dismissible <?php if ((($tmp = @$_smarty_tpl->tpl_vars['success_message']->value)===null||$tmp==='' ? false : $tmp)) {?>mt-2<?php }?>">
	<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
	<?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>

</div>
<?php }
if ((($tmp = @$_smarty_tpl->tpl_vars['info_message']->value)===null||$tmp==='' ? false : $tmp)) {?>
<div class="alert alert-info border-0 alert-dismissible <?php if ((($tmp = @$_smarty_tpl->tpl_vars['info_message']->value)===null||$tmp==='' ? false : $tmp)) {?>mt-2<?php }?>">
	<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
	<?php echo $_smarty_tpl->tpl_vars['info_message']->value;?>

</div>
<?php }
}
}
