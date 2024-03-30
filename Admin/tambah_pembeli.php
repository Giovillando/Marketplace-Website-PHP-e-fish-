<?php
include ('koneksi.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Pembeli</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH PEMBELI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                    <label> ID Pembeli </label>
                    <input type="text" class="form-control" name="ID_Pembeli">
                    </div>

                    <div class="form-group">
                    <label> Nama Pembeli </label>
                    <input type="text" class="form-control" name="Nama_Pembeli">
                    </div>

                    <div class="form-group">
                    <label> Alamat Pembeli </label>
                    <input type="text" class="form-control" name="Alamat_Pembeli">
                    </div>

                    <div class="form-group">
                    <label> Nomor Handphone Pembeli </label>
                    <input type="text" class="form-control" name="No_Handphone_Pembeli">
                    </div>                   

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
                    <label> Nomor Rekening Pembeli </label>
                    <input type="text" class="form-control" name="No_Rekening_Pembeli">
                    </div>

                    <div class="form-group">
                    <label> Username Pembeli </label>
                    <input type="text" class="form-control" name="Username_Pembeli">
                    </div>

                    <div class="form-group">
                    <label> Password Pembeli </label>
                    <input type="text" class="form-control" name="Password_Pembeli">
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
    $koneksi->query("INSERT INTO pembeli (ID_Pembeli, Nama_Pembeli, Alamat_Pembeli, No_Handphone_Pembeli,Kode_Jenis_Pembeli, No_Rekening_Pembeli, Username_Pembeli, Password_Pembeli)
    VALUES ('$_POST[ID_Pembeli]', '$_POST[Nama_Pembeli]','$_POST[Alamat_Pembeli]' ,'$_POST[No_Handphone_Pembeli]','$_POST[Kode_Jenis_Pembeli]', '$_POST[No_Rekening_Pembeli]','$_POST[Username_Pembeli]' ,'$_POST[Password_Pembeli]')");
    
    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pembeli'>";

}
?>

  </body>
</html>
