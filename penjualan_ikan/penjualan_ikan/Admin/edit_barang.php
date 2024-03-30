<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM barang WHERE Kode_Barang='$_GET[Kode_Barang]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Jasa Kirim</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT JASA KIRIM
            </div>
            <div class="card-body">
<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Id Barang </label>
		<input type="text" class="form-control" name="Kode_Barang" value="<?php echo $pecah['Kode_Barang'];?>">
	</div>

	<div class="form=group">
		<label>Id Barang </label>
		<input type="date" class="form-control" name="Tanggal_Barang_Masuk" value="<?php echo $pecah['Tanggal_Barang_Masuk'];?>">
	</div>

	<div class="form=group">
		<label>Nama Barang </label>
		<input type="text" class="form-control" name="Nama_Barang" value="<?php echo $pecah['Nama_Barang'];?>">
	</div>

	<div class="form-group">
                        <label>Kode Kelompok Barang </label>
                        <select class="form-control" name="Kode_Kelompok_Barang" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM kelompok_barang");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Kelompok_Barang'] ?>" > <?php echo $pecah['Kode_Kelompok_Barang'] ?>--<?php echo $pecah['Nama_Kelompok_Barang'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

	<div class="form=group">
		<?php $ambildata=$koneksi->query("SELECT * FROM barang WHERE Kode_Barang='$_GET[Kode_Barang]' ");?>
		<?php $pecah=$ambildata->fetch_assoc()?>
		<img src="photo/<?php echo $pecah['Foto_Barang']?>" width="200">
	</div>
	<div class="form=group">
		<label> Ubah Foto </label>
		<input type="file" name="Foto_Barang" class="form-control">
	</div>

	<div class="form=group">
		<label>Deskripsi_Barang </label>
		<input type="text" class="form-control" name="Deskripsi_Barang" value="<?php echo $pecah['Deskripsi_Barang'];?>">
	</div>

	<div class="form=group">
		<label>Berat Barang </label>
		<input type="text" class="form-control" name="Berat_Barang" value="<?php echo $pecah['Berat_Barang'];?>">
	</div>

	<div class="form=group">
		<label>Stok Barang </label>
		<input autocomplate="off" type="text" class="form-control" name="Stok_Barang" value="<?php echo $pecah['Stok_Barang'];?>">
	</div>

		<div class="form=group">
		<label> Harga Barang </label>
		<input type="text" class="form-control" name="Harga_Barang" value="<?php echo $pecah['Harga_Barang'];?>">
	</div>

	<div class="form=group">
		<label> ID Penjual </label>
		<select class="form-control" name="ID_Penjual" required>
		<?php $ambildata=$koneksi->query("SELECT * FROM penjual ");?>
		<?php while($pecah=$ambildata->fetch_assoc()){?>
	<option value="<?php echo $pecah['ID_Penjual'] ?>" > <?php echo $pecah['ID_Penjual'] ?>-<?php echo $pecah['Nama_Penjual'] ?></option>
	<?php } ?>
	</select>
	</div>
	<button class="btn btn-primary" name="ubah">Ubah </button>
</form>
</div>
          </div>
        </div>
      </div>
    </div>
<?php
if(isset ($_POST['ubah']))
{
	$Foto_Barang=$_FILES['Foto_Barang']['name'];
	$lokasifoto=$_FILES['Foto_Barang']['tmp_name'];
	//jika foto dirubah
	if(!empty($lokasifoto))
		{
			move_uploaded_file($lokasifoto, "img/$Foto_Barang");
		
	$koneksi->query("UPDATE barang SET Kode_Barang='$_POST[Kode_Barang]',Tanggal_Barang_Masuk='$_POST[Tanggal_Barang_Masuk]', 
	Nama_Barang='$_POST[Nama_Barang]', 
	Kode_Kelompok_Barang='$_POST[Kode_Kelompok_Barang]', 
	Foto_Barang='$Foto_Barang', 
	Deskripsi_Barang='$_POST[Deskripsi_Barang]', 
	Berat_Barang='$_POST[Berat_Barang]', 
	Stok_Barang='$_POST[Stok_Barang]', 
	Harga_Barang='$_POST[Harga_Barang]', ID_Penjual='$_POST[ID_Penjual]' WHERE Kode_Barang='$_GET[Kode_Barang]'");
		}
	else
	{
		$koneksi->query("UPDATE barang SET Kode_Barang='$_POST[Kode_Barang]',Tanggal_Barang_Masuk='$_POST[Tanggal_Barang_Masuk]', 
		Nama_barang='$_POST[Nama_Barang]', 
		Kode_Kelompok_Barang='$_POST[Kode_Kelompok_Barang]',
		Deskripsi_Barang='$_POST[Deskripsi_Barang]',
		Berat_Barang='$_POST[Berat_Barang]', 
		Stok_Barang='$_POST[Stok_Barang]', 
		Harga_Barang='$_POST[Harga_Barang]', ID_Penjual='$_POST[ID_Penjual]' 
		WHERE Kode_Barang='$_GET[Kode_Barang]'");
	}
	echo "<script> alert(' Data Barang Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=Barang';</script>";
}
?>
	 </body>
</html>