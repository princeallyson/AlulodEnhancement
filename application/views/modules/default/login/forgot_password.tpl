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
                        {if $error_message|default:false}
						<p class="error-message">{$error_message}</p>
                        {/if}
                        <div class="login-form-content">
                            <form action="{'login.new-password'|route}" class="signin-form" method="post">
                                {csrf}
								<div class="one-frm">
									<label>Email</label>
									<input type="email" name="email"  placeholder="" required="">
								</div>
                                <button class="btn btn-style mt-3">Recover</button>

                                {if $allow_user_registration|default:false}
                                <p class="already">Don't have an account? <a href="{'signup'|base_url}">Sign Up</a></p>
                                {/if}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>