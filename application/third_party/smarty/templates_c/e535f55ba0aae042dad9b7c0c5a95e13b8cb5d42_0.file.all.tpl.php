<?php
/* Smarty version 3.1.39, created on 2022-07-06 09:59:18
  from 'C:\wamp64\www\apps\pet-adoption\application\views\modules\default\permissions\all.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c4ec76d2dfd6_77711100',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e535f55ba0aae042dad9b7c0c5a95e13b8cb5d42' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\modules\\default\\permissions\\all.tpl',
      1 => 1632034135,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c4ec76d2dfd6_77711100 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.concat.php','function'=>'smarty_modifier_concat',),2=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),3=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_assignInScope('ctrl_route', smarty_modifier_route_by_url((($tmp = @$_smarty_tpl->tpl_vars['ctrl_route']->value)===null||$tmp==='' ? '' : $tmp)));
$_smarty_tpl->_assignInScope('new_item_route', smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,'.new'));
$_smarty_tpl->_assignInScope('new_item_action', smarty_modifier_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('can_add', smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('card_title', 'Permissions');
$_smarty_tpl->_assignInScope('button_add_text', 'Add permission');
$_smarty_tpl->_assignInScope('dt_save_state', 'true');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/table/table.tpl');
}
}
