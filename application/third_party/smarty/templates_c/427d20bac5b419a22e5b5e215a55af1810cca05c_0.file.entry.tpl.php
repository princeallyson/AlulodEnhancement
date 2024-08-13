<?php
/* Smarty version 3.1.39, created on 2022-12-17 21:16:43
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/apps/admin/news/entry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_639dc13bdc2433_10125011',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '427d20bac5b419a22e5b5e215a55af1810cca05c' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/apps/admin/news/entry.tpl',
      1 => 1671282997,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_639dc13bdc2433_10125011 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.iif.php','function'=>'smarty_modifier_iif',),2=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.concat.php','function'=>'smarty_modifier_concat',),3=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route.php','function'=>'smarty_modifier_route',),4=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),5=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is_user_permission.php','function'=>'smarty_modifier_is_user_permission',),6=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/function.attr.php','function'=>'smarty_function_attr',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php $_smarty_tpl->_assignInScope('id', (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['id'])===null||$tmp==='' ? false : $tmp));?>

<?php $_smarty_tpl->_assignInScope('ctrl_route', smarty_modifier_route_by_url((($tmp = @$_smarty_tpl->tpl_vars['ctrl_route']->value)===null||$tmp==='' ? '' : $tmp)));?>

<?php $_smarty_tpl->_assignInScope('form_entry_route', smarty_modifier_iif(smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,(smarty_modifier_iif('.update',$_smarty_tpl->tpl_vars['id']->value,'.store'))),$_smarty_tpl->tpl_vars['ctrl_route']->value));?>}
<?php $_smarty_tpl->_assignInScope('form_entry_action', smarty_modifier_route($_smarty_tpl->tpl_vars['form_entry_route']->value));
$_smarty_tpl->_assignInScope('can_entry', smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['form_entry_route']->value));?>

<?php $_smarty_tpl->_assignInScope('form_delete_route', smarty_modifier_concat($_smarty_tpl->tpl_vars['ctrl_route']->value,'.delete'));
$_smarty_tpl->_assignInScope('form_delete_action', smarty_modifier_route($_smarty_tpl->tpl_vars['form_delete_route']->value));
$_smarty_tpl->_assignInScope('can_delete', smarty_modifier_is_user_route($_smarty_tpl->tpl_vars['form_delete_route']->value));?>

<?php $_smarty_tpl->_assignInScope('can_activate', smarty_modifier_is_user_permission('activate-news'));?>

<?php $_smarty_tpl->_assignInScope('card_title', smarty_modifier_concat(smarty_modifier_iif((smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['can_entry']->value,'View')),$_smarty_tpl->tpl_vars['id']->value,'New'),' news'));?>

<?php $_smarty_tpl->_assignInScope('button_text', smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['id']->value,'Save'));
$_smarty_tpl->_assignInScope('button_swal_positive_text', smarty_modifier_concat(smarty_modifier_concat('swal-positive-text="Yes, ',(smarty_modifier_iif('update',$_smarty_tpl->tpl_vars['id']->value,'save'))),' it!"'));
$_smarty_tpl->_assignInScope('button_swal_title', smarty_modifier_iif('swal-title="Update news?"',$_smarty_tpl->tpl_vars['id']->value));
$_smarty_tpl->_assignInScope('button_swal_text', smarty_modifier_iif('',$_smarty_tpl->tpl_vars['id']->value,'swal-text="Save news?"'));?>

<?php $_smarty_tpl->_assignInScope('delete_button_swal_title', 'swal-title="Delete news?"');?>

<?php ob_start();
echo smarty_function_attr(array('list'=>array('enctype'=>"multipart/form-data")),$_smarty_tpl);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('form_entry_attr', $_prefixVariable1);
$_smarty_tpl->_assignInScope('show_active', true);?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_189943005639dc13bdb8c00_91222530', 'form_fields');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('ckeditor','fileinput','ajax_form_submit'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1875243030639dc13bdc0d43_94715284', 'custom_styles');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_816455175639dc13bdc1609_94015501', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/form/entry/entry.tpl');
}
/* {block 'form_fields'} */
class Block_189943005639dc13bdb8c00_91222530 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_fields' => 
  array (
    0 => 'Block_189943005639dc13bdb8c00_91222530',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.iif.php','function'=>'smarty_modifier_iif',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.nltobr.php','function'=>'smarty_modifier_nltobr',),));
?>

<div class="form-group">
	<label>Title <span class="required">*</span></label>
	<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="title" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Title" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['title'])===null||$tmp==='' ? '' : $tmp);?>
">
</div>

<div class="form-group">
	<label>Short Text <span class="required">*</span></label>
	<textarea class="form-control" <?php echo smarty_modifier_iif('name="short_text" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Short Text" rows=5 cols=5><?php echo smarty_modifier_nltobr((($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['short_text'])===null||$tmp==='' ? '' : $tmp));?>
</textarea>
</div>

<div class="form-group">
	<label for="content">Content <span class="required">*</span></label>
	<textarea id="content-ckeditor" class="form-control" <?php echo smarty_modifier_iif('id="content" name="content" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Content" rows=5 cols=5><?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['content'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
</div>

<?php if ($_smarty_tpl->tpl_vars['can_entry']->value) {?>
<div class="form-group">
	<label for="image">Banner <span class="required">*</span></label>
	<input class="file-input" type="file" name="image" id="image" data-show-upload="false" initial-preview="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['image'])===null||$tmp==='' ? '' : $tmp);?>
" data-fouc accept=".jpg,.png">
</div>
<?php }?>

<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_activate_item');?>

<?php
}
}
/* {/block 'form_fields'} */
/* {block 'custom_styles'} */
class Block_1875243030639dc13bdc0d43_94715284 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_styles' => 
  array (
    0 => 'Block_1875243030639dc13bdc0d43_94715284',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<style>
	.kv-file-remove, .file-drag-handle.drag-handle-init { display: none; }	
</style>

<?php
}
}
/* {/block 'custom_styles'} */
/* {block 'custom_scripts'} */
class Block_816455175639dc13bdc1609_94015501 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_816455175639dc13bdc1609_94015501',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('.form-submit').formSubmit({
			b4_submit: function () {
				$('#content-ckeditor').val(CKEDITOR.instances['content-ckeditor'].getData());
			}
		});

		$('[name="image"]').initBsFileInput();

		CKEDITOR.replace('content-ckeditor', {
            height: 400
        });
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
