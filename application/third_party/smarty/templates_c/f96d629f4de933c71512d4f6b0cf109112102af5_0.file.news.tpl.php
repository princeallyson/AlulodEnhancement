<?php
/* Smarty version 3.1.39, created on 2022-07-18 12:10:32
  from 'C:\wamp64\www\apps\brgy-alulod\application\views\modules\home\news.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d4dd384c1c56_46473561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f96d629f4de933c71512d4f6b0cf109112102af5' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\views\\modules\\home\\news.tpl',
      1 => 1657074745,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d4dd384c1c56_46473561 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_113574240162d4dd384b6a40_24275723', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_675718862d4dd384b87b4_28779901', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7432178962d4dd384ba1c8_52247280', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_113574240162d4dd384b6a40_24275723 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_113574240162d4dd384b6a40_24275723',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_675718862d4dd384b87b4_28779901 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_675718862d4dd384b87b4_28779901',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_7432178962d4dd384ba1c8_52247280 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7432178962d4dd384ba1c8_52247280',
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
