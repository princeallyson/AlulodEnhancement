<?php
/* Smarty version 3.1.39, created on 2022-07-07 16:34:43
  from 'C:\wamp64\www\apps\pet-adoption\application\views\modules\apps\admin\dashboard\dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c69aa3133fb2_97341266',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b00cab9f77945fed31528d7cb7c6eeb35314aeff' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\modules\\apps\\admin\\dashboard\\dashboard.tpl',
      1 => 1657182881,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c69aa3133fb2_97341266 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_25237203462c69aa31253b1_54469138', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_23594836062c69aa3126d84_63360773', 'before-page-footer');
?>


<?php $_smarty_tpl->_assignInScope('can_entry', true);?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4588024762c69aa3129c79_65754668', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_25237203462c69aa31253b1_54469138 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_25237203462c69aa31253b1_54469138',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_23594836062c69aa3126d84_63360773 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_23594836062c69aa3126d84_63360773',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_4588024762c69aa3129c79_65754668 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_4588024762c69aa3129c79_65754668',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Dashboard</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6 col-xl-3">
				<div class="card card-body">
					<div class="media">
						<div class="mr-3 align-self-center">
							<i class="icon-heart5 icon-3x text-success"></i>
						</div>

						<div class="media-body text-right">
							<h3 class="font-weight-semibold mb-0"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['total_pets']->value)===null||$tmp==='' ? 0 : $tmp);?>
</h3>
							<span class="text-uppercase font-size-sm text-muted">Total Pets</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-xl-3">
				<div class="card card-body">
					<div class="media">
						<div class="mr-3 align-self-center">
							<i class="icon-home icon-3x text-indigo"></i>
						</div>

						<div class="media-body text-right">
							<h3 class="font-weight-semibold mb-0"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['adopted_pets']->value)===null||$tmp==='' ? 0 : $tmp);?>
</h3>
							<span class="text-uppercase font-size-sm text-muted">Adopted Pets</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-xl-3">
				<div class="card card-body">
					<div class="media">
						<div class="media-body">
							<h3 class="font-weight-semibold mb-0"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['total_owners']->value)===null||$tmp==='' ? 0 : $tmp);?>
</h3>
							<span class="text-uppercase font-size-sm text-muted">Total Owner</span>
						</div>

						<div class="ml-3 align-self-center">
							<i class="icon-users4 icon-3x text-primary"></i>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-xl-3">
				<div class="card card-body">
					<div class="media">
						<div class="media-body">
							<h3 class="font-weight-semibold mb-0"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['total_staff']->value)===null||$tmp==='' ? 0 : $tmp);?>
</h3>
							<span class="text-uppercase font-size-sm text-muted">Total Staff</span>
						</div>

						<div class="ml-3 align-self-center">
							<i class="icon-users2 icon-3x text-danger"></i>
						</div>
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
