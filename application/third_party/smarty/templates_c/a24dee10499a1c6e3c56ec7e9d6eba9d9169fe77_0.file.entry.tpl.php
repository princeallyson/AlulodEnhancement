<?php
/* Smarty version 3.1.39, created on 2022-07-06 09:59:21
  from 'C:\wamp64\www\apps\pet-adoption\application\views\templates\default\form\entry\entry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c4ec79917e69_88939363',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a24dee10499a1c6e3c56ec7e9d6eba9d9169fe77' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\templates\\default\\form\\entry\\entry.tpl',
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
function content_62c4ec79917e69_88939363 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_75121643462c4ec798d4c18_37594006', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_79681091962c4ec798d7001_47895925', 'before-page-footer');
?>


<?php $_smarty_tpl->_subTemplateRender('file:templates/default/form/entry/entry_captures.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_184270340662c4ec798ddf10_98290778', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_75121643462c4ec798d4c18_37594006 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_75121643462c4ec798d4c18_37594006',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_79681091962c4ec798d7001_47895925 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_79681091962c4ec798d7001_47895925',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'top_content'} */
class Block_34542156762c4ec798df816_83516568 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'top_content'} */
/* {block 'form_top_actions'} */
class Block_136518384762c4ec798f2c89_12535944 extends Smarty_Internal_Block
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
class Block_52528051262c4ec799012f9_49641716 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'before_form_fields'} */
/* {block 'form_fields'} */
class Block_158543040962c4ec79905d47_94718120 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'form_fields'} */
/* {block 'card_footer'} */
class Block_154271999162c4ec7990d549_19247901 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'card_footer'} */
/* {block 'bottom_content'} */
class Block_40684398462c4ec79913a15_11338043 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'bottom_content'} */
/* {block 'content'} */
class Block_184270340662c4ec798ddf10_98290778 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_184270340662c4ec798ddf10_98290778',
  ),
  'top_content' => 
  array (
    0 => 'Block_34542156762c4ec798df816_83516568',
  ),
  'form_top_actions' => 
  array (
    0 => 'Block_136518384762c4ec798f2c89_12535944',
  ),
  'before_form_fields' => 
  array (
    0 => 'Block_52528051262c4ec799012f9_49641716',
  ),
  'form_fields' => 
  array (
    0 => 'Block_158543040962c4ec79905d47_94718120',
  ),
  'card_footer' => 
  array (
    0 => 'Block_154271999162c4ec7990d549_19247901',
  ),
  'bottom_content' => 
  array (
    0 => 'Block_40684398462c4ec79913a15_11338043',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.tag.php','function'=>'smarty_modifier_tag',),1=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\block.html_block.php','function'=>'smarty_block_html_block',),));
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_34542156762c4ec798df816_83516568', 'top_content', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_136518384762c4ec798f2c89_12535944', 'form_top_actions', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_52528051262c4ec799012f9_49641716', 'before_form_fields', $this->tplIndex);
?>
	

		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_entry_start');?>


		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_158543040962c4ec79905d47_94718120', 'form_fields', $this->tplIndex);
?>


		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_bottom_actions');?>


		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form_entry_end']->value)===null||$tmp==='' ? '' : $tmp);?>


		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_154271999162c4ec7990d549_19247901', 'card_footer', $this->tplIndex);
?>

	</div>
</div>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_40684398462c4ec79913a15_11338043', 'bottom_content', $this->tplIndex);
?>

<?php
}
}
/* {/block 'content'} */
}
