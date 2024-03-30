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

?>

<?php
$Kode_Barang= $_GET["Kode_Barang"];
$ambil=$koneksi->query("SELECT * FROM barang join jenis_barang on barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
             join penjual on barang.ID_Penjual=penjual.ID_Penjual
		WHERE Kode_Barang='$_GET[Kode_Barang]'");
$detail=$ambil->fetch_assoc();

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
    <?php include 'header.php' ?>
	
	
	
	<section class="container py-1">
		<div class="col-lg-8 m-auto">
			<div class="row text-center pt-5">
                <h1 class="h1"><strong>Detail Barang</h1></strong>
				<br> <br> <br>
			</div>
		</div>
	</section>
	
	<section class="container py-1">
		<div class="row">
			<div class="col-md-5">
				<img src="admin/Foto_Produk/<?php echo $detail['Foto_Barang']; ?>" width="450" class="img-responsive" >
			</div>
			<div class="col-md-6">
				<br> <br>
				<h3> <?php echo $detail["Nama_Barang"] ?> </h3>
				<h5> Harga :  Rp <?php echo number_format($detail["Harga_Barang"]) ?> </h5>
				<h5> Deskripsi Barang : <?php echo $detail["Deskripsi_Barang"] ?> </h5>
				<h5> Jenis Barang : <?php echo $detail["Nama_Jenis_Barang"] ?> </h5>
				<h5> Nama Penjual : <?php echo $detail["Nama_Penjual"] ?> </h5>
				<h5> Kode Barang : <?php echo $detail["Kode_Barang"] ?> </h5>
				<h5> Berat : <?php echo $detail["Berat_Barang"] ?> gr</h5>
				<h5> Stok : <?php echo $detail["Stok_Barang"] ?> </h5>
				<br>
				
				<form method="post">
					<div class="form-group">
						<label> <h5> Masukkan Jumlah Pembelian </label></h5>
							<div class="input-group">
								<input type="number" min="1" class="form-control" name="QTY_Barang" max="<?php echo $detail["Stok_Barang"]?>">
									<div class="input-group-btn">
									<a href="beli.php?Kode_Barang=<?php echo $detail['Kode_Barang']; ?>"class="btn btn-primary">Beli</a>
									</div>
							</div>
					</div>
				</form>
			
				
				<?php
				if(isset($_POST["beli"]))
				{
					$QTY=$_POST["QTY"];
					$_SESSION["keranjang"]["$Kode_Barang"]=$QTY;
					
					echo "<script>alert('Produk Telah Masuk ke Keranjang Belanja');</script>";
					echo "<script>location='keranjang.php';</script>";
				}
	
				?>
			</div>
        </div>
		
		
	<br> <br> <br>
	</section>
	
	
	<?php include 'footer.php' ?>
</body>