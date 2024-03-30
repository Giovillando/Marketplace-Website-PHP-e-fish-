<h2> UBAH STATUS PEMBAYARAN </h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM Status_Pembayaran WHERE ID_Statbayar='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>ID Status Pembayaran</label>
		<input type="text" class="form-control" name="ID_Statbayar" value="<?php echo $pecah['ID_Statbayar'];?>">
	</div>
	<div class="form=group">
		<label>Keterangan Status Pembayaran</label>
		<input type="text" class="form-control" name="Ket_Statbayar" value="<?php echo $pecah['Ket_Statbayar'];?>">
	</div>
	<br/>
	<button class="btn btn-primary" name="ubah"">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE Status_Pembayaran SET ID_Statbayar='$_POST[ID_Statbayar]',
	Ket_Statbayar='$_POST[Ket_Statbayar]' WHERE ID_Statbayar='$_GET[id]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=statuspembayaran';</script>";
}
?>
	