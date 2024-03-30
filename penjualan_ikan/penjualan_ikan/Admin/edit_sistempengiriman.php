<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM sistem_pengiriman WHERE Kode_Sistem_Pengiriman='$_GET[Kode_Sistem_Pengiriman]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Sistem Pengiriman</title>
  </head>

 <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT SISTEM PENGIRIMAN
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
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
                    <label> Kode Sistem Pengiriman </label>
                    <input type="text" class="form-control" name="Kode_Sistem_Pengiriman">
                    </div>                   

                    <div class="form-group">
                        <label> ID Jasa Kirim </label>
                        <select class="form-control" name="ID_Jasa_Kirim" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM jasa_kirim ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Jasa_Kirim'] ?>" > <?php echo $pecah['ID_Jasa_Kirim'] ?>--<?php echo $pecah['Nama_Jasa_Kirim'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                    <label> Nama Sistem Pengiriman </label>
                    <input type="text" class="form-control" name="Nama_Sistem_Pengiriman">
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
	
	$koneksi->query("UPDATE sistem_pengiriman SET Kode_Sistem_Pengiriman='$_POST[Kode_Sistem_Pengiriman]', 
	ID_Jasa_Kirim='$_POST[ID_Jasa_Kirim]', 
	Nama_Sistem_Pengiriman='$_POST[Nama_Sistem_Pengiriman]'
    WHERE Kode_Sistem_Pengiriman='$_GET[Kode_Sistem_Pengiriman]'");
		
	echo "<script> alert(' Data Sistem Pengiriman Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=sistem_pengiriman';</script>";
}
?>
	 </body>
</html>