<?php
/* Smarty version 3.1.39, created on 2022-07-06 17:43:12
  from 'C:\wamp64\www\apps\pet-adoption\application\views\modules\home\pet.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c55930cbef70_89023673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09bf471563f86b1a2daf981c7c3a00fc8eeb2064' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\modules\\home\\pet.tpl',
      1 => 1657100590,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c55930cbef70_89023673 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_190011774462c55930ca0720_38821106', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_90671150262c55930ca5bc0_24601745', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_163323234462c55930ca9c59_82532623', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_190011774462c55930ca0720_38821106 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_190011774462c55930ca0720_38821106',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_90671150262c55930ca5bc0_24601745 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_90671150262c55930ca5bc0_24601745',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_163323234462c55930ca9c59_82532623 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_163323234462c55930ca9c59_82532623',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),));
?>

<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="mb-4">
			<div class="mb-3 text-center">
				<a href="#" class="d-inline-block">
					<img src="<?php echo $_smarty_tpl->tpl_vars['pet']->value['image'];?>
" class="img-fluid" alt="">
				</a>
			</div>

			<h4 class="font-weight-semibold mb-1">
				<span class="text-body"><?php echo $_smarty_tpl->tpl_vars['pet']->value['name'];?>
</span>
			</h4>

			<ul class="list-inline list-inline-dotted text-muted mb-3">
				<li class="list-inline-item"><?php echo $_smarty_tpl->tpl_vars['pet']->value['breed'];?>
</li>
				<li class="list-inline-item"><?php echo $_smarty_tpl->tpl_vars['pet']->value['gender'];?>
</li>
				<li class="list-inline-item"><?php echo $_smarty_tpl->tpl_vars['pet']->value['birthdate'];?>
</li>
				<li class="list-inline-item"><?php echo $_smarty_tpl->tpl_vars['pet']->value['age'];?>
</li>
			</ul>

			<div class="mb-3">
				<?php echo $_smarty_tpl->tpl_vars['pet']->value['description'];?>

			</div>

			<div class="mb-3">
				<a href="<?php echo smarty_modifier_route('adoption',$_smarty_tpl->tpl_vars['pet']->value['id']);?>
" class="btn btn-primary">Request Adoption</a>
			</div>
		</div>
	</div>
</div>
<?php
}
}
/* {/block 'content'} */
}
