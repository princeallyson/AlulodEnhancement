<?php
/* Smarty version 3.1.39, created on 2022-07-18 10:35:24
  from 'C:\wamp64\www\apps\brgy-alulod\application\views\templates\default\alerts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d4c6eceeab86_02386780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a623c31dfe6bd4fbb73cb349a1f088007ac966e' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\views\\templates\\default\\alerts.tpl',
      1 => 1631432353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d4c6eceeab86_02386780 (Smarty_Internal_Template $_smarty_tpl) {
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
