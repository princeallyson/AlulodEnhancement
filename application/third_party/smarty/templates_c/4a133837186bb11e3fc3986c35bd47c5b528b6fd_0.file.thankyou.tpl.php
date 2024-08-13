<?php
/* Smarty version 3.1.39, created on 2022-07-06 19:33:37
  from 'C:\wamp64\www\apps\pet-adoption\application\views\modules\default\login\thankyou.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c57311d81060_18881134',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a133837186bb11e3fc3986c35bd47c5b528b6fd' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\modules\\default\\login\\thankyou.tpl',
      1 => 1636974024,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c57311d81060_18881134 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\apps\\pet-adoption\\application\\libraries\\smarty\\plugins\\function.csrf.php','function'=>'smarty_function_csrf',),));
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
	 <section class="w3l-workinghny-form">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="wrapper">
                <div class="logo">
                    <h1><a class="brand-logo" href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['app_title']->value;?>
</a></h1>
                </div>
                <div class="workinghny-block-grid">
                    <div class="workinghny-left-img align-end">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/login/images/2.png" class="img-responsive" alt="img" />
                    </div>
                    <div class="form-right-inf">
						<p class=""><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</p>
                        
                        <div class="login-form-content">
                            <p class="already" style="margin-top: 0; margin-bottom: 20px;"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'base_url' ][ 0 ], array( 'login' ));?>
">Continue</a></p>

                            <?php if ((($tmp = @$_smarty_tpl->tpl_vars['resend_activation']->value)===null||$tmp==='' ? false : $tmp)) {?>
                            <form action="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'base_url' ][ 0 ], array( 'verification/resend' ));?>
" method="post">
                                <?php echo smarty_function_csrf(array(),$_smarty_tpl);?>

                                <input type="hidden" name="id" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_id']->value)===null||$tmp==='' ? '' : $tmp);?>
">
                                <button class="btn btn-style mt-3">Resend Activation</button>
                            </form>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html><?php }
}
