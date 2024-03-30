<?php
session_start ();
include 'koneksi.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" href="../assets/img/Logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SFVM- Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

	<section class="container py-1">
	    <div class="row text-center pt-5">
            <div class="col-lg-8 m-auto">
                <center><h1 class="h1"><strong>Faktur Pembelian</h1></strong></center>
				<br> <br>
            </div>
        </div>
	<table>
		 <?php 
			$ambil1=$koneksi->query("SELECT * FROM faktur_beli join
				pembeli on faktur_beli.ID_Pembeli=pembeli.ID_Pembeli join
				status_pembayaran on faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran
				WHERE faktur_beli.ID_Faktur_Beli='$_GET[id]'"); 
			while($detail=$ambil1->fetch_assoc());
	
		?>
	<ul style="list-style: none;">
		<li class="span4">
			<div class="col-md-3">
				<h4> Data Pembelian </h4>
				ID Pembelian : <?php echo $detail['ID_Faktur_Beli']; ?> <br>
				<p>
					Tanggal : <?php echo $detail['Tanggal_Faktur_Beli']; ?> <br>
					Total Pembayaran : Rp <?php echo number_format($detail['Total_Bayar']); ?> <br>
				</p>
				<h4> Pembeli </h4>
				<?php echo $detail['Nama_Pembeli']; ?> <br>
				<p>
					<?php echo $detail['No_Handphone_Pembeli']; ?> <br>
				</p>
			</div></li>
		</ul>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th> <center> No</th></center>
					<th><center> ID Faktur Beli </th></center>
					<th><center> Nama Barang </th></center>
					<th> <center>Harga Satuan</th></center>
					<th><center> Jumlah </th></center>
					<th><center> Sub Total</th></center>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $ambil=$koneksi->query("SELECT * FROM transaksi join barang on transaksi.Kode_Barang=barang.Kode_Barang
						join faktur_rinci on transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[id]'"); ?>	
				<?php while($pecah=$ambil->fetch_assoc()){ ?>
					<tr>
						<td> <?php echo $nomor;?> </td>
						<td> <?php echo $pecah['ID_Faktur_Rinci']?> </td>
						<td> <?php echo $pecah['Nama_Barang']?> </td>
						<td> Rp <?php echo number_format($pecah['Harga_Barang'])?> </td>
						<td> <?php echo $pecah['QTY_Barang']?> </td>
						<td><center> Rp <?php echo number_format($pecah['Harga_Barang']*$pecah['QTY_Barang']);?> </td> </center>
					</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
			<tfoot>
					<tr>
						<th colspan="5"><center> Total Bayar </th></center>
						<th><center> Rp <?php echo number_format($pecah['Total_Rinci']) ?> </th></center>
					</tr>
			</tfoot>
		</table>
					<center><a href="index.php?halaman=faktur_beli" class="btn-primary btn"> Kembali </a></center></button>
		</div>
	</section>	
