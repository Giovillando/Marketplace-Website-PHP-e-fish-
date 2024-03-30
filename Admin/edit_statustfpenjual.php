<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM status_transfer_penjual WHERE ID_Status_Transfer_Penjual='$_GET[ID_Status_Transfer_Penjual]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Status Transfer Penjual</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT STATUS TRANSFER PENJUAL
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
                    <div class="form-group">
                        <label> ID Status Transfer_Penjual </label>
                        <select class="form-control" name="ID_Status_Transfer_Penjual" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM status_transfer_penjual");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Status_Transfer_Penjual'] ?>" > <?php echo $pecah['ID_Status_Transfer_Penjual'] ?>--<?php echo $pecah['Ket_Status_Transfer_Penjual'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> ID Status Transfer_Penjual </label>
                    <input type="text" class="form-control" name="ID_Status_Transfer_Penjual">
                    </div>

                    <div class="form-group">
                    <label> Keterangan Status Transfer_Penjual </label>
                    <input type="text" class="form-control" name="Ket_Status_Transfer_Penjual">
                    </div>


                    <div class="form-group">
                    <label> Total Transfer Penjual </label>
                    <input type="text" class="form-control" name="Total_Transfer_Penjual">
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
          $koneksi->query("UPDATE status_Transfer_Penjual set
          ID_Status_Transfer_Penjual='$_POST[ID_Status_Transfer_Penjual]',
          Ket_Status_Transfer_Penjual='$_POST[Ket_Status_Transfer_Penjual]',
          Total_Transfer_Penjual='$_POST[Total_Transfer_Penjual]'
          WHERE ID_Status_Transfer_Penjual='$_GET[ID_Status_Transfer_Penjual]'");
          
          echo "<script> alert('Data Status Transfer Penjual Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=status_transfer_penjual';</script>";
          }
          ?>
   </body>
</html>