<?php
$totalbelanja=0;
$ambilll=$koneksi->query("SELECT * FROM faktur_rinci JOIN  faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli JOIN
	status_pengiriman ON faktur_rinci.ID_Status_Pengiriman=status_pengiriman.ID_Status_Pengiriman JOIN daftar_pengiriman 
	ON faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman JOIN status_transfer_penjual ON 
	faktur_rinci.ID_Status_Transfer_Penjual =status_transfer_penjual.ID_Status_Transfer_Penjual 
	JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN penjual ON 
	faktur_rinci.ID_Penjual =penjual.ID_Penjual WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[id]' ");
$detailll=$ambilll->fetch_assoc();

$ambil=$koneksi->query("SELECT * FROM transaksi JOIN barang ON transaksi.Kode_Barang=barang.Kode_Barang join faktur_rinci on transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci join penjual on barang.ID_Penjual=penjual.ID_Penjual WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[id]' "); 
$pecah=$ambil->fetch_assoc();

$totalbelanja+=($pecah['Harga_Barang']*$pecah['QTY_Barang']);
?>

<section class="container py-1">
	<div class="row text-center pt-5">
		<div class="col-lg-6 m-auto">
			<h1 class="h1 text-success"><strong>Transfer Uang Penjual</h1></strong>
			<h5 class="h5 text-success">Silahkan Kirim Uang Ke Penjual disini</h5>
		</div>
	</div>

	<div class="alert alert-info">Total tagihan Anda :<strong> Rp. <?php echo number_format($detailll["Tarif_Pengiriman"]+$totalbelanja) ?></strong>
		
		<?php if (empty($detail["info"])): ?>
			<div class="row">
				<div class="col-md-7">
					<p>Silahkan melakukan pembayaran Ke </br>
						<strong><?php echo $detailll['Nama_Jasa_Pembayaran']; ?> : <?php echo $detailll['No_Rekening_Penjual']; ?> A.N <?php echo $detailll['Nama_Penjual']; ?> </strong></p>
					</div>
				</div>
			<?php elseif (isset($detail["info"])): ?>
				<div class="row">
					<div class="col-md-7">
						<div class="alert alert-info">
							<?php echo $detail['info']; ?>
						</div>
					</div>
				</div>
			<?php endif ?>

		</div>
		
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Nama Penjual</label>
				<input type="text" name="nama" class="form-control" readonly value ="<?php echo $detailll['Nama_Penjual']; ?>">
			</div>
			<div class="form-group">
				<label>Foto Bukti</label>
				<input type="file" name="Bukti_Pembayaran" class="form-control" required>
			</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
		

	</div>

	<?php 
	if(isset($_POST["kirim"]))
	{
		$a=$detailll["Tarif_Pengiriman"]+$totalbelanja;
		$namabukti=$_FILES["Bukti_Pembayaran"]["name"];
		$lokasibukti=$_FILES["Bukti_Pembayaran"]["tmp_name"];
		$namafiks = date("YmdHis").$namabukti;
		move_uploaded_file($lokasibukti, "Bukti_Pembayaran/$namafiks");
		$Tanggal_Faktur_Beli = date("Y-m-d");

		
		$koneksi->query("UPDATE faktur_rinci SET ID_Status_Transfer_Penjual='SSTP102', Transfer_Uang_Penjual='$a' WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[id]'");
		echo "<script>alert('Terimakasih sudah melakukan pembayaran ');</script>";
		echo "<script>location='index.php?halaman=faktur_rinci';</script>";
	}
	?>

</div>	

</section>