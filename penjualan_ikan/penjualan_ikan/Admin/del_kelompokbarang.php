<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM kelompok_barang WHERE Kode_='$_GET[Kode_Kelompok_Barang]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM kelompok_barang WHERE Kode_Kelompok_Barang='$_GET[Kode_Kelompok_Barang]' ");


echo "<script> alert(' Data Kelompok Barang Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=kelompok_barang';</script>";
?>

