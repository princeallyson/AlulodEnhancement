<?php
/* Smarty version 3.1.39, created on 2022-07-17 19:51:56
  from 'C:\wamp64\www\apps\fish-pond\application\views\templates\default\master.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d3f7dc4cd5e8_06200000',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b8a2f478b5cee555969f092a005fdff09f93362e' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\templates\\default\\master.tpl',
      1 => 1636957629,
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
function content_62d3f7dc4cd5e8_06200000 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_136780514462d3f7dc4aa0f2_42421259', 'navbar');
?>

	<?php }?>
	
	<div class="page-content">
		<?php if ((($tmp = @$_smarty_tpl->tpl_vars['sidebar_visible']->value)===null||$tmp==='' ? false : $tmp)) {?>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_190829107362d3f7dc4af882_03135271', 'sidebar');
?>

		<?php }?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_135375919262d3f7dc4b2476_36053197', 'before-content-wrapper');
?>

	</div>
</body>
<?php $_smarty_tpl->_subTemplateRender('file:templates/default/scripts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</html>
<?php }
/* {block 'navbar'} */
class Block_136780514462d3f7dc4aa0f2_42421259 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'navbar' => 
  array (
    0 => 'Block_136780514462d3f7dc4aa0f2_42421259',
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
class Block_190829107362d3f7dc4af882_03135271 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_190829107362d3f7dc4af882_03135271',
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
class Block_192753061662d3f7dc4b6dd9_62076540 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

														<?php
}
}
/* {/block 'page-header'} */
/* {block 'before-page-header'} */
class Block_41079215062d3f7dc4b5ef0_61036477 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="page-header">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_192753061662d3f7dc4b6dd9_62076540', 'page-header', $this->tplIndex);
?>

						</div>
						<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'content0'} */
class Block_75833596362d3f7dc4ba7e7_35868902 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content0'} */
/* {block 'content'} */
class Block_166390374862d3f7dc4bbd33_49923775 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content'} */
/* {block 'content2'} */
class Block_90295800562d3f7dc4bd234_53534990 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content2'} */
/* {block 'content3'} */
class Block_31010732162d3f7dc4be819_42030802 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content3'} */
/* {block 'content4'} */
class Block_100244340762d3f7dc4bfdf4_34350947 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content4'} */
/* {block 'content5'} */
class Block_26618896662d3f7dc4c1439_46193167 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content5'} */
/* {block 'before-content'} */
class Block_68221609462d3f7dc4b98d4_81231503 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="content">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_75833596362d3f7dc4ba7e7_35868902', 'content0', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_166390374862d3f7dc4bbd33_49923775', 'content', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_90295800562d3f7dc4bd234_53534990', 'content2', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_31010732162d3f7dc4be819_42030802', 'content3', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_100244340762d3f7dc4bfdf4_34350947', 'content4', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_26618896662d3f7dc4c1439_46193167', 'content5', $this->tplIndex);
?>

						</div>
						<?php
}
}
/* {/block 'before-content'} */
/* {block 'page-footer'} */
class Block_90037849762d3f7dc4c71d1_80758429 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'page-footer'} */
/* {block 'before-page-footer'} */
class Block_147990272862d3f7dc4c5558_24214889 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="page-footer">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_90037849762d3f7dc4c71d1_80758429', 'page-footer', $this->tplIndex);
?>

						</div>
						<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content-inner'} */
class Block_143624981862d3f7dc4b5101_05136777 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_41079215062d3f7dc4b5ef0_61036477', 'before-page-header', $this->tplIndex);
?>


						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_68221609462d3f7dc4b98d4_81231503', 'before-content', $this->tplIndex);
?>


						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_147990272862d3f7dc4c5558_24214889', 'before-page-footer', $this->tplIndex);
?>

					<?php
}
}
/* {/block 'content-inner'} */
/* {block 'before-content-inner'} */
class Block_4217594462d3f7dc4b4268_94446827 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<div class="content-inner">
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_143624981862d3f7dc4b5101_05136777', 'content-inner', $this->tplIndex);
?>

				</div>
				<?php
}
}
/* {/block 'before-content-inner'} */
/* {block 'content-wrapper'} */
class Block_106584675362d3f7dc4b3444_30847967 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4217594462d3f7dc4b4268_94446827', 'before-content-inner', $this->tplIndex);
?>

			<?php
}
}
/* {/block 'content-wrapper'} */
/* {block 'before-content-wrapper'} */
class Block_135375919262d3f7dc4b2476_36053197 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-content-wrapper' => 
  array (
    0 => 'Block_135375919262d3f7dc4b2476_36053197',
  ),
  'content-wrapper' => 
  array (
    0 => 'Block_106584675362d3f7dc4b3444_30847967',
  ),
  'before-content-inner' => 
  array (
    0 => 'Block_4217594462d3f7dc4b4268_94446827',
  ),
  'content-inner' => 
  array (
    0 => 'Block_143624981862d3f7dc4b5101_05136777',
  ),
  'before-page-header' => 
  array (
    0 => 'Block_41079215062d3f7dc4b5ef0_61036477',
  ),
  'page-header' => 
  array (
    0 => 'Block_192753061662d3f7dc4b6dd9_62076540',
  ),
  'before-content' => 
  array (
    0 => 'Block_68221609462d3f7dc4b98d4_81231503',
  ),
  'content0' => 
  array (
    0 => 'Block_75833596362d3f7dc4ba7e7_35868902',
  ),
  'content' => 
  array (
    0 => 'Block_166390374862d3f7dc4bbd33_49923775',
  ),
  'content2' => 
  array (
    0 => 'Block_90295800562d3f7dc4bd234_53534990',
  ),
  'content3' => 
  array (
    0 => 'Block_31010732162d3f7dc4be819_42030802',
  ),
  'content4' => 
  array (
    0 => 'Block_100244340762d3f7dc4bfdf4_34350947',
  ),
  'content5' => 
  array (
    0 => 'Block_26618896662d3f7dc4c1439_46193167',
  ),
  'before-page-footer' => 
  array (
    0 => 'Block_147990272862d3f7dc4c5558_24214889',
  ),
  'page-footer' => 
  array (
    0 => 'Block_90037849762d3f7dc4c71d1_80758429',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="content-wrapper">
			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_106584675362d3f7dc4b3444_30847967', 'content-wrapper', $this->tplIndex);
?>

		</div>
		<?php
}
}
/* {/block 'before-content-wrapper'} */
}
