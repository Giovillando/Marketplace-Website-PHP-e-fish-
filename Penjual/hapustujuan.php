<?php
$ambil=$koneksi->query("SELECT*FROM tujuan WHERE ID_Tujuan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM tujuan WHERE ID_Tujuan='$_GET[id]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index.php?halaman=tujuan';</script>";
?>