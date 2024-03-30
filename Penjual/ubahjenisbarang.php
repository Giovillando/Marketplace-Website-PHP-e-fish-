<h2> UBAH JENIS BARANG </h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM jenis_barang WHERE ID_Jenis='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>ID Jenis</label>
		<input type="text" class="form-control" name="ID_Jenis" value="<?php echo $pecah['ID_Jenis'];?>">
	</div>
	<div class="form=group">
		<label>Nama Jenis</label>
		<input type="text" class="form-control" name="Nama_Jenis" value="<?php echo $pecah['Nama_Jenis'];?>">
	</div>
	<br/>
	<button class="btn btn-primary" name="ubah"">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE jenis_barang SET ID_Jenis='$_POST[ID_Jenis]',
	Nama_Jenis='$_POST[Nama_Jenis]' WHERE ID_Jenis='$_GET[id]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=jenisbarang';</script>";
}
?>
	