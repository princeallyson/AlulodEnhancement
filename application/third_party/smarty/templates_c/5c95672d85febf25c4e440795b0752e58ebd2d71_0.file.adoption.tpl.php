<?php
/* Smarty version 3.1.39, created on 2022-07-06 18:40:40
  from 'C:\wamp64\www\apps\pet-adoption\application\views\modules\home\adoption.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c566a8250461_31141452',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c95672d85febf25c4e440795b0752e58ebd2d71' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\modules\\home\\adoption.tpl',
      1 => 1657103906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/alerts.tpl' => 1,
    'file:templates/default/form/textarea1.tpl' => 1,
  ),
),false)) {
function content_62c566a8250461_31141452 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_76904884462c566a8235257_93529609', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_902282862c566a8236c43_37243406', 'before-page-footer');
?>


<?php $_smarty_tpl->_assignInScope('can_entry', true);?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_54215965162c566a8239a84_67529495', 'content');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('fileinput'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_173558350862c566a824ec95_99224799', 'custom_scripts');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_76904884462c566a8235257_93529609 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_76904884462c566a8235257_93529609',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_902282862c566a8236c43_37243406 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_902282862c566a8236c43_37243406',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_54215965162c566a8239a84_67529495 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_54215965162c566a8239a84_67529495',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),1=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\function.csrf.php','function'=>'smarty_function_csrf',),));
?>

<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-6">
				<?php $_smarty_tpl->_subTemplateRender('file:templates/default/alerts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<form action="<?php echo smarty_modifier_route('adoption.request');?>
" method="post" enctype="multipart/form-data">
				<?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

				<input type="hidden" name="pet_id" value="<?php echo $_smarty_tpl->tpl_vars['pet']->value['id'];?>
">
				<?php $_smarty_tpl->_subTemplateRender('file:templates/default/form/textarea1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('__label'=>'Notes','__field'=>'notes','__required'=>false), 0, false);
?>

				<div class="form-group">
					<label for="id_image">Valid ID <span class="required">*</span></label>
					<input class="file-input" type="file" name="id_image" id="id_image" data-show-upload="false"  data-fouc accept=".jpg,.png">
				</div>

				<button type="submit" class="btn btn-primary">Send Request</button>
				</form>
			</div>
			<div class="col-md-6">
				<div class="mb-4">
					<div class="mb-3 text-center">
						<a href="#" class="d-inline-block">
							<img src="<?php echo $_smarty_tpl->tpl_vars['pet']->value['image'];?>
" class="img-fluid" alt="">
						</a>
					</div>

					<h4 class="font-weight-semibold mb-1">
						<span class="text-body"><?php echo $_smarty_tpl->tpl_vars['pet']->value['name'];?>
</span>
					</h4>

					<ul class="list-inline list-inline-dotted text-muted mb-3">
						<li class="list-inline-item"><?php echo $_smarty_tpl->tpl_vars['pet']->value['breed'];?>
</li>
						<li class="list-inline-item"><?php echo $_smarty_tpl->tpl_vars['pet']->value['gender'];?>
</li>
						<li class="list-inline-item"><?php echo $_smarty_tpl->tpl_vars['pet']->value['birthdate'];?>
</li>
						<li class="list-inline-item"><?php echo $_smarty_tpl->tpl_vars['pet']->value['age'];?>
</li>
					</ul>

					<div class="mb-3">
						<?php echo $_smarty_tpl->tpl_vars['pet']->value['description'];?>

					</div>
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
class Block_173558350862c566a824ec95_99224799 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_173558350862c566a824ec95_99224799',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('[name="id_image"]').initBsFileInput();
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
