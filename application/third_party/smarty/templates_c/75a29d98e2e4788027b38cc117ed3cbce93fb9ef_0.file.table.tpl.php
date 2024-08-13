<?php
/* Smarty version 3.1.39, created on 2022-07-17 19:53:03
  from 'C:\wamp64\www\apps\fish-pond\application\views\templates\default\table\table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d3f81f309fe9_66403469',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75a29d98e2e4788027b38cc117ed3cbce93fb9ef' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\templates\\default\\table\\table.tpl',
      1 => 1632194294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/alerts.tpl' => 1,
  ),
),false)) {
function content_62d3f81f309fe9_66403469 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_108604894862d3f81f2e8801_15459057', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_108757955262d3f81f2ea7d0_81390882', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_141665899462d3f81f2ec152_87931390', 'content');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19787344162d3f81f2fb7f5_49735104', 'custom_styles');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('datatable'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_109823580962d3f81f2fec76_76532466', 'scripts');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_58341518262d3f81f300231_79527160', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_108604894862d3f81f2e8801_15459057 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_108604894862d3f81f2e8801_15459057',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_108757955262d3f81f2ea7d0_81390882 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_108757955262d3f81f2ea7d0_81390882',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'table_top_buttons'} */
class Block_145288726162d3f81f2f24f2_06728484 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<?php
}
}
/* {/block 'table_top_buttons'} */
/* {block 'content_bottom'} */
class Block_202329836062d3f81f2f9349_94384530 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'content_bottom'} */
/* {block 'content'} */
class Block_141665899462d3f81f2ec152_87931390 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_141665899462d3f81f2ec152_87931390',
  ),
  'table_top_buttons' => 
  array (
    0 => 'Block_145288726162d3f81f2f24f2_06728484',
  ),
  'content_bottom' => 
  array (
    0 => 'Block_202329836062d3f81f2f9349_94384530',
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_145288726162d3f81f2f24f2_06728484', 'table_top_buttons', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_202329836062d3f81f2f9349_94384530', 'content_bottom', $this->tplIndex);
?>

<?php
}
}
/* {/block 'content'} */
/* {block 'custom_styles'} */
class Block_19787344162d3f81f2fb7f5_49735104 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_styles' => 
  array (
    0 => 'Block_19787344162d3f81f2fb7f5_49735104',
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
class Block_109823580962d3f81f2fec76_76532466 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_109823580962d3f81f2fec76_76532466',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'scripts'} */
/* {block 'custom_scripts_bottom'} */
class Block_105607674262d3f81f3076a3_93938068 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'custom_scripts_bottom'} */
/* {block 'custom_scripts'} */
class Block_58341518262d3f81f300231_79527160 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_58341518262d3f81f300231_79527160',
  ),
  'custom_scripts_bottom' => 
  array (
    0 => 'Block_105607674262d3f81f3076a3_93938068',
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_105607674262d3f81f3076a3_93938068', 'custom_scripts_bottom', $this->tplIndex);
?>

<?php
}
}
/* {/block 'custom_scripts'} */
}
