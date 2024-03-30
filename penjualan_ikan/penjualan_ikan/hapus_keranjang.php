<?php 
session_start ();
$Kode_Barang=$_GET["Kode_Barang"];
unset($_SESSION['keranjang'][$Kode_Barang]);

echo "<script> alert('Barang di Hapus dari Keranjang Belanja'); </script>";
echo "<script> location='keranjang.php'; </script>";

?>