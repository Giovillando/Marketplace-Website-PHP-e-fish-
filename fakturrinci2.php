<?php

session_start ();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>E-FISH - RIWAYAT BELANJA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/foto.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/foto.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  </head>
  </head>

<body>
<?php include 'header.php'; ?>
	<hr class="sidebar-divider">
<section class="konten">
	<div class="container">
	
<h2><center>Detail Nota </center></h2>
<br>
<?php
$ambil=$koneksi->query("SELECT * FROM faktur_rinci JOIN pedagang on faktur_rinci.kode_pedagang=pedagang.kode_pedagang
WHERE faktur_rinci.kode_faktur_rinci='$_GET[id]' ");
$detail=$ambil->fetch_assoc();
?>
<!--/. <pre><?php print_r($detail) ?></pre> -->

<!-- if pembeli != yg login THEN dilarikan ke riwayat.php -->
<!-- pembeli harus yg login -->
<?php 
	//mendapatkan id pelanggan yg beli
	//$id_beli = $detail["kode_pembeli"];

	//mendapatkan id yg login
	//$id_login = $_SESSION["pembeli"]["kode_pembeli"];

	//if ($id_beli!==$id_login) 
	//{
	//	echo "<script>alert('Maaf, anda tidak dapat mengakses data orang lain');</script>";
	//	echo "<script>location='riwayat.php';</script>";
	//	exit();
	//}
?>

<p>

<?php
$ambilll=$koneksi->query("SELECT * FROM faktur_rinci JOIN daftar_pengiriman ON faktur_rinci.Kode_Daftar_Pengiriman=pengiriman.Kode_Daftar_Pengiriman 
JOIN sistem_pengiriman ON daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman
JOIN jasa_kirim ON sistem_pengiriman.ID_Jasa_Kirim=jasa_kirim.ID_Jasa_Kirim
JOIN status_kirim ON faktur_rinci.ID_Status_Kirim=status_kirim.ID_Status_Kirim
JOIN faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
JOIN penjual ON faktur_rinci.ID_Penjual=penjual.ID_Penjual 
JOIN kota ON penjual.kota=kota.ID_Kota
WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[ID_Faktur_Rinci]' ");
$detailll=$ambilll->fetch_assoc();
?>

<div class="row">
	<div class="col-md-4">
	<h3><strong>Penjualan</strong></h3>
<h4>  
Kode Faktur Rinci	: <?php echo $detailll['ID_Faktur_Rinci']; ?> <br>
Tanggal    			: <?php echo date("d F Y",strtotime($detailll['Tanggal'])); ?> <br>
Total Harga 		: Rp. <?php echo number_format($detailll['Total_Rinci']); ?><br>
Nama Penjual    	: <?php echo $detailll['Nama_Penjual']; ?> <br>
kota				: <?php echo $detailll['Nama_Kota']; ?> <br>
</div>
	<div class="col-md-4">
	<h3><strong>Pengiriman</strong></h3>
	<h4> 
	Jasa 				: <?php echo $detailll['Nama_Jasa_Kirim'];?> - <?php echo $detailll['Nama_Sistem_Pengiriman'];?><br>	
<?php $kode_pembeli=$_SESSION["login"]['ID_Pembeli'];
$ambil=$koneksi->query("SELECT * FROM pembeli INNER JOIN kota ON pembeli.ID_Kota_Pembeli=kota.ID_Kota WHERE ID_Pembeli='$kode_pembeli'");
$pecah=$ambil->fetch_assoc();
?>

	Tujuan 				: <?php echo $pecah['Nama_Kota'];?> <br>
	Ongkir 				: Rp. <?php echo number_format ($detailll["Tarif_Pengiriman"]); ?> <br>
	</div>
</P>
</br>
</br>
<table class="table">
		<thead class="thead-primary">
		<tr>
			<th> No</th>
			<th> Penjual </th>
			<th> Kode Barang </th>
			<th> Barang </th>
			<th> Harga </th>
			<th> QTY </th>
			<th> Sub Harga</th> 
		</tr>
		</thead>
	<tbody>
	<?php $nomor=1;?>
	<?php $totalbelanja=0;?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi JOIN barang ON transaksi.Kode_Barang=barang.Kode_Barang join faktur_rinci on transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci join penjual on barang.ID_Penjual=penjual.ID_Penjual WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[ID_Faktur_Rinci]' "); ?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $pecah['Nama_Penjual']; ?></td>
			<td><?php echo $pecah['Kode_Barang']; ?></td>
			<td><?php echo $pecah['Nama_Barang']; ?></td>
			<td><?php echo number_format ($pecah['Harga_Barang']); ?></td>
			<td><?php echo $pecah['QTY_Barang']; ?></td>
			<td><?php echo number_format ($pecah['Harga_Barang']*$pecah['QTY_Barang']);?></td>	
		</tr>
		<?php $nomor++; ?>
		<?php $totalbelanja+=($pecah['Harga_Barang']*$pecah['QTY_Barang']); ?>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="6"> Total Belanja </th>
			<th>Rp. <?php echo number_format ($totalbelanja) ?>
		</tr>
		<tr>
			<th colspan="6"> Biaya Pengiriman</th>
			<th>Rp. <?php echo number_format ($detailll ["Tarif_Pengiriman"]); ?>
		</tr>
		<tr>
			<th colspan="6"> Total Bayar</th>
			<th>Rp. <?php echo number_format ($detailll ["Tarif_Pengiriman"] + $totalbelanja ); ?>
		</tr>
</table>
	</div>
</section>
</body>
</html>