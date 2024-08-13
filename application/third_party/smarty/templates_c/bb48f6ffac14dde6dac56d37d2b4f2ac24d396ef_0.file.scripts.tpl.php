<?php
/* Smarty version 3.1.39, created on 2022-07-17 19:51:56
  from 'C:\wamp64\www\apps\fish-pond\application\views\templates\default\scripts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d3f7dcb6f559_85376645',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb48f6ffac14dde6dac56d37d2b4f2ac24d396ef' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\templates\\default\\scripts.tpl',
      1 => 1632209247,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d3f7dcb6f559_85376645 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.load_asset.php','function'=>'smarty_modifier_load_asset',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/js/main/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/js/main/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/js/plugins/notifications/pnotify.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/js/plugins/notifications/sweet_alert.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/default/js/fn.js"><?php echo '</script'; ?>
>

<?php if ((($tmp = @$_smarty_tpl->tpl_vars['__assets']->value)===null||$tmp==='' ? false : $tmp)) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['__assets']->value, '__asset');
$_smarty_tpl->tpl_vars['__asset']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['__asset']->value) {
$_smarty_tpl->tpl_vars['__asset']->do_else = false;
echo smarty_modifier_load_asset($_smarty_tpl->tpl_vars['__asset']->value,'js');?>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_200664445062d3f7dcb64257_75367592', 'scripts');
?>


<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/plugins/waitingfor/waitingfor.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/default/js/app.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/default/js/my.js"><?php echo '</script'; ?>
>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_31137497562d3f7dcb6c088_05929746', 'custom_scripts');
?>


<?php }
/* {block 'scripts'} */
class Block_200664445062d3f7dcb64257_75367592 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_200664445062d3f7dcb64257_75367592',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'scripts'} */
/* {block 'custom_scripts'} */
class Block_31137497562d3f7dcb6c088_05929746 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_31137497562d3f7dcb6c088_05929746',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'custom_scripts'} */
}
