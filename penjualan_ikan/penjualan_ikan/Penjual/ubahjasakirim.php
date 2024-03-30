<h2> UBAH JASA KIRIM </h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM jasa_kirim WHERE ID_Jasakirim='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>ID Jasa Kirim</label>
		<input type="text" class="form-control" name="ID_Jasakirim" value="<?php echo $pecah['ID_Jasakirim'];?>">
	</div>
	<div class="form=group">
		<label>Nama Jasa Kirim </label>
		<input type="text" class="form-control" name="Nama_Jasakirim" value="<?php echo $pecah['Nama_Jasakirim'];?>">
	</div>
	<br/>
	<button class="btn btn-primary" name="ubah"">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE jasa_kirim SET ID_Jasakirim='$_POST[ID_Jasakirim]',
	Nama_Jasakirim='$_POST[Nama_Jasakirim]' WHERE ID_Jasakirim='$_GET[id]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=jasakirim';</script>";
}
?>
	