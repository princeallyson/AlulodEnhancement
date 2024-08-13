<?php
/* Smarty version 3.1.39, created on 2022-07-06 09:59:01
  from 'C:\wamp64\www\apps\pet-adoption\application\views\modules\default\login\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c4ec65013b80_50159943',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca71f646dae666b550ff818befc314e36cd924d9' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\modules\\default\\login\\login.tpl',
      1 => 1636968007,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c4ec65013b80_50159943 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\function.csrf.php','function'=>'smarty_function_csrf',),1=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\modifier.route.php','function'=>'smarty_modifier_route',),));
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
                            <form action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'base_url' ][ 0 ], array( 'check' ));?>
" class="signin-form" method="post">
                                <?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

                                <?php if ((($tmp = @$_smarty_tpl->tpl_vars['uri']->value)===null||$tmp==='' ? '' : $tmp)) {?>
                                <input type="hidden" name="uri" value="<?php echo $_smarty_tpl->tpl_vars['uri']->value;?>
">
                                <?php }?>
								<div class="one-frm">
									<label>Username</label>
									<input type="text" name="u"  placeholder="" required="">
								</div>
								<div class="one-frm">
									<label>Password</label>
									<input type="password" name="p"  placeholder="" required="">
								</div>
                                                                <button class="btn btn-style mt-3">Sign In </button>

                                <?php if ((($tmp = @$_smarty_tpl->tpl_vars['allow_user_registration']->value)===null||$tmp==='' ? false : $tmp)) {?>
                                <p class="already">Don't have an account? <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'base_url' ][ 0 ], array( 'signup' ));?>
">Sign Up</a></p>
                                <?php }?>

                                <p class="already"><a href="<?php echo smarty_modifier_route('login.forgot_password');?>
">Forgot Password</a></p>
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
