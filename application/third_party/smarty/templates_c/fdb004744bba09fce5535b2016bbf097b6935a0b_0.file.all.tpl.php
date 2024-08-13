<?php
/* Smarty version 3.1.39, created on 2022-10-06 12:45:27
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/default/routes/all.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_633e5d67df8a81_74976287',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fdb004744bba09fce5535b2016bbf097b6935a0b' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/default/routes/all.tpl',
      1 => 1664632435,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_633e5d67df8a81_74976287 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.concat.php','function'=>'smarty_modifier_concat',),2=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route.php','function'=>'smarty_modifier_route',),3=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),4=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is_user_permission.php','function'=>'smarty_modifier_is_user_permission',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_assignInScope('ctrl_route', smarty_modifier_route_by_url((($tmp = @$_smarty_tpl->tpl_vars['ctrl_route']->value)===null||$tmp==='' ? '' : $tmp)));
$_smarty_tpl->_assignInScope('new_item_route', smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,'.new'));
$_smarty_tpl->_assignInScope('new_item_action', smarty_modifier_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('can_add', smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('card_title', 'Routes');
$_smarty_tpl->_assignInScope('button_add_text', 'Add Route');
$_smarty_tpl->_assignInScope('dt_save_state', 'true');?>

<?php if (smarty_modifier_is_user_permission('sync-route-config')) {
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1199908726633e5d67df5d99_68547316', 'table_top_buttons');
?>

<?php }
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/table/table.tpl');
}
/* {block 'table_top_buttons'} */
class Block_1199908726633e5d67df5d99_68547316 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'table_top_buttons' => 
  array (
    0 => 'Block_1199908726633e5d67df5d99_68547316',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.concat.php','function'=>'smarty_modifier_concat',),));
?>

<button type="button" class="btn btn-teal btn-sm" data-redirect="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'base_url' ][ 0 ], array( smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,'/sync/config') ));?>
">
	Sync routes
</button>
<?php
}
}
/* {/block 'table_top_buttons'} */
}
