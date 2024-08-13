<?php
/* Smarty version 3.1.39, created on 2022-07-06 16:50:23
  from 'C:\wamp64\www\apps\pet-adoption\application\views\modules\home\pets.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c54ccfa3a674_80724872',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '316fa62a7325417862126d73fb6e7a2a6095a6cc' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\modules\\home\\pets.tpl',
      1 => 1657097281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/form/select1.tpl' => 1,
  ),
),false)) {
function content_62c54ccfa3a674_80724872 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_55152472062c54ccf9e5913_83724118', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_57718160462c54ccf9e82a7_39367534', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_144586569262c54ccf9ea418_72285409', 'content');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('lightgallery','select2'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_162859159562c54ccfa34bd8_24559191', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_55152472062c54ccf9e5913_83724118 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_55152472062c54ccf9e5913_83724118',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_57718160462c54ccf9e82a7_39367534 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_57718160462c54ccf9e82a7_39367534',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_144586569262c54ccf9ea418_72285409 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_144586569262c54ccf9ea418_72285409',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),));
?>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title font-weight-semibold">
					<a href="#" class="text-body">Pets</a>
				</h5>
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col col-sm-2">
						<?php $_smarty_tpl->_subTemplateRender('file:templates/default/form/select1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('__label'=>'Type','__field'=>'pet_type','__options'=>(($tmp = @$_smarty_tpl->tpl_vars['pet_types']->value)===null||$tmp==='' ? array() : $tmp),'__required'=>false,'__selected'=>(($tmp = @$_smarty_tpl->tpl_vars['pet_type']->value)===null||$tmp==='' ? false : $tmp),'can_entry'=>true), 0, false);
?>
					</div>
				</div>	
				<div class="row" id="news">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pets']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
					<div class="col-md-4 col-sm-6">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title font-weight-semibold"><a href="#" class="text-body"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['name'])===null||$tmp==='' ? '' : $tmp);?>
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

								<a href="<?php echo smarty_modifier_route('pets.view',$_smarty_tpl->tpl_vars['item']->value['id']);?>
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
class Block_162859159562c54ccfa34bd8_24559191 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_162859159562c54ccfa34bd8_24559191',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),));
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
				pet_type: $('select[name="pet_type"] option:selected').val()
			};

			var str = Base64.encode(JSON.stringify(data));

			window.location = '<?php echo smarty_modifier_route('pets');?>
?p=' + str;
		}

		$('select[name="pet_type"]').on('select2:select', function (e) 
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
