<?php
/* Smarty version 3.1.39, created on 2022-10-06 12:45:45
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/navbar/sorting.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_633e5d797e85b8_25028245',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c96a588a0d2fb5227e4ff6bcbfd0a99f5d5b1364' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/navbar/sorting.tpl',
      1 => 1664632436,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/alerts.tpl' => 1,
  ),
),false)) {
function content_633e5d797e85b8_25028245 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.concat.php','function'=>'smarty_modifier_concat',),2=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route.php','function'=>'smarty_modifier_route',),3=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),4=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/function.csrf.php','function'=>'smarty_function_csrf',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1261254880633e5d797c2955_36278876', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1165108985633e5d797c3855_64051534', 'before-page-footer');
?>


<?php $_smarty_tpl->_assignInScope('ctrl_route', smarty_modifier_route_by_url((($tmp = @$_smarty_tpl->tpl_vars['ctrl_route']->value)===null||$tmp==='' ? '' : $tmp)));
$_smarty_tpl->_assignInScope('form_route', smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,'.sort-update'));
$_smarty_tpl->_assignInScope('form_action', smarty_modifier_route($_smarty_tpl->tpl_vars['form_route']->value));
$_smarty_tpl->_assignInScope('can_entry', smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['form_route']->value));
$_smarty_tpl->_assignInScope('new_item_route', smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,'.new'));
$_smarty_tpl->_assignInScope('new_item_action', smarty_modifier_route($_smarty_tpl->tpl_vars['new_item_route']->value));
$_smarty_tpl->_assignInScope('can_add', smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['new_item_route']->value));?>

<?php if ($_smarty_tpl->tpl_vars['can_entry']->value) {?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'form_button_save', null, null);?>
<button type="button" class="btn btn-primary btn-sm form-submit" target="#form-entry" swal-positive-text="Yes, update it!" swal-title="<?php echo $_smarty_tpl->tpl_vars['button_swal_title']->value;?>
">
	Update
</button>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'form_entry_start', null, null);?>
<form action="<?php echo $_smarty_tpl->tpl_vars['form_action']->value;?>
" method="post" id="form-entry">
<?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

<input type="hidden" name="menus">
<input type="hidden" name="_method" value="patch">
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'form_entry_end', null, null);?>
</form>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php }?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1866927332633e5d797d0364_15168663', 'content');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1822401348633e5d797e45d5_93446741', 'custom_styles');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('nestable','ajax_form_submit'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1998446864633e5d797e6fc9_70778238', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_1261254880633e5d797c2955_36278876 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_1261254880633e5d797c2955_36278876',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_1165108985633e5d797c3855_64051534 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_1165108985633e5d797c3855_64051534',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_1866927332633e5d797d0364_15168663 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1866927332633e5d797d0364_15168663',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/block.html_block.php','function'=>'smarty_block_html_block',),));
?>

<div class="card mb-0">
	<div class="card-header header-elements-inline">
		<h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['card_title']->value;?>
</h5>
		<?php $_smarty_tpl->smarty->_cache['_tag_stack'][] = array('html_block', array('el'=>'.header-elements > .btn-group'));
$_block_repeat=true;
echo smarty_block_html_block(array('el'=>'.header-elements > .btn-group'), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
			<?php if ($_smarty_tpl->tpl_vars['can_add']->value) {?>
				<button type="button" class="btn btn-success btn-sm" data-redirect="<?php echo $_smarty_tpl->tpl_vars['new_item_action']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['button_add_text']->value;?>
</button>
			<?php }?>

			<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_button_save');?>

		<?php $_block_repeat=false;
echo smarty_block_html_block(array('el'=>'.header-elements > .btn-group'), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>
	</div>

	<div class="card-body">
		<?php $_smarty_tpl->_subTemplateRender('file:templates/default/alerts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		
		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['nestable']->value)===null||$tmp==='' ? '' : $tmp);?>

		
		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_entry_start');?>
	

		<?php if ($_smarty_tpl->tpl_vars['can_entry']->value) {?>
		<div class="text-right mt-3">
			<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_button_save');?>

		</div>
		<?php }?>
			
		<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_entry_end');?>

	</div>
</div>
<?php
}
}
/* {/block 'content'} */
/* {block 'custom_styles'} */
class Block_1822401348633e5d797e45d5_93446741 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_styles' => 
  array (
    0 => 'Block_1822401348633e5d797e45d5_93446741',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<style>
<?php if (!$_smarty_tpl->tpl_vars['can_entry']->value) {?>
.dd-handle {
    pointer-events: none;
}
<?php }?>	
</style>
<?php
}
}
/* {/block 'custom_styles'} */
/* {block 'custom_scripts'} */
class Block_1998446864633e5d797e6fc9_70778238 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_1998446864633e5d797e6fc9_70778238',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('.form-submit').formSubmit();

		$('#menus').nestable({
            maxDepth: 5,
            group: 1
        });

        function set() {
        	var items = JSON.stringify($('#menus').nestable('serialize'));
            
            $('input[name="menus"]').val(items);
        }

        $('#menus').on('change', () => {
            set();
        });

        set();
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
