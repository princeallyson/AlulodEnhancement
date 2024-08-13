{extends 'templates/default/master.tpl'}

{block name='page-header'}
<div class="page-header-content header-elements-lg-inline">
	<div class="page-title d-flex pb-1">
		<h4>Dashboard</h4>
	</div>
</div>
{/block}

{block name='content'}

{* <div class="row">
	<div class="col-md-6">
		<div class="card card-body">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-users icon-3x text-indigo"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="font-weight-semibold mb-0">{$counts.students|default:0}</h3>
					<a href="{'alerto--students'|route}">
						<span class="text-uppercase font-size-sm text-muted">Students</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="card card-body">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-user-tie icon-3x text-primary"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="font-weight-semibold mb-0">{$counts.employees|default:0}</h3>
					<a href="{'alerto--employees'|route}">
						<span class="text-uppercase font-size-sm text-muted">Employees</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="card card-body">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-file-text icon-3x text-pink"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="font-weight-semibold mb-0">{$counts.classes|default:0}</h3>
					<a href="{'alerto--classes'|route}">
						<span class="text-uppercase font-size-sm text-muted">Classes</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="card card-body">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-library2 icon-3x text-yellow"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="font-weight-semibold mb-0">{$counts.departments|default:0}</h3>
					<a href="{'alerto--departments'|route}">
						<span class="text-uppercase font-size-sm text-muted">Departments</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="card card-body">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-graduation icon-3x text-success"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="font-weight-semibold mb-0">{$counts.courses|default:0}</h3>
					<a href="{'alerto--courses'|route}">
						<span class="text-uppercase font-size-sm text-muted">Courses</span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="card card-body">
			<div class="media">
				<div class="mr-3 align-self-center">
					<i class="icon-bookmark icon-3x text-teal"></i>
				</div>

				<div class="media-body text-right">
					<h3 class="font-weight-semibold mb-0">{$counts.sections|default:0}</h3>
					<a href="{'alerto--sections'|route}">
						<span class="text-uppercase font-size-sm text-muted">Sections</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title font-weight-semibold">
					Temperature
				</h5>
			</div>
			<div class="card-body">
				<canvas id="buyers" width="600" height="400"></canvas>
			</div>
		</div>
	</div>
</div> *}

{/block}

{block name='scripts'}
<script src="{$assets_url}/plugins/chartjs/dist/chart.min.js"></script>

<script>
	// $(function ()
	// {
	// 	const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
	// 	const data = {
	// 		labels: labels,

	// 		datasets: [
	// 		{
	// 			label: 'Negative',
	// 			data: [
	// 			{random_int(1, 100)}, 
	// 			{random_int(1, 100)}, 
	// 			{random_int(1, 100)}, 
	// 			{random_int(1, 100)}, 
	// 			{random_int(1, 100)}, 
	// 			{random_int(1, 100)}, 
	// 			{random_int(1, 100)}
	// 			],
	// 			borderColor: 'rgb(54, 162, 235)',
	// 			backgroundColor: 'rgb(54, 162, 235)',
	// 			lineTension: 0.4,
	// 			radius: 4
	// 		},
	// 		{
	// 			label: 'Positive',
	// 			data: [
	// 			{random_int(1, 100)}, 
	// 			{random_int(1, 100)}, 
	// 			{random_int(1, 100)}, 
	// 			{random_int(1, 100)}, 
	// 			{random_int(1, 100)}, 
	// 			{random_int(1, 100)}, 
	// 			{random_int(1, 100)}
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
</script>
{/block}