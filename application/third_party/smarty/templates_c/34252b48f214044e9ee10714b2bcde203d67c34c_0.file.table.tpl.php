<?php
/* Smarty version 3.1.39, created on 2022-07-18 10:35:54
  from 'C:\wamp64\www\apps\brgy-alulod\application\views\templates\default\table\table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d4c70a489e03_73026874',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34252b48f214044e9ee10714b2bcde203d67c34c' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\views\\templates\\default\\table\\table.tpl',
      1 => 1632194294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/alerts.tpl' => 1,
  ),
),false)) {
function content_62d4c70a489e03_73026874 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_89767572462d4c70a456444_79204285', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_155114103362d4c70a458731_20786812', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_81104344362d4c70a45a826_46123795', 'content');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_156832038762d4c70a470ca1_88254000', 'custom_styles');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('datatable'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_120115150362d4c70a4754c5_77594264', 'scripts');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_91747985062d4c70a477141_53765696', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_89767572462d4c70a456444_79204285 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_89767572462d4c70a456444_79204285',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_155114103362d4c70a458731_20786812 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_155114103362d4c70a458731_20786812',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'table_top_buttons'} */
class Block_169316836962d4c70a4602a0_79443679 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<?php
}
}
/* {/block 'table_top_buttons'} */
/* {block 'content_bottom'} */
class Block_144513249762d4c70a46d054_61264066 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'content_bottom'} */
/* {block 'content'} */
class Block_81104344362d4c70a45a826_46123795 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_81104344362d4c70a45a826_46123795',
  ),
  'table_top_buttons' => 
  array (
    0 => 'Block_169316836962d4c70a4602a0_79443679',
  ),
  'content_bottom' => 
  array (
    0 => 'Block_144513249762d4c70a46d054_61264066',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="card mb-0">
	<div class="card-header header-elements-inline">
		<h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['card_title']->value;?>
</h5>
		<div class="header-elements">
			<div class="btn-group">
				<?php if ($_smarty_tpl->tpl_vars['can_add']->value) {?>
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_169316836962d4c70a4602a0_79443679', 'table_top_buttons', $this->tplIndex);
?>

					<?php if ($_smarty_tpl->tpl_vars['button_add_text']->value) {?>
						<button type="button" class="btn btn-success btn-sm" data-redirect="<?php echo $_smarty_tpl->tpl_vars['new_item_action']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['button_add_text']->value;?>
</button>
					<?php }?>
				<?php }?>
			</div>
		</div>
	</div>

	<?php $_smarty_tpl->_subTemplateRender('file:templates/default/alerts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	
	<table class="table dt-table table-xs w-100">
		<thead>
			<tr><?php echo $_smarty_tpl->tpl_vars['tableci']->value['html_table_columns'];?>
</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_144513249762d4c70a46d054_61264066', 'content_bottom', $this->tplIndex);
?>

<?php
}
}
/* {/block 'content'} */
/* {block 'custom_styles'} */
class Block_156832038762d4c70a470ca1_88254000 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_styles' => 
  array (
    0 => 'Block_156832038762d4c70a470ca1_88254000',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<style>
div.alert {
	margin-left: 1.25rem;
	margin-right: 1.25rem;
	margin-bottom: 0;
}
</style>
<?php
}
}
/* {/block 'custom_styles'} */
/* {block 'scripts'} */
class Block_120115150362d4c70a4754c5_77594264 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_120115150362d4c70a4754c5_77594264',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'scripts'} */
/* {block 'custom_scripts_bottom'} */
class Block_156873087762d4c70a4867c9_87659711 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'custom_scripts_bottom'} */
/* {block 'custom_scripts'} */
class Block_91747985062d4c70a477141_53765696 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_91747985062d4c70a477141_53765696',
  ),
  'custom_scripts_bottom' => 
  array (
    0 => 'Block_156873087762d4c70a4867c9_87659711',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('.dt-table').initDataTable({
			data: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['dt_data']->value)===null||$tmp==='' ? '[]' : $tmp);?>
,
			columns: <?php echo $_smarty_tpl->tpl_vars['tableci']->value['datatable_columns'];?>
,
			columnDefs: <?php echo $_smarty_tpl->tpl_vars['tableci']->value['datatable_column_defs'];?>
,
			stateSave: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['dt_save_state']->value)===null||$tmp==='' ? 'false' : $tmp);?>

		});
	});
<?php echo '</script'; ?>
>
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_156873087762d4c70a4867c9_87659711', 'custom_scripts_bottom', $this->tplIndex);
?>

<?php
}
}
/* {/block 'custom_scripts'} */
}
