<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM status_order WHERE ID_Status_Order='$_GET[ID_Status_Order]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Status Order</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT STATUS ORDER
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
                    <div class="form-group">
                        <label> ID Status Order </label>
                        <select class="form-control" name="ID_Status_Order" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM status_order");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Status_Order'] ?>" > <?php echo $pecah['ID_Status_Order'] ?>--<?php echo $pecah['Ket_Status_Order'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> ID Status Order </label>
                    <input type="text" class="form-control" name="ID_Status_Order">
                    </div>

                    <div class="form-group">
                    <label> Keterangan Status Order </label>
                    <input type="text" class="form-control" name="Ket_Status_Order">
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
          $koneksi->query("UPDATE status_order set
          ID_Status_Order='$_POST[ID_Status_Order]',
          Ket_Status_Order='$_POST[Ket_Status_Order]'
          WHERE ID_Status_Order='$_GET[ID_Status_Order]'");
          
          echo "<script> alert('Data Status Order Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=status_order';</script>";
          }
          ?>
   </body>
</html>