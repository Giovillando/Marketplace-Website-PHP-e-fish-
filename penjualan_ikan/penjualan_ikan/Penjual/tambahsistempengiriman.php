<h2> TAMBAH SISTEM PENGIRIMAN</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Sistem Jasa</label>
		<input type="text" class="form-control" name="ID_Sistemjasa">
	</div>
	<div class="form-group">
		<label>Jasa Kirim</label>
		<select class="form-control" name="ID_Jasakirim" >
		<?php $ambil=$koneksi->query("SELECT * FROM jasa_kirim"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Jasakirim'] ?>" > <?php echo $pecah['ID_Jasakirim'] ?> - <?php echo $pecah['Nama_Jasakirim'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	<div class="form-group">
		<label>ID Kategori</label>
		<select class="form-control" name="ID_Kategori">
		<?php $ambil=$koneksi->query("SELECT*FROM kategori_jasa"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) {?>
	<option value="<?php echo $pecah['ID_Kategori'] ?>"> <?php echo $pecah['ID_Kategori'] ?>-<?php echo $pecah['Nama_Kategori'] ?></option>
		<?php } ?>
	</select>
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO sistem_pengiriman 
			(ID_Sistemjasa,ID_Jasakirim,ID_Kategori) VALUES('$_POST[ID_Sistemjasa]','$_POST[ID_Jasakirim]','$_POST[ID_Kategori]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=sistempengiriman'>";
	}
?>