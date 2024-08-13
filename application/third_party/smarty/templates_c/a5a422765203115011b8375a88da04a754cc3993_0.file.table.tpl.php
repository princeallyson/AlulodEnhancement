<?php
/* Smarty version 3.1.39, created on 2022-07-06 09:59:12
  from 'C:\wamp64\www\apps\pet-adoption\application\views\templates\default\table\table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c4ec703ddac1_44956907',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5a422765203115011b8375a88da04a754cc3993' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\templates\\default\\table\\table.tpl',
      1 => 1632194294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/alerts.tpl' => 1,
  ),
),false)) {
function content_62c4ec703ddac1_44956907 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_172370719062c4ec703a3cd8_85866773', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_124387617862c4ec703ab320_99806994', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_188763891662c4ec703b0953_14876482', 'content');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_95803653762c4ec703c5599_41337918', 'custom_styles');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('datatable'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_113532434162c4ec703caf94_23932637', 'scripts');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_69580096362c4ec703cd0f3_62493355', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_172370719062c4ec703a3cd8_85866773 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_172370719062c4ec703a3cd8_85866773',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_124387617862c4ec703ab320_99806994 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_124387617862c4ec703ab320_99806994',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'table_top_buttons'} */
class Block_192421129762c4ec703b68d8_47317833 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<?php
}
}
/* {/block 'table_top_buttons'} */
/* {block 'content_bottom'} */
class Block_169648190562c4ec703bfbe4_57315961 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'content_bottom'} */
/* {block 'content'} */
class Block_188763891662c4ec703b0953_14876482 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_188763891662c4ec703b0953_14876482',
  ),
  'table_top_buttons' => 
  array (
    0 => 'Block_192421129762c4ec703b68d8_47317833',
  ),
  'content_bottom' => 
  array (
    0 => 'Block_169648190562c4ec703bfbe4_57315961',
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_192421129762c4ec703b68d8_47317833', 'table_top_buttons', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_169648190562c4ec703bfbe4_57315961', 'content_bottom', $this->tplIndex);
?>

<?php
}
}
/* {/block 'content'} */
/* {block 'custom_styles'} */
class Block_95803653762c4ec703c5599_41337918 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_styles' => 
  array (
    0 => 'Block_95803653762c4ec703c5599_41337918',
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
class Block_113532434162c4ec703caf94_23932637 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_113532434162c4ec703caf94_23932637',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'scripts'} */
/* {block 'custom_scripts_bottom'} */
class Block_171226991062c4ec703d93b7_53008411 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'custom_scripts_bottom'} */
/* {block 'custom_scripts'} */
class Block_69580096362c4ec703cd0f3_62493355 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_69580096362c4ec703cd0f3_62493355',
  ),
  'custom_scripts_bottom' => 
  array (
    0 => 'Block_171226991062c4ec703d93b7_53008411',
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_171226991062c4ec703d93b7_53008411', 'custom_scripts_bottom', $this->tplIndex);
?>

<?php
}
}
/* {/block 'custom_scripts'} */
}
