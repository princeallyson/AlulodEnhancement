<?php
/* Smarty version 3.1.39, created on 2022-07-17 19:52:39
  from 'C:\wamp64\www\apps\fish-pond\application\views\modules\default\profile\profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d3f80741e729_28197754',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65a4bce4ea13ac443ddc5f746797dd406389506b' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\modules\\default\\profile\\profile.tpl',
      1 => 1633958165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:templates/default/alerts.tpl' => 1,
  ),
),false)) {
function content_62d3f80741e729_28197754 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),1=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),2=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\function.csrf.php','function'=>'smarty_function_csrf',),));
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_97014171162d3f8073a8761_77472448', 'page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_194334287262d3f8073aa353_50687034', 'before-page-footer');
?>


<?php $_smarty_tpl->_assignInScope('can_update_profile', smarty_modifier_is_user_route('profile.update'));
$_smarty_tpl->_assignInScope('can_update_profile_pic', smarty_modifier_is_user_route('profile.photo-update'));
$_smarty_tpl->_assignInScope('can_delete_profile_pic', smarty_modifier_is_user_route('profile.photo-delete'));
$_smarty_tpl->_assignInScope('can_update_password', smarty_modifier_is_user_route('profile.password-update'));?>

<?php if ($_smarty_tpl->tpl_vars['can_update_profile']->value) {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'profile_update_form_start', null, null);?>
<form action="<?php echo smarty_modifier_route('profile.update');?>
" method="post" id="form-profile">
<?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

<input type="hidden" name="_method" value="patch">
<?php if ((($tmp = @$_GET['uri'])===null||$tmp==='' ? false : $tmp)) {?>
<input type="hidden" name="uri" value="<?php echo $_GET['uri'];?>
">
<?php }
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'profile_update_form_end', null, null);?>
<div class="text-right">
	<button type="submit" class="btn btn-primary btn-sm form-submit" target="#form-profile"
	swal-positive-text="Yes, update it!" data-loading>Update</button>
</div></form>
<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
}?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_121338577562d3f8073c19e5_45867334', 'content');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_148618754862d3f8074078f2_59017482', 'custom_styles');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('lightgallery','select2','fileinput','bs_datepicker'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_193070656762d3f807416481_23014731', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'page-header'} */
class Block_97014171162d3f8073a8761_77472448 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page-header' => 
  array (
    0 => 'Block_97014171162d3f8073a8761_77472448',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'page-header'} */
/* {block 'before-page-footer'} */
class Block_194334287262d3f8073aa353_50687034 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_194334287262d3f8073aa353_50687034',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_121338577562d3f8073c19e5_45867334 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_121338577562d3f8073c19e5_45867334',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.iif.php','function'=>'smarty_modifier_iif',),1=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.uploads_img.php','function'=>'smarty_modifier_uploads_img',),2=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),3=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\function.csrf.php','function'=>'smarty_function_csrf',),));
?>

<?php $_smarty_tpl->_subTemplateRender('file:templates/default/alerts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-body text-center pb-0">
				<div class="card-img-actions d-inline-block mb-3">
					<div class="profile-photo-container rounded-circle"></div>
					<div class="<?php echo smarty_modifier_iif('card-img-actions-overlay',$_smarty_tpl->tpl_vars['can_update_profile_pic']->value);?>
 rounded-circle" id="profile-dp">
						<?php if ((($tmp = @$_smarty_tpl->tpl_vars['profile']->value['photo'])===null||$tmp==='' ? false : $tmp)) {?>
						<a href="<?php echo smarty_modifier_uploads_img($_smarty_tpl->tpl_vars['profile']->value['photo']);?>
" class="btn btn-outline-white border-2 btn-icon rounded-pill mr-2" data-popup="profile-dp">
							<img class="d-none" src="<?php echo smarty_modifier_uploads_img($_smarty_tpl->tpl_vars['profile']->value['photo']);?>
">
							<i class="icon-eye"></i>
						</a>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['can_update_profile_pic']->value) {?>
						<a href="#" class="btn btn-outline-white border-2 btn-icon rounded-pill" data-toggle="modal" data-target="#modal-dp">
							<i class="icon-upload"></i>
						</a>
						<?php if ($_smarty_tpl->tpl_vars['can_delete_profile_pic']->value) {?>
						<?php if ((($tmp = @$_smarty_tpl->tpl_vars['profile']->value['photo'])===null||$tmp==='' ? false : $tmp)) {?>
						<a href="#" class="btn btn-outline-white border-2 btn-icon rounded-pill ml-2 confirm-form-submit form-submit" target="#form-delete-photo" swal-positive-text="Yes, remove my picture!" data-loading>
							<i class="icon-trash-alt"></i>
						</a>
						<?php }?>
						<?php }?>
						<?php }?>
					</div>
				</div>

				<?php if ($_smarty_tpl->tpl_vars['can_delete_profile_pic']->value) {?>
				<form method="post" action="<?php echo smarty_modifier_route('profile.photo-delete');?>
" id="form-delete-photo">
					<?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

					<input type="hidden" name="_method" value="delete">
					<input type="hidden" name="tab" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['profile_tab_name']->value)===null||$tmp==='' ? '' : $tmp);?>
