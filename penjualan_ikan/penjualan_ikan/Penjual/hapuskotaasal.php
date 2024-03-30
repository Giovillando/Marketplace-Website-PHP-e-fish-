<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM kota WHERE ID_Kota='$_GET[ID_Kota]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM kota WHERE ID_Kota='$_GET[ID_Kota]' ");


echo "<script> alert(' Data Kota Asal Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=kota_asal';</script>";
?>