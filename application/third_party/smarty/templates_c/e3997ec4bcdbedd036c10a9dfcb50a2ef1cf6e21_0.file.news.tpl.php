<?php
/* Smarty version 3.1.39, created on 2022-07-17 21:08:43
  from 'C:\wamp64\www\apps\fish-pond\application\views\modules\home\news.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d409db28fab0_25462577',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3997ec4bcdbedd036c10a9dfcb50a2ef1cf6e21' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\modules\\home\\news.tpl',
      1 => 1657074745,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d409db28fab0_25462577 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_81763410162d409db284448_02802510', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_87335892562d409db285e56_01608346', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_52784496662d409db287543_72094235', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_81763410162d409db284448_02802510 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_81763410162d409db284448_02802510',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_87335892562d409db285e56_01608346 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_87335892562d409db285e56_01608346',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_52784496662d409db287543_72094235 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_52784496662d409db287543_72094235',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="card">
	<div class="card-body">
		<div class="mb-4">
			<div class="mb-3 text-center">
				<a href="#" class="d-inline-block">
					<img src="<?php echo $_smarty_tpl->tpl_vars['news']->value['image'];?>
" class="img-fluid" alt="">
				</a>
			</div>

			<h4 class="font-weight-semibold mb-1">
				<span class="text-body"><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</span>
			</h4>

			<ul class="list-inline list-inline-dotted text-muted mb-3">
				<li class="list-inline-item"><?php echo $_smarty_tpl->tpl_vars['news']->value['created_at']->format('M. d, Y');?>
</li>
			</ul>

			<div class="mb-3">
				<?php echo $_smarty_tpl->tpl_vars['news']->value['content'];?>

			</div>
		</div>
	</div>
</div>
<?php
}
}
/* {/block 'content'} */
}
