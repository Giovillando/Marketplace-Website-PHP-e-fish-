<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM faktur_beli WHERE ID_Faktur_Beli='$_GET[ID_Faktur_Beli]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM faktur_beli WHERE ID_Faktur_Beli='$_GET[ID_Faktur_Beli]' ");


echo "<script> alert(' Data Faktur Beli Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=faktur_beli';</script>";
?>