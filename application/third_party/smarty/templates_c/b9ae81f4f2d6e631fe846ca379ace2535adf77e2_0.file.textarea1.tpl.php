<?php
/* Smarty version 3.1.39, created on 2022-07-06 19:28:09
  from 'C:\wamp64\www\apps\pet-adoption\application\views\templates\default\form\textarea1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c571c95c5551_14291835',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9ae81f4f2d6e631fe846ca379ace2535adf77e2' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\templates\\default\\form\\textarea1.tpl',
      1 => 1657106887,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c571c95c5551_14291835 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.is.php','function'=>'smarty_modifier_is',),1=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.iif.php','function'=>'smarty_modifier_iif',),2=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.nltobr.php','function'=>'smarty_modifier_nltobr',),));
$_smarty_tpl->_assignInScope('___can_entry', (($tmp = @$_smarty_tpl->tpl_vars['__can_entry']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['can_entry']->value : $tmp));
$_smarty_tpl->_assignInScope('___required', (($tmp = @$_smarty_tpl->tpl_vars['__required']->value)===null||$tmp==='' ? 'required' : $tmp));
$_smarty_tpl->_assignInScope('___readonly', (($tmp = @$_smarty_tpl->tpl_vars['__readonly']->value)===null||$tmp==='' ? 'readonly' : $tmp));
$_smarty_tpl->_assignInScope('___name', ((string)$_smarty_tpl->tpl_vars['__field']->value));
$_smarty_tpl->_assignInScope('___name', "name=\"".((string)$_smarty_tpl->tpl_vars['___name']->value)."\"");
$_smarty_tpl->_assignInScope('___name', ((string)$_smarty_tpl->tpl_vars['___name']->value)." ".((string)$_smarty_tpl->tpl_vars['___required']->value));?>
<div class="form-group">
	<label><?php echo $_smarty_tpl->tpl_vars['__label']->value;
if ($_smarty_tpl->tpl_vars['___can_entry']->value) {
echo smarty_modifier_iif('<span class="required"> *</span>',(smarty_modifier_is($_smarty_tpl->tpl_vars['___required']->value,'required')));
}
echo (($tmp = @$_smarty_tpl->tpl_vars['__label_end_html']->value)===null||$tmp==='' ? '' : $tmp);?>
</label>
	<textarea id="<?php echo $_smarty_tpl->tpl_vars['__field']->value;?>
" class="form-control" <?php echo smarty_modifier_iif($_smarty_tpl->tpl_vars['___name']->value,$_smarty_tpl->tpl_vars['___can_entry']->value,$_smarty_tpl->tpl_vars['___readonly']->value);?>
 placeholder="<?php echo $_smarty_tpl->tpl_vars['__label']->value;?>
" rows=5 cols=5><?php echo smarty_modifier_nltobr((($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value[$_smarty_tpl->tpl_vars['__field']->value])===null||$tmp==='' ? '' : $tmp));?>
</textarea>
</div><?php }
}
