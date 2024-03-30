<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM daftar_pengiriman WHERE Kode_Daftar_Pengiriman='$_GET[Kode_Daftar_Pengiriman]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Daftar Pengiriman</title>
  </head>

 <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT DAFTAR PENGIRIMAN
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label> Kode Daftar Pengiriman </label>
                        <select class="form-control" name="Kode_Daftar_Pengiriman" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM daftar_pengiriman");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Daftar_Pengiriman'] ?>" > <?php echo $pecah['Kode_Daftar_Pengiriman'] ?>--<?php echo $pecah['Kode_Daftar_Pengiriman'] ?></option>
                        <?php } ?>
                        </select>
                    </div> 

                    <div class="form-group">
                    <label> Kode Daftar Pengiriman </label>
                    <input type="text" class="form-control" name="Kode_Daftar_Pengiriman">
                    </div>                   

                    <div class="form-group">
                        <label> ID Kota Asal </label>
                        <select class="form-control" name="ID_Kota" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM kota ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Kota'] ?>" > <?php echo $pecah['ID_Kota'] ?>--<?php echo $pecah['Nama_Kota'] ?></option>
                        <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label> ID Kota Tujuan </label>
                        <select class="form-control" name="ID_Kota" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM kota ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Kota'] ?>" > <?php echo $pecah['ID_Kota'] ?>--<?php echo $pecah['Nama_Kota'] ?></option>
                        <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label> Kode Sistem Pengiriman </label>
                        <select class="form-control" name="Kode_Sistem_Pengiriman" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM sistem_pengiriman ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Sistem_Pengiriman'] ?>" > <?php echo $pecah['Kode_Sistem_Pengiriman'] ?>--<?php echo $pecah['Nama_Sistem_Pengiriman'] ?></option>
                        <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label> ID Kategori </label>
                        <select class="form-control" name="ID_Kategori" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM kategori ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Kategori'] ?>" > <?php echo $pecah['ID_Kategori'] ?>--<?php echo $pecah['Nama_Kategori'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Tarif Pengiriman </label>
                    <input type="text" class="form-control" name="Tarif">
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
	
	$koneksi->query("UPDATE daftar_pengiriman SET Kode_Daftar_Pengiriman='$_POST[Kode_Daftar_Pengiriman]', 
	ID_Kota_Asal='$_POST[ID_Kota]', 
	Nama_Kota_Asal='$_POST[Nama_Kota]', 
	ID_Kota_Tujuan='$_POST[ID_Kota]', 
	Nama_Kota_Tujuan='$_POST[Nama_Kota]', 
	Kode_Sistem_Pengiriman='$_POST[Kode_Sistem_Pengiriman]', 
	ID_Kategori='$_POST[ID_Kategori]' Tarif='$_POST[Tarif]' WHERE Kode_Daftar_Pengiriman='$_GET[Kode_Daftar_Pengiriman]'");
		
	echo "<script> alert(' Data Daftar Pengiriman Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=daftar_pengiriman';</script>";
}
?>
	 </body>
</html>