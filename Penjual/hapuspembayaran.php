<?php
$ambil=$koneksi->query("SELECT*FROM pembayaran WHERE ID_Pembayaran='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM pembayaran WHERE ID_Pembayaran='$_GET[id]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index.php?halaman=pembayaran';</script>";
?>