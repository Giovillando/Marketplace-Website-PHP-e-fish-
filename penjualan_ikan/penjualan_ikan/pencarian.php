<?php
include 'koneksi.php';
?>

<?php

if(isset($_POST['cari']))
{
	$_SESSION['session_pencarian']=$_POST["keyword"];
	$keyword=$_SESSION['session_pencarian'];
}
else
{
	$keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM daftar_menu WHERE nama_menu LIKE '%$keyword%'")
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-FISH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

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
        <div class="row text-center pt-5">
            <div class="col-lg-8 m-auto">
                <h1 class="h1"><strong>Hasil Pencarian</h1></strong>
            </div>
        </div>
		
		<?php if (empty($semuadata)): ?>
			<div class="alert alert-danger"> Pencarian Tidak Ditemukan </div>
		<?php endif ?>
		
        <div class="row">
			<?php $ambil=$koneksi->query("SELECT * FROM daftar_menu WHERE nama_menu LIKE '%$keyword%'"); ?>
			<?php while ($perproduk=$ambil->fetch_assoc()){ ?>
			<div class="col-10 col-md-3 p-5 mt-1">
                <a href="#"><img src="foto_produk/<?php echo $perproduk['foto']; ?>" 
				class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3"><?php echo$perproduk['nama_menu'];?> </h2>
				<h2 class="h6 text-center mt-3 mb-3">Rp<?php echo number_format($perproduk['harga']);?></h2>
                
			<p class="text-center"><a href="beli.php?id=<?php echo $perproduk['id_menu'] ?>" class="btn btn-success">Beli</a></p>
            </div>
			<?php }; ?>
        </div>
    </section>
	
<!-- Start Footer -->
    <?php include 'footer.php' ?>
	
</body>