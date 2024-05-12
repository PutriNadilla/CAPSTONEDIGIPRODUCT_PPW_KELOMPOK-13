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
    if (empty($_POST["namauniversitas"]) || empty($_POST["rangkingdunia"]) || empty($_POST["rangkingnasional"]) || empty($_POST["negara"]) || empty($_POST["kualitaspendidikan"]) || empty($_POST["pegawaialumni"]) || empty($_POST["kualitasfakultas"]) || empty($_POST["publikasi"]) || empty($_POST["skor"]) || empty($_POST["deskripsi"]) || empty($_FILES['file']['name'])) {
        echo "<script>alert('Harap lengkapi semua data terlebih dahulu.'); window.location ='index.php?halaman=universitastambah';</script>";
        exit; 
    }

    $namauniversitas = $_POST["namauniversitas"];
    $query_cek_nama = $koneksi->query("SELECT * FROM universitas WHERE namauniversitas = '$namauniversitas'");
    if ($query_cek_nama->num_rows > 0) {
        echo "<script>alert('Nama universitas sudah ada. Silakan coba lagi dengan nama universitas yang berbeda.'); window.location ='index.php?halaman=universitastambah';</script>";
        exit; 
    }

    $rangkingdunia = $_POST["rangkingdunia"];
    $query_cek_dunia = $koneksi->query("SELECT * FROM universitas WHERE rangkingdunia = '$rangkingdunia'");
    if ($query_cek_dunia->num_rows > 0) {
        echo "<script>alert('Rangking dunia sudah ada. Silakan coba lagi dengan rangking dunia yang berbeda.'); window.location ='index.php?halaman=universitastambah';</script>";
        exit; 
    }

    $rangkingnasional = $_POST["rangkingnasional"];
    $query_cek_nasional = $koneksi->query("SELECT * FROM universitas WHERE rangkingnasional = '$rangkingnasional'");
    if ($query_cek_nasional->num_rows > 0) {
        echo "<script>alert('Rangking nasional sudah ada. Silakan coba lagi dengan rangking nasional yang berbeda.'); window.location ='index.php?halaman=universitastambah';</script>";
        exit; 
    }

    echo "<script>alert('Data Berhasil Ditambah'); window.location ='index.php?halaman=universitastambah';</script>";

    $namafile = $_FILES['file']['name'];
    $lokasifile = $_FILES['file']['tmp_name'];
    move_uploaded_file($lokasifile, "../foto/" . $namafile);
    $negara = $_POST["negara"];
    $kualitaspendidikan = $_POST["kualitaspendidikan"];
    $pegawaialumni = $_POST["pegawaialumni"];
    $kualitasfakultas = $_POST["kualitasfakultas"];
    $publikasi = $_POST["publikasi"];
    $skor = $_POST["skor"];
    $deskripsi = $_POST["deskripsi"];

    $koneksi->query("INSERT INTO universitas(rangkingdunia, namauniversitas, negara, rangkingnasional, kualitaspendidikan, pegawaialumni, kualitasfakultas, publikasi, skor, file, deskripsi)
    VALUES ('$rangkingdunia', '$namauniversitas', '$negara', '$rangkingnasional', '$kualitaspendidikan', '$pegawaialumni', '$kualitasfakultas', '$publikasi', '$skor', '$namafile', '$deskripsi')") or die(mysqli_error($koneksi));

    echo "<script>alert('Data Berhasil Ditambah');</script>";
    echo "<script>location ='index.php?halaman=universitasdaftar';</script>";
}
?>
