<h2> UBAH TAGIHAN </h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT * FROM tagihan WHERE ID_Tagihan='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>ID Tagihan</label>
		<input type="text" class="form-control" name="ID_Tagihan" value="<?php echo $pecah['ID_Tagihan'];?>">
	</div>
	<div class="form=group">
		<label>Total Tagihan</label>
		<input type="text" class="form-control" name="Total_Tagihan" value="<?php echo $pecah['Total_Tagihan'];?>">
	</div>
	<br/>
	<button class="btn btn-primary" name="ubah"">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE tagihan SET ID_Tagihan='$_POST[ID_Tagihan]',
	Total_Tagihan='$_POST[Total_Tagihan]' WHERE ID_Tagihan='$_GET[id]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=tagihan';</script>";
}
?>
	