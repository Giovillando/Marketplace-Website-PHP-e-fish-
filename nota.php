<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-FISH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">

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
    <?php include "header.php" ?>		
		
	<section class="container py-1">
	    <div class="row text-center pt-5">
            <div class="col-lg-8 m-auto">
                <h1 class="h1"><strong>Faktur Pembelian</h1></strong>
				<br> <br>
            </div>
        </div>

		 <?php 
			$ambil=$koneksi->query("SELECT * FROM nota join
				pembeli on nota.id_pembeli=pembeli.id_pembeli join
				kirim on nota.id_pengiriman=kirim.id_pengiriman 
				WHERE nota.id_nota='$_GET[id]'"); 
			$detail=$ambil->fetch_assoc();
	
		?>

		<div class="row">
			<div class="col-md-4">
				<h4> Data Pembelian </h4>
				ID Pembelian : <?php echo $detail['id_nota']; ?> <br>
				<p>
					Tanggal : <?php echo $detail['tanggal']; ?> <br>
					Total Pembayaran : Rp <?php echo number_format($detail['jumlah_bayar']); ?> <br>
				</p>
			</div>
			<div class="col-md-4">
				<h4> Pembeli </h4>
				<?php echo $detail['nama_pembeli']; ?> <br>
				<p>
					<?php echo $detail['no_telp']; ?> <br>
				</p>
			</div>
			<div class="col-md-4">
				<h4> Pengiriman </h4>
				<?php echo $detail['alamat']; ?>
				<p>
					Biaya Kirim : Rp<?php echo number_format($detail['biaya_kirim_total']); ?> <br>
				</p>
			</div>
		</div>	
				

		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th> <center> No</th></center>
					<th><center> Nama Menu </th></center>
					<th> <center>Harga Satuan</th></center>
					<th><center> Jumlah </th></center>
					<th><center> Sub Total</th></center>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $ambil=$koneksi->query("SELECT * FROM transaksi join
						daftar_menu on transaksi.id_menu=daftar_menu.id_menu
						WHERE transaksi.id_nota='$_GET[id]'"); ?>	
				<?php while($pecah=$ambil->fetch_assoc()){ ?>
					<tr>
						<td> <?php echo $nomor;?> </td>
						<td> <?php echo $pecah['nama_menu']?> </td>
						<td> Rp <?php echo number_format($pecah['harga'])?> </td>
						<td> <?php echo $pecah['qty']?> </td>
						<td><center> Rp <?php echo number_format($pecah['harga']*$pecah['qty']);?> </td> </center>
					</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
			<tfoot>
				<?php 
					$ambill=$koneksi->query("SELECT * FROM nota join
						kirim on nota.id_pengiriman=kirim.id_pengiriman
						WHERE nota.id_nota='$_GET[id]'"); 	
					$pecahh=$ambill->fetch_assoc()
				?>
					<tr>
						<th colspan="4"> Biaya Kirim  </th>
						<th><center> Rp <?php echo number_format($pecahh['biaya_kirim_total']) ?> </th></center>
					</tr>
					<tr>
						<th colspan="4"><center> Total Bayar </th></center>
						<th><center> Rp <?php echo number_format($pecahh['jumlah_bayar']) ?> </th></center>
					</tr>
			</tfoot>
		</table>
		
	<div class="row">
		<div class="col-md-7">
			<div class="alert alert-info">
				<p>
					Silahkan melakukan pembayaran Rp <?php echo number_format($detail['jumlah_bayar']); ?> ke<br> 
						<?php 
							$ambill=$koneksi->query("SELECT * FROM nota join
							jenis_pembayaran on nota.id_jenis_pembayaran=jenis_pembayaran.id_jenis_pembayaran
							WHERE nota.id_nota='$_GET[id]'"); 	
							$pecahh=$ambill->fetch_assoc()
						?>
						<strong> <?php echo $pecahh['jenis_pembayaran'];  ?> 
								 <?php echo $pecahh['nomor_pembayaran'];  ?> 
						</strong>
						a.n. <?php echo $pecahh['an']; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	<br>
		<center><a href ="riwayat.php" class="btn-primary btn"> Selanjutnya </a></center>
	</section>		
		
	<!-- Start Footer -->
    <?php include "footer.php" ?>
	
</body>