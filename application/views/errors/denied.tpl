{extends 'templates/default/master.tpl'}

{block name='before-page-header'}
{/block}

{block name='before-page-footer'}
{/block}

{block name='content-inner'}
<div class="content d-flex justify-content-center align-items-center">
	<div class="flex-fill">

		<div class="text-center mb-4 font-white">
			<img src="{$assets_url}/images/error_bg.svg" class="img-fluid mb-4" height="230" alt="">
			<h1 class="display-3 font-weight-semibold line-height-1 mb-2">{$error_title|default:'Offline'}</h1>
			{if $error_message|default:false}
			<h5>{$error_message}</h5>
			{else}
			<h5>Sorry, this page is temporarily offline. <br> We'll be back shortly.d</h5>
			{/if}
		</div>

		<div class="text-center">
			<a href="{$return_url|default:'#'}" class="btn btn-primary"><i class="icon-arrow-left52 mr-2"></i> {$return_text|default:'Return'}</a>
		</div>

	</div>
</div>
{/block}