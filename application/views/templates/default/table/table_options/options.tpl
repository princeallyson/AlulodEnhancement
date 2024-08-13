{if $options|default:false}
<div class="list-icons">
	<div class="dropdown">
		<a href="#" class="list-icons-item" data-toggle="dropdown">
			<i class="icon-menu9"></i>
		</a>

		<div class="dropdown-menu dropdown-menu-right">
			{foreach from=$options item=option}
				<a href="#" class="dropdown-item {$option.class|default:''}" {$option.data|default:''}><i class="{$option.icon}"></i> {$option.text}</a>	
			{/foreach}
		</div>
	</div>
</div>
{/if}