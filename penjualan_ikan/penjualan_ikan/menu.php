<?php
session_start ();
include 'koneksi.php';

$jenis_barang = "";
$penjual = "";
$strq = "";
$strw = "";
$jmlget = 0;

if(isset($_GET['jenis_barang'])){
      $jenis_barang = $_GET['jenis_barang'];
	  $strc[] = "kelompok_barang.Kode_Jenis_Barang= '$jenis_barang'";
      $jmlget++;
    }
    if(isset($_GET['kelompok_barang'])){
      $jenis_barang = $_GET['kelompok_barang'];
    $strc[] = "barang.Kode_Kelompok_Barang= '$jenis_barang'";
      $jmlget++;
    }
    if(isset($_GET[''])){
      $penjual = $_GET['penjual'];
      $strc[] = "barang.ID_Penjual = '$penjual'";
      $jmlget++;
    }
    if(isset($_GET[''])){
      $penjual = $_GET['kota'];
      $strc[] = "penjual.ID_Kota = '$penjual'";
      $jmlget++;
    }


    // susun string
    $i = 1;
    if($jmlget > 0){
      $strw = "WHERE ";
      foreach($strc as $strs){
        $strw .= $strs;
        if($i < $jmlget){
          $strw .= " AND ";
          $i++;
        }
      }
    }

	

    $query = "SELECT * FROM barang inner join kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
			 inner join penjual on barang.ID_Penjual=penjual.ID_Penjual inner join kota on penjual.ID_Kota=kota.ID_Kota $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);


	$query_jen = "SELECT * FROM jenis_barang";
	$result_jen = mysqli_query($koneksi,$query_jen);
	
  $query_kel = "SELECT * FROM kelompok_barang";
  $result_kel = mysqli_query($koneksi,$query_kel);

    $query_penjual = "SELECT * FROM penjual";
    $result_penjual = mysqli_query($koneksi,$query_penjual);

    $query_kota = "SELECT * FROM kota";
    $result_kota = mysqli_query($koneksi,$query_kota);

    $title = "E-FISH";
	
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="admin/css/bootstrap.css">	
</head>
<body>
<body background="2.jpg">
<nav class="navbar navbar-default">
	<div class="container">
	<ul class="nav navbar-nav">
		<li><a href="index.php">Home</a></li>
		<li><a href="keranjang.php">Keranjang</a></li>
		
		<?php if(isset($_SESSION["pembeli"])): ?>
<li><a href="riwayat.php">Riwayat Belanja</a></li>
				<li><a href="logout.php">Logout</a></li>
				<?php else: ?>
		<li><a href="registrasi.php">Register</a></li>
		<li><a href="login.php">Login</a></li>
		<?php endif ?>
		<li><a href="checkout.php">Checkout</a></li>
	</ul>
	<form action="pencarian.php" method="get" class="navbar-form navbar-right">
		<input type="text" class="form-control" name="keyword">
		<button class="btn btn-primary">Search</button>
	</form>
	
	</div>
</nav>


<section class="konten">
	<div class="container">
		


	<div class="row">

         <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
              <a class="nav-link nav-icon search-bar-toggle " href="">
                <i class="bi bi-search"></i>
            </a>
        </li></center><!-- End Search Icon-->
        <br/><br/>
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2><strong><font face="times new roman" color="blue">Daftar Ikan yang Tersedia</font></strong></h2>
                </div>
            </div> 
        </div> 

        <center><form action="menu.php" method="GET">
          <div class="row">
            <div class="col-sm-">
              <div class="col-md-12 col-lg-2 products-number-sort">
                <div class="products-sort-by mt-2 mt-lg-0">
                   <select name="jenis_barang" id="Kode_Jenis_Barang" class="form-control">
                      <option selected disabled>-- Jenis -- </option>
                      <?php while($perproduk = mysqli_fetch_assoc($result_jen)) { ?>
                        <option value="<?php echo $perproduk['Kode_Jenis_Barang']; ?>"> <?php echo $perproduk['Nama_Jenis_Barang']; ?></option>
                    <?php } ?>
                </select>
            </div></div>

            <div class="col-md-12 col-lg-3 products-number-sort">
                <div class="products-sort-by mt-2 mt-lg-0">
                    <select name="kelompok_barang" id="Kode_Kelompok_Barang" class="form-control">
                      <option selected disabled>-- Kelompok -- </option>
                      <?php while($perproduk = mysqli_fetch_assoc($result_kel)) { ?>
                        <option value="<?php echo $perproduk['Kode_Kelompok_Barang']; ?>"> <?php echo $perproduk['Nama_Kelompok_Barang']; ?></option>
                    <?php } ?>
                </select>
            </div></div>

            <div class="col-md-12 col-lg-3 products-number-sort">
                <div class="products-sort-by mt-2 mt-lg-0">
                   <select name="kota" class="form-control">
                      <option selected disabled>-- Kota -- </option>
                      <?php while($perproduk = mysqli_fetch_assoc($result_kota)) { ?>
                        <option value="<?php echo $perproduk['ID_Kota']; ?>"> <?php echo $perproduk['Nama_Kota']; ?></option>
                    <?php } ?>
                </select>
            </div></div>


            <div clas="row">
                <div class="col-sm">
                  <input type="submit" class="btn btn-primary mb-" name="submit" value="Cari">
              </div>
          </div>

          <?php if($resnum == 0){ ?>
              <div clas="row">
                <div class="col-sm">
                  <p> Maaf, Buku Tidak Tersedia</p>
              </div>
          </div>
      <?php } ?>
  </form>
    </div>
		
	
<!--konten-->
<section class="konten">
	<div class="container">
		<h1> Produk Terbaru</h1>
			<div class="row">
			<?php while($row = mysqli_fetch_assoc($result)) { ?>
			<?php if($row["Stok_Barang"]>'0'): ?>
			<div class="col-md-3">
			<div class="thumbnail">
				<img src="admin/img/<?php echo $row['Foto_Barang']; ?>" alt="">
				<div class="caption">
					<h3> <?php echo $row['Nama_Barang']; ?></h3>
					<h4> <?php echo $row['Nama_Penjual']; ?></h4>
					<h4>Stok : <?php echo $row['Stok_Barang']; ?></h4>
					<h5>Rp. <?php echo number_format($row['Harga_Barang']); ?></h5>
						<a href="beli.php?id=<?php echo $row['Kode_Barang']; ?>"
						class="btn btn-primary">Beli</a>
						<a href="detail.php?id=<?php echo $row['Kode_Barang']; ?>" class="btn btn-success">Detail</a>
				</div>
			</div>
			</div>
			<?php endif ?>
			<?php } ?>
			</div>
	</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#Kode_Jenis_Barang').change(function() {
                var Kode_Jenis_Barang = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'cobabarang.php',
                    data: 'Kode_Jenis_Barang='+Kode_Jenis_Barang,
                    success: function(response) {
                        $('#Kode_Kelompok_Barang').html (response);
                    }
                });
            })
        });
    </script>
  
</body>
</html>
</body>
</body>
</html>