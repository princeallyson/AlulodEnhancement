<?php
/* Smarty version 3.1.39, created on 2022-07-06 18:51:34
  from 'C:\wamp64\www\apps\pet-adoption\application\views\modules\home\adoption_status.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c56936e9d717_68382096',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ffc6cd3ba0faf7a2cc8aa21934c5b522ce246ae' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\modules\\home\\adoption_status.tpl',
      1 => 1657104692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c56936e9d717_68382096 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_187416726662c56936e80293_15991602', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_130711014762c56936e81ce3_82285708', 'before-page-footer');
?>


<?php $_smarty_tpl->_assignInScope('can_entry', true);?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_210836422262c56936e85018_62728706', 'content');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('fileinput'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_177320773462c56936e9bf49_10952906', 'custom_scripts');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_187416726662c56936e80293_15991602 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_187416726662c56936e80293_15991602',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_130711014762c56936e81ce3_82285708 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_130711014762c56936e81ce3_82285708',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_210836422262c56936e85018_62728706 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_210836422262c56936e85018_62728706',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<h1>Status: <?php echo $_smarty_tpl->tpl_vars['adoption']->value['status'];?>
</h1>
				
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['adoption']->value['notes'])===null||$tmp==='' ? false : $tmp)) {?>
				<div class="mb-3">
					<h3>Your Notes</h3>
					<?php echo $_smarty_tpl->tpl_vars['adoption']->value['notes'];?>

				</div>
				<?php }?>
				<?php if ((($tmp = @$_smarty_tpl->tpl_vars['adoption']->value['remarks'])===null||$tmp==='' ? false : $tmp)) {?>
				<div class="mb-3">
					<h3>Remarks</h3>
					<?php echo $_smarty_tpl->tpl_vars['adoption']->value['remarks'];?>

				</div>
				<?php }?>
			</div>
			<div class="col-md-6">
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
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
}
/* {/block 'content'} */
/* {block 'custom_scripts'} */
class Block_177320773462c56936e9bf49_10952906 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_177320773462c56936e9bf49_10952906',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('[name="id_image"]').initBsFileInput();
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
