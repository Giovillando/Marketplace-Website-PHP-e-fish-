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

    <title>SMART FARMING VILLAGE MARKET</title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/Logo.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
	
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
<?php include 'header.php'; ?>
	<div class="container">
		<h3>Konfirmasi Barang Telah Diterima</h3>
			<div class="col-md-6">
			<div class="alert alert-info"> <strong>Terimakasih telah berbelanja di toko kami! Dengan mengisi penilaian ini dan klik konfirmasi, itu artinya Anda
			telah mengkonfirmasi bahwa barang telah sampai.</strong> </div>
			</div>
			
			<div class="col-md-6" STYLE="BACKGROUND-IMAGE:URL(bgkonfir.jpg)">
				<form  method="post">
				<div>
					<h3>Silahkan Beri Rating Anda❣ </h3>
				</div>
				<div class="rateyo" id= "Bintang"
					data-rateyo-rating="4"
					data-rateyo-num-stars="5"
					data-rateyo-score="3">
				</div>

					<span class='result'>0</span>
					<input type="hidden" name="Bintang">
				<div class="col-md-12">
				<div class="form-group"><br>
					<label>Penilaian Anda</label>
					<textarea class="form-control" name="nilai" placeholder="Berikan Penilaian Anda" rows="3" required></textarea>
				</div>
				</div>
				<br>
				<button class="btn btn-primary" name="konfirmasi">Konfirmasi</button>
				<a href="riwayat.php" class="btn btn-success">Kembali</a>
				</form>
		

		<?php 
			if(isset($_POST["konfirmasi"]))
			{
				$nilai =$_POST["nilai"];
				$rating =$_POST["Bintang"];
				$koneksi->query("UPDATE faktur_rinci SET Penilaian='$nilai', Bintang='$rating' WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[ID_Faktur_Rinci]'");
				$koneksi->query("UPDATE faktur_rinci SET ID_Status_Pengiriman='SPENG4' WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[ID_Faktur_Rinci]' ");
				echo "<script>alert('Terimakasih atas penilaian anda :) ');</script>";
				echo "<script>location='riwayat.php';</script>";
			}
		?>
	</div>
	</div>
</body>
<?php include 'footer.php'; ?>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>