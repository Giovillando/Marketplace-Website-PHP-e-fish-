<?php
include 'koneksi.php';
$ambildata=$koneksi->query("SELECT * FROM status_order WHERE ID_Status_Order='$_GET[ID_Status_Order]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM status_order WHERE ID_Status_Order='$_GET[ID_Status_Order]'");

echo "<script>alert('Data Status Order Berhasil Terhapus'); </script>";
echo "<script>location='index.php?halaman=status_order' ; </script>";

?>