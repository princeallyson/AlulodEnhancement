<?php
/* Smarty version 3.1.39, created on 2022-07-17 19:51:56
  from 'C:\wamp64\www\apps\fish-pond\application\views\modules\home\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d3f7dc3e0714_19514993',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a54eb52ddba50b44ef3aa6082418719ba2ef417' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\modules\\home\\home.tpl',
      1 => 1657074419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d3f7dc3e0714_19514993 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_108176893062d3f7dc3820b1_82047975', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_77790865162d3f7dc3877b8_04410700', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_187695115262d3f7dc389127_88908155', 'content');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('lightgallery'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_82507597462d3f7dc3de259_32789150', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_108176893062d3f7dc3820b1_82047975 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_108176893062d3f7dc3820b1_82047975',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_77790865162d3f7dc3877b8_04410700 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_77790865162d3f7dc3877b8_04410700',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_187695115262d3f7dc389127_88908155 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_187695115262d3f7dc389127_88908155',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.concat.php','function'=>'smarty_modifier_concat',),));
?>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title font-weight-semibold">
					<a href="#" class="text-body">News and Updates</a>
				</h5>
			</div>

			<div class="card-body">
				<div class="row" id="news">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['news']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
					<div class="col-md-4 col-sm-6">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title font-weight-semibold"><a href="#" class="text-body"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['title'])===null||$tmp==='' ? '' : $tmp);?>
</a></h5>
							</div>

							<div class="card-body">
								<div class="card-img-actions mb-3 text-center">
									<img class="card-img img-fluid" src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['image'])===null||$tmp==='' ? '' : $tmp);?>
" alt="" style="max-height: 400px; width: auto">
									<div class="card-img-actions-overlay card-img">
										<a href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['image'])===null||$tmp==='' ? '' : $tmp);?>
" class="btn btn-outline-white border-2 btn-icon rounded-pill" data-popup="banner">
											<img class="d-none" src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['image'])===null||$tmp==='' ? '' : $tmp);?>
">
											<i class="<?php echo (defined('ICON_VIEW') ? constant('ICON_VIEW') : null);?>
"></i>
										</a>
									</div>
								</div>
								<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['short_text'])===null||$tmp==='' ? '' : $tmp);?>

							</div>

							<div class="card-footer d-flex">
								<?php echo $_smarty_tpl->tpl_vars['item']->value['created_at']->format('M. d, Y');?>

								<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'base_url' ][ 0 ], array( (($tmp = @smarty_modifier_concat('news/',$_smarty_tpl->tpl_vars['item']->value['id']))===null||$tmp==='' ? '' : $tmp) ));?>
" class="ml-auto">Read more <i class="icon-arrow-right8 ml-2"></i></a>
							</div>
						</div>
					</div>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
}
}
/* {/block 'content'} */
/* {block 'custom_scripts'} */
class Block_82507597462d3f7dc3de259_32789150 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_82507597462d3f7dc3de259_32789150',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('#news').lightGallery({
			thumbnail: true,
			selector: 'a[data-popup="banner"]',
		});
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
