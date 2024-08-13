<?php
/* Smarty version 3.1.39, created on 2022-10-01 21:54:23
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/master.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6338468f689160_40702990',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'daabd798e457ccf1e1dd919981b32a90486dfe90' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/master.tpl',
      1 => 1664632434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/head.tpl' => 1,
    'file:templates/default/navbar.tpl' => 1,
    'file:templates/default/sidebar.tpl' => 1,
    'file:templates/default/scripts.tpl' => 1,
  ),
),false)) {
function content_6338468f689160_40702990 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<?php $_smarty_tpl->_subTemplateRender('file:templates/default/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body>

	<?php if ((($tmp = @$_smarty_tpl->tpl_vars['navbar_visible']->value)===null||$tmp==='' ? false : $tmp)) {?>
	<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21291575706338468f6802d9_79162204', 'navbar');
?>

	<?php }?>
	
	<div class="page-content">
		<?php if ((($tmp = @$_smarty_tpl->tpl_vars['sidebar_visible']->value)===null||$tmp==='' ? false : $tmp)) {?>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9625243506338468f6819d4_06675017', 'sidebar');
?>

		<?php }?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17191683516338468f682847_45823133', 'before-content-wrapper');
?>

	</div>
</body>
<?php $_smarty_tpl->_subTemplateRender('file:templates/default/scripts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</html>
<?php }
/* {block 'navbar'} */
class Block_21291575706338468f6802d9_79162204 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'navbar' => 
  array (
    0 => 'Block_21291575706338468f6802d9_79162204',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<?php $_smarty_tpl->_subTemplateRender('file:templates/default/navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<?php
}
}
/* {/block 'navbar'} */
/* {block 'sidebar'} */
class Block_9625243506338468f6819d4_06675017 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_9625243506338468f6819d4_06675017',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="app-sidebar sidebar sidebar-dark sidebar-main sidebar-expand-lg sidebar-collapsed">
			<button type="button" class="btn btn-sidebar-expand sidebar-control sidebar-main-toggle">
				<i class="icon-arrow-right13"></i>
			</button>
			<div class="sidebar-section sidebar-section-body d-flex align-items-center border-bottom py-2">
				<h5 class="mb-0">Navigation</h5>
				<div class="my-1 ml-auto">
					<button type="button" class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-toggle d-none d-xl-inline-flex">
						<i class="icon-transmission"></i>
					</button>

					<button type="button" class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-xl-none">
						<i class="icon-cross2"></i>
					</button>
				</div>
			</div>
			<?php $_smarty_tpl->_subTemplateRender('file:templates/default/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		</div>
		<?php
}
}
/* {/block 'sidebar'} */
/* {block 'page-header'} */
class Block_16872874596338468f683d37_30641271 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

														<?php
}
}
/* {/block 'page-header'} */
/* {block 'before-page-header'} */
class Block_2379748456338468f683930_71473498 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="page-header">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16872874596338468f683d37_30641271', 'page-header', $this->tplIndex);
?>

						</div>
						<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'content0'} */
class Block_2835852976338468f684bd0_32030775 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content0'} */
/* {block 'content'} */
class Block_17426772936338468f685246_34414320 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content'} */
/* {block 'content2'} */
class Block_6529813566338468f6858a1_40722532 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content2'} */
/* {block 'content3'} */
class Block_19751704506338468f685f13_22601529 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content3'} */
/* {block 'content4'} */
class Block_733811166338468f686576_24724258 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content4'} */
/* {block 'content5'} */
class Block_20223938196338468f686bc4_72450817 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content5'} */
/* {block 'before-content'} */
class Block_18014054626338468f6847c0_77441132 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="content">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2835852976338468f684bd0_32030775', 'content0', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17426772936338468f685246_34414320', 'content', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6529813566338468f6858a1_40722532', 'content2', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19751704506338468f685f13_22601529', 'content3', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_733811166338468f686576_24724258', 'content4', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20223938196338468f686bc4_72450817', 'content5', $this->tplIndex);
?>

						</div>
						<?php
}
}
/* {/block 'before-content'} */
/* {block 'page-footer'} */
class Block_9915123686338468f687a17_61072434 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'page-footer'} */
/* {block 'before-page-footer'} */
class Block_13709343566338468f687604_97147912 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="page-footer">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9915123686338468f687a17_61072434', 'page-footer', $this->tplIndex);
?>

						</div>
						<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content-inner'} */
class Block_5732070696338468f683537_61469601 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2379748456338468f683930_71473498', 'before-page-header', $this->tplIndex);
?>


						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18014054626338468f6847c0_77441132', 'before-content', $this->tplIndex);
?>


						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13709343566338468f687604_97147912', 'before-page-footer', $this->tplIndex);
?>

					<?php
}
}
/* {/block 'content-inner'} */
/* {block 'before-content-inner'} */
class Block_786573066338468f6830a6_07866251 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<div class="content-inner">
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5732070696338468f683537_61469601', 'content-inner', $this->tplIndex);
?>

				</div>
				<?php
}
}
/* {/block 'before-content-inner'} */
/* {block 'content-wrapper'} */
class Block_12149371326338468f682c86_94644249 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_786573066338468f6830a6_07866251', 'before-content-inner', $this->tplIndex);
?>

			<?php
}
}
/* {/block 'content-wrapper'} */
/* {block 'before-content-wrapper'} */
class Block_17191683516338468f682847_45823133 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-content-wrapper' => 
  array (
    0 => 'Block_17191683516338468f682847_45823133',
  ),
  'content-wrapper' => 
  array (
    0 => 'Block_12149371326338468f682c86_94644249',
  ),
  'before-content-inner' => 
  array (
    0 => 'Block_786573066338468f6830a6_07866251',
  ),
  'content-inner' => 
  array (
    0 => 'Block_5732070696338468f683537_61469601',
  ),
  'before-page-header' => 
  array (
    0 => 'Block_2379748456338468f683930_71473498',
  ),
  'page-header' => 
  array (
    0 => 'Block_16872874596338468f683d37_30641271',
  ),
  'before-content' => 
  array (
    0 => 'Block_18014054626338468f6847c0_77441132',
  ),
  'content0' => 
  array (
    0 => 'Block_2835852976338468f684bd0_32030775',
  ),
  'content' => 
  array (
    0 => 'Block_17426772936338468f685246_34414320',
  ),
  'content2' => 
  array (
    0 => 'Block_6529813566338468f6858a1_40722532',
  ),
  'content3' => 
  array (
    0 => 'Block_19751704506338468f685f13_22601529',
  ),
  'content4' => 
  array (
    0 => 'Block_733811166338468f686576_24724258',
  ),
  'content5' => 
  array (
    0 => 'Block_20223938196338468f686bc4_72450817',
  ),
  'before-page-footer' => 
  array (
    0 => 'Block_13709343566338468f687604_97147912',
  ),
  'page-footer' => 
  array (
    0 => 'Block_9915123686338468f687a17_61072434',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="content-wrapper">
			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12149371326338468f682c86_94644249', 'content-wrapper', $this->tplIndex);
?>

		</div>
		<?php
}
}
/* {/block 'before-content-wrapper'} */
}
