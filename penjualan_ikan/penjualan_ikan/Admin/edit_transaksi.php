<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM transaksi JOIN faktur_beli ON transaksi.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli JOIN barang ON transaksi.Kode_Barang=barang.Kode_Barang");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Transaksi</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT TRANSAKSI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
                    <div class="form-group">
                        <label> ID Faktur Beli </label>
                        <select class="form-control" name="ID_Faktur_Beli" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM faktur_beli");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Faktur_Beli'] ?>" > <?php echo $pecah['ID_Faktur_Beli'] ?>--<?php echo $pecah['ID_Faktur_Beli'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> Kode Barang </label>
                        <select class="form-control" name="Kode_Barang" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM barang");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Barang'] ?>" > <?php echo $pecah['Kode_Barang'] ?>--<?php echo $pecah['Nama_Barang'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> QTY Barang </label>
                    <input type="text" class="form-control" name="QTY_Barang" required>
                    </div>

                    <div class="form-group">
                    <label> Sub Total Barang </label>
                    <input type="text" class="form-control" name="Sub_Total_Barang" required>
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
          $koneksi->query("UPDATE SET transaksi (ID_Faktur_Beli,Kode_Barang,QTY_Barang,Sub_Total_Barang)
    VALUES ('$_POST[ID_Faktur_Beli]', '$_POST[Kode_Barang]','$_POST[QTY_Barang]' ,'$_POST[Sub_Total_Barang]')");
    
          echo "<script> alert('Data Transaksi Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=transaksi';</script>";
          }
          ?>
   </body>
</html>