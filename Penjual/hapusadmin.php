<?php
$ambil=$koneksi->query("SELECT*FROM admin WHERE username='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM admin WHERE username='$_GET[id]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index2.php?halaman=dataadmin';</script>";
?>