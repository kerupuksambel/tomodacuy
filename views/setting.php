<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
	<h1 class="h2">Pengaturan</h1>
</div>
<div class="w-100">
	<form method="POST">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" value="<?= $result['nama'] ?>" class="form-control">
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="username">Username</label>
                <input type="username" name="username" value="<?= $result['username'] ?>" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Ubah">
    </form>
</div>