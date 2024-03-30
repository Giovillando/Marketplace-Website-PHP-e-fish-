<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM jenis_pembeli WHERE Kode_Jenis_Pembeli='$_GET[Kode_Jenis_Pembeli]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Jenis Pembeli</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT JENIS PEMBELI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
                    <div class="form-group">
                        <label> Kode Jenis Pembeli </label>
                        <select class="form-control" name="Kode_Jenis_Pembeli" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM jenis_pembeli");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Jenis_Pembeli'] ?>" > <?php echo $pecah['Kode_Jenis_Pembeli'] ?>--<?php echo $pecah['Nama_Jenis_Pembeli'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Kode Jenis Pembeli </label>
                    <input type="text" class="form-control" name="Kode_Jenis_Pembeli">
                    </div>


                    <div class="form-group">
                    <label> Nama Jenis Pembeli </label>
                    <input type="text" class="form-control" name="Nama_Jenis_Pembeli">
                    </div>

                    <div class="form-group">
                    <label> Total Potongan </label>
                    <input type="text" class="form-control" name="Total_Potongan">
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
          $koneksi->query("UPDATE jenis_Pembeli set
          Kode_Jenis_Pembeli='$_POST[Kode_Jenis_Pembeli]',
          Nama_Jenis_Pembeli='$_POST[Nama_Jenis_Pembeli]',
          Total_Potongan='$_POST[Total_Potongan]'
          WHERE Kode_Jenis_Pembeli='$_GET[Kode_Jenis_Pembeli]'");
          
          echo "<script> alert(' Data Jenis Pembeli Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=jenis_pembeli';</script>";
          }
          ?>
   </body>
</html>