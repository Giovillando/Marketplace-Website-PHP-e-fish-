<?php
session_start ();
include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

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
<?php include 'header.php'; ?>
<br>
<section class="riwayat">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<center><div style="color: green;">
							<h4 class="text-center mb-4">Daftar Riwayat Pembayaran
							 <?php echo $_SESSION["login"]["Nama_Pembeli"]?></h4>
<div class="col-md-12">
 	<div class="col-md-12">
	<div class="table-wrap">
			</div>
		</div>

		<table class="table">
        <tr>
          <th><center>No</th>
          <th><center>Kode Faktur Beli</th>
          <th><center>Tanggal Faktur Beli</th>
          <th><center>Status Pembayaran</th>
          <th><center>Metode Pembayaran</th>
          <th><center>Jenis Pembayaran</th>
          <th><center>No Pembayaran</th>
          <th><center>Rekening Pembayaran</th>
          <th><center>Total</th>
          <th><center>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor=1;?>
        <?php
          //mendapatkan id pelanggan yg login dari session
          $id_customer = $_SESSION["login"]["ID_Pembeli"];
          $ambil = $koneksi->query("SELECT 'pembeli', COUNT(faktur_beli.ID_Faktur_Beli) FROM pembeli,faktur_beli,jenis_pembayaran,jasa_pembayaran,status_pembayaran,faktur_rinci 
          WHERE faktur_beli.ID_Pembeli=pembeli.ID_Pembeli AND faktur_beli.ID_Jasa_Pembayaran = jasa_pembayaran.ID_Jasa_Pembayaran 
          AND jasa_pembayaran.Kode_Jenis_Pembayaran=jenis_pembayaran.Kode_Jenis_Pembayaran AND faktur_beli.ID_Status_Pembayaran = status_pembayaran.ID_Status_Pembayaran 
          AND  faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli  GROUP BY faktur_beli.ID_Pembeli");
            $ambil = $koneksi->query("SELECT * FROM faktur_beli JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran = jasa_pembayaran.ID_Jasa_Pembayaran
            JOIN jenis_pembayaran ON jasa_pembayaran.Kode_Jenis_Pembayaran=jenis_pembayaran.Kode_Jenis_Pembayaran
            JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran = status_pembayaran.ID_Status_Pembayaran WHERE ID_Pembeli='$id_customer'");
          while ($pecah = $ambil->fetch_assoc()) {
        ?>
        
        <tr>
          <td><?php echo $nomor;?></td>
          <td><?php echo $pecah["ID_Faktur_Beli"]; ?></td>
          <td><?php echo date("d F Y",strtotime($pecah["Tanggal_Faktur_Beli"])); ?></td>
          <td><?php echo $pecah["Ket_Status_Pembayaran"]; ?></td>
          <td><?php echo $pecah['Nama_Jenis_Pembayaran'] ?></td>
          <td><?php echo $pecah['Nama_Jasa_Pembayaran'] ?></td>
          <td><?php echo $pecah['No_Pembayaran'] ?></td>
          <td><?php echo $pecah['No_Rekening_Pembeli'] ?></td>
          <td>Rp. <?php echo number_format($pecah['Total_Bayar']); ?> </td>
          <td>

          	<?php if ($pecah['Ket_Status_Pembayaran']=="Pembayaran Dibatalkan"): ?>
            <?php endif?>

            <?php if ($pecah['Ket_Status_Pembayaran']=="Belum Bayar"): ?>
            <a href="pembayaran.php?id=<?php echo $pecah["ID_Faktur_Beli"]; ?>" class="btn btn-success">Input Pembayaran</a>
            <a href="batalkan_pesanan.php?id=<?php echo $pecah["ID_Faktur_Beli"]; ?>" class="btn btn-success">Batalkan Pembayaran</a>


            
            <?php elseif(($pecah['Ket_Status_Pembayaran']=="Sudah Bayar" OR $pecah['Ket_Status_Pembayaran']=="Pembayaran Sedang Diverifikasi" )): ?>
            <a href="fakturbeli.php?id=<?php echo $pecah["ID_Faktur_Beli"]; ?>" class="btn btn-info">Faktur</a>
            <a href="lihat_pembayaran.php?id=<?php echo $pecah["ID_Faktur_Beli"]; ?>" class="btn btn-primary">Lihat Pembayaran</a>
  
            <?php endif ?>

          </td>

        </tr>
        <?php $nomor++; ?>
        <?php } ?>
			</tbody>
		</table>

	</div>
</section>
	</body>
	<?php include 'footer.php'; ?>
</html>