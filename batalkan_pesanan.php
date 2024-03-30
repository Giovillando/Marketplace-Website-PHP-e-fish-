<?php
session_start();
require_once("koneksi.php");
$kode_faktur = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "SELECT * FROM faktur_beli JOIN pembeli ON faktur_beli.ID_Pembeli=pembeli.ID_Pembeli JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran JOIN diskon on faktur_beli.Kode_Diskon=diskon.Kode_Diskon";

$hasil=mysqli_query($koneksi, $sql);
if (mysqli_num_rows($hasil) > 0) 
{
	while ($data=mysqli_fetch_array($hasil))
	{
		$sql=$koneksi->query("UPDATE faktur_beli SET ID_Status_Pembayaran='STP105' WHERE ID_Faktur_Beli='$kode_faktur'");
		$sql=$koneksi->query("UPDATE faktur_rinci SET ID_Status_Pengiriman='SPENG104', ID_Status_Transfer_Penjual='SSTP103' WHERE faktur_rinci.ID_Faktur_Beli='$kode_faktur'");
		echo "<script>alert('Batalkan Pesanan');location='riwayatpembayaran.php';</script>";
	}
}
else
{
	echo "<script>alert('Proses gagal');  location='riwayatpembayaran.php';</script>";
}
?>