{extends 'templates/default/master.tpl'}

{block name='page-header'}
{/block}

{block name='before-page-footer'}
{/block}

{$can_update_profile     = 'profile.update'|is_user_route}
{$can_update_profile_pic = 'profile.photo-update'|is_user_route}
{$can_delete_profile_pic = 'profile.photo-delete'|is_user_route}
{$can_update_password 	 = 'profile.password-update'|is_user_route}

{if $can_update_profile}
{capture name='profile_update_form_start'}
<form action="{'profile.update'|route}" method="post" id="form-profile">
{csrf}
<input type="hidden" name="_method" value="patch">
{if $smarty.get.uri|default:false}
<input type="hidden" name="uri" value="{$smarty.get.uri}">
{/if}
{/capture}

{capture name='profile_update_form_end'}
<div class="text-right">
	<button type="submit" class="btn btn-primary btn-sm form-submit" target="#form-profile"
	swal-positive-text="Yes, update it!" data-loading>Update</button>
</div></form>
{/capture}
{/if}

{block name='content'}
{include 'templates/default/alerts.tpl'}
<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-body text-center pb-0">
				<div class="card-img-actions d-inline-block mb-3">
					<div class="profile-photo-container rounded-circle"></div>
					<div class="{'card-img-actions-overlay'|iif:$can_update_profile_pic} rounded-circle" id="profile-dp">
						{if $profile.photo|default:false}
						<a href="{$profile.photo|uploads_img}" class="btn btn-outline-white border-2 btn-icon rounded-pill mr-2" data-popup="profile-dp">
							<img class="d-none" src="{$profile.photo|uploads_img}">
							<i class="icon-eye"></i>
						</a>
						{/if}
						{if $can_update_profile_pic}
						<a href="#" class="btn btn-outline-white border-2 btn-icon rounded-pill" data-toggle="modal" data-target="#modal-dp">
							<i class="icon-upload"></i>
						</a>
						{if $can_delete_profile_pic}
						{if $profile.photo|default:false}
						<a href="#" class="btn btn-outline-white border-2 btn-icon rounded-pill ml-2 confirm-form-submit form-submit" target="#form-delete-photo" swal-positive-text="Yes, remove my picture!" data-loading>
							<i class="icon-trash-alt"></i>
						</a>
						{/if}
						{/if}
						{/if}
					</div>
				</div>

				{if $can_delete_profile_pic}
				<form method="post" action="{'profile.photo-delete'|route}" id="form-delete-photo">
					{csrf}
					<input type="hidden" name="_method" value="delete">
					<input type="hidden" name="tab" value="{$profile_tab_name|default:''}">
				</form>
				{/if}

				<h6 class="font-weight-semibold mb-0">{$profile.fullname|default:''}</h6>
			</div>

			<ul class="list-group profile no-border pb-1">
				<div class="list-group-item list-group-divider my-1"></div>

				<li class="list-group-item p-0">
					<a href="{'logout'|base_url}" class="list-group-item list-group-item-action">
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
						{if $can_update_profile_pic}
						<form action="{'profile.photo-update'|route}" method="post" enctype="multipart/form-data" id="change-dp">
							{csrf}
							<input type="hidden" name="_method" value="patch">
							<input class="file-input" type="file" name="file_dp" data-fouc accept=".jpg,.png">
							{if $smarty.get.uri|default:false}
							<input type="hidden" name="uri" value="{$smarty.get.uri}">
							{/if}
						</form>
						{/if}
					</div>
				</div>
			</div>
		</div>
	</div>
	{if $can_update_password}
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Change Password</h6>
			</div>

			<div class="card-body">
				<form action="{'profile.password-update'|route}" method="post" id="form-change-password">
					{csrf}
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
	{/if}
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Profile information</h6>
			</div>

			<div class="card-body">
				{$smarty.capture.profile_update_form_start}
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Username</label>
							<input type="text" readonly="readonly" value="{$user.username|default:''}" class="form-control" placeholder="Username">
						</div>
					</div>
				</div>
				
				{include file="`$tpl_dir`/user_extension.tpl"}

				{$smarty.capture.profile_update_form_end}
			</div>
		</div>
	</div>
</div>
{/block}

{block name='custom_styles'}
<style>
.profile-photo-container {
	{if $profile.photo|default:false}
	background-image: url('{$profile.photo|uploads_img}');
	{else}
	background-image: url('{$assets_url}/images/uni-user.png'); 
	{/if}
	background-size: cover;
	background-repeat: no-repeat;
	width: 170px;
	height: 170px;
	background-position: center;
}  
</style>
{/block}

{assign var='__assets' value=['lightgallery', 'select2', 'fileinput', 'bs_datepicker']}

{block name='custom_scripts'}
<script>
	$(() => {
		$('.form-submit').formSubmit();

		$('.bs-select2').select2();

		$('.bs-datepicker').initBsDatePicker();

		{if $profile.photo|default:false}

		$('#profile-dp').lightGallery({
	        thumbnail: true,
	        selector: 'a[data-popup="profile-dp"]',
	    });

	    {/if}

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
</script>
{/block}