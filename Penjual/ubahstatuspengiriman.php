<h2> UBAH STATUS PENGIRIMAN</h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM status_pengiriman WHERE ID_Statkirim='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>ID Status Pengiriman</label>
		<input type="text" class="form-control" name="ID_Statkirim" value="<?php echo $pecah['ID_Statkirim'];?>">
	</div>
	<div class="form=group">
		<label>Nama Jasa Kirim </label>
		<input type="text" class="form-control" name="Ket_Statkirim" value="<?php echo $pecah['Ket_Statkirim'];?>">
	</div>
	<br/>
	<button class="btn btn-primary" name="ubah"">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE status_pengiriman SET ID_Statkirim='$_POST[ID_Statkirim]',
	Ket_Statkirim='$_POST[Ket_Statkirim]' WHERE ID_Statkirim='$_GET[id]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=statuspengiriman';</script>";
}
?>
	