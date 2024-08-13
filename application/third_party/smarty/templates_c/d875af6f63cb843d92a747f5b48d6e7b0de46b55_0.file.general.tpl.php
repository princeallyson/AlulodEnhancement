<?php
/* Smarty version 3.1.39, created on 2022-07-06 10:18:59
  from 'C:\wamp64\www\apps\pet-adoption\application\views\modules\default\error\general.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c4f113dbe8c9_86264050',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd875af6f63cb843d92a747f5b48d6e7b0de46b55' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\modules\\default\\error\\general.tpl',
      1 => 1631068544,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c4f113dbe8c9_86264050 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_49822303062c4f113d7a015_59953983', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_93387134362c4f113d81867_61292077', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_60134306962c4f113d864d8_62896778', 'content-inner');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_49822303062c4f113d7a015_59953983 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_49822303062c4f113d7a015_59953983',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_93387134362c4f113d81867_61292077 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_93387134362c4f113d81867_61292077',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content-inner'} */
class Block_60134306962c4f113d864d8_62896778 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content-inner' => 
  array (
    0 => 'Block_60134306962c4f113d864d8_62896778',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),));
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
