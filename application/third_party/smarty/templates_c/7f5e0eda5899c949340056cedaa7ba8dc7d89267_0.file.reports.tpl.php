<?php
/* Smarty version 3.1.39, created on 2023-05-31 10:59:16
  from '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/home/reports.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6476b804caf951_70451568',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f5e0eda5899c949340056cedaa7ba8dc7d89267' => 
    array (
      0 => '/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/views/modules/home/reports.tpl',
      1 => 1685501955,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6476b804caf951_70451568 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5232803986476b804c9ab81_42646554', 'before-page-header');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21102207966476b804c9b9b3_83299343', 'before-page-footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13550656676476b804c9bfb5_01620765', 'content');
?>


<?php $_smarty_tpl->_assignInScope('__assets', array('echart'));?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20998534026476b804ca4dc7_78047400', 'custom_styles');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15706312446476b804ca5424_50382915', 'custom_scripts');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, 'templates/default/master.tpl');
}
/* {block 'before-page-header'} */
class Block_5232803986476b804c9ab81_42646554 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-header' => 
  array (
    0 => 'Block_5232803986476b804c9ab81_42646554',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-header'} */
/* {block 'before-page-footer'} */
class Block_21102207966476b804c9b9b3_83299343 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'before-page-footer' => 
  array (
    0 => 'Block_21102207966476b804c9b9b3_83299343',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php
}
}
/* {/block 'before-page-footer'} */
/* {block 'content'} */
class Block_13550656676476b804c9bfb5_01620765 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13550656676476b804c9bfb5_01620765',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.dateformat.php','function'=>'smarty_modifier_dateformat',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route.php','function'=>'smarty_modifier_route',),));
?>

