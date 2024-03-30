<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM faktur_rinci WHERE ID_Faktur_Rinci='$_GET[ID_Faktur_Rinci]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM faktur_rinci WHERE ID_Faktur_Rinci='$_GET[ID_Faktur_Rinci]' ");


echo "<script> alert(' Data Faktur Rinci Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=faktur_rinci';</script>";
?>