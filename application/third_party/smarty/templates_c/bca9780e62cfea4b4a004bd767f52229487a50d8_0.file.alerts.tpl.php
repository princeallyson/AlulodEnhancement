<?php
/* Smarty version 3.1.39, created on 2022-10-01 21:54:45
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/alerts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_633846a5abbb08_04330764',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bca9780e62cfea4b4a004bd767f52229487a50d8' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/alerts.tpl',
      1 => 1664632434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_633846a5abbb08_04330764 (Smarty_Internal_Template $_smarty_tpl) {
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
