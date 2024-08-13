{extends 'templates/default/master.tpl'}

{block name='before-page-header'}
{/block}

{block name='before-page-footer'}
{/block}

{block name='content'}
{include "`$smarty.current_dir`/header.tpl"}
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title font-weight-semibold">
					<a href="#" class="text-body">News and Updates</a>
				</h5>
			</div>

			<div class="card-body">
				<div class="row" id="news">
					{foreach from=$news item=item}
					<div class="col-md-4 col-sm-6">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title font-weight-semibold"><a href="#" class="text-body">{$item.title|default:''}</a></h5>
							</div>

							<div class="card-body">
								<div class="card-img-actions mb-3 text-center">
									<img class="card-img img-fluid" src="{$item.image|default:''}" alt="" style="max-height: 400px; width: auto">
									<div class="card-img-actions-overlay card-img">
										<a href="{$item.image|default:''}" class="btn btn-outline-white border-2 btn-icon rounded-pill" data-popup="banner">
											<img class="d-none" src="{$item.image|default:''}">
											<i class="{$smarty.const.ICON_VIEW}"></i>
										</a>
									</div>
								</div>
								{$item.short_text|default:''}
							</div>

							<div class="card-footer d-flex">
								{$item.created_at->format('M. d, Y')}
								<a href="{'news/'|concat:$item.id|default:''|base_url}" class="ml-auto">Read more <i class="icon-arrow-right8 ml-2"></i></a>
							</div>
						</div>
					</div>
					{/foreach}
				</div>
			</div>
		</div>
	</div>
</div>

{/block}

{assign var='__assets' value=['lightgallery']}

{block name='custom_scripts'}
<script>
	$(() => {
		$('#news').lightGallery({
			thumbnail: true,
			selector: 'a[data-popup="banner"]',
		});
	});
</script>
{/block}