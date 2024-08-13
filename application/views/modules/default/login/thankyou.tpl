<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>{$app_title}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<link href="//fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{$assets_url}/login/css/style.css" type="text/css" media="all" />
    <style type="text/css">
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
	 <section class="w3l-workinghny-form">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="wrapper">
                <div class="logo">
                    <h1><a class="brand-logo" href="{$base_url}">{$app_title}</a></h1>
                </div>
                <div class="workinghny-block-grid">
                    <div class="workinghny-left-img align-end">
                        <img src="{$assets_url}/login/images/2.png" class="img-responsive" alt="img" />
                    </div>
                    <div class="form-right-inf">
						<p class="">{$message}</p>
                        
                        <div class="login-form-content">
                            <p class="already" style="margin-top: 0; margin-bottom: 20px;"><a href="{'login'|base_url}">Continue</a></p>

                            {if $resend_activation|default:false}
                            <form action="{'verification/resend'|base_url}" method="post">
                                {csrf}
                                <input type="hidden" name="id" value="{$user_id|default:''}">
                                <button class="btn btn-style mt-3">Resend Activation</button>
                            </form>
                            {/if}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>