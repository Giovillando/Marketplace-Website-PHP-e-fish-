<h2> TAMBAH PEMBELI </h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Pembeli</label>
		<input type="text" class="form-control" name="ID_Pembeli">
	</div>
	<div class="form-group">
		<label>Nama Pembeli</label>
		<input type="text" class="form-control" name="Nama_Pembeli">
	</div>
	<div class="form-group">
		<label>Nomor Pembeli</label>
		<input type="text" class="form-control" name="No_Pembeli">
	</div>
	<div class="form-group">
		<label>Alamat Pembeli</label>
		<input type="text" class="form-control" name="Alamat">
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO pembeli
			(ID_Pembeli,Nama_Pembeli,No_Pembeli,Alamat) VALUES('$_POST[ID_Pembeli]','$_POST[Nama_Pembeli]','$_POST[No_Pembeli]','$_POST[Alamat]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pembeli'>";
	}
?>
