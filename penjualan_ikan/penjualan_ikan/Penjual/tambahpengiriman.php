<h2>TAMBAH PENGIRIMAN</h2>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Pengiriman</label>
		<input type="text" class="form-control" name="ID_Pengiriman">
	</div>
	<div class="form-group">
		<label>ID Sistem Jasa</label>
		<select class="form-control" name="ID_Sistemjasa" >
		<?php $ambil=$koneksi->query("SELECT * FROM sistem_pengiriman"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Sistemjasa'] ?>" > <?php echo $pecah['ID_Sistemjasa'] ?> - <?php echo $pecah['ID_Jasakirim'] ?> - <?php echo $pecah['ID_Kategori'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	<div class="form-group">
		<label>Tujuan</label>
		<select class="form-control" name="ID_Tujuan" >
		<?php $ambil=$koneksi->query("SELECT * FROM tujuan"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Tujuan'] ?>" > <?php echo $pecah['ID_Tujuan'] ?> - <?php echo $pecah['Nama_Kota'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	<div class="form-group">
		<label>Ongkir</label>
		<input type="text" class="form-control" name="Ongkir">
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO pengiriman 
			(ID_Pengiriman,ID_Sistemjasa,ID_Tujuan,Ongkir) VALUES('$_POST[ID_Pengiriman]','$_POST[ID_Sistemjasa]','$_POST[ID_Tujuan]','$_POST[Ongkir]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pengiriman'>";
	}
?>
