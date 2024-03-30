<h2> UBAH PENJUAL </h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM penjual WHERE ID_Penjual='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>ID Penjual</label>
		<input type="text" class="form-control" name="ID_Penjual" value="<?php echo $pecah['ID_Penjual'];?>">
	</div>
	<div class="form=group">
		<label>Nama Penjual</label>
		<input type="text" class="form-control" name="Nama_Penjual" value="<?php echo $pecah['Nama_Penjual'];?>">
	</div>
	<div class="form=group">
		<label>Nomor Penjual</label>
		<input type="text" class="form-control" name="No_Penjual" value="<?php echo $pecah['No_Penjual'];?>">
	</div>
	<br/>
	<button class="btn btn-primary" name="ubah"">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE penjual SET ID_Penjual='$_POST[ID_Penjual]',
	Nama_Penjual='$_POST[Nama_Penjual]',No_Penjual='$_POST[No_Penjual]' WHERE ID_Penjual='$_GET[id]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=penjual';</script>";
}
?>	