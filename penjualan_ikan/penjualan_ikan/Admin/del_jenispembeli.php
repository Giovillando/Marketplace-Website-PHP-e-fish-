<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM jenis_pembeli WHERE Kode_Jenis_Pembeli='$_GET[Kode_Jenis_Pembeli]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM jenis_pembeli WHERE Kode_Jenis_Pembeli='$_GET[Kode_Jenis_Pembeli]' ");


echo "<script> alert(' Data Jenis Pembeli Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=jenis_pembeli';</script>";
?>