<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM bank WHERE ID_Bank='$_GET[ID_Bank]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Bank</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT BANK
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
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
                    <label> ID_Bank </label>
                    <input type="text" class="form-control" name="ID_Bank">
                    </div>

                    <div class="form-group">
                    <label> Nama Bank </label>
                    <input type="text" class="form-control" name="Nama_Bank">
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
          $koneksi->query("UPDATE bank set
          ID_Bank='$_POST[ID_Bank]',
          Nama_Bank='$_POST[Nama_Bank]'
          WHERE ID_Bank='$_GET[ID_Bank]'");
          
          echo "<script> alert(' Data Bank Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=bank';</script>";
          }
          ?>
   </body>
</html>