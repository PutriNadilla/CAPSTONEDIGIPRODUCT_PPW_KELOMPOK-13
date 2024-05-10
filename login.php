<?php
session_start();
include 'koneksi.php';

?>
<!DOCTYPE html>
<html dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="foto/logo.png">
	<title>Login</title>
	<link href="panel/assets/assets_panel/dist/css/style.min.css" rel="stylesheet">
</head>

<body class="bg-primary">
	<div class="main-wrapper">
		<div class="preloader">
			<div class="lds-ripple">
				<div class="lds-pos"></div>
				<div class="lds-pos"></div>
			</div>
		</div>
		<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url(panel/assets/assets_panel/assets/images/big/auth-bg.jpg) no-repeat center center;">
			<div class="auth-box row justify-content-center">

				<div class="col-lg-12 col-md-12 bg-white">
					<div class="p-3">
						<h2 class="mt-3 text-center">Login</h2>
						<form class="mt-4" method="post">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="uname">Email</label>
										<input class="form-control" id="uname" type="email" name="email" placeholder="Masukkan Email">
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="text-dark" for="pwd">Password</label>
										<input class="form-control" id="pwd" type="password" name="password" placeholder="Masukkan password">
									</div>
								</div>
								<br><br><br>
								<div class="col-lg-12 text-center">
									<button type="submit" class="btn btn-block btn-dark" name="simpan">Login</button>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<br>
									<center>
										<a href="daftar.php">Belum punya akun ? Daftar sekarang</a>
									</center>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
		if (isset($_POST["simpan"])) {
			$email = $_POST["email"];
			$password = $_POST["password"];
			$ambil = $koneksi->query("SELECT * FROM pengguna WHERE email='$email' AND password='$password' LIMIT 1");
			$akunyangcocok = $ambil->num_rows;
			if ($akunyangcocok == 1) {
				$akun = $ambil->fetch_assoc();
				if ($akun['level'] == "User") {
					$_SESSION["admin"] = $akun;
					echo "<script>alert('Anda sukses login');</script>";
					echo "<script>location ='panel/index.php';</script>";
				} elseif ($akun['level'] == "Admin") {
					$_SESSION['admin'] = $akun;
					echo "<script>alert('Anda sukses login');</script>";
					echo "<script>location ='panel/index.php';</script>";
				}
			} else {
				echo "<script>alert('Anda gagal login, Cek akun Anda');</script>";
				echo "<script>location ='index.php';</script>";
			}
		}
		?>
	</div>

	<script src="panel/assets/assets_panel/assets/libs/jquery/dist/jquery.min.js "></script>
	<script src="panel/assets/assets_panel/assets/libs/popper.js/dist/umd/popper.min.js "></script>
	<script src="panel/assets/assets_panel/assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>

	<script>
		$(".preloader ").fadeOut();
	</script>
</body>

</html>