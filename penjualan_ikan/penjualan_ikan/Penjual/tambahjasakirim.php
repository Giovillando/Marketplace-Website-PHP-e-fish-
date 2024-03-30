<h2> TAMBAH JASA KIRIM </h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Jasa Kirim</label>
		<input type="text" class="form-control" name="ID_Jasakirim">
	</div>
	<div class="form-group">
		<label>Nama Jasa Kirim</label>
		<input type="text" class="form-control" name="Nama_Jasakirim">
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO jasa_kirim 
			(ID_Jasakirim,Nama_Jasakirim) VALUES('$_POST[ID_Jasakirim]','$_POST[Nama_Jasakirim]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jasakirim'>";
	}
?>
