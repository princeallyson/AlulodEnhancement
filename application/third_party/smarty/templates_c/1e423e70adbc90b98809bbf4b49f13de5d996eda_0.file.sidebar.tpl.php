<?php
/* Smarty version 3.1.39, created on 2022-10-01 21:54:23
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6338468f6a7912_77238933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e423e70adbc90b98809bbf4b49f13de5d996eda' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/templates/default/sidebar.tpl',
      1 => 1664632434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6338468f6a7912_77238933 (Smarty_Internal_Template $_smarty_tpl) {
if ((($tmp = @$_smarty_tpl->tpl_vars['sidebar_data']->value)===null||$tmp==='' ? false : $tmp)) {?>
<div class="sidebar-content">
	<div class="sidebar-section">
		<ul class="nav nav-sidebar" data-nav-type="accordion">
			<?php echo $_smarty_tpl->tpl_vars['sidebar_data']->value;?>

		</ul>
	</div>
</div>
<?php }
}
}
