<h2> TAMBAH STATUS PEMBAYARAN</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Status Pembayaran</label>
		<input type="text" class="form-control" name="ID_Statbayar">
	</div>
	<div class="form-group">
		<label>Keterangan Status Pembayaran</label>
		<input type="text" class="form-control" name="Ket_Statbayar">
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO status_pembayaran 
			(ID_Statbayar,Ket_Statbayar) VALUES('$_POST[ID_Statbayar]','$_POST[Ket_Statbayar]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=statuspembayaran'>";
	}
?>
