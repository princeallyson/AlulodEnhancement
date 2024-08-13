<?php
/* Smarty version 3.1.39, created on 2022-10-01 21:54:23
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6338468f6a1d82_84557665',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f071ef5121632947d7bd5d634056d41c44ab4327' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/navbar.tpl',
      1 => 1664632434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6338468f6a1d82_84557665 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route.php','function'=>'smarty_modifier_route',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.uploads_img.php','function'=>'smarty_modifier_uploads_img',),2=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.is_user_route.php','function'=>'smarty_modifier_is_user_route',),));
?>
<div class="navbar navbar-expand-xl navbar-dark navbar-static px-0">
	<div class="d-flex flex-1 pl-3">
		<div class="navbar-brand wmin-0 mr-1">
			<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
" class="d-inline-block">
											</a>
		</div>

		<?php if ((($tmp = @$_smarty_tpl->tpl_vars['sidebar_visible']->value)===null||$tmp==='' ? false : $tmp)) {?>
		<button type="button" class="navbar-toggler sidebar-mobile-main-toggle ml-2">
			<i class="icon-transmission"></i>
		</button>
		<?php }?>
	</div>

	<?php if ((($tmp = @$_smarty_tpl->tpl_vars['navbar_visible']->value)===null||$tmp==='' ? false : $tmp)) {?>
	<div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0">
		<ul class="navbar-nav c-navbar-nav flex-row text-nowrap mx-auto">
			<?php echo (($tmp = @$_smarty_tpl->tpl_vars['navbar_data']->value)===null||$tmp==='' ? '' : $tmp);?>

		</ul>
	</div>
	<?php }?>

	<div class="d-flex flex-xl-1 justify-content-xl-end order-0 order-xl-1 pr-3">
		<ul class="navbar-nav navbar-nav-underline flex-row">

			<?php if ((($tmp = @$_smarty_tpl->tpl_vars['app_notifications']->value)===null||$tmp==='' ? false : $tmp) && ('is_logged_in')) {?>
			<li class="nav-item nav-item-dropdown-lg dropdown">
				<a href="#" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown">
					<i class="icon-bell2"></i>
					<?php if ((($tmp = @$_smarty_tpl->tpl_vars['app_notifications_count']->value)===null||$tmp==='' ? 0 : $tmp)) {?><span class="badge badge-primary badge-pill ml-auto ml-lg-0" style="top: 5px;"><?php echo $_smarty_tpl->tpl_vars['app_notifications_count']->value;?>
</span><?php }?>
				</a>
				
				<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-lg-350">
					<div class="dropdown-content-header">
						<span class="font-weight-semibold">Notifications</span>
					</div>

					<div class="dropdown-content-body dropdown-scrollable">
						<ul class="media-list">
							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['app_notifications']->value, 'notif');
$_smarty_tpl->tpl_vars['notif']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['notif']->value) {
$_smarty_tpl->tpl_vars['notif']->do_else = false;
?>
								<li class="media">
									<div class="media-body">
										<div class="media-title">
											<a href="<?php echo $_smarty_tpl->tpl_vars['notif']->value['url'];?>
">
												<span class="font-weight-semibold"><?php echo $_smarty_tpl->tpl_vars['notif']->value['title'];?>
</span>
												<span class="text-muted float-right font-size-sm"><?php echo ucfirst(call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'get_time_ago' ][ 0 ], array( strtotime($_smarty_tpl->tpl_vars['notif']->value['created_at']) )));?>
</span>
											</a>
										</div>

										<span class="text-muted"><?php echo $_smarty_tpl->tpl_vars['notif']->value['content'];?>
</span>
									</div>
								</li>
							<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
						</ul>
					</div>

					<div class="dropdown-content-footer justify-content-center p-0">
						<a href="<?php echo smarty_modifier_route('notifications');?>
" class="btn btn-light btn-block border-0 rounded-top-0" data-popup="tooltip" title="Load more">
							<i class="icon-menu7"></i>
						</a>
					</div>
				</div>
			</li>
			<?php }?>

			<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['is_logged_in'][0], array( array(),$_smarty_tpl ) );
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1) {?>
			<li class="nav-item nav-item-dropdown-xl dropdown dropdown-user h-100">
				<a href="#" class="navbar-nav-link navbar-nav-link-toggler d-flex align-items-center h-100 dropdown-toggle" data-toggle="dropdown">
					<img src=
					"<?php if ((($tmp = @$_smarty_tpl->tpl_vars['profile']->value['photo'])===null||$tmp==='' ? false : $tmp)) {?>
					<?php echo smarty_modifier_uploads_img($_smarty_tpl->tpl_vars['profile']->value['photo']);?>

					<?php } else { ?>
					<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/images/uni-user.png
					<?php }?>"
					class="rounded-circle" height="34" width="34" alt="">
					<span class="d-none d-xl-block ml-2"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['profile']->value['name'])===null||$tmp==='' ? 'User' : $tmp);?>
</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<?php if (smarty_modifier_is_user_route('profile')) {?>
					<a href="<?php echo smarty_modifier_route('profile');?>
" class="dropdown-item"><i class="icon-cog5"></i> Account Settings</a>
					<div class="dropdown-divider"></div>
					<?php }?>
					
					<a href="<?php echo smarty_modifier_route('login.logout');?>
" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
				</div>
			</li>
			<?php } else { ?>
						<?php if ((($tmp = @$_smarty_tpl->tpl_vars['allow_user_registration']->value)===null||$tmp==='' ? false : $tmp)) {?>
			<li class="nav-item">
				<a href="<?php echo smarty_modifier_route('login.signup');?>
" class="navbar-nav-link">
					<i class="icon-user-plus"></i>
					<span class="d-none d-lg-inline-block ml-2">Register</span>
				</a>
			</li>
			<?php }?>
			<li class="nav-item">
				<a href="<?php echo smarty_modifier_route('login');?>
" class="navbar-nav-link">
					<i class="icon-user-lock"></i>
					<span class="d-none d-lg-inline-block ml-2">Login</span>
				</a>
			</li>
			<?php }?>
		</ul>
	</div>
</div><?php }
}
