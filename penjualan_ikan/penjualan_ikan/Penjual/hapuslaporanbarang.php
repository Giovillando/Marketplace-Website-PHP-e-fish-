<?php
$ambil=$koneksi->query("SELECT*FROM nota WHERE No_Nota='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM nota WHERE No_Nota='$_GET[id]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index.php?halaman=laporanbarang';</script>";
?>