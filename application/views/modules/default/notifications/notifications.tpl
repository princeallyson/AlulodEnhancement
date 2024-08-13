{extends 'templates/default/master.tpl'}

{block name='page-header'}
<div class="page-header-content header-elements-lg-inline">
	<div class="page-title d-flex pb-1">
		<h4>Notifications</h4>
	</div>
</div>
{/block}

{block name='before-page-footer'}
{/block}

{block name='content'}

{foreach from=$notifications.data|default:[] item=notification}

<div class="card card-body">
	<div class="media flex-column flex-sm-row">
		<div class="media-body">
			<h6 class="media-title font-weight-semibold">
				<a href="{$notification.url}">{$notification.title}</a>
			</h6>

			{$notification.content}
		</div>

		<div class="ml-sm-3 mt-2 mt-sm-0">
			<ul class="list-inline list-inline-dotted text-muted mb-2">
				<li class="list-inline-item">{$notification.created_at|strtotime|get_time_ago|ucfirst}</li>
			</ul>
		</div>
	</div>
</div>
{/foreach}

{* {[$notifications.current_page|is:$notifications.last_page]|var_dump} *}

{if $notifications.total|default:0 gt 1}
<div class="d-flex justify-content-center pt-3 mb-3">
	<ul class="pagination">
		<li class="page-item {'disabled'|iif:($notifications.current_page eq 1)}">
			<a href="{'notifications'|route|concat:[$notifications.first_page_url]|iif:($notifications.current_page ne 1):'#'}" class="page-link">
				<i class="icon-first"></i>
			</a>
		</li>

		<li class="page-item {'disabled'|iif:($notifications.current_page eq 1)}">
			<a href="{'notifications'|route|concat:[$notifications.prev_page_url]|iif:($notifications.current_page gt 1):'#'}" class="page-link">
				<i class="icon-previous2"></i>
			</a>
		</li>

		{* {for $page=1 to $notifications.last_page}
		<li class="page-item {'active'|iif:($page|is:$notifications.current_page)}">
			<a href="{'notifications'|route|concat:['/?page=', $page]}" class="page-link">{$page}</a>
		</li>
		{/for} *}

		{foreach from=$pages item=$page}
		<li class="page-item {'active'|iif:($page|is:$notifications.current_page)}">
			<a href="{'notifications'|route|concat:['/?page=', $page]}" class="page-link">{$page}</a>
		</li>
		{/foreach}

		<li class="page-item {'disabled'|iif:($notifications.current_page eq $notifications.last_page)}">
			<a href="{'notifications'|route|concat:[$notifications.next_page_url]|iif:($notifications.current_page ne $notifications.last_page):'#'}" class="page-link">
				<i class="icon-next2"></i>
			</a>
		</li>

		<li class="page-item {'disabled'|iif:($notifications.current_page eq $notifications.last_page)}">
			<a href="{'notifications'|route|concat:[$notifications.last_page_url]|iif:($notifications.current_page ne $notifications.last_page):'#'}" class="page-link">
				<i class="icon-last"></i>
			</a>
		</li>
	</ul>
</div>
{/if}

{/block}