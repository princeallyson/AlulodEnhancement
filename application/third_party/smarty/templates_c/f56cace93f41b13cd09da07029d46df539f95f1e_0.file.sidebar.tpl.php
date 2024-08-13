<?php
/* Smarty version 3.1.39, created on 2022-07-18 10:35:24
  from 'C:\wamp64\www\apps\brgy-alulod\application\views\templates\default\sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62d4c6ece84bf5_65287944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f56cace93f41b13cd09da07029d46df539f95f1e' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\brgy-alulod\\application\\views\\templates\\default\\sidebar.tpl',
      1 => 1631062727,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62d4c6ece84bf5_65287944 (Smarty_Internal_Template $_smarty_tpl) {
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
