<?php
/* Smarty version 3.1.39, created on 2022-07-17 19:53:05
  from 'C:\wamp64\www\apps\fish-pond\application\views\templates\default\form\entry\entry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d3f8219976c7_72221097',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '532a0f3d34e87660c2d8721de8bdb61028ee3f2c' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\templates\\default\\form\\entry\\entry.tpl',
      1 => 1648613058,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/form/entry/entry_captures.tpl' => 1,
    'file:templates/default/alerts.tpl' => 1,
  ),
),false)) {
function content_62d3f8219976c7_72221097 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_137129304962d3f8219368f3_08809950', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_71994348462d3f821938370_48278375', 'before-page-footer');
?>


<?php $_smarty_tpl->_subTemplateRender('file:templates/default/form/entry/entry_captures.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_200681911362d3f82193b275_78521782', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_137129304962d3f8219368f3_08809950 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_137129304962d3f8219368f3_08809950',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_71994348462d3f821938370_48278375 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_71994348462d3f821938370_48278375',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'top_content'} */
class Block_52600674362d3f82193c095_16575127 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'top_content'} */
/* {block 'form_top_actions'} */
class Block_151926557362d3f821983cb4_31326310 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php echo (($tmp = @$_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_b4_button_save'))===null||$tmp==='' ? '' : $tmp);?>

		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_button_save');?>

		<?php
}
}
/* {/block 'form_top_actions'} */
/* {block 'before_form_fields'} */
class Block_4616958862d3f82198c4a0_11191236 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'before_form_fields'} */
/* {block 'form_fields'} */
class Block_36615164462d3f82198ef97_62877539 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'form_fields'} */
/* {block 'card_footer'} */
class Block_39225152262d3f8219936a2_79273560 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'card_footer'} */
/* {block 'bottom_content'} */
class Block_103508782562d3f821994f42_30848421 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'bottom_content'} */
/* {block 'content'} */
class Block_200681911362d3f82193b275_78521782 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_200681911362d3f82193b275_78521782',
  ),
  'top_content' => 
  array (
    0 => 'Block_52600674362d3f82193c095_16575127',
  ),
  'form_top_actions' => 
  array (
    0 => 'Block_151926557362d3f821983cb4_31326310',
  ),
  'before_form_fields' => 
  array (
    0 => 'Block_4616958862d3f82198c4a0_11191236',
  ),
  'form_fields' => 
  array (
    0 => 'Block_36615164462d3f82198ef97_62877539',
  ),
  'card_footer' => 
  array (
    0 => 'Block_39225152262d3f8219936a2_79273560',
  ),
  'bottom_content' => 
  array (
    0 => 'Block_103508782562d3f821994f42_30848421',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.tag.php','function'=>'smarty_modifier_tag',),1=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\block.html_block.php','function'=>'smarty_block_html_block',),));
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_52600674362d3f82193c095_16575127', 'top_content', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_151926557362d3f821983cb4_31326310', 'form_top_actions', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4616958862d3f82198c4a0_11191236', 'before_form_fields', $this->tplIndex);
?>
	

		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_entry_start');?>


		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_36615164462d3f82198ef97_62877539', 'form_fields', $this->tplIndex);
?>


		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_bottom_actions');?>


		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form_entry_end']->value)===null||$tmp==='' ? '' : $tmp);?>


		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_39225152262d3f8219936a2_79273560', 'card_footer', $this->tplIndex);
?>

	</div>
</div>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_103508782562d3f821994f42_30848421', 'bottom_content', $this->tplIndex);
?>

<?php
}
}
/* {/block 'content'} */
}