<?php $_smarty_tpl->_subTemplateRender(((string)dirname($_smarty_tpl->source->filepath))."/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
<div class="row">
	<div class="col-12">
		<div class="card card-body">
			<div class="row">
				<div class="col-12 d-flex">
					<h4 class="mt-2">Select Date</h4>
					<button type="button" class="btn btn-light daterange-predefined ml-4">
						<i class="icon-calendar22 mr-2"></i>
						<span></span>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<?php $_smarty_tpl->_assignInScope('s', smarty_modifier_dateformat((($tmp = @$_GET['start'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['s_date']->value : $tmp),'Y-m-d'));?>
	<?php $_smarty_tpl->_assignInScope('e', smarty_modifier_dateformat((($tmp = @$_GET['end'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['e_date']->value : $tmp),'Y-m-d'));?>

	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reports']->value, 'report');
$_smarty_tpl->tpl_vars['report']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['report']->value) {
$_smarty_tpl->tpl_vars['report']->do_else = false;
?>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title font-weight-semibold">
					<a href="#" class="text-body"><?php echo $_smarty_tpl->tpl_vars['report']->value['title'];?>
</a>
				</h5>
				<div class="header-elements">
					<a href="<?php echo smarty_modifier_route("admin--print",$_smarty_tpl->tpl_vars['report']->value['id']);?>
?s=<?php echo $_smarty_tpl->tpl_vars['s']->value;?>
&e=<?php echo $_smarty_tpl->tpl_vars['e']->value;?>
" target="_" class="btn btn-primary">Print</a>
				</div>
			</div>

			<div class="card-body">
				<div class="e-chart e-chart-<?php echo $_smarty_tpl->tpl_vars['report']->value['id'];?>
"></div>
			</div>
		</div>
	</div>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

<?php
}
}
/* {/block 'content'} */
/* {block 'custom_styles'} */
class Block_20998534026476b804ca4dc7_78047400 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_styles' => 
  array (
    0 => 'Block_20998534026476b804ca4dc7_78047400',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<style>
	.e-chart {
		height: 500px;
	}
</style>
<?php
}
}
/* {/block 'custom_styles'} */
/* {block 'custom_scripts'} */
class Block_15706312446476b804ca5424_50382915 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'custom_scripts' => 
  array (
    0 => 'Block_15706312446476b804ca5424_50382915',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.dateformat.php','function'=>'smarty_modifier_dateformat',),1=>array('file'=>'/home/u546582562/domains/myhost14.com/public_html/brgy-alulod/application/libraries/smarty/plugins/modifier.route.php','function'=>'smarty_modifier_route',),));
?>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/js/plugins/ui/moment/moment.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['assets_url']->value;?>
/js/plugins/pickers/daterangepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/js-base64@2.5.2/base64.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
	$(() => 
	{
		
		function initBar(param)
		{
			var chartDom = param.el;
			var myChart = echarts.init(chartDom);
			var option = {
				grid: {
					left: '3%',
					right: '10%',
					bottom: '3%',
					containLabel: true
				},
				title: {
					text: param.title
				},
				tooltip: {
					trigger: 'axis',
					axisPointer: {
						type: 'shadow'
					}
				},
				xAxis: {
					type: 'category',
					data: param.labels
				},
				yAxis: {
					type: 'value'
				},
				series: [
				{
					data: param.values,
					type: 'bar',
					showBackground: true,
					backgroundStyle: {
						color: 'rgba(180, 180, 180, 0.2)'
					},
					emphasis: {
						itemStyle: {
							shadowBlur: 10,
							shadowOffsetX: 0,
							shadowColor: 'rgba(0, 0, 0, 0.5)'
						}
					}
				}
				],
				toolbox: {
					show : false,
					feature : {
						saveAsImage : { show: false }
					}
				}
			};

			option && myChart.setOption(option);

			window.addEventListener('resize', function()
			{
				myChart.resize();
			});

			$(document).on('click', '.sidebar-main-toggle', function () 
			{
				myChart.resize();
			});
		}

		function initBarHorizontal(param)
		{
			var chartDom = param.el;
			var myChart = echarts.init(chartDom);
			var option = {
				grid: {
					left: '3%',
					right: '10%',
					bottom: '3%',
					containLabel: true
				},
				title: {
					text: param.title
				},
				tooltip: {
					trigger: 'axis',
					axisPointer: {
						type: 'shadow'
					}
				},
				yAxis: {
					type: 'category',
					data: param.labels
				},
				xAxis: {
					type: 'value'
				},
				series: [
				{
					data: param.values,
					type: 'bar',
					showBackground: true,
					backgroundStyle: {
						color: 'rgba(180, 180, 180, 0.2)'
					},
					emphasis: {
						itemStyle: {
							shadowBlur: 10,
							shadowOffsetX: 0,
							shadowColor: 'rgba(0, 0, 0, 0.5)'
						}
					}
				}
				],
				toolbox: {
					show : false,
					feature : {
						saveAsImage : { show: false }
					}
				}
			};

			option && myChart.setOption(option);

			window.addEventListener('resize', function()
			{
				myChart.resize();
			});

			$(document).on('click', '.sidebar-main-toggle', function () 
			{
				myChart.resize();
			});
		}

		function initLine(param)
		{
			var chartDom = param.el;
			var myChart = echarts.init(chartDom);
			var option = {
				xAxis: {
					type: 'category',
					data: param.labels
				},
				yAxis: {
					type: 'value'
				},
				series: [
				{
					data: param.values,
					type: 'line'
				}
				],
				toolbox: {
					show : false,
					feature : {
						saveAsImage : { show: false }
					}
				}
			};

			option && myChart.setOption(option);

			window.addEventListener('resize', function()
			{
				myChart.resize();
			});

			$(document).on('click', '.sidebar-main-toggle', function () 
			{
				myChart.resize();
			});
		}

		function initPie(param)
		{
			var chartDom = param.el;
			var myChart = echarts.init(chartDom);
			var option = {
				tooltip: {
					trigger: 'axis',
					showContent: false
				},
				series: [
				{
					type: 'pie',
					radius: '50%',
					data: param.data,
					label: {
						formatter: '{b}: {@2012} ({d}%)'
					},
					emphasis: {
						itemStyle: {
							shadowBlur: 10,
							shadowOffsetX: 0,
							shadowColor: 'rgba(0, 0, 0, 0.5)'
						}
					}
				}
				],
				toolbox: {
					show : false,
					feature : {
						saveAsImage : { show: false }
					}
				}
			};

			option && myChart.setOption(option);

			window.addEventListener('resize', function()
			{
				myChart.resize();
			});

			$(document).on('click', '.sidebar-main-toggle', function () 
			{
				myChart.resize();
			});
		}
		

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reports']->value, 'report');
$_smarty_tpl->tpl_vars['report']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['report']->value) {
$_smarty_tpl->tpl_vars['report']->do_else = false;
?>

		<?php if ($_smarty_tpl->tpl_vars['report']->value['type'] == 'Bar') {?>

		initBar({
			el: $('.e-chart-<?php echo $_smarty_tpl->tpl_vars['report']->value['id'];?>
')[0],
			labels: <?php echo json_encode($_smarty_tpl->tpl_vars['report']->value['labels']);?>
,
			values: <?php echo json_encode($_smarty_tpl->tpl_vars['report']->value['values']);?>

		});

		<?php } elseif ($_smarty_tpl->tpl_vars['report']->value['type'] == 'Bar Horizontal') {?>

		initBarHorizontal({
			el: $('.e-chart-<?php echo $_smarty_tpl->tpl_vars['report']->value['id'];?>
')[0],
			labels: <?php echo json_encode($_smarty_tpl->tpl_vars['report']->value['labels']);?>
,
			values: <?php echo json_encode($_smarty_tpl->tpl_vars['report']->value['values']);?>

		});

		<?php } elseif ($_smarty_tpl->tpl_vars['report']->value['type'] == 'Line') {?>

		initLine({
			el: $('.e-chart-<?php echo $_smarty_tpl->tpl_vars['report']->value['id'];?>
')[0],
			labels: <?php echo json_encode($_smarty_tpl->tpl_vars['report']->value['labels']);?>
,
			values: <?php echo json_encode($_smarty_tpl->tpl_vars['report']->value['values']);?>

		});

		<?php } else { ?>

		initPie({
			el: $('.e-chart-<?php echo $_smarty_tpl->tpl_vars['report']->value['id'];?>
')[0],
			data: <?php echo json_encode($_smarty_tpl->tpl_vars['report']->value['data']);?>

		})

		<?php }?>

		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

		$('.daterange-predefined').daterangepicker(
		{
			startDate: '<?php echo smarty_modifier_dateformat((($tmp = @$_GET['start'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['s_date']->value : $tmp),'m/d/Y');?>
',
			endDate: '<?php echo smarty_modifier_dateformat((($tmp = @$_GET['end'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['e_date']->value : $tmp),'m/d/Y');?>
',
			minDate: '01/01/2021',
			maxDate: new Date(),
			dateLimit: { days: 800 },
			parentEl: '.content-inner',
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		},
		function(start, end) {
			$('.daterange-predefined span').html(start.format('MMM. DD, YYYY') + ' &nbsp; - &nbsp; ' + end.format('MMM. DD, YYYY'));

			var data = {
				start: start.format('YYYY-MM-DD'),
				end: end.format('YYYY-MM-DD'),
			};

			var query = $.param(data);

			window.location = '<?php echo smarty_modifier_route('reports');?>
?' + query;
		});

		$('.daterange-predefined span').html('<?php echo smarty_modifier_dateformat((($tmp = @$_GET['start'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['s_date']->value : $tmp),'M. d, Y');?>
' + ' &nbsp; - &nbsp; ' + '<?php echo smarty_modifier_dateformat((($tmp = @$_GET['end'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['e_date']->value : $tmp),'M. d, Y');?>
');
	});
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'custom_scripts'} */
}
