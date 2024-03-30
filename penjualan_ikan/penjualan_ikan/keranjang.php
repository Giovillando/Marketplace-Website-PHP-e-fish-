<?php
session_start();
$koneksi=new mysqli("localhost" , "root" , "" , "smart_farming"); 
if (empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang']))
{
	echo "<script>alert('Produk kosong, silakan belanja terlebih dahulu');</script>";
	echo "<script>location='menu.php';</script>";
}
?>
<!DOCTYPE html>
<html lang ="en">
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
    <!-- Start Top Nav -->
    <?php include 'header.php' ?>

	<section class="konten">
		<div class="container">
        <div class="row text-center pt-5">
                <h1 class="h1"><strong>Keranjang Belanja</h1></strong>
			<div class="table-wrap">
						<table class="table">
						<thead class="thead-primary">
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center">Nama Penjual</th>
						<th class="text-center">Nama Barang</th>
						<th class="text-center">Harga Barang</th>
						<th class="text-center">Berat Barang</th>
						<th class="text-center">QTY</th>
						<th class="text-center">Ubah QTY</th>								
						<th class="text-center">Total Harga</th>
						<th class="text-center">Edit</th>				
					</tr>
				</thead>
				<tbody class="tbody-primary">
					<?php $nomor=1;?>
				<?php foreach ($_SESSION["keranjang"] as $Kode_Barang=>$QTY): ?>
					<?php
				$ambildata=$koneksi->query("SELECT * FROM barang JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual WHERE Kode_Barang='$Kode_Barang'");
					$pecah=$ambildata->fetch_assoc();
             	 $Berat_Barang=$pecah["Berat_Barang"]*$QTY;
				$Total_Harga=$pecah["Harga_Barang"]*$QTY;
					?>
					<tr>
						<td><?php echo $nomor;?></td>
						<td><?php echo $pecah['Nama_Penjual'];?></td>
						<td><?php echo $pecah['Nama_Barang']; ?></td>
					<td>Rp<?php echo number_format($pecah['Harga_Barang']); ?></td>
					<td><?php echo $pecah['Berat_Barang']; ?> kg</td>
						<td><?php echo $QTY; ?></td>
						<td>
							<form method="post">
								<div class="form-group">
									<div class="input-group">
										<input type="number" min="1" class="form-control" name="QTY" max="<?php echo $pecah["Stok_Barang"]?>">
										<div class="input-group-btn">
											<button class="btn btn-primary" name="beli">Tambah</button>
										</div>
									</div>
								</div>
							</form>
						</td>
						<td>Rp<?php echo number_format($Total_Harga); ?></td>
					<td>
						<a href="hapus_keranjang.php?Kode_Barang=<?php echo $Kode_Barang; ?>" 
                    class="btn-danger btn"> Hapus </a>
					</td>
					</tr>
					<?php $nomor++;?>
					<?php endforeach ?>
				</tbody>
			</table>
			<a href="menu.php?Kode_Barang=<?php echo $Kode_Barang; ?>" class="btn btn-default">Lanjutkan Belanja</a>
			<a href="checkout.php?Kode_Barang=<?php echo $Kode_Barang; ?>" class="btn btn-succes"><button class="btn btn-success" name="checkout">Checkout</button></a>
		</div>
	</section>
	<?php 
			
			if (isset($_POST["beli"]))
			{
				$QTY =$_POST["QTY"];
				//masukkan dikeranjang
				$_SESSION["keranjang"][$Kode_Barang]=$QTY;
				
				echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
				echo "<script>location='keranjang.php';</script>";
			}
	?>
	<br>

	<?php include 'footer.php' ?>
</body>
</html>