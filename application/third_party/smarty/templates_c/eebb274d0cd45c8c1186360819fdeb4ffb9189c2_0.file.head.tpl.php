<?php
/* Smarty version 3.1.39, created on 2022-07-18 10:26:05
  from 'C:\wamp64\www\apps\brgy-alulod\application\views\templates\default\head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d4c4bdd4c199_24430069',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eebb274d0cd45c8c1186360819fdeb4ffb9189c2' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\views\\templates\\default\\head.tpl',
      1 => 1636980357,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d4c4bdd4c199_24430069 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\libraries\\smarty\\plugins\\modifier.load_asset.php','function'=>'smarty_modifier_load_asset',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="site_url" content="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
">
	<meta name="ctrl_url" content="<?php echo $_smarty_tpl->tpl_vars['ctrl_url']->value;?>
">
	
	<title><?php echo $_smarty_tpl->tpl_vars['app_title']->value;?>
</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

	<?php if ((($tmp = @$_smarty_tpl->tpl_vars['__assets']->value)===null||$tmp==='' ? false : $tmp)) {?>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['__assets']->value, '__asset');
$_smarty_tpl->tpl_vars['__asset']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['__asset']->value) {
$_smarty_tpl->tpl_vars['__asset']->do_else = false;
?>
	<?php echo smarty_modifier_load_asset($_smarty_tpl->tpl_vars['__asset']->value,'css');?>

	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php }?>
	
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_107436790262d4c4bdd471a6_29438511', 'stylesheets');
?>


	<link href="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/default/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/default/css/style.css" rel="stylesheet" type="text/css">

	
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_154814333962d4c4bdd4a899_69201537', 'custom_styles');
?>

</head><?php }
/* {block 'stylesheets'} */
class Block_107436790262d4c4bdd471a6_29438511 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'stylesheets' => 
  array (
    0 => 'Block_107436790262d4c4bdd471a6_29438511',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php
}
}
/* {/block 'stylesheets'} */
/* {block 'custom_styles'} */
class Block_154814333962d4c4bdd4a899_69201537 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_styles' => 
  array (
    0 => 'Block_154814333962d4c4bdd4a899_69201537',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php
}
}
/* {/block 'custom_styles'} */
}
