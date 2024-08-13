{extends 'templates/default/master.tpl'}

{block name='before-page-header'}
{/block}

{block name='before-page-footer'}
{/block}

{$can_entry = true}

{block name='content'}
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Dashboard</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6 col-xl-3">
				<div class="card card-body">
					<div class="media">
						<div class="mr-3 align-self-center">
							<i class="icon-heart5 icon-3x text-success"></i>
						</div>

						<div class="media-body text-right">
							<h3 class="font-weight-semibold mb-0">{$total_pets|default:0}</h3>
							<span class="text-uppercase font-size-sm text-muted">Total Pets</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-xl-3">
				<div class="card card-body">
					<div class="media">
						<div class="mr-3 align-self-center">
							<i class="icon-home icon-3x text-indigo"></i>
						</div>

						<div class="media-body text-right">
							<h3 class="font-weight-semibold mb-0">{$adopted_pets|default:0}</h3>
							<span class="text-uppercase font-size-sm text-muted">Adopted Pets</span>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-xl-3">
				<div class="card card-body">
					<div class="media">
						<div class="media-body">
							<h3 class="font-weight-semibold mb-0">{$total_owners|default:0}</h3>
							<span class="text-uppercase font-size-sm text-muted">Total Owner</span>
						</div>

						<div class="ml-3 align-self-center">
							<i class="icon-users4 icon-3x text-primary"></i>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6 col-xl-3">
				<div class="card card-body">
					<div class="media">
						<div class="media-body">
							<h3 class="font-weight-semibold mb-0">{$total_staff|default:0}</h3>
							<span class="text-uppercase font-size-sm text-muted">Total Staff</span>
						</div>

						<div class="ml-3 align-self-center">
							<i class="icon-users2 icon-3x text-danger"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{/block}
