<h2> TAMBAH PEMBAYARAN </h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Pembayaran</label>
		<input type="text" class="form-control" name="ID_Pembayaran"
	</div>
	<div class="form-group">
		<label>Metode Pembayaran</label>
		<input type="text" class="form-control" name="Met_Pembayaran"
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO pembayaran 
			(ID_Pembayaran,Met_Pembayaran) VALUES('$_POST[ID_Pembayaran]','$_POST[Met_Pembayaran]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pembayaran'>";
	}
?>