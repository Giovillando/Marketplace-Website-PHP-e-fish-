<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM admin WHERE Username='$_GET[Username]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM admin WHERE Username='$_GET[Username]' ");


echo "<script> alert(' Data Laporan Admin Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=laporanadmin';</script>";
?>