">
				</form>
				<?php }?>

				<h6 class="font-weight-semibold mb-0"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['profile']->value['fullname'])===null||$tmp==='' ? '' : $tmp);?>
</h6>
			</div>

			<ul class="list-group profile no-border pb-1">
				<div class="list-group-item list-group-divider my-1"></div>

				<li class="list-group-item p-0">
					<a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'base_url' ][ 0 ], array( 'logout' ));?>
" class="list-group-item list-group-item-action">
						<i class="icon-switch2 mr-2"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</div>
		<div id="modal-dp" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Profile Photo</h5>
						<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
					</div>

					<div class="modal-body">
						<?php if ($_smarty_tpl->tpl_vars['can_update_profile_pic']->value) {?>
						<form action="<?php echo smarty_modifier_route('profile.photo-update');?>
" method="post" enctype="multipart/form-data" id="change-dp">
							<?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

							<input type="hidden" name="_method" value="patch">
							<input class="file-input" type="file" name="file_dp" data-fouc accept=".jpg,.png">
							<?php if ((($tmp = @$_GET['uri'])===null||$tmp==='' ? false : $tmp)) {?>
							<input type="hidden" name="uri" value="<?php echo $_GET['uri'];?>
">
							<?php }?>
						</form>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['can_update_password']->value) {?>
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Change Password</h6>
			</div>

			<div class="card-body">
				<form action="<?php echo smarty_modifier_route('profile.password-update');?>
" method="post" id="form-change-password">
					<?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

					<input type="hidden" name="_method" value="patch">
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6">
								<label>Current password</label>
								<input class="form-control" type="password" name="old_password" placeholder="Current password" required>
							</div>
							<div class="col-lg-6">
								<label>New password</label>
								<input class="form-control" type="password" name="new_password" placeholder="New password" required>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-lg-6">
								<label>Confirm new password</label>
								<input class="form-control" type="password" name="confirm_new_password" placeholder="Confirm new password" required>
							</div>
						</div>
					</div>

					<div class="text-right">
						<button class="btn btn-success btn-sm mr-1 show-password">Show Password</button>
						<button type="submit" class="btn btn-primary btn-sm form-submit" target="#form-change-password"
						swal-positive-text="Yes, change it!" data-loading>Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php }?>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Profile information</h6>
			</div>

			<div class="card-body">
				<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'profile_update_form_start');?>

				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Username</label>
							<input type="text" readonly="readonly" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user']->value['username'])===null||$tmp==='' ? '' : $tmp);?>
" class="form-control" placeholder="Username">
						</div>
					</div>
				</div>
				
				<?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."/user_extension.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

				<?php echo $_smarty_tpl->smarty->ext->_capture->getBuffer($_smarty_tpl, 'profile_update_form_end');?>

			</div>
		</div>
	</div>
</div>
<?php
}
}
/* {/block 'content'} */
/* {block 'custom_styles'} */
class Block_148618754862d3f8074078f2_59017482 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_styles' => 
  array (
    0 => 'Block_148618754862d3f8074078f2_59017482',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\modifier.uploads_img.php','function'=>'smarty_modifier_uploads_img',),));
?>

<style>
.profile-photo-container {
	<?php if ((($tmp = @$_smarty_tpl->tpl_vars['profile']->value['photo'])===null||$tmp==='' ? false : $tmp)) {?>
	background-image: url('<?php echo smarty_modifier_uploads_img($_smarty_tpl->tpl_vars['profile']->value['photo']);?>
');
	<?php } else { ?>
	background-image: url('<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/images/uni-user.png'); 
	<?php }?>
	background-size: cover;
	background-repeat: no-repeat;
	width: 170px;
	height: 170px;
	background-position: center;
}  
</style>
<?php
}
}
/* {/block 'custom_styles'} */
/* {block 'custom_scripts'} */
class Block_193070656762d3f807416481_23014731 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_193070656762d3f807416481_23014731',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
>
	$(() => {
		$('.form-submit').formSubmit();

		$('.bs-select2').select2();

		$('.bs-datepicker').initBsDatePicker();

		<?php if ((($tmp = @$_smarty_tpl->tpl_vars['profile']->value['photo'])===null||$tmp==='' ? false : $tmp)) {?>

		$('#profile-dp').lightGallery({
	        thumbnail: true,
	        selector: 'a[data-popup="profile-dp"]',
	    });

	    <?php }?>

	    $('[name="file_dp"]').initBsFileInput();

        $(document).on('click', 'button.show-password', function ($e) {
        	$e.preventDefault();

        	var b = $(this);
        	var show = b.hasClass('hp') || !b.hasClass('sp');
        	
        	b.closest('form').find('input:not([type="hidden"])').each(function () { 
        		$(this).attr('type', show ? 'text' : 'password') 
        	});

        	b.text(show ? 'Hide Password' : 'Show Password').removeClass('hp sp').addClass(show ? 'sp' : 'hp');
        });

        $('#change-dp').on('submit', function ($e)
        {
        	$('#modal-dp').modal('hide');

        	waitingDialog.show('Please wait...');
        });
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
