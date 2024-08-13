<?php
/* Smarty version 3.1.39, created on 2022-10-03 20:13:58
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/home/news.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_633ad2060f95f1_66726348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30c88d282c51b3a6f798f2f735b0971853fe88b3' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/home/news.tpl',
      1 => 1664632434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_633ad2060f95f1_66726348 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_528659536633ad2060e3149_07145308', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_885788283633ad2060e4134_16122558', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1712156477633ad2060e49b0_23448538', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_528659536633ad2060e3149_07145308 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_528659536633ad2060e3149_07145308',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_885788283633ad2060e4134_16122558 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_885788283633ad2060e4134_16122558',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_1712156477633ad2060e49b0_23448538 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1712156477633ad2060e49b0_23448538',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
<div class="row">
	<div class="col-12">
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
	</div>
</div>
<?php
}
}
/* {/block 'content'} */
}
