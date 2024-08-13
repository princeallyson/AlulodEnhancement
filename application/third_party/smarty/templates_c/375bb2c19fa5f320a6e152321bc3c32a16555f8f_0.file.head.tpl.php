<?php
/* Smarty version 3.1.39, created on 2022-10-01 21:54:23
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/head.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6338468f691649_22199526',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '375bb2c19fa5f320a6e152321bc3c32a16555f8f' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/head.tpl',
      1 => 1664632434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6338468f691649_22199526 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.load_asset.php','function'=>'smarty_modifier_load_asset',),));
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5081088596338468f6900b0_19004483', 'stylesheets');
?>


	<link href="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/default/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/default/css/style.css" rel="stylesheet" type="text/css">

	
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16418013336338468f690ed6_52587812', 'custom_styles');
?>

</head><?php }
/* {block 'stylesheets'} */
class Block_5081088596338468f6900b0_19004483 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'stylesheets' => 
  array (
    0 => 'Block_5081088596338468f6900b0_19004483',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php
}
}
/* {/block 'stylesheets'} */
/* {block 'custom_styles'} */
class Block_16418013336338468f690ed6_52587812 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_styles' => 
  array (
    0 => 'Block_16418013336338468f690ed6_52587812',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php
}
}
/* {/block 'custom_styles'} */
}
