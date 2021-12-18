<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	<h1 class="h2">Profile</h1>
</div>
<div class="w-100">
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Info</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="font-weight-bold">Nama</div>
							<div class=""><?= $result[0]['nama'] ?></div>
						</div>
						<div class="col-md-6">
							<div class="font-weight-bold">Username</div>
							<div class=""><?= $result[0]['username'] ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">Teman</div>
				<div class="card-body">
					<div class="row">
						<div class="card">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>