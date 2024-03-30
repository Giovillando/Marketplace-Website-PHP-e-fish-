<?php
include ('koneksi.php');
 
    // mengambil data Faktur Rinci dengan kode paling besar
    $query1 = mysqli_query($koneksi, "SELECT max(ID_Faktur_Rinci) as kodeTerbesar FROM faktur_rinci");
    $data1 = mysqli_fetch_array($query1);
    $id_jasa_pembayaran = $data1['kodeTerbesar'];
 
    // mengambil angka dari kode Faktur Rinci terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($id_jasa_pembayaran, 5, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode Faktur Rinci baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "fr";
    $id_jasa_pembayaran = $huruf . sprintf("%03s", $urutan);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Faktur Rinci</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH FAKTUR RINCI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                    <label> ID Faktur Rinci </label>
                    <input type="text" class="form-control" name="ID_Faktur_Rinci" readonly value=<?php echo $id_jasa_pembayaran;?>>
                    </div>

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
                        <label> ID Status Pengiriman </label>
                        <select class="form-control" name="ID_Status_Pengiriman" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM status_pengiriman");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Status_Pengiriman'] ?>" > <?php echo $pecah['ID_Status_Pengiriman'] ?>--<?php echo $pecah['Ket_Status_Pengiriman'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Tanggal </label>
                    <input type="date" class="form-control" name="Tanggal">
                    </div>

                    <div class="form-group">
                        <label> Kode Daftar Pengiriman </label>
                        <select class="form-control" name="Kode_Daftar_Pengiriman" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM daftar_pengiriman");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['Kode_Daftar_Pengiriman'] ?>" > <?php echo $pecah['Kode_Daftar_Pengiriman'] ?>--<?php echo $pecah['Kode_Daftar_Pengiriman'] ?></option>
                        <?php } ?>
                        </select>
                    </div>         

                    <div class="form-group">
                        <label> ID Status Transfer Penjual </label>
                        <select class="form-control" name="ID_Status_Transfer_Penjual" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM status_transfer_penjual");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Status_Transfer_Penjual'] ?>" > <?php echo $pecah['ID_Status_Transfer_Penjual'] ?>--<?php echo $pecah['Ket_Status_Transfer_Penjual'] ?></option>
                        <?php } ?>
                        </select>
                    </div>         

                    <div class="form-group">
                        <label> ID Penjual </label>
                        <select class="form-control" name="ID_Penjual" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM penjual");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Penjual'] ?>" > <?php echo $pecah['ID_Penjual'] ?>--<?php echo $pecah['Nama_Penjual'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Transfer Uang Penjual </label>
                    <input type="text" class="form-control" name="Transfer_Uang_Penjual">
                    </div>

                    <div class="form-group">
                    <label> QTY Barang Per Toko </label>
                    <input type="text" class="form-control" name="QTY_Barang_Per_Toko">
                    </div>

                    <div class="form-group">
                    <label> Total Rinci </label>
                    <input type="text" class="form-control" name="Total_Rinci">
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
    $koneksi->query("INSERT INTO faktur_rinci (ID_Faktur_Rinci, ID_Faktur_Beli, ID_Status_Pengiriman, Tanggal, Kode_Daftar_Pengiriman,ID_Status_Transfer_Penjual, ID_Penjual, Transfer_Uang_Penjual, QTY_Barang_Per_Toko, Total_Rinci)
    VALUES ('$id_jasa_pembayaran','$_POST[ID_Faktur_Beli]', '$_POST[ID_Status_Pengiriman]','$_POST[Tanggal]' ,'$_POST[Kode_Daftar_Pengiriman]','$_POST[ID_Status_Transfer_Penjual]', '$_POST[ID_Penjual]','$_POST[Transfer_Uang_Penjual]' ,'$_POST[QTY_Barang_Per_Toko]','$_POST[Total_Rinci]')");
    
    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=faktur_rinci'>";

}
?>

  </body>
</html>
