<?php
/* Smarty version 3.1.39, created on 2022-07-17 20:59:02
  from 'C:\wamp64\www\apps\fish-pond\application\views\modules\apps\admin\ponds\entry.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d4079686cc64_29580250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed9047d3c38b603dc5a939de828274c43f823775' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\modules\\apps\\admin\\ponds\\entry.tpl',
      1 => 1658062740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/form/select1.tpl' => 2,
  ),
),false)) {
function content_62d4079686cc64_29580250 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.route_by_url.php','function'=>'smarty_modifier_route_by_url',),1=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.iif.php','function'=>'smarty_modifier_iif',),2=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.concat.php','function'=>'smarty_modifier_concat',),3=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),4=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),5=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.is_user_permission.php','function'=>'smarty_modifier_is_user_permission',),6=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\function.attr.php','function'=>'smarty_function_attr',),));
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

<?php $_smarty_tpl->_assignInScope('can_activate', smarty_modifier_is_user_permission('activate-pond'));?>

<?php $_smarty_tpl->_assignInScope('card_title', smarty_modifier_concat(smarty_modifier_iif((smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['can_entry']->value,'View')),$_smarty_tpl->tpl_vars['id']->value,'New'),' Pond'));?>

<?php $_smarty_tpl->_assignInScope('button_text', smarty_modifier_iif('Update',$_smarty_tpl->tpl_vars['id']->value,'Save'));
$_smarty_tpl->_assignInScope('button_swal_positive_text', smarty_modifier_concat(smarty_modifier_concat('swal-positive-text="Yes, ',(smarty_modifier_iif('update',$_smarty_tpl->tpl_vars['id']->value,'save'))),' it!"'));
$_smarty_tpl->_assignInScope('button_swal_title', smarty_modifier_iif('swal-title="Update Pond?"',$_smarty_tpl->tpl_vars['id']->value));
$_smarty_tpl->_assignInScope('button_swal_text', smarty_modifier_iif('',$_smarty_tpl->tpl_vars['id']->value,'swal-text="Save Pond?"'));?>

<?php $_smarty_tpl->_assignInScope('delete_button_swal_title', 'swal-title="Delete Pond?"');?>

<?php ob_start();
echo smarty_function_attr(array('list'=>array('enctype'=>"multipart/form-data")),$_smarty_tpl);
$_prefixVariable1 = ob_get_clean();
$_smarty_tpl->_assignInScope('form_entry_attr', $_prefixVariable1);?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_163352967762d4079684a837_75910799', 'form_fields');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('ckeditor','fileinput','ajax_form_submit','select2'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_78789722562d407968689c9_76926835', 'custom_styles');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_80420892562d4079686a3d9_14873158', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/form/entry/entry.tpl');
}
/* {block 'form_fields'} */
class Block_163352967762d4079684a837_75910799 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'form_fields' => 
  array (
    0 => 'Block_163352967762d4079684a837_75910799',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.iif.php','function'=>'smarty_modifier_iif',),));
?>

<div class="form-group">
	<label>Title <span class="required">*</span></label>
	<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="title" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Title" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['title'])===null||$tmp==='' ? '' : $tmp);?>
">
</div>

<?php $_smarty_tpl->_subTemplateRender('file:templates/default/form/select1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('__label'=>'Type','__field'=>'transaction_type_id','__options'=>(($tmp = @$_smarty_tpl->tpl_vars['transaction_types']->value)===null||$tmp==='' ? array() : $tmp)), 0, false);
?>

<div class="form-group">
	<label for="content">Description <span class="required">*</span></label>
	<textarea id="description-ckeditor" class="form-control" <?php echo smarty_modifier_iif('id="description" name="description" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Content" rows=5 cols=5><?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['description'])===null||$tmp==='' ? '' : $tmp);?>
</textarea>
</div>

<div class="form-group">
	<label>Price <span class="required">*</span></label>
	<input class="form-control" type="text" <?php echo smarty_modifier_iif('name="price" required',$_smarty_tpl->tpl_vars['can_entry']->value,'readonly');?>
 placeholder="Title" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['price'])===null||$tmp==='' ? '' : $tmp);?>
">
</div>

<?php if ($_smarty_tpl->tpl_vars['id']->value) {
$_smarty_tpl->_subTemplateRender('file:templates/default/form/select1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('__label'=>'Status','__field'=>'status','__options'=>array('Available','Not Available')), 0, true);
}?>

<?php if ($_smarty_tpl->tpl_vars['can_entry']->value) {?>
<div class="form-group">
	<label for="image">Image <span class="required">*</span></label>
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
class Block_78789722562d407968689c9_76926835 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_styles' => 
  array (
    0 => 'Block_78789722562d407968689c9_76926835',
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
class Block_80420892562d4079686a3d9_14873158 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_80420892562d4079686a3d9_14873158',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('.form-submit').formSubmit({
			b4_submit: function () {
				$('#description-ckeditor').val(CKEDITOR.instances['description-ckeditor'].getData());
			}
		});

		$('[name="image"]').initBsFileInput();

		CKEDITOR.replace('description-ckeditor', {
            height: 400
        });

        $('.bs-select2').select2();
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
