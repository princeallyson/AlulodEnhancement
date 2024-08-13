<?php
/* Smarty version 3.1.39, created on 2022-07-17 20:55:25
  from 'C:\wamp64\www\apps\fish-pond\application\views\modules\default\sidebar\all.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d406bd709482_18633510',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ddee94cca363a3b14401c677ee955991223d40e6' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\modules\\default\\sidebar\\all.tpl',
      1 => 1652160984,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d406bd709482_18633510 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.concat.php','function'=>'smarty_modifier_concat',),2=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),3=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_assignInScope('ctrl_route', smarty_modifier_route_by_url((($tmp = @$_smarty_tpl->tpl_vars['ctrl_route']->value)===null||$tmp==='' ? '' : $tmp)));
$_smarty_tpl->_assignInScope('new_item_route', smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,'.new'));
$_smarty_tpl->_assignInScope('new_item_action', smarty_modifier_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('can_add', smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('card_title', 'Sidebar Menus');
$_smarty_tpl->_assignInScope('button_add_text', 'Add Menu');
$_smarty_tpl->_assignInScope('dt_save_state', 'true');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/table/table.tpl');
}
}
