<?php
$id = $_SESSION["admin"]['id'];
$ambil = $koneksi->query("SELECT *FROM pengguna WHERE id='$id'");
$row = $ambil->fetch_assoc(); ?>

<div class="page-wrapper">
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Ubah Profil</h4>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item"><a href="#" class="text-muted">Home</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page">Ubah Profil</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Ubah Profil</h4>
						<form class="mt-4" method="Post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Nama</label>
								<input value="<?php echo $row['nama']; ?>" type="text" value="" class="form-control" name="nama">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input value="<?php echo $row['email']; ?>" type="text" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label>Foto Profil</label>
								<input type="file" class="form-control" name="file">
								<br>
								<img src="../foto/<?= $row['foto'] ?>" width="100px">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="text" class="form-control" name="password">
								<input type="hidden" class="form-control" name="passwordlama" value="<?php echo $row['password']; ?>">
								<span class="text-danger">Kosongkan Password jika tidak ingin mengganti</span>
							</div>
							<button class="btn btn-primary float-right" name="ubah">Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($_POST['ubah'])) {
	if ($_POST['password'] == "") {
		$password = $_POST['passwordlama'];
	} else {
		$password = $_POST['password'];
	}
	$namafile = $_FILES['file']['name'];
	$lokasifile = $_FILES['file']['tmp_name'];
	if (!empty($lokasifile)) {
		move_uploaded_file($lokasifile, "../foto/$namafile");
		$foto = $namafile;
	} else {
		$foto = $row['foto'];
	}
	$koneksi->query("UPDATE pengguna SET nama='$_POST[nama]', email='$_POST[email]', password='$password',foto='$foto' WHERE id='$id'") or die(mysqli_error($koneksi));
	$ambil = $koneksi->query("SELECT * FROM pengguna WHERE id='$id'");
	$akun = $ambil->fetch_assoc();
	$_SESSION['admin'] = $akun;
	echo "<script>alert('Profil Berhasil Di Ubah');</script>";
	echo "<script>location='index.php?halaman=ubahprofil';</script>";
}
?>