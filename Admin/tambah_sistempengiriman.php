<?php
include ('koneksi.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Sistem Pengiriman</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH SISTEM PENGIRIMAN
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                    <label> Kode Sistem Pengiriman </label>
                    <input type="text" class="form-control" name="Kode_Sistem_Pengiriman">
                    </div>                    

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
                    <label> Nama Sistem Pengiriman </label>
                    <input type="text" class="form-control" name="Nama_Sistem_Pengiriman">
                    </div>

                <button class="btn btn-primary" name="save"> SIMPAN </button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
if (isset ( $_POST['save']))
{
    $koneksi->query("INSERT INTO sistem_pengiriman (Kode_Sistem_Pengiriman, ID_Jasa_Kirim, Nama_Sistem_Pengiriman)
    VALUES ('$_POST[Kode_Sistem_Pengiriman]', '$_POST[ID_Jasa_Kirim]','$_POST[Nama_Sistem_Pengiriman]')");
    
    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=sistem_pengiriman'>";

}
?>

  </body>
</html>
