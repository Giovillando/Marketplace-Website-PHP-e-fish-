<?php
session_start();
$koneksi= new mysqli("localhost","root","","smart_farming");

$Kode_Jenis_Diskon = $_GET['Kode_Diskon'];
$ambil=$koneksi->query("SELECT * FROM diskon WHERE Kode_Diskon='$Kode_Jenis_Diskon'");
$perproduk = $ambil->fetch_assoc();
if(!$_SESSION['voucher'][$Kode_Jenis_Diskon])
{
	$_SESSION['voucher'][$Kode_Jenis_Diskon]=1;
	echo "<script>alert('Diskon telah diklaim');</script>";
	echo "<script>location='diskon.php';</script>";
}
else
{
	echo "<script>alert('Anda telah mengklaim diskon');</script>";
	echo "<script>location='diskon.php';</script>";
}
?>