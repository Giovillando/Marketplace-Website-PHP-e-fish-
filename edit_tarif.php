<?php
session_start ();


$koneksi=new mysqli("localhost", "root", "", "smart_farming");
$kota_penjual =$_GET['Nama_Kota'];
$kota_pembeli=$_SESSION["login"]['ID_Kota_Pembeli'];

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
    <!-- Header -->
    <?php include 'header.php' ?>
    <br>
<div class="container" style="margin-top: 5px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              PILIH OPSI PENGIRIMAN
            </div>
            <div class="card-body">
            <div class="col-md-8"> 
                <?php $noj=$_GET['no'];
                $no=1; ?>
                <?php $nop=0;$ongkir=[]; ?>
        <?php $totalpesanan=0; $totalbarang=0; $totalbelanja=0; ?>
        <?php $totalkeseluruhan = 0; ?>
             <?php $ambil1=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman 
            JOIN jasa_kirim ON sistem_pengiriman.ID_Jasa_Kirim=jasa_kirim.ID_Jasa_Kirim JOIN kategori ON daftar_pengiriman.ID_Kategori=kategori.ID_Kategori 
            JOIN kota ON daftar_pengiriman.ID_Kota_Asal=kota.ID_Kota WHERE Nama_Kota= '$kota_penjual'");
            $ambil3=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman 
            JOIN jasa_kirim ON sistem_pengiriman.ID_Jasa_Kirim=jasa_kirim.ID_Jasa_Kirim JOIN kategori ON daftar_pengiriman.ID_Kategori=kategori.ID_Kategori 
            JOIN kota ON daftar_pengiriman.ID_Kota_Asal=kota.ID_Kota ");
                    $ambil2=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN kota ON daftar_pengiriman.ID_Kota_Tujuan =kota.ID_Kota 
                    WHERE ID_Kota_Tujuan='$kota_pembeli'  ")?>
                    <?php while ($pecah=$ambil1->fetch_assoc() AND $pecah1=$ambil3->fetch_assoc() and $pecah1=$ambil2->fetch_assoc()) { ?>
                        <div class='row'>
                    <div class="col-md-12"> <br>
                    <div class="card mb-12 product-wap rounded-0">
                    <div class="card rounded-12">
                        <h6> 
                           Dari <?php echo  $pecah['Nama_Kota']?> ke <?php echo $pecah1['Nama_Kota']?> 
                           ( <?php echo $pecah['Nama_Kategori']?>-<?php echo $pecah['Nama_Jasa_Kirim']?> <?php echo $pecah['Nama_Sistem_Pengiriman']?>) Rp. <?php echo $pecah['Tarif_Pengiriman']?> </h6>  

                                <a class="btn btn-success text-white mt-2" name="Tarif_Pengiriman" href ="checkout.php?Tarif_Pengiriman=<?php echo $pecah['Tarif_Pengiriman']; ?>&Kode_Daftar_Pengiriman=<?php echo $pecah['Kode_Daftar_Pengiriman']; ?>&no=<?php echo $noj?>"><i class="fas fa-check"></i></a><th> </th> 
                            </ul>
                        </div>
                    </div>
                    </div>
                    </ul>
                    </div>

                    <?php }  ;?>
                </div> </div> </div></div>
              </div></div> </div> </div>

</body>
<br><br>
<!-- Start Footer -->
<?php include 'footer.php' ?>
<!--Ended table Keranjang -->