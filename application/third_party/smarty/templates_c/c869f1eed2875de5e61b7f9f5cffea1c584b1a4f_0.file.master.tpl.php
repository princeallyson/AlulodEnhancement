<?php
/* Smarty version 3.1.39, created on 2022-07-06 09:59:07
  from 'C:\wamp64\www\apps\pet-adoption\application\views\templates\default\master.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c4ec6b3ac3a2_43303904',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c869f1eed2875de5e61b7f9f5cffea1c584b1a4f' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\templates\\default\\master.tpl',
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
function content_62c4ec6b3ac3a2_43303904 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_27347203762c4ec6b36c342_62699124', 'navbar');
?>

	<?php }?>
	
	<div class="page-content">
		<?php if ((($tmp = @$_smarty_tpl->tpl_vars['sidebar_visible']->value)===null||$tmp==='' ? false : $tmp)) {?>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10183567562c4ec6b37ba63_93514610', 'sidebar');
?>

		<?php }?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_148751330462c4ec6b384d33_41682477', 'before-content-wrapper');
?>

	</div>
</body>
<?php $_smarty_tpl->_subTemplateRender('file:templates/default/scripts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</html>
<?php }
/* {block 'navbar'} */
class Block_27347203762c4ec6b36c342_62699124 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'navbar' => 
  array (
    0 => 'Block_27347203762c4ec6b36c342_62699124',
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
class Block_10183567562c4ec6b37ba63_93514610 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sidebar' => 
  array (
    0 => 'Block_10183567562c4ec6b37ba63_93514610',
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
class Block_59067415662c4ec6b38d660_19801497 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

														<?php
}
}
/* {/block 'page-header'} */
/* {block 'before-page-header'} */
class Block_77172149062c4ec6b38c092_49374166 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="page-header">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_59067415662c4ec6b38d660_19801497', 'page-header', $this->tplIndex);
?>

						</div>
						<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'content0'} */
class Block_51744381562c4ec6b394326_88328977 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content0'} */
/* {block 'content'} */
class Block_61701009562c4ec6b396b03_80430899 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content'} */
/* {block 'content2'} */
class Block_71230492862c4ec6b399281_37013742 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content2'} */
/* {block 'content3'} */
class Block_203211197262c4ec6b39baa4_31022593 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content3'} */
/* {block 'content4'} */
class Block_195753449362c4ec6b39e807_65064811 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content4'} */
/* {block 'content5'} */
class Block_62349338962c4ec6b3a0fa0_61813435 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'content5'} */
/* {block 'before-content'} */
class Block_143152485762c4ec6b392656_47167200 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="content">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_51744381562c4ec6b394326_88328977', 'content0', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_61701009562c4ec6b396b03_80430899', 'content', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_71230492862c4ec6b399281_37013742', 'content2', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_203211197262c4ec6b39baa4_31022593', 'content3', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_195753449362c4ec6b39e807_65064811', 'content4', $this->tplIndex);
?>

							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_62349338962c4ec6b3a0fa0_61813435', 'content5', $this->tplIndex);
?>

						</div>
						<?php
}
}
/* {/block 'before-content'} */
/* {block 'page-footer'} */
class Block_91729056762c4ec6b3a64b5_01951706 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

							<?php
}
}
/* {/block 'page-footer'} */
/* {block 'before-page-footer'} */
class Block_177636130562c4ec6b3a5567_80646524 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<div class="page-footer">
							<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_91729056762c4ec6b3a64b5_01951706', 'page-footer', $this->tplIndex);
?>

						</div>
						<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content-inner'} */
class Block_73319095362c4ec6b389eb2_30685170 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_77172149062c4ec6b38c092_49374166', 'before-page-header', $this->tplIndex);
?>


						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_143152485762c4ec6b392656_47167200', 'before-content', $this->tplIndex);
?>


						<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_177636130562c4ec6b3a5567_80646524', 'before-page-footer', $this->tplIndex);
?>

					<?php
}
}
/* {/block 'content-inner'} */
/* {block 'before-content-inner'} */
class Block_53464423862c4ec6b387948_78691589 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<div class="content-inner">
					<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_73319095362c4ec6b389eb2_30685170', 'content-inner', $this->tplIndex);
?>

				</div>
				<?php
}
}
/* {/block 'before-content-inner'} */
/* {block 'content-wrapper'} */
class Block_23244516662c4ec6b386352_73013963 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

				<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_53464423862c4ec6b387948_78691589', 'before-content-inner', $this->tplIndex);
?>

			<?php
}
}
/* {/block 'content-wrapper'} */
/* {block 'before-content-wrapper'} */
class Block_148751330462c4ec6b384d33_41682477 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-content-wrapper' => 
  array (
    0 => 'Block_148751330462c4ec6b384d33_41682477',
  ),
  'content-wrapper' => 
  array (
    0 => 'Block_23244516662c4ec6b386352_73013963',
  ),
  'before-content-inner' => 
  array (
    0 => 'Block_53464423862c4ec6b387948_78691589',
  ),
  'content-inner' => 
  array (
    0 => 'Block_73319095362c4ec6b389eb2_30685170',
  ),
  'before-page-header' => 
  array (
    0 => 'Block_77172149062c4ec6b38c092_49374166',
  ),
  'page-header' => 
  array (
    0 => 'Block_59067415662c4ec6b38d660_19801497',
  ),
  'before-content' => 
  array (
    0 => 'Block_143152485762c4ec6b392656_47167200',
  ),
  'content0' => 
  array (
    0 => 'Block_51744381562c4ec6b394326_88328977',
  ),
  'content' => 
  array (
    0 => 'Block_61701009562c4ec6b396b03_80430899',
  ),
  'content2' => 
  array (
    0 => 'Block_71230492862c4ec6b399281_37013742',
  ),
  'content3' => 
  array (
    0 => 'Block_203211197262c4ec6b39baa4_31022593',
  ),
  'content4' => 
  array (
    0 => 'Block_195753449362c4ec6b39e807_65064811',
  ),
  'content5' => 
  array (
    0 => 'Block_62349338962c4ec6b3a0fa0_61813435',
  ),
  'before-page-footer' => 
  array (
    0 => 'Block_177636130562c4ec6b3a5567_80646524',
  ),
  'page-footer' => 
  array (
    0 => 'Block_91729056762c4ec6b3a64b5_01951706',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

		<div class="content-wrapper">
			<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_23244516662c4ec6b386352_73013963', 'content-wrapper', $this->tplIndex);
?>

		</div>
		<?php
}
}
/* {/block 'before-content-wrapper'} */
}
