<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM status_pengiriman WHERE ID_Status_Pengiriman='$_GET[ID_Status_Pengiriman]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Status Pengiriman</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT STATUS PENGIRIMAN
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
                    <div class="form-group">
                        <label> ID Status Pengiriman </label>
                        <select class="form-control" name="ID_Status_Pengiriman" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM status_pengiriman");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Status_Pengiriman'] ?>" > <?php echo $pecah['ID_Status_Pengiriman'] ?>--<?php echo $pecah['Ket_Status_Pengiriman'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> ID Status Pengiriman </label>
                    <input type="text" class="form-control" name="ID_Status_Pengiriman">
                    </div>

                    <div class="form-group">
                    <label> Keterangan Status Pengiriman </label>
                    <input type="text" class="form-control" name="Ket_Status_Pengiriman">
                    </div>



        <button class="btn btn-primary" name="ubah">Ubah </button>
      </form>
      </div>
          </div>
        </div>
      </div>
    </div>
<?php
          if(isset($_POST['ubah']))
          {
          $koneksi->query("UPDATE status_pengiriman set
          ID_Status_Pengiriman='$_POST[ID_Status_Pengiriman]',
          Ket_Status_Pengiriman='$_POST[Ket_Status_Pengiriman]'
          WHERE ID_Status_Pengiriman='$_GET[ID_Status_Pengiriman]'");
          
          echo "<script> alert('Data Status Pengiriman Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=status_pengiriman';</script>";
          }
          ?>
   </body>
</html>