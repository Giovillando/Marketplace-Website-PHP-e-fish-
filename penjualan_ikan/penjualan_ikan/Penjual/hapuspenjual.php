<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT *FROM penjual WHERE ID_Penjual='$_GET[ID_Penjual]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM penjual WHERE ID_Penjual='$_GET[ID_Penjual]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index.php?halaman=penjual';</script>";
?>