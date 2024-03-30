<?php
include ('koneksi.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Penjual</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH PENJUAL
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                    <label> ID Penjual </label>
                    <input type="text" class="form-control" name="ID_Penjual">
                    </div>

                    <div class="form-group">
                    <label> Nama Penjual </label>
                    <input type="text" class="form-control" name="Nama_Penjual">
                    </div>

                    <div class="form-group">
                    <label> Username Penjual </label>
                    <input type="text" class="form-control" name="Username_Penjual">
                    </div>

                    <div class="form-group">
                    <label> Password Penjual </label>
                    <input type="text" class="form-control" name="Password_Penjual">
                    </div>          

                    <div class="form-group">
                    <label> Alamat Penjual </label>
                    <input type="text" class="form-control" name="Alamat_Penjual">
                    </div>         

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
                    <label> Nomor Rekening Penjual </label>
                    <input type="text" class="form-control" name="No_Rekening_Penjual">
                    </div>

                    <div class="form-group">
                    <label> Nomor Handphone Pembeli </label>
                    <input type="text" class="form-control" name="No_Handphone_Penjual">
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
    $koneksi->query("INSERT INTO penjual (ID_Penjual, Nama_Penjual, Username_Penjual, Password_Penjual,Alamat_Penjual, ID_Bank, No_Rekening_Penjual, No_Handphone_Penjual)
    VALUES ('$_POST[ID_Penjual]', '$_POST[Nama_Penjual]','$_POST[Username_Penjual]' ,'$_POST[Password_Penjual]','$_POST[Alamat_Penjual]', '$_POST[ID_Bank]','$_POST[No_Rekening_Penjual]' ,'$_POST[No_Handphone_Penjual]')");
    
    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penjual'>";

}
?>

  </body>
</html>
