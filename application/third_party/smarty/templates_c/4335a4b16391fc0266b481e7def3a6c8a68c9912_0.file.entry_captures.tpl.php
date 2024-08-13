<?php
/* Smarty version 3.1.39, created on 2022-12-17 21:15:47
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/form/entry/entry_captures.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_639dc103337a98_55124131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4335a4b16391fc0266b481e7def3a6c8a68c9912' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/form/entry/entry_captures.tpl',
      1 => 1671282945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_639dc103337a98_55124131 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/function.csrf.php','function'=>'smarty_function_csrf',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.haskey.php','function'=>'smarty_modifier_haskey',),2=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.iif.php','function'=>'smarty_modifier_iif',),));
if ($_smarty_tpl->tpl_vars['can_entry']->value) {?>
	<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'form_button_save', null, null);?>
		<button type="button" class="btn btn-primary btn-sm form-submit save-item" target="#form-entry" 
		<?php echo $_smarty_tpl->tpl_vars['button_swal_positive_text']->value;?>
 
		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['button_swal_title']->value)===null||$tmp==='' ? '' : $tmp);?>
 
		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['button_swal_text']->value)===null||$tmp==='' ? '' : $tmp);?>
>
		<?php echo $_smarty_tpl->tpl_vars['button_text']->value;?>

		</button>
	<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

	<?php if ($_smarty_tpl->tpl_vars['id']->value) {?>
		<?php if ($_smarty_tpl->tpl_vars['can_delete']->value) {?>
			<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'form_delete_item', null, null);?>
				<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['form_delete_action']->value;?>
" id="form-delete-item">
					<?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

					<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
					<input type="hidden" name="_method" value="delete">
				</form>
			<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
		<?php }?>
	<?php }?>

	<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'form_entry_start', null, null);?>
		<form action="<?php echo $_smarty_tpl->tpl_vars['form_entry_action']->value;?>
" method="post" id="form-entry" <?php echo (($tmp = @$_smarty_tpl->tpl_vars['form_entry_attr']->value)===null||$tmp==='' ? '' : $tmp);?>
>
		<?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

		<?php if ($_smarty_tpl->tpl_vars['id']->value) {?>
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
			<input type="hidden" name="_method" value="patch">
		<?php }?>
	<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
	
	<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'form_entry_end', null, null);?>
		</form>
	<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

	<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'form_bottom_actions', null, null);?>
		<?php if ($_smarty_tpl->tpl_vars['can_delete']->value && $_smarty_tpl->tpl_vars['id']->value) {?>
			<div class="d-flex justify-content-between mt-4">
				<?php if ($_smarty_tpl->tpl_vars['id']->value) {?>
					<button type="button" class="btn btn-danger btn-sm form-submit delete-item" data-loading target="#form-delete-item" <?php echo $_smarty_tpl->tpl_vars['delete_button_swal_title']->value;?>
 swal-positive-text="Yes, delete it!">
						Delete
					</button>
				<?php }?>
				<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_button_save');?>

			</div>
		<?php } else { ?>
			<div class="text-right mt-4">
				<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'form_button_save');?>

			</div>
		<?php }?>
	<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
}?>

<?php if ($_smarty_tpl->tpl_vars['id']->value && smarty_modifier_haskey((($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value)===null||$tmp==='' ? false : $tmp),'active')) {?>
	<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'form_activate_item', null, null);?>
		<div class="form-group <?php echo smarty_modifier_iif('',((($tmp = @$_smarty_tpl->tpl_vars['show_active']->value)===null||$tmp==='' ? false : $tmp)),'d-none');?>
">
            <div class="custom-control custom-control-right custom-switch custom-control-inline">
                <input type="checkbox" class=" custom-control-input" id="item-active" <?php echo smarty_modifier_iif('name="active"',($_smarty_tpl->tpl_vars['can_activate']->value),'disabled');?>
 <?php echo (($tmp = @smarty_modifier_iif('checked',$_smarty_tpl->tpl_vars['prev_data']->value['active']))===null||$tmp==='' ? false : $tmp);?>
>
                <label class="custom-control-label" for="item-active">Active</label>
            </div>
		</div>
	<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
}
}
}
