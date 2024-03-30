<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM jenis_pembayaran WHERE Kode_Jenis_Pembayaran='$_GET[Kode_Jenis_Pembayaran]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM jenis_pembayaran WHERE Kode_Jenis_Pembayaran='$_GET[Kode_Jenis_Pembayaran]' ");


echo "<script> alert(' Data Jenis Pembayaran Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=jenis_pembayaran';</script>";
?>