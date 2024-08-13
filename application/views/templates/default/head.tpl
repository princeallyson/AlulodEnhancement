<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="site_url" content="{$base_url}">
	<meta name="ctrl_url" content="{$ctrl_url}">
	
	<title>{$app_title}</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

	{if $__assets|default:false}
	{foreach from=$__assets item=__asset}
	{$__asset|load_asset:'css'}
	{/foreach}
	{/if}
	
	{block name='stylesheets'}
	{/block}

	<link href="{$assets_url}/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="{$assets_url}/default/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="{$assets_url}/default/css/style.css" rel="stylesheet" type="text/css">

	{* <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    <link href="{$assets_url}/plugins/pace/loading-bar.css" rel="stylesheet" type="text/css">

    <script>
		window.paceOptions = {
		    ajax: { trackMethods: ['GET', 'POST'] }
		};
	</script>

    <style>
    .pace-active {
    	/*opacity: .4;*/
    	background-color: #FFFFFF;
    }
    .pace .pace-progress {
    	z-index: 10000;
    }
    </style> *}

	{block name='custom_styles'}
	{/block}
</head>