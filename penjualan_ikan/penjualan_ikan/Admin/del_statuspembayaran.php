<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM status_pembayaran WHERE ID_Status_Pembayaran='$_GET[ID_Status_Pembayaran]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM status_pembayaran WHERE ID_Status_Pembayaran='$_GET[ID_Status_Pembayaran]' ");


echo "<script> alert(' Data Status Pembayaran Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=status_pembayaran';</script>";
?>