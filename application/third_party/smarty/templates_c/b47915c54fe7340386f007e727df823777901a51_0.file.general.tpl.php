<?php
/* Smarty version 3.1.39, created on 2022-10-01 21:54:25
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/default/error/general.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6338469184fd85_01991040',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b47915c54fe7340386f007e727df823777901a51' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/default/error/general.tpl',
      1 => 1664632434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6338469184fd85_01991040 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18765061836338469184a7e7_30858899', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6186837086338469184b348_61228544', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8285869466338469184bb37_57599550', 'content-inner');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_18765061836338469184a7e7_30858899 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_18765061836338469184a7e7_30858899',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_6186837086338469184b348_61228544 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_6186837086338469184b348_61228544',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content-inner'} */
class Block_8285869466338469184bb37_57599550 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content-inner' => 
  array (
    0 => 'Block_8285869466338469184bb37_57599550',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route.php','function'=>'smarty_modifier_route',),));
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
