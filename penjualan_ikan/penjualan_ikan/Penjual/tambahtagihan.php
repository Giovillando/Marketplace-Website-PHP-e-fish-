<h2> TAMBAH TAGIHAN </h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Tagihan</label>
		<input type="text" class="form-control" name="ID_Tagihan"
	</div>
	<div class="form-group">
		<label>Total Tagihan</label>
		<input type="text" class="form-control" name="Total_Tagihan"
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO tagihan 
			(ID_Tagihan,Total_Tagihan) VALUES('$_POST[ID_Tagihan]','$_POST[Total_Tagihan]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=tagihan'>";
	}
?>