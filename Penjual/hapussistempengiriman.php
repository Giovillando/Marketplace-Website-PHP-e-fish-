<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT *FROM sistem_pengiriman WHERE Kode_Sistem_Pengiriman='$_GET[Kode_Sistem_Pengiriman]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM sistem_pengiriman WHERE Kode_Sistem_Pengiriman='$_GET[Kode_Sistem_Pengiriman]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index.php?halaman=sistempengiriman';</script>";
?>