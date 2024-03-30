
<h2> UBAH BARANG </h2>

<br/>
<?php
include 'koneksi.php';
$ambil=$koneksi->query("SELECT*FROM barang WHERE Kode_Barang='$_GET[Kode_Barang]'");
$pecah=$ambil->fetch_assoc ();

?>

<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>ID Barang</label>
		<input type="text" class="form-control" name="Kode_Barang" value="<?php echo $pecah['Kode_Barang'];?>">
	</div>
	<div class="form=group">
		<label>Nama Barang</label>
		<input type="text" class="form-control" name="Nama_Barang" value="<?php echo $pecah['Nama_Barang'];?>">
	</div>
	<div class="form=group">
		<label>Berat Barang</label>
		<input type="text" class="form-control" name="Berat_Barang" value="<?php echo $pecah['Berat_Barang'];?>">
	</div>
	<div class="form=group">
		<label>Deskripsi Barang</label>
		<input type="text" class="form-control" name="Deskripsi" value="<?php echo $pecah['Deskripsi_Barang'];?>">
	</div>
	<div class="form=group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="form=group">
		<label>Harga</label>
		<input type="text" class="form-control" name="Harga" value="<?php echo $pecah['Harga_Barang'];?>">
	</div>
	<div class="form=group">
		<label>Stok</label>
		<input type="text" class="form-control" name="Stok" value="<?php echo $pecah['Stok_Barang'];?>">
	</div>
	<div class="form=group">
		<label>Nama Kelompok</label>
		<select class="form-control" name="Kode_Kelompok_Barang">
		<?php $ambil=$koneksi->query("SELECT * FROM kelompok_barang"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['Kode_Kelompok_Barang'] ?>" > <?php echo $pecah['Kode_Kelompok_Barang'] ?> - <?php echo $pecah['Nama_Kelompok_Barang'] ?>
		</option>
        <?php } ?>
	</select>	
	</div>
	<br/>
	<button class="btn btn-primary" name="ubah">Ubah </button>
</form>
<?php
if(isset ($_POST['ubah']))
{
	$nama=$_FILES['foto']['name'];
		$lokasi=$_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi,"../admin/img".$nama);
	$koneksi->query("UPDATE barang SET Kode_Barang='$_POST[Kode_Barang]',Nama_Barang='$_POST[Nama_Barang]',Berat_Barang='$_POST[Berat_Barang]',Deskripsi_Barang='$_POST[Deskripsi]',Harga_Barang='$_POST[Harga]',
	Foto_Barang='$nama',Stok_Barang='$_POST[Stok]',Kode_Kelompok_Barang='$_POST[Kode_Kelompok_Barang]' WHERE Kode_Barang='$_GET[Kode_Barang]'");
	
	echo "<script> alert('Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=barang';</script>";
}
?>