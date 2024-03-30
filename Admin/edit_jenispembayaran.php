<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM jenis_pembayaran WHERE Kode_Jenis_Pembayaran='$_GET[Kode_Jenis_Pembayaran]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Jenis Pembayaran</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT JENIS PEMBAYARAN
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
                    <div class="form-group">
                        <label> Kode_Jenis_Pembayaran </label>
                        <select class="form-control" name="Kode_Jenis_Pembayaran" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM jenis_pembayaran");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Jenis_Pembayaran'] ?>" > <?php echo $pecah['Kode_Jenis_Pembayaran'] ?>--<?php echo $pecah['Nama_Jenis_Pembayaran'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Kode Jenis Pembayaran </label>
                    <input type="text" class="form-control" name="Kode_Jenis_Pembayaran">
                    </div>

                    <div class="form-group">
                    <label> Nama Jenis Pembayaran </label>
                    <input type="text" class="form-control" name="Nama_Jenis_Pembayaran">
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
          $koneksi->query("UPDATE jenis_pembayaran set
          Kode_Jenis_Pembayaran='$_POST[Kode_Jenis_Pembayaran]',
          Nama_Jenis_Pembayaran='$_POST[Nama_Jenis_Pembayaran]'
          WHERE Kode_Jenis_Pembayaran='$_GET[Kode_Jenis_Pembayaran]'");
          echo "<script> alert(' Data Jenis Pembayaran Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=jenis_pembayaran';</script>";
          }
          ?>
   </body>
</html>