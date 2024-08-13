<?php
/* Smarty version 3.1.39, created on 2022-07-06 14:26:16
  from 'C:\wamp64\www\apps\pet-adoption\application\views\templates\default\form\textbox1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c52b083e6e28_77597314',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ba5a0eb376ecafced1c09e311bbed71a488e1e7' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\templates\\default\\form\\textbox1.tpl',
      1 => 1645243752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c52b083e6e28_77597314 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.iif.php','function'=>'smarty_modifier_iif',),1=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.is.php','function'=>'smarty_modifier_is',),));
$_smarty_tpl->_assignInScope('___can_entry', (($tmp = @$_smarty_tpl->tpl_vars['__can_entry']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['can_entry']->value : $tmp));
$_smarty_tpl->_assignInScope('___required', smarty_modifier_iif('required',(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'is_null' ][ 0 ], array( (($tmp = @$_smarty_tpl->tpl_vars['__required']->value)===null||$tmp==='' ? null : $tmp) ))),''));
$_smarty_tpl->_assignInScope('___readonly', (($tmp = @$_smarty_tpl->tpl_vars['__readonly']->value)===null||$tmp==='' ? 'readonly' : $tmp));
$_smarty_tpl->_assignInScope('___name', ((string)$_smarty_tpl->tpl_vars['__field']->value));
$_smarty_tpl->_assignInScope('___name', "name=\"".((string)$_smarty_tpl->tpl_vars['___name']->value)."\"");
$_smarty_tpl->_assignInScope('___name', ((string)$_smarty_tpl->tpl_vars['___name']->value)." ".((string)$_smarty_tpl->tpl_vars['___required']->value));
$_smarty_tpl->_assignInScope('__step', (($tmp = @smarty_modifier_iif("step=\"".((string)$_smarty_tpl->tpl_vars['__step']->value)."\"",$_smarty_tpl->tpl_vars['__step']->value))===null||$tmp==='' ? false : $tmp));?>
<div class="form-group">
	<label><?php echo $_smarty_tpl->tpl_vars['__label']->value;
if ($_smarty_tpl->tpl_vars['___can_entry']->value) {
echo smarty_modifier_iif('<span class="required"> *</span>',(smarty_modifier_is($_smarty_tpl->tpl_vars['___required']->value,'required')));
}?></label>
	<input class="form-control" type="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['__type']->value)===null||$tmp==='' ? 'text' : $tmp);?>
" <?php echo $_smarty_tpl->tpl_vars['__step']->value;?>
 <?php echo smarty_modifier_iif($_smarty_tpl->tpl_vars['___name']->value,$_smarty_tpl->tpl_vars['___can_entry']->value,$_smarty_tpl->tpl_vars['___readonly']->value);?>
 placeholder="<?php echo $_smarty_tpl->tpl_vars['__label']->value;?>
" value="<?php echo (($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value[$_smarty_tpl->tpl_vars['__field']->value])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['__default']->value : $tmp))===null||$tmp==='' ? '' : $tmp);?>
" id="<?php echo $_smarty_tpl->tpl_vars['__field']->value;?>
">
</div><?php }
}
