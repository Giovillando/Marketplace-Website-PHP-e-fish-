<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM Kota WHERE ID_Kota='$_GET[ID_Kota]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Kota</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT KOTA
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
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
                    <label> Nama Kota Asal </label>
                    <input type="text" class="form-control" name="Nama_Kota">
                    </div>

                    <div class="form-group">
                    <label> ID Kota Asal </label>
                    <input type="text" class="form-control" name="ID_Kota">
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
                    <label> ID Kota Tujuan </label>
                    <input type="text" class="form-control" name="ID_Kota">
                    </div>

                    <div class="form-group">
                    <label> Nama Kota Tujuan </label>
                    <input type="text" class="form-control" name="Nama_Kota">
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
          $koneksi->query("UPDATE kota set
          ID_Kota='$_POST[ID_Kota]',
          Nama_Kota='$_POST[Nama_Kota]',
          ID_Kota='$_POST[ID_Kota]',
          Nama_Kota='$_POST[Nama_Kota]'
          WHERE ID_Kota='$_GET[ID_Kota]'");
          
          echo "<script> alert(' Data Kota Asal Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=kota_asal';</script>";
          }
          ?>
   </body>
</html>