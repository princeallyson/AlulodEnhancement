<?php
/* Smarty version 3.1.39, created on 2023-01-04 23:44:22
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/form/entry/entry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_63b59ed6708829_31912836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c8967e9f71659c200ffc20768d42696032ba533' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/form/entry/entry.tpl',
      1 => 1672847058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/form/entry/entry_captures.tpl' => 1,
    'file:templates/default/alerts.tpl' => 1,
  ),
),false)) {
function content_63b59ed6708829_31912836 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_109289750163b59ed66f0016_99378036', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_143959934363b59ed66f14a9_42141596', 'before-page-footer');
?>


<?php $_smarty_tpl->_subTemplateRender('file:templates/default/form/entry/entry_captures.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_190590016063b59ed66f3078_73729022', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_109289750163b59ed66f0016_99378036 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_109289750163b59ed66f0016_99378036',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_143959934363b59ed66f14a9_42141596 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_143959934363b59ed66f14a9_42141596',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'top_content'} */
class Block_191614153463b59ed66f3841_69048172 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'top_content'} */
/* {block 'form_top_actions'} */
class Block_70928623763b59ed66fc9e2_85607478 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php echo (($tmp = @$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_b4_button_save'))===null||$tmp==='' ? '' : $tmp);?>

				<?php
}
}
/* {/block 'form_top_actions'} */
/* {block 'before_form_fields'} */
class Block_51860710563b59ed6703934_99212409 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'before_form_fields'} */
/* {block 'form_fields'} */
class Block_100841870263b59ed6704ef9_60111215 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'form_fields'} */
/* {block 'after_form_fields'} */
class Block_211024926263b59ed6705687_27564635 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'after_form_fields'} */
/* {block 'card_footer'} */
class Block_75575037663b59ed6707005_96429061 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'card_footer'} */
/* {block 'bottom_content'} */
class Block_70874814163b59ed6707708_39463167 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'bottom_content'} */
/* {block 'content'} */
class Block_190590016063b59ed66f3078_73729022 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_190590016063b59ed66f3078_73729022',
  ),
  'top_content' => 
  array (
    0 => 'Block_191614153463b59ed66f3841_69048172',
  ),
  'form_top_actions' => 
  array (
    0 => 'Block_70928623763b59ed66fc9e2_85607478',
  ),
  'before_form_fields' => 
  array (
    0 => 'Block_51860710563b59ed6703934_99212409',
  ),
  'form_fields' => 
  array (
    0 => 'Block_100841870263b59ed6704ef9_60111215',
  ),
  'after_form_fields' => 
  array (
    0 => 'Block_211024926263b59ed6705687_27564635',
  ),
  'card_footer' => 
  array (
    0 => 'Block_75575037663b59ed6707005_96429061',
  ),
  'bottom_content' => 
  array (
    0 => 'Block_70874814163b59ed6707708_39463167',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.tag.php','function'=>'smarty_modifier_tag',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/block.html_block.php','function'=>'smarty_block_html_block',),));
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_191614153463b59ed66f3841_69048172', 'top_content', $this->tplIndex);
?>


<div class="card mb-0">
	<div class="card-header header-elements-inline">
		<?php echo smarty_modifier_tag("h6.card_title",$_smarty_tpl->tpl_vars['card_title']->value);?>

		<?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('html_block', array('el'=>".header-elements > .btn-group"));
$_block_repeat=true;
echo smarty_block_html_block(array('el'=>".header-elements > .btn-group"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_70928623763b59ed66fc9e2_85607478', 'form_top_actions', $this->tplIndex);
?>

		<?php $_block_repeat=false;
echo smarty_block_html_block(array('el'=>".header-elements > .btn-group"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>
	</div>

	<div class="card-body">
		<?php $_smarty_tpl->_subTemplateRender('file:templates/default/alerts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_delete_item');?>


		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_51860710563b59ed6703934_99212409', 'before_form_fields', $this->tplIndex);
?>
	

		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_entry_start');?>


		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_100841870263b59ed6704ef9_60111215', 'form_fields', $this->tplIndex);
?>


		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_211024926263b59ed6705687_27564635', 'after_form_fields', $this->tplIndex);
?>


		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_bottom_actions');?>


		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form_entry_end']->value)===null||$tmp==='' ? '' : $tmp);?>


		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_75575037663b59ed6707005_96429061', 'card_footer', $this->tplIndex);
?>

	</div>
</div>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_70874814163b59ed6707708_39463167', 'bottom_content', $this->tplIndex);
?>

<?php
}
}
/* {/block 'content'} */
}
