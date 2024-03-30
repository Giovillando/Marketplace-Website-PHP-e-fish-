<h2> TAMBAH TUJUAN </h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Tujuan</label>
		<input type="text" class="form-control" name="ID_Tujuan">
	</div>
	<div class="form-group">
		<label>Nama Kota</label>
		<input type="text" class="form-control" name="Nama_Kota">
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO tujuan 
			(ID_Tujuan,Nama_Kota) VALUES('$_POST[ID_Tujuan]','$_POST[Nama_Kota]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=tujuan'>";
	}
?>
