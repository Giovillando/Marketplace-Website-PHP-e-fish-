<h2> UBAH PENGIRIMAN </h2>

<br/>
<?php
$ambil=$koneksi->query("SELECT*FROM pengiriman WHERE ID_Pengiriman='$_GET[id]'");
$pecah=$ambil->fetch_assoc ();

?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>ID Pengiriman</label>
		<input type="text" class="form-control" name="ID_Pengiriman" value="<?php echo $pecah['ID_Pengiriman'];?>">
	</div>
	<div class="form-group">
		<label>ID Sistem Jasa</label>
		<select class="form-control" name="ID_Sistemjasa" >
		<?php $ambil=$koneksi->query("SELECT * FROM sistem_pengiriman"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Sistemjasa'] ?>" > <?php echo $pecah['ID_Sistemjasa'] ?> - <?php echo $pecah['ID_Jasakirim'] ?> - <?php echo $pecah['ID_Kategori'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	<div class="form-group">
		<label>Tujuan</label>
		<select class="form-control" name="ID_Tujuan" >
		<?php $ambil=$koneksi->query("SELECT * FROM tujuan"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Tujuan'] ?>" > <?php echo $pecah['ID_Tujuan'] ?> - <?php echo $pecah['Nama_Kota'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	<div class="form-group">
		<label>Ongkir</label>
		<input type="text" class="form-control" name="Ongkir">
	</div>

	<button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$koneksi->query("UPDATE pengiriman SET ID_Pengiriman='$_POST[ID_Pengiriman]',
	ID_Sistemjasa='$_POST[ID_Sistemjasa]',ID_Tujuan='$_POST[ID_Tujuan]',Ongkir='$_POST[Ongkir]' WHERE ID_Pengiriman='$_GET[id]'");
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=pengiriman';</script>";
}
?>