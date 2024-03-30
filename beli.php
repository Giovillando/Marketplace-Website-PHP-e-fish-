<?php
session_start();
//mendapatkan id produk
$ID_Barang = $_GET['id'];

//jika sudah ada dikrj, produk++
if(isset($_SESSION['keranjang'][$ID_Barang]))
{
	$_SESSION['keranjang'][$ID_Barang]+=1;
}
else
{
	$_SESSION['keranjang'][$ID_Barang]=1;
}

//keranjang
echo "<script>alert('YEAY. Produk ditambahkan ke keranjang belanja.');</script>";
echo "<script>location='keranjang.php';</script>";
?> 
