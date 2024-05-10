<div class="page-wrapper">
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Universitas</h4>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item"><a href="#" class="text-muted">Home</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page">Tambah Universitas</li>
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
						<h4 class="card-title">Tambah Universitas</h4>
						<form class="mt-4" method="Post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Nama Universitas</label>
								<input type="text" class="form-control" name="namauniversitas" required>
							</div>
							<div class="form-group">
								<label>Rangking Dunia</label>
								<input type="number" class="form-control" name="rangkingdunia" required>
							</div>
							<div class="form-group">
								<label>Negara</label>
								<input type="text" class="form-control" name="negara" required>
							</div>
							<div class="form-group">
								<label>Rangking Nasional</label>
								<input type="number" class="form-control" name="rangkingnasional" required>
							</div>
							<div class="form-group">
								<label>Kualitas Pendidikan</label>
								<input type="number" class="form-control" name="kualitaspendidikan" required>
							</div>
							<div class="form-group">
								<label>Pegawai Alumni</label>
								<input type="number" class="form-control" name="pegawaialumni" required>
							</div>
							<div class="form-group">
								<label>Kualitas Fakultas</label>
								<input type="number" class="form-control" name="kualitasfakultas" required>
							</div>
							<div class="form-group">
								<label>Publikasi</label>
								<input type="number" class="form-control" name="publikasi" required>
							</div>
							<div class="form-group">
								<label>Skor</label>
								<input type="number" class="form-control" name="skor" required>
							</div>
							<div class="form-group">
								<label>Foto</label>
								<input type="file" class="form-control" name="file">
							</div>
							<div class="form-group">
								<label>Deskripsi</label>
								<textarea rows="5" class="form-control" name="deskripsi" required></textarea>
							</div>
							<button class="btn btn-primary float-right" name="tambah">Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($_POST['tambah'])) {
	$namafile = $_FILES['file']['name'];
	$lokasifile = $_FILES['file']['tmp_name'];
	move_uploaded_file($lokasifile, "../foto/" . $namafile);
	$rangkingdunia = $_POST["rangkingdunia"];
	$namauniversitas = $_POST["namauniversitas"];
	$negara = $_POST["negara"];
	$rangkingnasional = $_POST["rangkingnasional"];
	$kualitaspendidikan = $_POST["kualitaspendidikan"];
	$pegawaialumni = $_POST["pegawaialumni"];
	$kualitasfakultas = $_POST["kualitasfakultas"];
	$kualitasfakultas = $_POST["kualitasfakultas"];
	$publikasi = $_POST["publikasi"];
	$skor = $_POST["skor"];
	$deskripsi = $_POST["deskripsi"];
	$koneksi->query("INSERT INTO universitas(rangkingdunia, namauniversitas, negara, rangkingnasional, kualitaspendidikan, pegawaialumni, kualitasfakultas, publikasi, skor, file, deskripsi)
    VALUES ('$rangkingdunia', '$namauniversitas', '$negara', '$rangkingnasional', '$kualitaspendidikan', '$pegawaialumni', '$kualitasfakultas', '$publikasi', '$skor', '$namafile', '$deskripsi')") or die(mysqli_error($koneksi));
	echo "<script> alert('Data Berhasil Di Tambah');</script>";
	echo "<script> location ='index.php?halaman=universitasdaftar';</script>";
}
?>