<h2> UBAH ADMIN </h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM admin WHERE username='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>username</label>
		<input type="text" class="form-control" name="username" value="<?php echo $pecah['username'];?>">
	</div>
	<div class="form=group">
		<label>password</label>
		<input type="text" class="form-control" name="password" value="<?php echo $pecah['password'];?>">
	</div>
	<div class="form=group">
		<label>nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama'];?>">
	</div>
	<div class="form=group">
		<label>level</label>										
		<select class="form-control" name="level" value="<?php echo $pecah['level'];?>" required>
		<option value="" > Pilih Level </option>
										<option value="admin" > Admin </option>
										<option value="super admin"> Super Admin </option>
										</select>
	</div>
	<br/>
	<button class="btn btn-primary" name="ubah"">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE admin SET username='$_POST[username]',
	password='$_POST[password]',nama='$_POST[nama]',level='$_POST[level]' WHERE ID_Penjual='$_GET[id]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index2.php?halaman=dataadmin';</script>";
}
?>	