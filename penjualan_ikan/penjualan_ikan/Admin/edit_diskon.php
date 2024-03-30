<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM diskon WHERE Kode_Diskon='$_GET[Kode_Diskon]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Diskon</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT Diskon
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label> Kode Diskon </label>
                        <select class="form-control" name="Kode_Diskon" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM diskon");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Diskon'] ?>" > <?php echo $pecah['Kode_Diskon'] ?>--<?php echo $pecah['Jenis_Diskon'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                    <label> Kode Diskon </label>
                    <input type="text" class="form-control" name="Kode_Diskon">
                    </div>

                    <div class="form-group">
                    <label> Jenis Diskon </label>
                    <input type="text" class="form-control" name="Jenis_Diskon">
                    </div>

                    <div class="form-group">
                    <label> Jumlah Diskon </label>
                    <input type="text" class="form-control" name="Jumlah_Diskon">
                    </div>

                    <div class="form-group">
                    <label> Tanggal Diskon </label>
                    <input type="text" class="form-control" name="Tgl_Muncul">
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
          $koneksi->query("UPDATE diskon set
          Kode_Diskon='$_POST[Kode_Diskon]',
          Jenis_Diskon='$_POST[Jenis_Diskon]',
          Jumlah_Diskon='$_POST[Jumlah_Diskon]'
          WHERE Kode_Diskon='$_GET[Kode_Diskon]'");
          
          echo "<script> alert(' Data Diskon Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=diskon';</script>";
          }
          ?>
   </body>
</html>