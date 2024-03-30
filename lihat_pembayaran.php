<?php
session_start();
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="smart_farming";

$koneksi=mysqli_connect($db_host,$db_user, $db_pass,$db_name);

if($koneksi&&$db_name)
{}
else 
{echo "Gagal Koneksi";}


if(!isset($_SESSION['login']) OR empty($_SESSION['login']))
{
	
}

?>

<?php
$id_customer = $_SESSION["login"]["ID_Pembeli"];
$ID_Faktur_Beli=$_GET['id']; 
$ambil = $koneksi->query("SELECT * FROM faktur_beli JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran = jasa_pembayaran.ID_Jasa_Pembayaran
											JOIN jenis_pembayaran ON jasa_pembayaran.Kode_Jenis_Pembayaran=jenis_pembayaran.Kode_Jenis_Pembayaran
											JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran = status_pembayaran.ID_Status_Pembayaran 
											WHERE ID_Pembeli='$id_customer'");
					$ambil1 = $koneksi->query("SELECT * FROM faktur_rinci  JOIN status_pengiriman ON faktur_rinci.ID_Status_Pengiriman = status_pengiriman.ID_Status_Pengiriman
		JOIN daftar_pengiriman ON faktur_rinci.Kode_Daftar_Pengiriman = daftar_pengiriman.Kode_Daftar_Pengiriman  JOIN status_transfer_penjual ON faktur_rinci.ID_Status_Transfer_Penjual = status_transfer_penjual.ID_Status_Transfer_Penjual ");
$pecah=$ambil->fetch_assoc() AND $pecah1=$ambil1->fetch_assoc();

if(empty($pecah))
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
<?php include 'header.php'; ?>
<br>

	<section class="container py-1">
        <div class="row text-center pt-6">
            <div class="col-lg-6 m-auto">
                <h1 class="h1 text-success"><strong> Pembayaran Anda </h1></strong>
				<br><br>
            </div>
		</div>
		<div class="row">
		<div class="col-md-6">
		<br><br>
			<table class="table">
				<tr>
					<th> Nama </th>
					<td><?php echo $_SESSION["login"]["Nama_Pembeli"] ?></td>
				</tr>
				<tr>
					<th> Jasa Pembayaran </th>
					<td><?php echo $pecah['Nama_Jasa_Pembayaran'] ?> </td>
				</tr>
				<tr>
					<th> Tanggal </th>
					<td> <?php echo $pecah['Tanggal_Faktur_Beli'] ?></td>
				</tr>
				<tr>
					<th> Jumlah Pembayaran </th>
					<td> Rp <?php echo number_format($pecah['Total_Bayar']) ?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-6">
		<img src="Bukti_Pembayaran/<?php echo $pecah['Bukti_Pembayaran']; ?>" width="500" class="img-responsif">
		</div>
		</div>
		
		<a href="riwayat.php" class="btn btn-success "><i class="fa fa-refresh"></i> Selanjutnya</a >
		
	</section>
	<br><br><br>


	<!-- Start Footer -->
    <?php include'footer.php'; ?>
</body>