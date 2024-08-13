<?php
/* Smarty version 3.1.39, created on 2022-07-17 20:56:10
  from 'C:\wamp64\www\apps\fish-pond\application\views\modules\default\error\general.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d406eaea23f8_84387015',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19df6263f6d77a919563844d9cb4aae0b1b67c74' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\modules\\default\\error\\general.tpl',
      1 => 1631068544,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d406eaea23f8_84387015 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_67187860062d406eae82bf8_77241735', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_85626641762d406eae87564_55008792', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19512007662d406eae8b807_16528988', 'content-inner');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_67187860062d406eae82bf8_77241735 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_67187860062d406eae82bf8_77241735',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_85626641762d406eae87564_55008792 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_85626641762d406eae87564_55008792',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content-inner'} */
class Block_19512007662d406eae8b807_16528988 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content-inner' => 
  array (
    0 => 'Block_19512007662d406eae8b807_16528988',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),));
?>

<div class="content d-flex justify-content-center align-items-center mt-4">
	<div class="flex-fill">
		<div class="text-center mb-4 font-white">
			<img src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/images/error_bg.svg" class="img-fluid mb-4" height="230" alt="">
			<h1 class="display-3 font-weight-semibold line-height-1 mb-2"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['error_title']->value)===null||$tmp==='' ? 'Opps' : $tmp);?>
</h1>
			<h5><?php echo (($tmp = @$_smarty_tpl->tpl_vars['error_message']->value)===null||$tmp==='' ? 'Something went wrong!' : $tmp);?>
</h5>
		</div>

		<div class="text-center">
			<a href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['return_url']->value)===null||$tmp==='' ? (smarty_modifier_route('home')) : $tmp);?>
" class="btn btn-primary">
				<i class="icon-arrow-left52 mr-2"></i> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['return_text']->value)===null||$tmp==='' ? 'Return' : $tmp);?>

			</a>
		</div>
	</div>
</div>
<?php
}
}
/* {/block 'content-inner'} */
}
