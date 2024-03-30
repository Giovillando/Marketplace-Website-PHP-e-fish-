<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM jasa_kirim WHERE ID_Jasa_Kirim='$_GET[ID_Jasa_Kirim]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM jasa_kirim WHERE ID_Jasa_Kirim='$_GET[ID_Jasa_Kirim]' ");

echo "<script> alert(' Data Jasa Kirim Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=del_jasakirim';</script>";
?>