<?php
/* Smarty version 3.1.39, created on 2022-07-17 20:57:55
  from 'C:\wamp64\www\apps\fish-pond\application\views\templates\default\form\select1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d40753639b18_01501557',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3549f63136558cae26bc494611c3651e9f690302' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\templates\\default\\form\\select1.tpl',
      1 => 1649588712,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d40753639b18_01501557 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.is.php','function'=>'smarty_modifier_is',),1=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.iif.php','function'=>'smarty_modifier_iif',),2=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\function.html_select_options.php','function'=>'smarty_function_html_select_options',),3=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.html_selected_option_text.php','function'=>'smarty_modifier_html_selected_option_text',),));
$_smarty_tpl->_assignInScope('___required', (($tmp = @$_smarty_tpl->tpl_vars['__required']->value)===null||$tmp==='' ? 'required' : $tmp));
$_smarty_tpl->_assignInScope('___readonly', (($tmp = @$_smarty_tpl->tpl_vars['__readonly']->value)===null||$tmp==='' ? 'readonly' : $tmp));
$_smarty_tpl->_assignInScope('___name', ((string)$_smarty_tpl->tpl_vars['__field']->value));
$_smarty_tpl->_assignInScope('___name', "name=\"".((string)$_smarty_tpl->tpl_vars['___name']->value)."\"");
$_smarty_tpl->_assignInScope('___name', ((string)$_smarty_tpl->tpl_vars['___name']->value)." ".((string)$_smarty_tpl->tpl_vars['___required']->value));?>

<div class="form-group">
	<label><?php echo $_smarty_tpl->tpl_vars['__label']->value;
if ($_smarty_tpl->tpl_vars['can_entry']->value) {
echo smarty_modifier_iif('<span class="required"> *</span>',(smarty_modifier_is($_smarty_tpl->tpl_vars['___required']->value,'required')));
}?></label>
	<?php if ($_smarty_tpl->tpl_vars['can_entry']->value) {?>
	<select id="<?php echo $_smarty_tpl->tpl_vars['__field']->value;?>
" class="form-control bs-select2" <?php echo smarty_modifier_iif($_smarty_tpl->tpl_vars['___name']->value,$_smarty_tpl->tpl_vars['can_entry']->value,$_smarty_tpl->tpl_vars['___readonly']->value);?>
>
		<?php echo smarty_function_html_select_options(array('options'=>(($tmp = @$_smarty_tpl->tpl_vars['__options']->value)===null||$tmp==='' ? array() : $tmp),'selected'=>(($tmp = @(($tmp = @$_smarty_tpl->tpl_vars['__selected']->value)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['prev_data']->value[$_smarty_tpl->tpl_vars['__field']->value] : $tmp))===null||$tmp==='' ? false : $tmp)),$_smarty_tpl);?>

	</select>
	<?php } else { ?>
	<input class="form-control" type="text" readonly placeholder="<?php echo $_smarty_tpl->tpl_vars['__label']->value;?>
" value="<?php echo smarty_modifier_html_selected_option_text((($tmp = @$_smarty_tpl->tpl_vars['__options']->value)===null||$tmp==='' ? array() : $tmp),((($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value[$_smarty_tpl->tpl_vars['__field']->value])===null||$tmp==='' ? false : $tmp)));?>
">
	<?php }?>
</div><?php }
}
