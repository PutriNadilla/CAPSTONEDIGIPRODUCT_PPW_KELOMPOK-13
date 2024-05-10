<?php
$id = $_SESSION['admin']['id'];
$koneksi->query("DELETE FROM favorit WHERE id='$id' and iduniversitas='$_GET[id]'");
echo "<script>alert('Berhasil di hapus dari Favorit');</script>";
if ($_GET['page'] == 'universitasdaftar') {
    echo "<script>location='index.php?halaman=universitasdaftar';</script>";
} else {
    echo "<script>location='index.php?halaman=favoritdaftar';</script>";
}
