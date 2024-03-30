<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM jasa_kirim WHERE ID_Jasa_Kirim='$_GET[ID_Jasa_Kirim]'");
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
                    <label> ID Jasa Kirim </label>
                    <input type="text" class="form-control" name="ID_Jasa_Kirim">
                    </div>

                    <div class="form-group">
                    <label> Nama Jasa Kirim </label>
                    <input type="text" class="form-control" name="Nama_Jasa_Kirim">
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
          $koneksi->query("UPDATE jasa_kirim set
          ID_Jasa_Kirim='$_POST[ID_Jasa_Kirim]',
          Nama_Jasa_Kirim='$_POST[Nama_Jasa_Kirim]'
          WHERE ID_Jasa_Kirim='$_GET[ID_Jasa_Kirim]'");
          
          echo "<script> alert('Data Jasa Kirim Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=jasa_kirim';</script>";
          }
          ?>
   </body>
</html>