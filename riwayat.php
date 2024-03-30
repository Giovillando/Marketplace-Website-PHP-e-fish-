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
							<h4 class="text-center mb-4">Daftar Riwayat Belanja  <?php echo $_SESSION["login"]["Nama_Pembeli"]?></h4>
<div class="col-md-12">
 	<div class="col-md-12">
	<div class="table-wrap">
			</div>
		</div>

		<table class="table">
        <tr>
          <th><center>No</th>
          <th><center>Penjual</th>
          <th><center>ID Faktur Rinci</th>
          <th><center>Tanggal</th>
          <th><center>Jasa Kirim</th>
          <th><center>Sistem Pengiriman</th>
          <th><center>Status Kirim</th>
          <th><center>Aksi</th>
        </tr>
      </thead>
      <tbody>
        
        <?php
          //mendapatkan id pelanggan yg login dari session
          $id_customer = $_SESSION["login"]["ID_Pembeli"];
          $ambil = $koneksi->query("SELECT * FROM  faktur_rinci JOIN status_pengiriman ON faktur_rinci.ID_Status_Pengiriman = status_pengiriman.ID_Status_Pengiriman join penjual on faktur_rinci.ID_Penjual=penjual.ID_Penjual 
                                            join daftar_pengiriman on faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman
                                            join sistem_pengiriman on daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman 
                                            join jasa_kirim on sistem_pengiriman.ID_Jasa_Kirim = jasa_kirim.ID_Jasa_Kirim
                                            JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli = faktur_beli.ID_Faktur_Beli
                                            join pembeli on faktur_beli.ID_Pembeli=pembeli.ID_Pembeli
                                            join status_pembayaran on faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran
                                            WHERE faktur_beli.ID_Pembeli='$id_customer'");
          
          while ($pecah = $ambil->fetch_assoc()) {
        ?>
        <?php $nomor=1;?>
        <tr>
          <td><?php echo $nomor;?></td>
          <td><?php echo $pecah["Nama_Penjual"]; ?></td>
          <td><?php echo $pecah["ID_Faktur_Rinci"]; ?></td>
          <td><?php echo date("d F Y",strtotime($pecah["Tanggal_Faktur_Beli"])); ?></td>
          <td><?php echo $pecah['Nama_Jasa_Kirim'];?></td>
          <td><?php echo $pecah['Nama_Sistem_Pengiriman'];?></td>
          <td><?php echo $pecah["Ket_Status_Pengiriman"]; ?></td>
          <td>
            <a href="fakturrinci.php?id=<?php echo $pecah["ID_Faktur_Beli"]; ?> && ID_Faktur_Rinci=<?php echo $pecah["ID_Faktur_Rinci"]; ?>" class="btn btn-info">Faktur</a>

                                               
                        <?php if($pecah['Ket_Status_Pengiriman']=="Barang Dikemas"  ):?>
					    <?php endif?>

                        <?php if($pecah['Ket_Status_Pengiriman']=="Barang Dikirim"  ):?>
                            <a href="terima.php?id=<?php echo $pecah["ID_Faktur_Beli"]; ?> && ID_Faktur_Rinci=<?php echo $pecah["ID_Faktur_Rinci"]; ?>" class="btn btn-primary">Konfirmasi</a>
                        <?php endif?>
                        
                        <?php if($pecah['Ket_Status_Pengiriman']=="Barang Diterima"  ):?>                                                                                                                                                                                                                                                             
                         <a href="lihat_penilaian.php?id=<?php echo $pecah["ID_Faktur_Beli"]; ?> && ID_Faktur_Rinci=<?php echo $pecah["ID_Faktur_Rinci"]; ?>" class="btn btn-primary">Penilaian</a>
                        <?php endif?>

                        <?php if($pecah['Ket_Status_Pengiriman']=="Retur Barang"):?>
                        <a href="lihat_penilaian.php?id=<?php echo $pecah["ID_Faktur_Beli"]; ?> && ID_Faktur_Rinci=<?php echo $pecah["ID_Faktur_Rinci"]; ?>" class="btn btn-danger">Komplain</a>
                        <?php endif?>
                    
                        <?php if($pecah['Ket_Status_Pengiriman']=="Barang Tidak Sampai"  ):?>
                            <a href="komplain.php?id=<?php echo $pecah["ID_Faktur_Beli"]; ?> && ID_Faktur_Rinci=<?php echo $pecah["ID_Faktur_Rinci"]; ?>" class="btn btn-danger"></a>
                        <?php endif?>
                        
                        <?php if($pecah['Ket_Status_Pengiriman']=="Retur Barang Diproses"  ):?>
                        <?php endif?>

                        <?php if($pecah['Ket_Status_Pengiriman']=="Batal" OR $pecah['Ket_Status_Pembayaran']=="Pembayaran Dibatalkan" ):?>
                        <?php endif?>
                        
                        <?php if($pecah['Ket_Status_Pengiriman']=="Selesai"  ):?>
                        <?php endif?>
                        

          </td>
        </tr>
        <?php $nomor++ ;?>
        <?php } ?>
			</tbody>
		</table>

	</div>
</section>
	</body>
	<?php include 'footer.php'; ?>
</html>