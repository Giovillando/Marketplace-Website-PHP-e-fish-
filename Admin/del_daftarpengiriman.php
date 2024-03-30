<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM daftar_pengiriman WHERE Kode_Daftar_Pengiriman='$_GET[Kode_Daftar_Pengiriman]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM daftar_pengiriman WHERE Kode_Daftar_Pengiriman='$_GET[Kode_Daftar_Pengiriman]' ");


echo "<script> alert(' Data Daftar Pengiriman Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=daftar_pengiriman';</script>";
?>