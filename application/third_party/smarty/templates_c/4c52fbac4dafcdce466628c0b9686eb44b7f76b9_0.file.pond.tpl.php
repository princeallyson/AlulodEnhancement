<?php
/* Smarty version 3.1.39, created on 2022-07-17 21:23:25
  from 'C:\wamp64\www\apps\fish-pond\application\views\modules\home\pond.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d40d4d215af6_41895788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c52fbac4dafcdce466628c0b9686eb44b7f76b9' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\modules\\home\\pond.tpl',
      1 => 1658064201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d40d4d215af6_41895788 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_96994258962d40d4d20a915_63465897', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_212873016662d40d4d20c201_22345331', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_90877323462d40d4d20d844_85230121', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_96994258962d40d4d20a915_63465897 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_96994258962d40d4d20a915_63465897',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_212873016662d40d4d20c201_22345331 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_212873016662d40d4d20c201_22345331',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_90877323462d40d4d20d844_85230121 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_90877323462d40d4d20d844_85230121',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<div class="mb-4">
				<div class="mb-3 text-center">
					<a href="#" class="d-inline-block">
						<img src="<?php echo $_smarty_tpl->tpl_vars['pond']->value['image'];?>
" class="img-fluid" alt="">
					</a>
				</div>

				<h4 class="font-weight-semibold mb-1">
					<span class="text-body"><?php echo $_smarty_tpl->tpl_vars['pond']->value['title'];?>
</span>
				</h4>

				<ul class="list-inline list-inline-dotted text-muted mb-3">
					<li class="list-inline-item"><?php echo $_smarty_tpl->tpl_vars['pond']->value['price'];?>
</li>
					<li class="list-inline-item"><?php echo $_smarty_tpl->tpl_vars['pond']->value['status'];?>
</li>
				</ul>

				<div class="mb-3">
					<?php echo $_smarty_tpl->tpl_vars['pond']->value['description'];?>

				</div>

				<div class="mb-3">
					<a href="" class="btn btn-primary">Send Inquiry</a>
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
