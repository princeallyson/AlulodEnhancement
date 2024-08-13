{* view single news *}

{extends 'templates/default/master.tpl'}

{block name='before-page-header'}
{/block}

{block name='before-page-footer'}
{/block}

{block name='content'}
{include "`$smarty.current_dir`/header.tpl"}
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="mb-4">
					<div class="mb-3 text-center">
						<a href="#" class="d-inline-block">
							<img src="{$news.image}" class="img-fluid" alt="">
						</a>
					</div>

					<h4 class="font-weight-semibold mb-1">
						<span class="text-body">{$news.title}</span>
					</h4>

					<ul class="list-inline list-inline-dotted text-muted mb-3">
						<li class="list-inline-item">{$news.created_at->format('M. d, Y')}</li>
					</ul>

					<div class="mb-3">
						{$news.content}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{/block}
