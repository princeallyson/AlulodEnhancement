{extends 'templates/default/master.tpl'}

{block name='before-page-header'}
{/block}

{block name='before-page-footer'}
{/block}

{block name='content'}
{include "`$smarty.current_dir`/header.tpl"}
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
	{$s = $smarty.get.start|default:$s_date|dateformat:'Y-m-d'}
	{$e = $smarty.get.end|default:$e_date|dateformat:'Y-m-d'}

	{foreach from=$reports item=report}
	<div class="col-md-6">
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title font-weight-semibold">
					<a href="#" class="text-body">{$report.title}</a>
				</h5>
				<div class="header-elements">
					<a href="{"admin--print"|route:$report.id}?s={$s}&e={$e}" target="_" class="btn btn-primary">Print</a>
				</div>
			</div>

			<div class="card-body">
				<div class="e-chart e-chart-{$report.id}"></div>
			</div>
		</div>
	</div>
	{/foreach}
</div>

{/block}

{assign var='__assets' value=['echart']}

{block name='custom_styles'}
<style>
	.e-chart {
		height: 500px;
	}
</style>
{/block}

{block name='custom_scripts'}
<script src="{$assets_url}/js/plugins/ui/moment/moment.min.js"></script>
<script src="{$assets_url}/js/plugins/pickers/daterangepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-base64@2.5.2/base64.min.js"></script>
<script>
	$(() => 
	{
		{literal}
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
		{/literal}

		{foreach from=$reports item=report}

		{if $report.type eq 'Bar'}

		initBar({
			el: $('.e-chart-{$report.id}')[0],
			labels: {$report.labels|json_encode},
			values: {$report.values|json_encode}
		});

		{else if $report.type eq 'Bar Horizontal'}

		initBarHorizontal({
			el: $('.e-chart-{$report.id}')[0],
			labels: {$report.labels|json_encode},
			values: {$report.values|json_encode}
		});

		{else if $report.type eq 'Line'}

		initLine({
			el: $('.e-chart-{$report.id}')[0],
			labels: {$report.labels|json_encode},
			values: {$report.values|json_encode}
		});

		{else}

		initPie({
			el: $('.e-chart-{$report.id}')[0],
			data: {$report.data|json_encode}
		})

		{/if}

		{/foreach}

		$('.daterange-predefined').daterangepicker(
		{
			startDate: '{$smarty.get.start|default:$s_date|dateformat:'m/d/Y'}',
			endDate: '{$smarty.get.end|default:$e_date|dateformat:'m/d/Y'}',
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

			window.location = '{'reports'|route}?' + query;
		});

		$('.daterange-predefined span').html('{$smarty.get.start|default:$s_date|dateformat:'M. d, Y'}' + ' &nbsp; - &nbsp; ' + '{$smarty.get.end|default:$e_date|dateformat:'M. d, Y'}');
	});
</script>
{/block}