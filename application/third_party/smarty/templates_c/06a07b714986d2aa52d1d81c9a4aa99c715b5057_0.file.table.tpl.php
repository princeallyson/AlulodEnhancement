<?php
/* Smarty version 3.1.39, created on 2022-10-01 21:54:45
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/table/table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_633846a5ab24b0_60105381',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06a07b714986d2aa52d1d81c9a4aa99c715b5057' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/table/table.tpl',
      1 => 1664632436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/alerts.tpl' => 1,
  ),
),false)) {
function content_633846a5ab24b0_60105381 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_795175588633846a5aa93f7_24964853', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1107414529633846a5aa9eb0_75877837', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_357293844633846a5aaa625_77363517', 'content');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1962427996633846a5aae2a6_27147955', 'custom_styles');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('datatable'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_245452962633846a5aaf2e3_27974580', 'scripts');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_32917136633846a5aaf9d4_60245221', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_795175588633846a5aa93f7_24964853 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_795175588633846a5aa93f7_24964853',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_1107414529633846a5aa9eb0_75877837 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_1107414529633846a5aa9eb0_75877837',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'table_top_buttons'} */
class Block_18325046633846a5aab574_68244982 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

					<?php
}
}
/* {/block 'table_top_buttons'} */
/* {block 'content_bottom'} */
class Block_743619111633846a5aad5b8_94450743 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'content_bottom'} */
/* {block 'content'} */
class Block_357293844633846a5aaa625_77363517 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_357293844633846a5aaa625_77363517',
  ),
  'table_top_buttons' => 
  array (
    0 => 'Block_18325046633846a5aab574_68244982',
  ),
  'content_bottom' => 
  array (
    0 => 'Block_743619111633846a5aad5b8_94450743',
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18325046633846a5aab574_68244982', 'table_top_buttons', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_743619111633846a5aad5b8_94450743', 'content_bottom', $this->tplIndex);
?>

<?php
}
}
/* {/block 'content'} */
/* {block 'custom_styles'} */
class Block_1962427996633846a5aae2a6_27147955 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_styles' => 
  array (
    0 => 'Block_1962427996633846a5aae2a6_27147955',
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
class Block_245452962633846a5aaf2e3_27974580 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_245452962633846a5aaf2e3_27974580',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'scripts'} */
/* {block 'custom_scripts_bottom'} */
class Block_2001170629633846a5ab1b71_93953024 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'custom_scripts_bottom'} */
/* {block 'custom_scripts'} */
class Block_32917136633846a5aaf9d4_60245221 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_32917136633846a5aaf9d4_60245221',
  ),
  'custom_scripts_bottom' => 
  array (
    0 => 'Block_2001170629633846a5ab1b71_93953024',
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2001170629633846a5ab1b71_93953024', 'custom_scripts_bottom', $this->tplIndex);
?>

<?php
}
}
/* {/block 'custom_scripts'} */
}
