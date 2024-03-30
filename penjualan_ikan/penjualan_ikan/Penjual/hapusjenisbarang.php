<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT *FROM jenis_barang WHERE Kode_Jenis_Barang='$_GET[Kode_Jenis_Barang]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM jenis_barang WHERE Kode_Jenis_Barang='$_GET[Kode_Jenis_Barang]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index.php?halaman=jenisbarang';</script>";
?>