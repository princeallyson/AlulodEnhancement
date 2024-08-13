<?php
/* Smarty version 3.1.39, created on 2022-07-17 21:09:24
  from 'C:\wamp64\www\apps\fish-pond\application\views\modules\default\login\signup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d40a04bfc3f1_99712524',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b34b0e77630b81c2d2cd69ffc2e94f739a53f2d' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\fish-pond\\application\\views\\modules\\default\\login\\signup.tpl',
      1 => 1638279052,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d40a04bfc3f1_99712524 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\fish-pond\\application\\libraries\\smarty\\plugins\\function.csrf.php','function'=>'smarty_function_csrf',),));
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['app_title']->value;?>
</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<link href="//fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/login/css/style.css" type="text/css" media="all" />
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
                    <h1><a class="brand-logo" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['app_title']->value;?>
</a></h1>
                    <!-- if logo is image enable this   
                        <a class="brand-logo" href="#index.html">
                            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                        </a> -->
                </div>
                <div class="workinghny-block-grid">
                    <div class="workinghny-left-img align-end">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/login/images/2.png" class="img-responsive" alt="img" />
                    </div>
                    <div class="form-right-inf">
                        <?php if ((($tmp = @$_smarty_tpl->tpl_vars['error_message']->value)===null||$tmp==='' ? false : $tmp)) {?>
						<p class="error-message"><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
</p>
                        <?php }?>
                        <div class="login-form-content">
                            <form action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'base_url' ][ 0 ], array( 'register' ));?>
" class="signin-form" method="post">
                                <?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

								<div class="one-frm">
									<label>First Name</label>
									<input type="text" name="first_name" required placeholder="" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['first_name'])===null||$tmp==='' ? '' : $tmp);?>
">
								</div>
                                <div class="one-frm">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" required placeholder="" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['last_name'])===null||$tmp==='' ? '' : $tmp);?>
">
                                </div>
                                <div class="one-frm">
                                    <label>Email</label>
                                    <input type="email" name="email" required placeholder="" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['email'])===null||$tmp==='' ? '' : $tmp);?>
">
                                </div>
                                <div class="one-frm">
                                    <label>Username</label>
                                    <input type="text" name="username" required placeholder="" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev_data']->value['username'])===null||$tmp==='' ? '' : $tmp);?>
">
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

                                <p class="already">Already have an account? <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'base_url' ][ 0 ], array( 'login' ));?>
">Sign In</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html><?php }
}
