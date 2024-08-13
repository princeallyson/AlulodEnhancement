<?php
/* Smarty version 3.1.39, created on 2022-07-18 10:26:06
  from 'C:\wamp64\www\apps\brgy-alulod\application\views\templates\default\scripts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d4c4be074c18_35182208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92b92506a80c410cecc125275b88bfd78697d190' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\views\\templates\\default\\scripts.tpl',
      1 => 1632209247,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d4c4be074c18_35182208 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\libraries\\smarty\\plugins\\modifier.load_asset.php','function'=>'smarty_modifier_load_asset',),));
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_75058195562d4c4be06ff21_50912775', 'scripts');
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_162666190662d4c4be0731e2_41301243', 'custom_scripts');
?>


<?php }
/* {block 'scripts'} */
class Block_75058195562d4c4be06ff21_50912775 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_75058195562d4c4be06ff21_50912775',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'scripts'} */
/* {block 'custom_scripts'} */
class Block_162666190662d4c4be0731e2_41301243 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_162666190662d4c4be0731e2_41301243',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'custom_scripts'} */
}
