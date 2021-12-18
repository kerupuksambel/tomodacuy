<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	<h1 class="h2">Dashboard</h1>
</div>
<div class="w-100 pb-3 mb-3 border-bottom">
	<form method="POST" action="post.php">
		<div class="form-group">
			<textarea name="content" placeholder="Isi status Anda..." id="content" class="form-control"></textarea>
		</div>
		<input type="submit" class="btn btn-primary" value="Post">
	</form>
</div>
<div class="w-100">
	<div class="row">
	<?php foreach ($result as $r): ?>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header"><?= $r['nama'] ?></div>
				<div class="card-body"><?= $r["content"] ?></div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</div>