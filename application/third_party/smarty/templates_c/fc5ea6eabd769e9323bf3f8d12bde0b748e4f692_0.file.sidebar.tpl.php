<?php
/* Smarty version 3.1.39, created on 2022-07-06 09:59:07
  from 'C:\wamp64\www\apps\pet-adoption\application\views\templates\default\sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_62c4ec6b7ea249_39731726',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc5ea6eabd769e9323bf3f8d12bde0b748e4f692' => 
    array (
      0 => 'C:\\wamp64\\www\\apps\\pet-adoption\\application\\views\\templates\\default\\sidebar.tpl',
      1 => 1631062727,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62c4ec6b7ea249_39731726 (Smarty_Internal_Template $_smarty_tpl) {
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
