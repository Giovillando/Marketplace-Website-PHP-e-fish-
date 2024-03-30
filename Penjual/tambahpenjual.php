<h2> TAMBAH PENJUAL </h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Penjual</label>
		<input type="text" class="form-control" name="ID_Penjual">
	</div>
	<div class="form-group">
		<label>Nama Penjual</label>
		<input type="text" class="form-control" name="Nama_Penjual">
	</div>
	<div class="form-group">
		<label>Nomor Penjual</label>
		<input type="text" class="form-control" name="No_Penjual">
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO penjual 
			(ID_Penjual,Nama_Penjual,No_Penjual) VALUES('$_POST[ID_Penjual]','$_POST[Nama_Penjual]','$_POST[No_Penjual]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penjual'>";
	}
?>
