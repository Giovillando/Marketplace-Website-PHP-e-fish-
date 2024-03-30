<h2> UBAH PEMBAYARAN </h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM Pembayaran WHERE ID_Pembayaran='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>ID Pembayaran</label>
		<input type="text" class="form-control" name="ID_Pembayaran" value="<?php echo $pecah['ID_Pembayaran'];?>">
	</div>
	<div class="form=group">
		<label>Metode Pembayaran</label>
		<input type="text" class="form-control" name="Met_Pembayaran" value="<?php echo $pecah['Met_Pembayaran'];?>">
	</div>
	<br/>
	<button class="btn btn-primary" name="ubah"">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE Pembayaran SET ID_Pembayaran='$_POST[ID_Pembayaran]',
	Met_Pembayaran='$_POST[Met_Pembayaran]' WHERE ID_Pembayaran='$_GET[id]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=pembayaran';</script>";
}
?>
	