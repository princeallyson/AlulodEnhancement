<?php
/* Smarty version 3.1.39, created on 2022-12-27 12:25:44
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/default/home/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_63aa73c811a1c4_22118598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6b9f46d85a1f7a278af23b23145d7738077eb0e' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/default/home/home.tpl',
      1 => 1664632434,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63aa73c811a1c4_22118598 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_71526929463aa73c8111093_97678158', 'page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_136941036963aa73c8111c84_64747879', 'content');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_139415860063aa73c81125d4_95768580', 'scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'page-header'} */
class Block_71526929463aa73c8111093_97678158 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page-header' => 
  array (
    0 => 'Block_71526929463aa73c8111093_97678158',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="page-header-content header-elements-lg-inline">
	<div class="page-title d-flex pb-1">
		<h4>Dashboard</h4>
	</div>
</div>
<?php
}
}
/* {/block 'page-header'} */
/* {block 'content'} */
class Block_136941036963aa73c8111c84_64747879 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_136941036963aa73c8111c84_64747879',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>



<?php
}
}
/* {/block 'content'} */
/* {block 'scripts'} */
class Block_139415860063aa73c81125d4_95768580 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'scripts' => 
  array (
    0 => 'Block_139415860063aa73c81125d4_95768580',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/plugins/chartjs/dist/chart.min.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
	// $(function ()
	// {
	// 	const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
	// 	const data = {
	// 		labels: labels,

	// 		datasets: [
	// 		{
	// 			label: 'Negative',
	// 			data: [
	// 			<?php echo random_int(1,100);?>
, 
	// 			<?php echo random_int(1,100);?>
, 
	// 			<?php echo random_int(1,100);?>
, 
	// 			<?php echo random_int(1,100);?>
, 
	// 			<?php echo random_int(1,100);?>
, 
	// 			<?php echo random_int(1,100);?>
, 
	// 			<?php echo random_int(1,100);?>

	// 			],
	// 			borderColor: 'rgb(54, 162, 235)',
	// 			backgroundColor: 'rgb(54, 162, 235)',
	// 			lineTension: 0.4,
	// 			radius: 4
	// 		},
	// 		{
	// 			label: 'Positive',
	// 			data: [
	// 			<?php echo random_int(1,100);?>
, 
	// 			<?php echo random_int(1,100);?>
, 
	// 			<?php echo random_int(1,100);?>
, 
	// 			<?php echo random_int(1,100);?>
, 
	// 			<?php echo random_int(1,100);?>
, 
	// 			<?php echo random_int(1,100);?>
, 
	// 			<?php echo random_int(1,100);?>

	// 			],
	// 			borderColor: 'rgb(255, 99, 132)',
	// 			backgroundColor: 'rgb(255, 99, 132)',
	// 			lineTension: 0.4,
	// 			radius: 4
	// 		}]
	// 	};

	// 	const config = {
	// 		type: 'line',
	// 		data: data,
	// 		options: {
	// 			responsive: true,
	// 			plugins: {
	// 				legend: {
	// 					position: 'top',
	// 				},
	// 				title: {
	// 					display: false,
	// 					text: ''
	// 				}
	// 			}
	// 		},
	// 	};

	// 	new Chart("buyers", config);
	// });
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'scripts'} */
}
