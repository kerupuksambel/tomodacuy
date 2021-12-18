<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	<h1 class="h2"><?= $user[0]['nama'] ?></h1>
	<?php
		if(!$isSelf){
	?>
	<?= 
		($isFriend) 
		? '<a href="/add.php?id='.$user[0]['id'].'" class="btn btn-danger">Hapus Teman</a>'
		: '<a href="/add.php?id='.$user[0]['id'].'" class="btn btn-primary">Tambahkan Teman</a>'
	?>
	<?php 
		} 
	?>
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
							<div class=""><?= $user[0]['nama'] ?></div>
						</div>
						<div class="col-md-6">
							<div class="font-weight-bold">Username</div>
							<div class=""><?= $user[0]['username'] ?></div>
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
						<?php foreach ($friends as $f): ?>
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="font-weight-bold">
										<a href="/profile.php?id=<?= $f['id'] ?>"><?= $f['username'] ?></a>
									</div>
									<div class=""><?= $f['nama'] ?></div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>