<?php
session_start();
$koneksi= new mysqli("localhost","root","","smart_farming");
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>E-FISH</title>
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
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <main>
        <section class="featured-places">
        <div class="container">
                <div class="row">
                    <?php $ambil=$koneksi->query("SELECT * FROM diskon WHERE Kode_Diskon!='Kode_Diskon'");
                    while($pecah = $ambil->fetch_assoc()){?>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="featured-item">
                            <div class="down-content">
                                <?php  
                                $tgl_muncul=$pecah['Tgl_Muncul'];
                                if (date("Y-m-d") == $tgl_muncul ) { ?>
                                <br>
                                <h2><strong><center><?php echo $pecah['Jenis_Diskon'];?></center></strong></h2>
                                <h2><span><center><strong><?php echo number_format($pecah['Jumlah_Diskon']);?>%</strong></center></span></h2>
                                <div class='form-actions'>
                                    <center><a href="prosesdiskon.php?Kode_Diskon=<?php echo $pecah['Kode_Diskon'];?>" class="btn btn-primary btn-xs"><h5>Klaim</h5></a><center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                    
                </div>
            </div>
        </section>
        </body>
</html> 

