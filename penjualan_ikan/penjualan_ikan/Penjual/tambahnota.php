<h2> TAMBAH NOTA </h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>NO Nota</label>
		<input type="text" class="form-control" name="No_Nota">
	</div>
	<div class="form-group">
		<label>Tanggal Pemesanan</label>
		<input type="date" class="form-control" name="Tgl_Pesan">
	</div>
	<div class="form-group">
		<label>Pembeli</label>
		<select class="form-control" name="ID_Pembeli" >
		<?php $ambil=$koneksi->query("SELECT * FROM pembeli"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Pembeli'] ?>" > <?php echo $pecah['ID_Pembeli'] ?> - <?php echo $pecah['Nama_Pembeli'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	<div class="form-group">
		<label>Pembayaran</label>
		<select class="form-control" name="ID_Pembayaran" >
		<?php $ambil=$koneksi->query("SELECT * FROM pembayaran"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Pembayaran'] ?>" > <?php echo $pecah['ID_Pembayaran'] ?> - <?php echo $pecah['Met_Pembayaran'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	<div class="form-group">
		<label>ID Status Pembayaran</label>
		<select class="form-control" name="ID_Statbayar" >
		<?php $ambil=$koneksi->query("SELECT * FROM status_pembayaran"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Statbayar'] ?>" > <?php echo $pecah['ID_Statbayar'] ?> - <?php echo $pecah['Ket_Statbayar'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	<div class="form-group">
		<label>Status Pengiriman</label>
		<select class="form-control" name="ID_Statkirim" >
		<?php $ambil=$koneksi->query("SELECT * FROM status_pengiriman"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Statkirim'] ?>" > <?php echo $pecah['ID_Statkirim'] ?> - <?php echo $pecah['Ket_Statkirim'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	
	<div class="form-group">
		<label>Tagihan</label>
		<select class="form-control" name="ID_Tagihan" >
		<?php $ambil=$koneksi->query("SELECT * FROM tagihan"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Tagihan'] ?>" > <?php echo $pecah['ID_Tagihan'] ?> - <?php echo $pecah['Total_Tagihan'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	<div class="form-group">
		<label>Pengiriman</label>
		<select class="form-control" name="ID_Pengiriman" >
		<?php $ambil=$koneksi->query("SELECT * FROM pengiriman"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Pengiriman'] ?>" > <?php echo $pecah['ID_Pengiriman'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO nota 
			(No_Nota,Tgl_Pesan,ID_Pembeli,ID_Pembayaran,ID_Statkirim,ID_Statbayar,ID_Tagihan,ID_Pengiriman)
			VALUES('$_POST[No_Nota]','$_POST[Tgl_Pesan]','$_POST[ID_Pembeli]','$_POST[ID_Pembayaran]','$_POST[ID_Statkirim]',
			'$_POST[ID_Statbayar]','$_POST[ID_Tagihan]','$_POST[ID_Pengiriman]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=nota'>";
	}
?>
