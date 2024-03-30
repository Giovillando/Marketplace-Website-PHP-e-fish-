<h2> TAMBAH JENIS BARANG </h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Jenis</label>
		<input type="text" class="form-control" name="ID_Jenis">
	</div>
	<div class="form-group">
		<label>Nama Jenis</label>
		<input type="text" class="form-control" name="Nama_Jenis">
	</div>
	<button class="btn btn-success" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO jenis_barang 
			(ID_Jenis,Nama_Jenis) VALUES('$_POST[ID_Jenis]','$_POST[Nama_Jenis]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jenisbarang'>";
	}
?>