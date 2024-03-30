<h2> TAMBAH KATEGORI JASA KIRIM </h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Kategori</label>
		<input type="text" class="form-control" name="ID_Kategori"
	</div>
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" class="form-control" name="Nama_Kategori"
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO kategori 
			(ID_Kategori,Nama_Kategori) VALUES('$_POST[ID_Kategori]','$_POST[Nama_Kategori]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategorijasa'>";
	}
?>
