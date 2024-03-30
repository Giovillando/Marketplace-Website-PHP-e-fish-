<?php
	session_start ();
	include 'koneksi.php';

	if(!isset($_SESSION["login"]))
	{
	
	}

	//mendapatkan kode nota dari url
	$idpem = $_GET["id"];
$ambilll=$koneksi->query("SELECT * FROM faktur_beli JOIN jasa_pembayaran on faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran WHERE faktur_beli.ID_Faktur_Beli='$_GET[id]' ");
$detailll=$ambilll->fetch_assoc();
?>
<?php
$ambilllll= $koneksi->query("SELECT * FROM faktur_beli JOIN pembeli on faktur_beli.ID_Pembeli=pembeli.ID_Pembeli
               WHERE faktur_beli.ID_Faktur_Beli='$_GET[id]'");
$detailllll = $ambilllll->fetch_assoc();
?>
<?php 
$ambill= $koneksi->query("SELECT * FROM faktur_rinci 
          JOIN daftar_pengiriman ON faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman 
          JOIN kota ON daftar_pengiriman.ID_Kota_Tujuan=kota.ID_Kota
          JOIN sistem_pengiriman ON daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman
          JOIN jasa_kirim ON sistem_pengiriman.ID_Jasa_Kirim=jasa_kirim.ID_Jasa_Kirim
          JOIN kategori ON daftar_pengiriman.ID_Kategori=kategori.ID_Kategori
          JOIN penjual ON faktur_rinci.ID_Penjual=penjual.ID_Penjual
          JOIN faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
            WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[ID_Faktur_Rinci]'");
          
$detaill = $ambill->fetch_assoc();
?>
<?php

	//medapatkan id pembeli
	$id_cus = $detailllll["ID_Pembeli"];
	//mendapatka id yg login
	$id_log = $_SESSION["login"]["ID_Pembeli"];

	if ($id_log !== $id_cus) 
	{
		
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>E-FISH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/Logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/Logo.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
<?php include 'header.php'; ?><br>
		<div class="container">
		<center><h3 class=" text-success"> Konfirmasi Barang Telah Diterima</h3></center>
		<div class="row">
			<div class="col-md-6">
				<table class="table">
					<tr>
						<th>ID FAKTUR RINCI</th>
						<td><?php echo $detaill["ID_Faktur_Rinci"]; ?></td>
					</tr>
					<tr>
						<th>Nama Pembeli</th>
						<td><?php echo $detailllll["Nama_Pembeli"]; ?></td>
					</tr>
					<tr>
						<th>Tanggal</th>
						<td><?php echo  date("d F Y",strtotime($detailllll["Tanggal_Faktur_Beli"])); ?></td>
					</tr>

				</table>
				</br>
			</div></div>
			
			<div class="col-md-6">
			<div class="alert alert-info"> <strong>Terimakasih telah berbelanja di toko kami! Silahkan konfirmasi barang pesanan anda</strong> </div>
			<a href="barangditerima.php?id=<?php echo $detailllll["ID_Faktur_Beli"]; ?> && ID_Faktur_Rinci=<?php echo $detaill["ID_Faktur_Rinci"]; ?>" class="btn btn-primary">Barang Diterima</a>
			<a href="komplain.php?id=<?php echo $detailllll["ID_Faktur_Beli"]; ?> && ID_Faktur_Rinci=<?php echo $detaill["ID_Faktur_Rinci"]; ?>" class="btn btn-danger">Barang Diterima</a>
			<a href="komplain.php?id=<?php echo $detailllll["ID_Faktur_Beli"]; ?> && ID_Faktur_Rinci=<?php echo $detaill["ID_Faktur_Rinci"]; ?>" class="btn btn-warning">Komplain</a>
			
			<br><br>
			<a href="riwayat.php?id=<?php echo $detailllll["ID_Faktur_Beli"]; ?> && ID_Faktur_Rinci=<?php echo $detaill["ID_Faktur_Rinci"]; ?>" class="btn btn-success">Kembali</a></div>
		</div>
	</div>
		
		<br>
	</div>
</body>
<?php include 'footer.php'; ?>
</html>