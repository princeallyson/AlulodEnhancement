<?php
/* Smarty version 3.1.39, created on 2022-10-01 21:55:05
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/apps/admin/sms_outbounds/all.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_633846b9b6f103_49712789',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '940e28e6351607d5e7606e49cc8374f53899d019' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/apps/admin/sms_outbounds/all.tpl',
      1 => 1664632437,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_633846b9b6f103_49712789 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.concat.php','function'=>'smarty_modifier_concat',),2=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route.php','function'=>'smarty_modifier_route',),3=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_assignInScope('ctrl_route', smarty_modifier_route_by_url((($tmp = @$_smarty_tpl->tpl_vars['ctrl_route']->value)===null||$tmp==='' ? '' : $tmp)));
$_smarty_tpl->_assignInScope('new_item_route', smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,'.new'));
$_smarty_tpl->_assignInScope('new_item_action', smarty_modifier_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('can_add', smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('card_title', 'Sms Outbounds');
$_smarty_tpl->_assignInScope('button_add_text', 'Add Sms');
$_smarty_tpl->_assignInScope('dt_save_state', 'true');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/table/table.tpl');
}
}
