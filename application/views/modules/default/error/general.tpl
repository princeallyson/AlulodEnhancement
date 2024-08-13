{extends 'templates/default/master.tpl'}

{block name='before-page-header'}
{/block}

{block name='before-page-footer'}
{/block}

{block name='content-inner'}
<div class="content d-flex justify-content-center align-items-center mt-4">
	<div class="flex-fill">
		<div class="text-center mb-4 font-white">
			<img src="{$assets_url}/images/error_bg.svg" class="img-fluid mb-4" height="230" alt="">
			<h1 class="display-3 font-weight-semibold line-height-1 mb-2">{$error_title|default:'Opps'}</h1>
			<h5>{$error_message|default:'Something went wrong!'}</h5>
		</div>

		<div class="text-center">
			<a href="{$return_url|default:('home'|route)}" class="btn btn-primary">
				<i class="icon-arrow-left52 mr-2"></i> {$return_text|default:'Return'}
			</a>
		</div>
	</div>
</div>
{/block}