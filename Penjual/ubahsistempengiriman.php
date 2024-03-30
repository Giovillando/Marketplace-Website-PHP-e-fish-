<h2> UBAH SISTEM PENGIRIMAN </h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT*FROM sistem_pengiriman WHERE ID_Sistemjasa='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>ID Sistem Jasa </label>
		<input type="text" class="form-control" name="ID_Sistemjasa" value="<?php echo $pecah['ID_Sistemjasa'];?>">
	</div>
	<div class="form-group">
		<label>Jasa Kirim</label>
		<select class="form-control" name="ID_Jasakirim" >
		<?php $ambil=$koneksi->query("SELECT * FROM jasa_kirim"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Jasakirim'] ?>" > <?php echo $pecah['ID_Jasakirim'] ?> - <?php echo $pecah['Nama_Jasakirim'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	<div class="form-group">
		<label>ID Kategori</label>
		<select class="form-control" name="ID_Kategori">
		<?php $ambil=$koneksi->query("SELECT*FROM kategori_jasa"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) {?>
	<option value="<?php echo $pecah['ID_Kategori'] ?>"> <?php echo $pecah['ID_Kategori'] ?>-<?php echo $pecah['Nama_Kategori'] ?></option>
		<?php } ?>
	</select>
	<br/>
	<button class="btn btn-primary" name="ubah">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE sistem_pengiriman SET ID_Sistemjasa='$_POST[ID_Sistemjasa]',
	ID_Jasakirim='$_POST[ID_Jasakirim]',ID_Kategori='$_POST[ID_Kategori]'WHERE ID_Sistemjasa='$_GET[id]'");
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=sistempengiriman';</script>";
}
?>