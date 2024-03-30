<h2> UBAH TUJUAN </h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM tujuan WHERE ID_Tujuan='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>ID Tujuan</label>
		<input type="text" class="form-control" name="ID_Tujuan" value="<?php echo $pecah['ID_Tujuan'];?>">
	</div>
	<div class="form=group">
		<label>Nama Kota</label>
		<input type="text" class="form-control" name="Nama_Kota" value="<?php echo $pecah['Nama_Kota'];?>">
	</div>
	<br/>
	<button class="btn btn-primary" name="ubah"">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE tujuan SET ID_Tujuan='$_POST[ID_Tujuan]',
	Nama_Kota='$_POST[Nama_Kota]' WHERE ID_Tujuan='$_GET[id]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=tujuan';</script>";
}
?>
	