<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM diskon WHERE Kode_Diskon='$_GET[Kode_Diskon]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM diskon WHERE Kode_Diskon='$_GET[Kode_Diskon]' ");


echo "<script> alert(' Data Diskon Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=diskon';</script>";
?>