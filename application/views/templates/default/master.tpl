<!DOCTYPE html>
<html lang="en">
{include 'templates/default/head.tpl'}
<body>

	{if $navbar_visible|default:false}
	{block name='navbar'}
	{include 'templates/default/navbar.tpl'}
	{/block}
	{/if}
	
	<div class="page-content">
		{if $sidebar_visible|default:false}
		{block name='sidebar'}
		<div class="app-sidebar sidebar sidebar-dark sidebar-main sidebar-expand-lg sidebar-collapsed">
			<button type="button" class="btn btn-sidebar-expand sidebar-control sidebar-main-toggle">
				<i class="icon-arrow-right13"></i>
			</button>
			<div class="sidebar-section sidebar-section-body d-flex align-items-center border-bottom py-2">
				<h5 class="mb-0">Navigation</h5>
				<div class="my-1 ml-auto">
					<button type="button" class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-main-toggle d-none d-xl-inline-flex">
						<i class="icon-transmission"></i>
					</button>

					<button type="button" class="btn btn-outline-light text-body border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-main-toggle d-xl-none">
						<i class="icon-cross2"></i>
					</button>
				</div>
			</div>
			{include 'templates/default/sidebar.tpl'}
		</div>
		{/block}
		{/if}

		{block name='before-content-wrapper'}
		<div class="content-wrapper">
			{block name='content-wrapper'}
				{block name='before-content-inner'}
				<div class="content-inner">
					{block name='content-inner'}
						{block name='before-page-header'}
						<div class="page-header">
							{block name='page-header'}
							{* <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
								<div class="d-flex">
									<div class="breadcrumb">
										<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
										<a href="components_navs.html" class="breadcrumb-item">Components</a>
										<span class="breadcrumb-item active">Navs</span>
									</div>
								</div>
							</div> *}
							{/block}
						</div>
						{/block}

						{block name='before-content'}
						<div class="content">
							{block name='content0'}
							{/block}
							{block name='content'}
							{/block}
							{block name='content2'}
							{/block}
							{block name='content3'}
							{/block}
							{block name='content4'}
							{/block}
							{block name='content5'}
							{/block}
						</div>
						{/block}

						{block name='before-page-footer'}
						<div class="page-footer">
							{block name='page-footer'}
							{/block}
						</div>
						{/block}
					{/block}
				</div>
				{/block}
			{/block}
		</div>
		{/block}
	</div>
</body>
{include 'templates/default/scripts.tpl'}
</html>
