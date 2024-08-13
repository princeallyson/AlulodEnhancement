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
        .w3l-workinghny-form .align-end {
            align-self: flex-start;
            padding: 2em;
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
                            <form action="{'register'|base_url}" class="signin-form" method="post">
                                {csrf}
								<div class="one-frm">
									<label>First Name</label>
									<input type="text" name="first_name" required placeholder="" value="{$prev_data.first_name|default:''}">
								</div>
                                <div class="one-frm">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" required placeholder="" value="{$prev_data.last_name|default:''}">
                                </div>
                                <div class="one-frm">
                                    <label>Email</label>
                                    <input type="email" name="email" required placeholder="" value="{$prev_data.email|default:''}">
                                </div>
                                <div class="one-frm">
                                    <label>Username</label>
                                    <input type="text" name="username" required placeholder="" value="{$prev_data.username|default:''}">
                                </div>
                                <div class="one-frm">
                                    <label>Password</label>
                                    <input type="password" name="password" required placeholder="">
                                </div>
                                <div class="one-frm">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" required placeholder="">
                                </div>
                                <button class="btn btn-style mt-3">Register</button>

                                <p class="already">Already have an account? <a href="{'login'|base_url}">Sign In</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>