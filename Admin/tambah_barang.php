<?php
include ('koneksi.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Barang</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH BARANG
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                    <label> Kode Barang </label>
                    <input type="text" class="form-control" name="Kode_Barang">
                    </div>

                    <div class="form-group">
                    <label> Tanggal Barang Masuk</label>
                    <input type="date" class="form-control" name="Tanggal_Barang_Masuk">
                    </div>
                    
                    <div class="form-group">
                        <label> Nama Barang </label>
                        <input type="text" class="form-control" name="Nama_Barang">
                    </div>
                    
                    <div class="form-group">
                        <label> Kelompok Barang</label>
                        <select class="form-control" name="Kode_Kelompok_Barang" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM kelompok_barang ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Kelompok_Barang'] ?>" > <?php echo $pecah['Kode_Kelompok_Barang'] ?>-<?php echo $pecah['Nama_Kelompok_Barang'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label> Foto Barang </label>
                        <input type="file" class="form-control" name="Foto_Barang">
                    </div>

                    <div class="form-group">
                        <label> Deskripsi Barang </label>
                        <input type="text" class="form-control" name="Deskripsi_Barang">
                    </div>

                    <div class="form-group">
                        <label> Berat Barang </label>
                        <input type="text" class="form-control" name="Berat_Barang">
                    </div>

                    <div class="form-group">
                        <label> Stok Barang </label>
                        <input type="text" class="form-control" name="Stok_Barang">
                    </div>

                    <div class="form-group">
                        <label> Harga Barang </label>
                        <input type="text" class="form-control" name="Harga_Barang">
                    </div>

                    <div class="form-group">
                        <label> Id Penjual</label>
                        <select class="form-control" name="ID_Penjual" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM penjual ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Penjual'] ?>" > <?php echo $pecah['ID_Penjual'] ?>--<?php echo $pecah['Nama_Penjual'] ?></option>
                        <?php } ?>
                        </select>
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
    $Foto_Barang=$_FILES['Foto_Barang']['name'];
    $lokasifoto=$_FILES['Foto_Barang']['tmp_name'];
    move_uploaded_file($lokasifoto, "img/$Foto_Barang");
    $koneksi->query("INSERT INTO barang (Kode_Barang, Tanggal_Barang_Masuk, Nama_Barang, Kode_Kelompok_Barang, Foto_Barang, Deskripsi_Barang, Berat_Barang, Stok_Barang,Harga_Barang, ID_Penjual)
    VALUES ('$_POST[Kode_Barang]', '$_POST[Tanggal_Barang_Masuk]',
    '$_POST[Nama_Barang]',
    '$_POST[Kode_Kelompok_Barang]', '$Foto_Barang', 
    '$_POST[Deskripsi_Barang]','$_POST[Berat_Barang]',
    '$_POST[Stok_Barang]',
    '$_POST[Harga_Barang]',
    '$_POST[ID_Penjual]')");
    
    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=Barang'>";

}
?>

  </body>
</html>
