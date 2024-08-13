<div class="navbar navbar-expand-xl navbar-dark navbar-static px-0">
	<div class="d-flex flex-1 pl-3">
		<div class="navbar-brand wmin-0 mr-1">
			<a href="{$base_url}" class="d-inline-block">
				{* <img src="{$assets_url}/images/alerto-logo-lg.png" class="d-none d-sm-block" alt=""> *}
				{* <img src="{$assets_url}/images/alerto-logo-sm.png" class="d-sm-none" alt=""> *}
			</a>
		</div>

		{if $sidebar_visible|default:false}
		<button type="button" class="navbar-toggler sidebar-mobile-main-toggle ml-2">
			<i class="icon-transmission"></i>
		</button>
		{/if}
	</div>

	{if $navbar_visible|default:false}
	<div class="d-flex w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0">
		<ul class="navbar-nav c-navbar-nav flex-row text-nowrap mx-auto">
			{$navbar_data|default:''}
		</ul>
	</div>
	{/if}

	<div class="d-flex flex-xl-1 justify-content-xl-end order-0 order-xl-1 pr-3">
		<ul class="navbar-nav navbar-nav-underline flex-row">

			{if $app_notifications|default:false and (is_logged_in)}
			<li class="nav-item nav-item-dropdown-lg dropdown">
				<a href="#" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="dropdown">
					<i class="icon-bell2"></i>
					{if $app_notifications_count|default:0}<span class="badge badge-primary badge-pill ml-auto ml-lg-0" style="top: 5px;">{$app_notifications_count}</span>{/if}
				</a>
				
				<div class="dropdown-menu dropdown-menu-right dropdown-content wmin-lg-350">
					<div class="dropdown-content-header">
						<span class="font-weight-semibold">Notifications</span>
					</div>

					<div class="dropdown-content-body dropdown-scrollable">
						<ul class="media-list">
							{foreach from=$app_notifications item=$notif}
								<li class="media">
									<div class="media-body">
										<div class="media-title">
											<a href="{$notif.url}">
												<span class="font-weight-semibold">{$notif.title}</span>
												<span class="text-muted float-right font-size-sm">{$notif.created_at|strtotime|get_time_ago|ucfirst}</span>
											</a>
										</div>

										<span class="text-muted">{$notif.content}</span>
									</div>
								</li>
							{/foreach}
						</ul>
					</div>

					<div class="dropdown-content-footer justify-content-center p-0">
						<a href="{'notifications'|route}" class="btn btn-light btn-block border-0 rounded-top-0" data-popup="tooltip" title="Load more">
							<i class="icon-menu7"></i>
						</a>
					</div>
				</div>
			</li>
			{/if}

			{if {is_logged_in}}
			<li class="nav-item nav-item-dropdown-xl dropdown dropdown-user h-100">
				<a href="#" class="navbar-nav-link navbar-nav-link-toggler d-flex align-items-center h-100 dropdown-toggle" data-toggle="dropdown">
					<img src=
					"{if $profile.photo|default:false}
					{$profile.photo|uploads_img}
					{else}
					{$assets_url}/images/uni-user.png
					{/if}"
					class="rounded-circle" height="34" width="34" alt="">
					<span class="d-none d-xl-block ml-2">{$profile.name|default:'User'}</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					{if 'profile'|is_user_route}
					<a href="{'profile'|route}" class="dropdown-item"><i class="icon-cog5"></i> Account Settings</a>
					<div class="dropdown-divider"></div>
					{/if}
					
					<a href="{'login.logout'|route}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
				</div>
			</li>
			{else}
			{* <li class="h-100">
				<a href="{'login'|route}" class="dropdown-item h-100 login-register">Login | Register</a>
			</li> *}
			{if $allow_user_registration|default:false}
			<li class="nav-item">
				<a href="{'login.signup'|route}" class="navbar-nav-link">
					<i class="icon-user-plus"></i>
					<span class="d-none d-lg-inline-block ml-2">Register</span>
				</a>
			</li>
			{/if}
			<li class="nav-item">
				<a href="{'login'|route}" class="navbar-nav-link">
					<i class="icon-user-lock"></i>
					<span class="d-none d-lg-inline-block ml-2">Login</span>
				</a>
			</li>
			{/if}
		</ul>
	</div>
</div>