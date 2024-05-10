
<?php
$koneksi->query("DELETE FROM universitas WHERE iduniversitas='$_GET[id]'");

echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='index.php?halaman=universitasdaftar';</script>";

?>