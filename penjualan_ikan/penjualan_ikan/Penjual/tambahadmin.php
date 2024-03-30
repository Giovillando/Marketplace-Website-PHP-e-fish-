<h2> TAMBAH ADMIN </h2>

<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Username</label>
		<input type="text" class="form-control" name="username">
	</div>
	<div class="form=group">
		<label>Password</label>
		<input type="text" class="form-control" name="password">
	</div>
	<div class="form=group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form=group">
		<label>Level</label>
										<select class="form-control" name="level" required>
										<option value="" > Pilih Level </option>
										<option value="admin" > Admin </option>
										<option value="super admin"> Super Admin </option>
										</select>
	</div>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
</form>
</br>
<?php
	if(isset($_POST['Simpan']))
	{
		$koneksi->query("INSERT INTO admin 
			(username,password,nama,level) VALUES('$_POST[username]','$_POST[password]','$_POST[nama]','$_POST[level]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index2.php?halaman=dataadmin'>";
	}
?>
