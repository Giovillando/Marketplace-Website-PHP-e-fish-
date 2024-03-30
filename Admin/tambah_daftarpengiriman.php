<?php
 include ('koneksi.php');
  // mengambil data daftar pengiriman dengan kode paling besar
  $query1 = mysqli_query($koneksi, "SELECT max(Kode_Daftar_Pengiriman) as kodeTerbesar FROM daftar_pengiriman");
  $data1 = mysqli_fetch_array($query1);
  $Kode_Daftar_Pengiriman = $data1['kodeTerbesar'];
 
  // mengambil angka dari kode daftar pengiriman terbesar, menggunakan fungsi substr
  // dan diubah ke integer dengan (int)
  $urutan = (int) substr($Kode_Daftar_Pengiriman, 3, 4);
 
  // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
  $urutan++;
 
  // membentuk kode daftar pengiriman baru
  // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
  // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
  // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
  $huruf = "DP";
  $Kode_Daftar_Pengiriman = $huruf . sprintf("%104s", $urutan);
  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Daftar Pengiriman</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH DAFTAR PENGIRIMAN
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                    <label> Kode Daftar Pengiriman </label>
                    <input type="text" class="form-control" name="Kode_Daftar_Pengiriman" required>
                    </div>                    

                    <div class="form-group">
                        <label>  Kota Asal </label>
                        <select class="form-control" name="ID_Kota_Asal" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM kota ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Kota'] ?>" > <?php echo $pecah['ID_Kota'] ?>--<?php echo $pecah['Nama_Kota'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> Kota Tujuan </label>
                        <select class="form-control" name="ID_Kota_Tujuan" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM kota ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Kota'] ?>" > <?php echo $pecah['ID_Kota'] ?>--<?php echo $pecah['Nama_Kota'] ?></option>
                        <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label> Kode Sistem Pengiriman </label>
                        <select class="form-control" name="Kode_Sistem_Pengiriman" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM sistem_pengiriman ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Sistem_Pengiriman'] ?>" > <?php echo $pecah['Kode_Sistem_Pengiriman'] ?>--<?php echo $pecah['Nama_Sistem_Pengiriman'] ?></option>
                        <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label> ID Kategori </label>
                        <select class="form-control" name="ID_Kategori" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM kategori ");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Kategori'] ?>" > <?php echo $pecah['ID_Kategori'] ?>--<?php echo $pecah['Nama_Kategori'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Tarif Pengiriman </label>
                    <input type="text" class="form-control" name="Tarif_Pengiriman" required>
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
    $koneksi->query("INSERT INTO daftar_pengiriman (Kode_Daftar_Pengiriman, ID_Kota_Asal, ID_Kota_Tujuan, Kode_Sistem_Pengiriman, ID_Kategori,Tarif_Pengiriman)
    VALUES ('$_POST[Kode_Daftar_Pengiriman]', '$_POST[ID_Kota_Asal]', '$_POST[ID_Kota_Tujuan]', '$_POST[Kode_Sistem_Pengiriman]','$_POST[ID_Kategori]','$_POST[Tarif_Pengiriman]')");
    
    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=daftar_pengiriman'>";

}
?>

  </body>
</html>