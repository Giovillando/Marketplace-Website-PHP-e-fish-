<?php
session_start();
//mendapatkan id produk
$Kode_Barang = $_GET['Kode_Barang'];

//jika sudah ada dikrj, produk++
if(isset($_SESSION['keranjang'][$Kode_Barang]))
{
	$_SESSION['keranjang'][$Kode_Barang]+=1;
}
else
{
	$_SESSION['keranjang'][$Kode_Barang]=1;
}

//keranjang
echo "<script>alert('YEAY. Produk ditambahkan ke keranjang belanja.');</script>";
echo "<script>location='keranjang.php';</script>";
?>