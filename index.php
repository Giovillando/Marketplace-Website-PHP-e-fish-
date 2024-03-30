<?php 

session_start(); 
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "smart_farming";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

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
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fab fa-instagram fa-sm fa-fw me-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="">E-FISH  |  082281992802</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <img src="udang.jpeg" width="70"><a class="navbar-brand text-primary logo h1 align-self-center" href="index.php">
               E-FISH
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="utama.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu.php">Belanja</a>
                        </li>
							<?php if(isset($_SESSION['login'])): ?>
								<li class="nav-item"> <a class="nav-link" href="logout.php">Logout </a> </li>
							<?php else: ?>
								<li class="nav-item"> <a class="nav-link"href="login.php">Login </a> </li>
							<?php endif ?>
							
						<li class="nav-item">
                            <a class="nav-link" href="keranjang.php">Keranjang</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="akun.php">Akun</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="riwayatpembayaran.php"> Daftar Riwayat Pembayaran</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="riwayat.php">Daftar Riwayat Rici</a>
                        </li>
						
						<?php if(isset($_SESSION['login'])): ?>
								<li class="nav-item"> <a class="nav-link" href="checkout.php"> Checkout </a> </li>
							<?php else: ?>
								<li class="nav-item"> <a class="nav-link"href=""> </a> </li>
							<?php endif ?>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                <form action="pencarian.php" method="get" class="form-inline">
        <input type="text" class="form-inline" name="keyword" placeholder="Search ..."> 
        <button class="btn btn-primary">Search</button>
    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-primary text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="images//tenggiri.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-primary"><b> Ikan Tenggiri</b> Belinyu</h1>
                                <p><justify>
                                    Ikan Tenggiri merupakan salah satu ikan yang paling banyak digunakan dalam proses pembuatan makanan tradisional khas belinyu, 
                                    seperti empek empek, otak otak, dan kerupuk tenggiri. Ikan ini sering digunakan karena dagingnya yang putih dan enak serta 
                                    memiliki kandungan gizi berupa vitamin A, vitamin B12, Kalsium, Fosfor, Kalium, Selenium dan Omega-3 
                               </justify> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="images/udang.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-primary"><b>Udang</b> Belinyu </h1>
                               <p><justify>
									Udang merupakan salah satu seafood yang sangat diminati oleh masyarakat indonesia khususnya di daerah belinyu, Udang juga banyak digunaka
                                    sebagai bahan utama makanan khas belinyu, yang paling terkenal ialah kerupuk udang, namun sulitnya udang laut ditemukan, membuat produksi
                                    kerupuk udang tidak lah banyak
                               </justify> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="images/cumi.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-primary"><b>Cumi-cumi</b> Belinyu </h1>
                                <p><justify>
                                    Cumi-cumi merupakan hewan lawut yang paling banyak digunakan dalam mmembuat makanan seafood yang ada di belinyu, dagingnya yang kenyal dan enak
                                    membuat banyak orang meminati cumi cumi. Bukan hanya itu, cumi cumi juga memiliki banyak kandungan gizi juga meliputi Protein, Kalsium, Natrium, 
                                    Fosfor, Kalium, dan Beta karoten 
                                </justify></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>


    <!-- End Banner Hero -->
<br><br>
<br><br>


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
                    <h2><strong><font face="times new roman" color="blue">Daftar Buku yang Tersedia</font></strong></h2>
                </div>
            </div> 
        </div> 

        <center><form action="index.php" method="GET">
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
                        <option value="<?php echo $perproduk['Kode_Kategori']; ?>"> <?php echo $perproduk['Kategori']; ?></option>
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
<br><br>

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-primary border-bottom pb-3 border-light logo">E-FISH</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Indralaya, Sumatera Selatan, Indonesia
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:082281992802">082281992802</a>
                        </li>
                        <li>
                            <i class="fab fa-instagram fa-sm fa-fw me-2"></i>
                            <a class="text-decoration-none" href="instagram.com/E-FISH">@E-FISH</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2022 E-FISH, FISH MARKETPLACE | Designed by E-FISH ADMIN
                        </p>
						<p class="text-right text-light">
							<a href="admin/login.php" > Admin </a>
						</p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>