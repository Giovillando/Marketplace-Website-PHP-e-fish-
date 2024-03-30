<h2> TAMBAH STATUS PENGIRIMAN</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Status Pengiriman</label>
		<input type="text" class="form-control" name="ID_Statkirim">
	</div>
	<div class="form-group">
		<label>Keterangan Status Pengiriman</label>
		<input type="text" class="form-control" name="Ket_Statkirim">
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO status_pengiriman 
			(ID_Statkirim,Ket_Statkirim) VALUES('$_POST[ID_Statkirim]','$_POST[Ket_Statkirim]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=statuspengiriman '>";
	}
?>
