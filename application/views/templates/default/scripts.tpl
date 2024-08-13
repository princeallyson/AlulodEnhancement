<script src="{$assets_url}/js/main/jquery.min.js"></script>
<script src="{$assets_url}/js/main/bootstrap.bundle.min.js"></script>
<script src="{$assets_url}/js/plugins/notifications/pnotify.min.js"></script>
<script src="{$assets_url}/js/plugins/notifications/sweet_alert.min.js"></script>

<script src="{$assets_url}/default/js/fn.js"></script>

{if $__assets|default:false}
{foreach from=$__assets item=__asset}
{$__asset|load_asset:'js'}
{/foreach}
{/if}

{block name='scripts'}
{/block}

<script src="{$assets_url}/plugins/waitingfor/waitingfor.js"></script>

<script src="{$assets_url}/default/js/app.js"></script>
<script src="{$assets_url}/default/js/my.js"></script>

{block name='custom_scripts'}
{/block}

