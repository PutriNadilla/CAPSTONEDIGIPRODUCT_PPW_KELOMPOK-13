<?php
$id = $_SESSION['admin']['id'];
$koneksi->query("INSERT INTO favorit (id, iduniversitas)
								VALUES('$id','$_GET[id]')") or die(mysqli_error($koneksi));
echo "<script>alert('Berhasil di simpan ke Favorit');</script>";
echo "<script>location='index.php?halaman=universitasdaftar';</script>";
