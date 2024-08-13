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
	 <!-- form section start -->
	 <section class="w3l-workinghny-form">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="wrapper">
                <div class="logo">
                    <h1><a class="brand-logo" href="{$base_url}">{$app_title}</a></h1>
                    <!-- if logo is image enable this   
                        <a class="brand-logo" href="#index.html">
                            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                        </a> -->
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
                            <form action="{'check'|base_url}" class="signin-form" method="post">
                                {csrf}
                                {if $uri|default:''}
                                <input type="hidden" name="uri" value="{$uri}">
                                {/if}
								<div class="one-frm">
									<label>Username</label>
									<input type="text" name="u"  placeholder="" required="">
								</div>
								<div class="one-frm">
									<label>Password</label>
									<input type="password" name="p"  placeholder="" required="">
								</div>
                                {* <label class="check-remaind">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    <p class="remember">Remember Me</p>

                                </label> *}
                                <button class="btn btn-style mt-3">Sign In </button>

                                {if $allow_user_registration|default:false}
                                <p class="already">Don't have an account? <a href="{'signup'|base_url}">Sign Up</a></p>
                                {/if}

                                <p class="already"><a href="{'login.forgot_password'|route}">Forgot Password</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>