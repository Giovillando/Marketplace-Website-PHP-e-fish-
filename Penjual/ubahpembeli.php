<h2> UBAH PEMBELI </h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM PEMBELI WHERE ID_Pembeli='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>ID Pembeli</label>
		<input type="text" class="form-control" name="ID_Pembeli" value="<?php echo $pecah['ID_Pembeli'];?>">
	</div>
	<div class="form=group">
		<label>Nama Pembeli</label>
		<input type="text" class="form-control" name="Nama_Pembeli" value="<?php echo $pecah['Nama_Pembeli'];?>">
	</div>
	<div class="form=group">
		<label>Nomor Pembeli</label>
		<input type="text" class="form-control" name="No_Pembeli" value="<?php echo $pecah['No_Pembeli'];?>">
	</div>
	<div class="form=group">
		<label>Alamat Pembeli</label>
		<input type="text" class="form-control" name="Alamat" value="<?php echo $pecah['Alamat'];?>">
	</div>
	<br/>
	<button class="btn btn-primary" name="ubah"">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE pembeli SET ID_Pembeli='$_POST[ID_Pembeli]',
	Nama_Pembeli='$_POST[Nama_Pembeli]',No_Pembeli='$_POST[No_Pembeli]',Alamat='$_POST[Alamat]' WHERE ID_Pembeli='$_GET[id]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=pembeli';</script>";
}
?>
	