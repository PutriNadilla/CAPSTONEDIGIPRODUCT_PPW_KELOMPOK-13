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
    <link rel="icon" type="image/png" sizes="16x16" href="foto/logo.webp">
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
                        <h2 class="mt-3 text-center">Daftar</h2>
                        <form class="mt-4" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="nama">Nama</label>
                                        <input class="form-control" id="nama" type="text" name="nama" placeholder="Masukkan Nama" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Email</label>
                                        <input class="form-control" id="uname" type="email" name="email" placeholder="Masukkan Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input class="form-control" id="pwd" type="password" name="password" placeholder="Masukkan password" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd_confirm">Konfirmasi Password</label>
                                        <input class="form-control" id="pwd_confirm" type="password" name="password_confirm" placeholder="Masukkan password sekali lagi" required>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark" name="daftar">Daftar</button>
                                </div>
                                <br>
                                <br>
                                <center>
                                    <a href="login.php">Sudah punya akun ? Login sekarang</a>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST["daftar"])) {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];

            // Validasi konfirmasi password
            if ($password !== $password_confirm) {
                echo "<script>alert('Konfirmasi password tidak cocok')</script>";
                echo "<script>location='daftar.php';</script>";
                exit; // Berhenti proses jika konfirmasi password tidak cocok
            }

            $ambil = $koneksi->query("SELECT * FROM pengguna WHERE email='$email'");
            $yangcocok = $ambil->num_rows;
            if ($yangcocok == 1) {
                echo "<script>alert('Email sudah terdaftar, mohon menggunakan email lainnya')</script>";
                echo "<script>location='daftar.php';</script>";
            } else {
                $koneksi->query("INSERT INTO pengguna (nama, email,  password, level)
								VALUES('$nama','$email','$password', 'User')") or die(mysqli_error($koneksi));
                echo "<script>alert('Pendaftaran Berhasil, Silahkan Login')</script>";
                echo "<script>location='login.php';</script>";
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
