<?php
/* Smarty version 3.1.39, created on 2022-07-18 10:26:05
  from 'C:\wamp64\www\apps\brgy-alulod\application\views\templates\default\master.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d4c4bdbfea38_81949208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a6657cb022f9e8009667f02ad1dc716f08f777f2' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\views\\templates\\default\\master.tpl',
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
function content_62d4c4bdbfea38_81949208 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_85584775462d4c4bdbd1d09_73830215', 'navbar');
?>

	<?php }?>
	
	<div class="page-content">
		<?php if ((($tmp = @$_smarty_tpl->tpl_vars['sidebar_visible']->value)===null||$tmp==='' ? false : $tmp)) {?>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_180018761262d4c4bdbd9b72_12315918', 'sidebar');
?>

		<?php }?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_84845921062d4c4bdbdce62_71993977', 'before-content-wrapper');
?>

	</div>
</body>
<?php $_smarty_tpl->_subTemplateRender('file:templates/default/scripts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</html>
<?php }
/* {block 'navbar'} */
class Block_85584775462d4c4bdbd1d09_73830215 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'navbar' => 
  array (
    0 => 'Block_85584775462d4c4bdbd1d09_73830215',
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
class Block_180018761262d4c4bdbd9b72_12315918 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_180018761262d4c4bdbd9b72_12315918',
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
class Block_39041503762d4c4bdbe6077_15670458 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

														<?php
}
}
/* {/block 'page-header'} */
/* {block 'before-page-header'} */
class Block_143523345362d4c4bdbe4432_11067780 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="page-header">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_39041503762d4c4bdbe6077_15670458', 'page-header', $this->tplIndex);
?>

						</div>
						<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'content0'} */
class Block_173077732262d4c4bdbea267_07464419 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content0'} */
/* {block 'content'} */
class Block_136036839362d4c4bdbebd72_18694740 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content'} */
/* {block 'content2'} */
class Block_185280323562d4c4bdbed586_23612040 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content2'} */
/* {block 'content3'} */
class Block_198221451362d4c4bdbeecb8_15180526 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content3'} */
/* {block 'content4'} */
class Block_47959242862d4c4bdbf03a9_19405868 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content4'} */
/* {block 'content5'} */
class Block_11299548462d4c4bdbf1a41_84974824 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content5'} */
/* {block 'before-content'} */
class Block_65759776562d4c4bdbe9297_22768893 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="content">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_173077732262d4c4bdbea267_07464419', 'content0', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_136036839362d4c4bdbebd72_18694740', 'content', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_185280323562d4c4bdbed586_23612040', 'content2', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_198221451362d4c4bdbeecb8_15180526', 'content3', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_47959242862d4c4bdbf03a9_19405868', 'content4', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11299548462d4c4bdbf1a41_84974824', 'content5', $this->tplIndex);
?>

						</div>
						<?php
}
}
/* {/block 'before-content'} */
/* {block 'page-footer'} */
class Block_73930864062d4c4bdbf64a0_64654319 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'page-footer'} */
/* {block 'before-page-footer'} */
class Block_75349334562d4c4bdbf4603_22108806 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="page-footer">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_73930864062d4c4bdbf64a0_64654319', 'page-footer', $this->tplIndex);
?>

						</div>
						<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content-inner'} */
class Block_103281708162d4c4bdbe2560_99561444 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_143523345362d4c4bdbe4432_11067780', 'before-page-header', $this->tplIndex);
?>


						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_65759776562d4c4bdbe9297_22768893', 'before-content', $this->tplIndex);
?>


						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_75349334562d4c4bdbf4603_22108806', 'before-page-footer', $this->tplIndex);
?>

					<?php
}
}
/* {/block 'content-inner'} */
/* {block 'before-content-inner'} */
class Block_77959742262d4c4bdbdf088_02656515 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<div class="content-inner">
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_103281708162d4c4bdbe2560_99561444', 'content-inner', $this->tplIndex);
?>

				</div>
				<?php
}
}
/* {/block 'before-content-inner'} */
/* {block 'content-wrapper'} */
class Block_100404280862d4c4bdbddc33_93133160 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_77959742262d4c4bdbdf088_02656515', 'before-content-inner', $this->tplIndex);
?>

			<?php
}
}
/* {/block 'content-wrapper'} */
/* {block 'before-content-wrapper'} */
class Block_84845921062d4c4bdbdce62_71993977 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-content-wrapper' => 
  array (
    0 => 'Block_84845921062d4c4bdbdce62_71993977',
  ),
  'content-wrapper' => 
  array (
    0 => 'Block_100404280862d4c4bdbddc33_93133160',
  ),
  'before-content-inner' => 
  array (
    0 => 'Block_77959742262d4c4bdbdf088_02656515',
  ),
  'content-inner' => 
  array (
    0 => 'Block_103281708162d4c4bdbe2560_99561444',
  ),
  'before-page-header' => 
  array (
    0 => 'Block_143523345362d4c4bdbe4432_11067780',
  ),
  'page-header' => 
  array (
    0 => 'Block_39041503762d4c4bdbe6077_15670458',
  ),
  'before-content' => 
  array (
    0 => 'Block_65759776562d4c4bdbe9297_22768893',
  ),
  'content0' => 
  array (
    0 => 'Block_173077732262d4c4bdbea267_07464419',
  ),
  'content' => 
  array (
    0 => 'Block_136036839362d4c4bdbebd72_18694740',
  ),
  'content2' => 
  array (
    0 => 'Block_185280323562d4c4bdbed586_23612040',
  ),
  'content3' => 
  array (
    0 => 'Block_198221451362d4c4bdbeecb8_15180526',
  ),
  'content4' => 
  array (
    0 => 'Block_47959242862d4c4bdbf03a9_19405868',
  ),
  'content5' => 
  array (
    0 => 'Block_11299548462d4c4bdbf1a41_84974824',
  ),
  'before-page-footer' => 
  array (
    0 => 'Block_75349334562d4c4bdbf4603_22108806',
  ),
  'page-footer' => 
  array (
    0 => 'Block_73930864062d4c4bdbf64a0_64654319',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="content-wrapper">
			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_100404280862d4c4bdbddc33_93133160', 'content-wrapper', $this->tplIndex);
?>

		</div>
		<?php
}
}
/* {/block 'before-content-wrapper'} */
}
