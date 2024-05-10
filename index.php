<?php
session_start();
include 'koneksi.php';

?>
<?php include 'header.php'; ?>

<div class="carousel-header">
	<div id="carouselId" class="carousel slide" data-bs-ride="carousel">
		<ol class="carousel-indicators">
			<li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
			<li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
			<li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<img src="home/img/bg1.jpg" class="img-fluid" alt="Image">
				<div class="carousel-caption">
					<div class="p-3" style="max-width: 900px;">
						<h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Selamat Datang di Website</h4>
						<h1 class="display-5 text-capitalize text-white mb-4">Rekomendasi Universitas Internasional, Pilih yang Terbaik untuk Masa Depan Anda!</h1>
						</p>
						<div class="d-flex align-items-center justify-content-center">
							<a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="login.php">Login Sekarang</a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<img src="home/img/bg2.jpeg" class="img-fluid" alt="Image">
				<div class="carousel-caption">
					<div class="p-3" style="max-width: 900px;">
						<h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Selamat Datang di Website</h4>
						<h1 class="display-5 text-capitalize text-white mb-4">Rekomendasi Universitas Internasional, Pilih yang Terbaik untuk Masa Depan Anda!</h1>
						</p>
						<div class="d-flex align-items-center justify-content-center">
							<a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="login.php">Login Sekarang</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
			<span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
			<span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
</div>
</div>
<div class="container-fluid about py-5">
	<div class="container py-5">
		<div class="row g-5 align-items-center">
			<div class="col-lg-5">
				<div class="h-100" style="border: 50px solid; border-color: transparent #1c6dcb transparent #1c6dcb;">
					<img src="home/img/bg2.jpeg" class="img-fluid w-100 h-100" alt="">
				</div>
			</div>
			<div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
				<img width="20%" src="foto/logo.webp">
				<br>
				<h5 class="section-about-title pe-3 mt-3">Tujuan Website</h5>
				<h1 class="mb-4">Global Campus Guide</h1>
				<p class="mb-4">Website ini dibuat untuk membantu calon mahasiswa yang bingung dalam memilih universitas internasional. Di dunia pendidikan yang kompetitif, penting bagi para calon mahasiswa untuk memiliki informasi yang tepat. Website ini memberikan detail lengkap tentang universitas, peringkatnya, dan fitur pencarian yang mudah digunakan. Dengan bantuan website ini, calon mahasiswa dapat membuat keputusan yang lebih baik tentang universitas yang cocok untuk mereka.</p>
			</div>
		</div>
	</div>
</div>

<?php
include 'footer.php';
?>