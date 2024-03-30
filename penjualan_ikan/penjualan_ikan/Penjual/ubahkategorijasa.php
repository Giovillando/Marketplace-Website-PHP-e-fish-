<h2> UBAH KATEGORI JASA </h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM kategori_jasa WHERE ID_Kategori='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>ID Kategori</label>
		<input type="text" class="form-control" name="ID_Kategori" value="<?php echo $pecah['ID_Kategori'];?>">
	</div>
	<div class="form=group">
		<label>Nama Kategori</label>
		<input type="text" class="form-control" name="Nama_Kategori" value="<?php echo $pecah['Nama_Kategori'];?>">
	</div>
	<br/>
	<button class="btn btn-primary" name="ubah"">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE kategori_jasa SET ID_Kategori='$_POST[ID_Kategori]',
	Nama_Kategori='$_POST[Nama_Kategori]' WHERE ID_Kategori='$_GET[id]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=kategorijasa';</script>";
}
?>
	