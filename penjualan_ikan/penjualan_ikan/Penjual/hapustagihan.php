<?php
$ambil=$koneksi->query("SELECT*FROM tagihan WHERE ID_Tagihan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM tagihan WHERE ID_Tagihan='$_GET[id]'");

echo "<script> alert('Data Berhasil Dihapus');</script>";
echo "<script> location='index.php?halaman=tagihan';</script>";
?>