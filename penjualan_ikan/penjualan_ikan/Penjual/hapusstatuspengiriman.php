<?php
include ('koneksi.php');
$ambildata=$koneksi->query(" SELECT * FROM status_pengiriman WHERE ID_Status_Pengiriman='$_GET[ID_Status_Pengiriman]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM status_pengiriman WHERE ID_Status_Pengiriman='$_GET[ID_Status_Pengiriman]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index.php?halaman=statuspengiriman';</script>";
?>