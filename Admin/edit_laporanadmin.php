<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM admin WHERE Username='$_GET[(Username)]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Admin</title>
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
                        <label> Username </label>
                        <select class="form-control" name="Username" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM admin");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Username'] ?>" > <?php echo $pecah['Username'] ?>--<?php echo $pecah['Nama_Admin'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Username </label>
                    <input type="text" class="form-control" name="Username">
                    </div>

                    <div class="form-group">
                    <label> Password Admin </label>
                    <input type="text" class="form-control" name="Password_Admin">
                    </div>

                     <div class="form-group">
                    <label> Nama Admin </label>
                    <input type="text" class="form-control" name="Nama_Admin">
                    </div>

                    <div class="form-group">
                    <label> Level Admin </label>
                    <input type="text" class="form-control" name="Level_Admin">
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
          $koneksi->query("UPDATE admin set
          Username='$_POST[Username]',
          Password_Admin='$_POST[Password_Admin]',
          Nama_Admin='$_POST[Nama_Admin]',
          Level_Admin='$_POST[Level_Admin]'
          WHERE Username='$_GET[Username]'");
          
          echo "<script> alert('Data Laporan Admin Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=laporanadmin';</script>";
          }
          ?>
   </body>
</html>