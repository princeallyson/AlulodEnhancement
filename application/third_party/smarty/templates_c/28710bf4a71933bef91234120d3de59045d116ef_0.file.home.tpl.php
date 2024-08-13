<?php
/* Smarty version 3.1.39, created on 2022-07-18 10:26:05
  from 'C:\wamp64\www\apps\brgy-alulod\application\views\modules\home\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d4c4bdabe121_11332079',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28710bf4a71933bef91234120d3de59045d116ef' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\views\\modules\\home\\home.tpl',
      1 => 1657074419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d4c4bdabe121_11332079 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_213838609662d4c4bda7bfb9_76633386', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_137518672462d4c4bda7f2e0_18509171', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14880114862d4c4bda810c4_39036222', 'content');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('lightgallery'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_197158732162d4c4bdabbd52_27394249', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_213838609662d4c4bda7bfb9_76633386 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_213838609662d4c4bda7bfb9_76633386',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_137518672462d4c4bda7f2e0_18509171 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_137518672462d4c4bda7f2e0_18509171',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_14880114862d4c4bda810c4_39036222 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_14880114862d4c4bda810c4_39036222',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\libraries\\smarty\\plugins\\modifier.concat.php','function'=>'smarty_modifier_concat',),));
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
class Block_197158732162d4c4bdabbd52_27394249 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_197158732162d4c4bdabbd52_27394249',
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
