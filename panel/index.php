<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../koneksi.php';

if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
function potong($text, $panjang)
{
    $first100Chars = substr($text, 0, $panjang);
    return $first100Chars;
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../foto/logo.webp">
    <title>Global Campus Guide</title>
    <link href="assets/assets_panel/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/assets_panel/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/assets_panel/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="assets/assets_panel/dist/css/style.min.css" rel="stylesheet">
    <script src="assets/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
</head>

<?php
if ($_SESSION['admin']['level'] == 'Admin') {
    $bg = "bg-success";
} elseif ($_SESSION['admin']['level'] == 'User') {
    $bg = "bg-primary";
}
?>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar <?= $bg ?>" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <div class="navbar-brand">
                        <a href="index.php?halaman=beranda">
                            <h2 class="text-dark"><b><?= $_SESSION['admin']['level'] ?> Panel</b></h2>
                        </a>
                    </div>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../foto/<?= $_SESSION['admin']['foto'] ?>" alt="user" class="rounded-circle" style="border-radius: 100px;width:40px;height:40px;object-fit:cover">
                                <span class="ml-2 d-none d-lg-inline-block"><span class="text-white"><b><?= $_SESSION['admin']['nama'] ?></b></span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="index.php?halaman=ubahprofil"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                                    Ubah Profil</a>
                                <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?');"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <?php
                        if ($_SESSION['admin']['level'] == 'Admin') {
                        ?>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php?halaman=beranda" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Universitas </span></a>
                                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                    <li class="sidebar-item"><a href="index.php?halaman=universitastambah" class="sidebar-link"><span class="hide-menu"> Tambah Universitas
                                            </span></a>
                                    </li>
                                    <li class="sidebar-item"><a href="index.php?halaman=universitasdaftar" class="sidebar-link"><span class="hide-menu"> Daftar Universitas
                                            </span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php?halaman=pengguna" aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span class="hide-menu">Data User</span></a></li>
                        <?php
                        } elseif ($_SESSION['admin']['level'] == 'User') {
                        ?>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php?halaman=beranda" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php?halaman=universitasdaftar" aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Universitas</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php?halaman=favoritdaftar" aria-expanded="false"><i data-feather="heart" class="feather-icon"></i><span class="hide-menu">Favorit</span></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="container-fluid">
            <div id="page-inner">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == "universitasdaftar") {
                        include 'universitasdaftar.php';
                    } elseif ($_GET['halaman'] == "universitasubah") {
                        include 'universitasubah.php';
                    } elseif ($_GET['halaman'] == "universitashapus") {
                        include 'universitashapus.php';
                    } elseif ($_GET['halaman'] == "universitastambah") {
                        include 'universitastambah.php';
                    } elseif ($_GET['halaman'] == "favoritdaftar") {
                        include 'favoritdaftar.php';
                    } elseif ($_GET['halaman'] == "universitasfavorit") {
                        include 'universitasfavorit.php';
                    } elseif ($_GET['halaman'] == "universitasfavorithapus") {
                        include 'universitasfavorithapus.php';
                    } elseif ($_GET['halaman'] == "pengguna") {
                        include 'pengguna.php';
                    } elseif ($_GET['halaman'] == "hapuspengguna") {
                        include 'hapuspengguna.php';
                    } elseif ($_GET['halaman'] == "logout") {
                        include 'logout.php';
                    } elseif ($_GET['halaman'] == "beranda") {
                        include 'beranda.php';
                    } elseif ($_GET['halaman'] == "ubahprofil") {
                        include 'ubahprofil.php';
                    }
                } else {
                    include 'beranda.php';
                }
                ?>
            </div>
        </div>
    </div>
    <script src="assets/assets_panel/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/assets_panel/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/assets_panel/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="assets/assets_panel/dist/js/app-style-switcher.js"></script>
    <script src="assets/assets_panel/dist/js/feather.min.js"></script>
    <script src="assets/assets_panel/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/assets_panel/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/assets_panel/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="assets/assets_panel/assets/extra-libs/c3/d3.min.js"></script>
    <script src="assets/assets_panel/assets/extra-libs/c3/c3.min.js"></script>
    <script src="assets/assets_panel/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/assets_panel/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/assets_panel/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/assets_panel/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/assets_panel/dist/js/pages/dashboards/dashboard1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
    <script>
        new DataTable('#tabel', {
            responsive: true
        });
    </script>
</body>

</html>