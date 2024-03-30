<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT *FROM barang WHERE Kode_Barang='$_GET[Kode_Barang]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM barang WHERE Kode_Barang='$_GET[Kode_Barang]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index.php?halaman=barang';</script>";
?>