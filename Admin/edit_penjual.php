<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM penjual WHERE ID_Penjual='$_GET[ID_Penjual]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Penjual</title>
  </head>

 <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT PENJUAL
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label> ID Penjual </label>
                        <select class="form-control" name="ID_Penjual" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM penjual");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Penjual'] ?>" > <?php echo $pecah['ID_Penjual'] ?>--<?php echo $pecah['Nama_Penjual'] ?></option>
                        <?php } ?>
                        </select>
                    </div>    

                    <div class="form-group">
                    <label> ID Penjual </label>
                    <input type="text" class="form-control" name="ID_Penjual">
                    </div>

                    <div class="form-group">
                    <label> Nama Penjual </label>
                    <input type="text" class="form-control" name="Nama_Penjual">
                    </div>

                    <div class="form-group">
                    <label> Username Penjual </label>
                    <input type="text" class="form-control" name="Username_Penjual">
                    </div>

                    <div class="form-group">
                    <label> Password Penjual </label>
                    <input type="text" class="form-control" name="Password_Penjual">
                    </div>

                    <div class="form-group">
                    <label> Alamat Penjual </label>
                    <input type="text" class="form-control" name="Alamat_Penjual">
                    </div>

                    <div class="form-group">
                        <label> ID Bank </label>
                        <select class="form-control" name="ID_Bank" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM bank");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Bank'] ?>" > <?php echo $pecah['ID_Bank'] ?>--<?php echo $pecah['Nama_Bank'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Nomor Rekening Penjual</label>
                    <input type="text" class="form-control" name="No_Rekening_Penjual">
                    </div>

                    <div class="form-group">
                    <label> Nomor Handphone Penjual </label>
                    <input type="text" class="form-control" name="No_Handphone_Penjual">
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
	
	$koneksi->query("UPDATE penjual SET ID_Penjual='$_POST[ID_Penjual]', 
	Nama_Penjual='$_POST[Nama_Penjual]', 
	Username_Penjual='$_POST[Username_Penjual]', 
	Password_Penjual='$_POST[Password_Penjual]',
    Alamat_Penjual='$_POST[Alamat_Penjual]', 
    ID_Bank='$_POST[ID_Bank]', 
    No_Rekening_Penjual='$_POST[No_Rekening_Penjual]', 
    No_Handphone_Penjual='$_POST[No_Handphone_Penjual]' 
    WHERE ID_Penjual='$_GET[ID_Penjual]'");
		
	echo "<script> alert(' Data Penjual Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=penjual';</script>";
}
?>
	 </body>
</html>