<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM jasa_pembayaran WHERE ID_Jasa_Pembayaran='$_GET[ID_Jasa_Pembayaran]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM jasa_pembayaran WHERE ID_Jasa_Pembayaran='$_GET[ID_Jasa_Pembayaran]' ");


echo "<script> alert(' Data Jasa Pembayaran Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=jasa_pembayaran';</script>";
?>