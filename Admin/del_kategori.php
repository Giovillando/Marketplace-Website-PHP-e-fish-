<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM kategori WHERE ID_Kategori='$_GET[ID_Kategori]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM kategori WHERE ID_Kategori='$_GET[ID_Kategori]' ");


echo "<script> alert(' Data Kategori Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=kategori';</script>";
?>