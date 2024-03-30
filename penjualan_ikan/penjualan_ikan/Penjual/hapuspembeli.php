<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT *FROM pembeli WHERE ID_Pembeli='$_GET[ID_Pembeli]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM pembeli WHERE ID_Pembeli='$_GET[ID_Pembeli]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index.php?halaman=pembeli';</script>";
?>