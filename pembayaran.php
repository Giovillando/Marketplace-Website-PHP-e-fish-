<?php
	session_start();
	include 'koneksi.php';

	if(!isset($_SESSION["login"]))
	{
		
	}

	
?>

<?php
$idpem = $_GET["id"];
$ambil=$koneksi->query("SELECT * FROM faktur_beli JOIN pembeli on faktur_beli.ID_Pembeli=pembeli.ID_Pembeli
 JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran join faktur_rinci on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli  WHERE faktur_beli.ID_Faktur_Beli='$_GET[id]' ");
$detail=$ambil->fetch_assoc();
?>
<!--/. <pre><?php print_r($detail) ?></pre> -->

<!-- if pembeli != yg login THEN dilarikan ke riwayat.php -->
<!-- pembeli harus yg login -->
<?php 
	//mendapatkan id pelanggan yg beli
	$id_beli = $detail["ID_Pembeli"];

	//mendapatkan id yg login
	$id_login = $_SESSION["login"]["ID_Pembeli"];

	if ($id_beli!==$id_login) 
	{
		
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>SMART FARMING VILLAGE MARKET</title>
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
<!-- Start Footer -->
<?php include 'header.php'; ?>
	
	
	<section class="container py-1">
        <div class="row text-center pt-5">
            <div class="col-lg-6 m-auto">
                <h1 class="h1 text-success"><strong>Konfirmasi Pembayaran</h1></strong>
				<h5 class="h5 text-success">Silahkan Kirim bukti pembayaran anda disini</h5>
            </div>
		</div>
			
		<div class="alert alert-info">Total tagihan Anda :<strong> Rp. <?php echo number_format($detail["Total_Rinci"]) ?></strong>
		<?php
		$ambilll=$koneksi->query("SELECT * FROM faktur_beli JOIN jasa_pembayaran on faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran WHERE faktur_beli.ID_Faktur_Beli='$_GET[id]' ");
		$detailll=$ambilll->fetch_assoc();
		?>
			<?php if (empty($detail["info"])): ?>
			<div class="row">
				<div class="col-md-7">
						<p>Silahkan melakukan pembayaran Ke </br>
						<strong><?php echo $detailll['Nama_Jasa_Pembayaran']; ?> : <?php echo $detailll['No_Pembayaran']; ?> </strong></p>
				</div>
			</div>
	<?php elseif (isset($detail["info"])): ?>
			<div class="row">
				<div class="col-md-7">
					<div class="alert alert-info">
						<?php echo $detail['info']; ?>
					</div>
				</div>
			</div>
	<?php endif ?>
		
		</div>
		
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Pembeli</label>
				<input type="text" name="nama" class="form-control" readonly value ="<?php echo $_SESSION["login"]["Nama_Pembeli"] ?>">
			</div>
			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" name="Bukti_Pembayaran" class="form-control" required>
			</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
		

	</div>

	<?php 
		if(isset($_POST["kirim"]))
		{
			$namabukti=$_FILES["Bukti_Pembayaran"]["name"];
			$lokasibukti=$_FILES["Bukti_Pembayaran"]["tmp_name"];
			$namafiks = date("YmdHis").$namabukti;
			move_uploaded_file($lokasibukti, "Bukti_Pembayaran/$namafiks");
			$Tanggal_Faktur_Beli = date("Y-m-d");

			$koneksi->query("UPDATE faktur_beli SET Bukti_Pembayaran='$namafiks',Tanggal_Faktur_Beli='$Tanggal_Faktur_Beli' WHERE ID_Faktur_Beli='$idpem'");

			$koneksi->query("UPDATE faktur_beli SET ID_Status_Pembayaran='StatBayar03' WHERE ID_Faktur_Beli='$idpem'");
		
			$koneksi->query("UPDATE faktur_rinci SET ID_Status_Pengiriman='SPENG8' WHERE faktur_rinci.ID_Faktur_Beli='$idpem'");
			echo "<script>alert('Terimakasih sudah melakukan pembayaran ');</script>";
			echo "<script>location='riwayatpembayaran.php';</script>";
		}
	?>
					
        </div>	
	
	</section>
	
	
	<!-- Start Footer -->
    <?php include'footer.php'; ?>
</body>