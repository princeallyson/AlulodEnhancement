<?php
/* Smarty version 3.1.39, created on 2022-07-18 10:35:28
  from 'C:\wamp64\www\apps\brgy-alulod\application\views\modules\home\ponds.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d4c6f06c7798_20438444',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b45f0d22307165bad3293606d5324f177434693' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\views\\modules\\home\\ponds.tpl',
      1 => 1658064064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/form/select1.tpl' => 1,
  ),
),false)) {
function content_62d4c6f06c7798_20438444 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_42929018062d4c6f067fac1_13580041', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_193445934062d4c6f0682b57_16498689', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_54340334462d4c6f0685b01_74325273', 'content');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('lightgallery','select2'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_170566283862d4c6f06c2393_02974557', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_42929018062d4c6f067fac1_13580041 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_42929018062d4c6f067fac1_13580041',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_193445934062d4c6f0682b57_16498689 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_193445934062d4c6f0682b57_16498689',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_54340334462d4c6f0685b01_74325273 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_54340334462d4c6f0685b01_74325273',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),));
?>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title font-weight-semibold">
					<a href="#" class="text-body">Ponds</a>
				</h5>
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col col-sm-2">
						<?php $_smarty_tpl->_subTemplateRender('file:templates/default/form/select1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('__label'=>'Type','__field'=>'transaction_type_id','__options'=>(($tmp = @$_smarty_tpl->tpl_vars['transaction_types']->value)===null||$tmp==='' ? array() : $tmp),'__required'=>false,'__selected'=>(($tmp = @$_smarty_tpl->tpl_vars['transaction_type_id']->value)===null||$tmp==='' ? false : $tmp),'can_entry'=>true), 0, false);
?>
					</div>
				</div>	
				<div class="row" id="news">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ponds']->value, 'item');
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
								<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['description'])===null||$tmp==='' ? '' : $tmp);?>

								<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['price'])===null||$tmp==='' ? '' : $tmp);?>

							</div>

							<div class="card-footer d-flex">
								<?php echo $_smarty_tpl->tpl_vars['item']->value['created_at']->format('M. d, Y');?>

								<a href="<?php echo smarty_modifier_route('ponds.view',$_smarty_tpl->tpl_vars['item']->value['id']);?>
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
class Block_170566283862d4c6f06c2393_02974557 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_170566283862d4c6f06c2393_02974557',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),));
?>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/js-base64@2.5.2/base64.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
	$(() => {
		$('#news').lightGallery({
			thumbnail: true,
			selector: 'a[data-popup="banner"]',
		});

		$('.bs-select2').select2();

		function filter()
		{
			var data = {
				transaction_type_id: $('select[name="transaction_type_id"] option:selected').val()
			};

			var str = Base64.encode(JSON.stringify(data));

			window.location = '<?php echo smarty_modifier_route('pets');?>
?p=' + str;
		}

		$('select[name="transaction_type_id"]').on('select2:select', function (e) 
		{
		    filter();
		});
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
