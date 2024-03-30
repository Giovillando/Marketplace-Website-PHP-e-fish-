<?php
$ambil=$koneksi->query("SELECT*FROM barang WHERE ID_Barang='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM barang WHERE ID_Barang='$_GET[id]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index.php?halaman=laporanstok';</script>";
?>