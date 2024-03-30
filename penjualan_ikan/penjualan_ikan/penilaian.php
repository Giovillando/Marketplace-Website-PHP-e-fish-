<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "smart_farming";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
session_start();

$id_faktur=$_GET['id'];
$ambil=$koneksi->query("SELECT *FROM faktur_rinci JOIN status_pengiriman ON faktur_rinci.ID_Status_Pengiriman=status_pengiriman.ID_Status_Pengiriman
JOIN faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
WHERE ID_Faktur_Rinci='$id_faktur'");
$detpem=$ambil->fetch_assoc();

?>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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
</head>
<head>
	<title> Penilaian </title>
	<link rel="stylesheet" href="app/assets/css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="row">
<BODY STYLE="BACKGROUND-IMAGE:URL(penilaian.JPG)">
<form method="post">
	<br>
	<br>
	<br>
    <h2>Penilaian Barang</h2>
	<div class="alert alert-info"> <strong>Terimakasih telah berbelanja di toko kami!</strong></div>

    <div class="form-group">
			<label> Silahkan beri penilaian anda ! </label>
			<textarea class="form-control" name="penilaian" placeholder="Berikan Penilaian Anda"></textarea>
		</div>

         <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>

    <span class='result'>0</span>
    <input type="hidden" name="rating">

    </div>

    <button class="btn btn-primary" name="kirim"> Kirim</button>

</form>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>
</body>

</html>
<?php

//jk tombol kirim diklik
if(isset($_POST["kirim"]))
{
	

	$nilai =$_POST["penilaian"];
	$rating =$_POST["rating"];
	$koneksi->query("UPDATE faktur_rinci SET Penilaian='$nilai', Bintang='$rating' WHERE ID_Faktur_Rinci='$id_faktur'");			
	//update status pembayaran
	$koneksi->query("UPDATE faktur_rinci SET ID_Status_Pengiriman='SPENG3' WHERE ID_Faktur_Rinci='$id_faktur'");
	
	echo "<script>alert('Terimakasih sudah memberi penilaian ');</script>";
	echo "<script>location='riwayat.php';</script>";
}



?> 