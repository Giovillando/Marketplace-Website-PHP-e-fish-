<?php
session_start();
if(!isset($_SESSION["login"]['ID_Kota_Pembeli']))
{
  
}
include('koneksi.php');

if(!isset($_SESSION["keranjang"]))
{
  
}
if(!isset($_GET["no"]))
{
  
}
else
{
  $nol=$_GET["no"];
  $_SESSION["ongkir"][$nol]=$_GET["Tarif_Pengiriman"];
  echo $_SESSION["ongkir"][$nol];
  
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
  <!-- Header -->
  <?php include 'header.php' ?>
<section class="konten">
  <div class="container">
  <br>
<h2 class="text-success"><center> Detail Faktur Rinci </center></h2>
<br>
<?php
$ambil=$koneksi->query("SELECT * FROM faktur_rinci JOIN penjual on faktur_rinci.ID_Penjual=penjual.ID_Penjual JOIN kota on penjual.ID_Kota=kota.ID_Kota
 WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[ID_Faktur_Rinci]' ");
$detail=$ambil->fetch_assoc();
?>
<!--/. <pre><?php print_r($detail) ?></pre> -->

<!-- if pembeli != yg login THEN dilarikan ke riwayat.php -->
<!-- pembeli harus yg login -->
<?php 
  //mendapatkan id pelanggan yg beli
  //$id_beli = $detail["kode_pembeli"];

  //mendapatkan id yg login
  //$id_login = $_SESSION["pembeli"]["kode_pembeli"];

  //if ($id_beli!==$id_login) 
  //{
  //  echo "<script>alert('Maaf, anda tidak dapat mengakses data orang lain');</script>";
  //  echo "<script>location='riwayat.php';</script>";
  //  exit();
  //}
?>

<p>

<?php
$ambilll=$koneksi->query("SELECT * FROM faktur_beli JOIN jasa_pembayaran on faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran WHERE faktur_beli.ID_Faktur_Beli='$_GET[id]' ");
$detailll=$ambilll->fetch_assoc();
?>
<?php
$ambilllll= $koneksi->query("SELECT * FROM faktur_beli JOIN status_pembayaran on faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran
               WHERE faktur_beli.ID_Faktur_Beli='$_GET[id]'");
$detailllll = $ambilllll->fetch_assoc();
?>
<?php 
$ambill= $koneksi->query("SELECT * FROM faktur_rinci 
          JOIN daftar_pengiriman ON faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman 
          JOIN kota ON daftar_pengiriman.ID_Kota_Tujuan=kota.ID_Kota
          JOIN sistem_pengiriman ON daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman
          JOIN jasa_kirim ON sistem_pengiriman.ID_Jasa_Kirim=jasa_kirim.ID_Jasa_Kirim
          JOIN kategori ON daftar_pengiriman.ID_Kategori=kategori.ID_Kategori
          JOIN penjual ON faktur_rinci.ID_Penjual=penjual.ID_Penjual
          JOIN faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
            WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[ID_Faktur_Rinci]'");
          
$detaill = $ambill->fetch_assoc();
?>
<?php
$ambillll= $koneksi->query("SELECT * FROM faktur_rinci JOIN status_pengiriman on faktur_rinci.ID_Status_Pengiriman= status_pengiriman.ID_Status_Pengiriman
               WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[ID_Faktur_Rinci]'");
$detaillll = $ambillll->fetch_assoc();
?>
<div class="row">
  <div class="col-md-6">
  <h5><strong>Rincian</strong></h5>
<p align =left><h6>  
ID Faktur Rinci    : <?php echo $detaill['ID_Faktur_Rinci']; ?> <br>
Tanggal         : <?php echo date("d F Y",strtotime($detaill['Tanggal_Faktur_Beli'])); ?> <br>
Jasa Pembayaran  : <?php echo $detailll['Nama_Jasa_Pembayaran'];?> <br> </h6></p>
  </div>
  <div class="col-md-6">
    <h5><strong>Penjual</strong></h5>
  <p align=right><h6>  
  Nama      : <?php echo $detail['Nama_Penjual']; ?> <br>
  Alamat Lengkap  : <?php echo $detail['Alamat_Penjual'];?> <br>
  No HP       : <?php echo $detail['No_Handphone_Penjual'];?> <br> 
  Kota       : <?php echo $detail['Nama_Kota'];?> <br> </h6></p>
</div>
  
</P>
</br>
</br>
<table class="table">
    <thead class="thead-primary">
    <tr>
      <th> No</th>
      <th> Kode Barang </th>
      <th> Barang </th>
      <th> Jasa Kirim</th>
      <th> Sistem Pengiriman</th>
      <th> Penjual </th>
      <th> Harga </th>
      <th> QTY </th>
      <th> Sub Harga</th> 
      <th> Rekening Penjual </th> 
    </tr>
    </thead>
  <tbody>
  <?php $nomor=1;?>
  <?php $totalbelanja=0;?>
  <?php $totalongkir=0; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM transaksi JOIN barang ON transaksi.Kode_Barang=barang.Kode_Barang 
    join faktur_rinci on transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci join penjual on barang.ID_Penjual=penjual.ID_Penjual 
    join daftar_pengiriman on faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman
    join sistem_pengiriman on daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman join jasa_kirim on sistem_pengiriman.ID_Jasa_Kirim = jasa_kirim.ID_Jasa_Kirim 
    WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[ID_Faktur_Rinci]' "); ?>
    <?php while($pecah=$ambil->fetch_assoc()){?>
    <tr>
      <td><?php echo $nomor?></td>
      <td><?php echo $pecah['Kode_Barang']; ?></td>
      <td><?php echo $pecah['Nama_Barang']; ?></td>
      <td><?php echo $pecah['Nama_Jasa_Kirim'];?></td>
      <td><?php echo $pecah['Nama_Sistem_Pengiriman'];?></td>
      <td><?php echo $pecah['Nama_Penjual']; ?></td>
      <td><?php echo number_format ($pecah['Harga_Barang']); ?></td>
      <td><?php echo $pecah['QTY_Barang']; ?></td>
      <td><?php echo number_format ($pecah['Harga_Barang']*$pecah['QTY_Barang']);?></td> 
      <td><?php echo $pecah['No_Rekening_Penjual']; ?></td>
    </tr>
    <?php $nomor++; ?>
    <?php $totalongkir += $pecah['Tarif_Pengiriman'];  ?>
    <?php $totalbelanja+=($pecah['Harga_Barang']*$pecah['QTY_Barang']); ?>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th colspan="8"> Total Belanja </th>
      <th>Rp. <?php echo number_format ($totalbelanja) ?>
    </tr>
    <tr>

    
      <th colspan="8"> Biaya Pengiriman</th>
      <th>Rp. <?php echo number_format ($totalongkir); ?>
    </tr>
    <tr>
      <th colspan="8"> Total Bayar</th>
      <th>Rp. <?php echo number_format ($totalongkir + $totalbelanja ); ?>
    </tr>
</table>
  </div>
  </div>
  <center><button type="button" class="btn btn-success btn-rounded btn-fw" 
           onclick="location.href='riwayat.php'" data-toggle="tooltip" data-placement="top" title="Selanjutnya">
          Selanjutnya
          </button></center>
</section>
</body>
</html>