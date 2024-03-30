<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM kelompok_barang WHERE Kode_Kelompok_Barang
='$_GET[Kode_Kelompok_Barang]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Kelompok Barang</title>
  </head>

 <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT KELOMPOK BARANG
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label> Kode Kelompok Barang </label>
                        <select class="form-control" name="Kode_Kelompok_Barang" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM kelompok_barang");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Kelompok_Barang'] ?>"> <?php echo $pecah['Kode_Kelompok_Barang'] ?>--<?php echo $pecah['Nama_Kelompok_Barang'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Kode Kelompok Barang </label>
                    <input type="text" class="form-control" name="Kode_Kelompok_Barang">
                    </div>                   

                    <div class="form-group">
                        <label> Kode Jenis Barang </label>
                        <select class="form-control" name="Kode_Jenis_Barang" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM jenis_barang ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Jenis_Barang'] ?>" > <?php echo $pecah['Kode_Jenis_Barang'] ?>--<?php echo $pecah['Nama_Jenis_Barang'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                    <label> Nama Kelompok Barang </label>
                    <input type="text" class="form-control" name="Nama_Kelompok_Barang">
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
	
	$koneksi->query("UPDATE kelompok_barang SET Kode_Kelompok_Barang='$_POST[Kode_Kelompok_Barang]', 
	Kode_Jenis_Barang='$_POST[Kode_Jenis_Barang]', 
	Nama_Kelompok_Barang='$_POST[Nama_Kelompok_Barang]'
    WHERE Kode_Kelompok_Barang='$_GET[Kode_Kelompok_Barang]'");
		
	echo "<script> alert(' Data Kelompok Barang Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=kelompok_barang';</script>";
}
?>
	 </body>
</html>