<?php

include ('koneksi.php');
$ambildata=$koneksi->query("SELECT *FROM Status_Pembayaran WHERE ID_Status_Pembayaran='$_GET[ID_Status_Pembayaran]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM Status_Pembayaran WHERE ID_Status_Pembayaran='$_GET[ID_Status_Pembayaran]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index.php?halaman=statuspembayaran';</script>";
?>