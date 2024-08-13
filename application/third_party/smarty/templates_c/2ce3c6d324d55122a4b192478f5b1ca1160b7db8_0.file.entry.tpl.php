<?php
/* Smarty version 3.1.39, created on 2022-07-18 10:35:52
  from 'C:\wamp64\www\apps\brgy-alulod\application\views\templates\default\form\entry\entry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d4c708728f62_84088171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ce3c6d324d55122a4b192478f5b1ca1160b7db8' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\views\\templates\\default\\form\\entry\\entry.tpl',
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
function content_62d4c708728f62_84088171 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_124918944662d4c7086d6f68_04861421', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_189376713162d4c7086d9201_54455204', 'before-page-footer');
?>


<?php $_smarty_tpl->_subTemplateRender('file:templates/default/form/entry/entry_captures.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_96182804262d4c7086ddb98_91209627', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_124918944662d4c7086d6f68_04861421 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_124918944662d4c7086d6f68_04861421',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_189376713162d4c7086d9201_54455204 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_189376713162d4c7086d9201_54455204',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'top_content'} */
class Block_176900344562d4c7086df0c8_87087526 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'top_content'} */
/* {block 'form_top_actions'} */
class Block_214504441262d4c7086f5ce9_98920701 extends Smarty_Internal_Block
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
class Block_114093372862d4c7087146c1_79813838 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'before_form_fields'} */
/* {block 'form_fields'} */
class Block_200731791262d4c7087192d7_45825286 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'form_fields'} */
/* {block 'card_footer'} */
class Block_104763231962d4c7087215c1_14641203 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<?php
}
}
/* {/block 'card_footer'} */
/* {block 'bottom_content'} */
class Block_94459710762d4c7087231c5_95617204 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'bottom_content'} */
/* {block 'content'} */
class Block_96182804262d4c7086ddb98_91209627 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_96182804262d4c7086ddb98_91209627',
  ),
  'top_content' => 
  array (
    0 => 'Block_176900344562d4c7086df0c8_87087526',
  ),
  'form_top_actions' => 
  array (
    0 => 'Block_214504441262d4c7086f5ce9_98920701',
  ),
  'before_form_fields' => 
  array (
    0 => 'Block_114093372862d4c7087146c1_79813838',
  ),
  'form_fields' => 
  array (
    0 => 'Block_200731791262d4c7087192d7_45825286',
  ),
  'card_footer' => 
  array (
    0 => 'Block_104763231962d4c7087215c1_14641203',
  ),
  'bottom_content' => 
  array (
    0 => 'Block_94459710762d4c7087231c5_95617204',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\libraries\\smarty\\plugins\\modifier.tag.php','function'=>'smarty_modifier_tag',),1=>array('file'=>'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\libraries\\smarty\\plugins\\block.html_block.php','function'=>'smarty_block_html_block',),));
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_176900344562d4c7086df0c8_87087526', 'top_content', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_214504441262d4c7086f5ce9_98920701', 'form_top_actions', $this->tplIndex);
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_114093372862d4c7087146c1_79813838', 'before_form_fields', $this->tplIndex);
?>
	

		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_entry_start');?>


		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_200731791262d4c7087192d7_45825286', 'form_fields', $this->tplIndex);
?>


		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_bottom_actions');?>


		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form_entry_end']->value)===null||$tmp==='' ? '' : $tmp);?>


		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_104763231962d4c7087215c1_14641203', 'card_footer', $this->tplIndex);
?>

	</div>
</div>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_94459710762d4c7087231c5_95617204', 'bottom_content', $this->tplIndex);
?>

<?php
}
}
/* {/block 'content'} */
}
