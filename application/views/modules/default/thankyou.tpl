{extends 'templates/default/master.tpl'}

{block name='before-page-header'}
{/block}

{block name='before-page-footer'}
{/block}

{block name='content-inner'}
<div class="content d-flex justify-content-center align-items-center">
	<div class="card mb-0 flex-fill col-md-4">
		<div class="card-body">
			<div class="text-center mb-3 pt-2">
				<i class="{$icon|default:'icon-checkmark'} icon-2x text-{$icon_bg|default:'success'} border-success-100 border-3 rounded-pill p-3 mb-3 mt-1"></i>
				<h5 class="mb-0">{$title|default:'Thank You'}</h5>
			</div>

			<span class="form-text text-center text-muted">{$message}</span>

			<div class="form-group mt-4">
				<a href="{'home'|route}" class="btn btn-primary btn-block">Continue</a>
			</div>
		</div>
	</div>
</div>
{/block}