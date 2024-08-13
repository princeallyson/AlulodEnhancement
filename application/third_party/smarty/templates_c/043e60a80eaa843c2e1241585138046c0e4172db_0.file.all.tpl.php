<?php
/* Smarty version 3.1.39, created on 2022-07-17 21:24:04
  from 'C:\wamp64\www\apps\fish-pond\application\views\modules\default\users\all.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d40d74d21fb2_03209097',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '043e60a80eaa843c2e1241585138046c0e4172db' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\modules\\default\\users\\all.tpl',
      1 => 1652160875,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d40d74d21fb2_03209097 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.concat.php','function'=>'smarty_modifier_concat',),2=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),3=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_assignInScope('ctrl_route', smarty_modifier_route_by_url((($tmp = @$_smarty_tpl->tpl_vars['ctrl_route']->value)===null||$tmp==='' ? '' : $tmp)));
$_smarty_tpl->_assignInScope('new_item_route', smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,'.new'));
$_smarty_tpl->_assignInScope('new_item_action', smarty_modifier_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('can_add', smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('card_title', 'Users');
$_smarty_tpl->_assignInScope('button_add_text', 'Add User');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/table/table.tpl');
}
}
