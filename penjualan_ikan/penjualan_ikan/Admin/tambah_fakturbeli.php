<?php
include ('koneksi.php');
 
    // mengambil data Faktur Rinci dengan kode paling besar
    $query1 = mysqli_query($koneksi, "SELECT max(ID_Faktur_Beli) as kodeTerbesar FROM faktur_beli");
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
    $huruf = "fb";
    $id_jasa_pembayaran = $huruf . sprintf("%03s", $urutan);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Faktur Beli</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH FAKTUR BELI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                   

                    <div class="form-group">
                    <label> ID Faktur Beli </label>
                    <input type="text" class="form-control" name="ID_Faktur_Beli" readonly value=<?php echo $id_jasa_pembayaran;?>>
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
                        <label> ID Jasa Pembayaran </label>
                        <select class="form-control" name="ID_Jasa_Pembayaran" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM jasa_pembayaran");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Jasa_Pembayaran'] ?>" > <?php echo $pecah['ID_Jasa_Pembayaran'] ?>--<?php echo $pecah['Nama_Jasa_Pembayaran'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

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
                        <label> ID Pembeli </label>
                        <select class="form-control" name="ID_Pembeli" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM pembeli");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Pembeli'] ?>" > <?php echo $pecah['ID_Pembeli'] ?>--<?php echo $pecah['Nama_Pembeli'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> ID Status Order </label>
                        <select class="form-control" name="ID_Status_Order" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM status_order");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Status_Order'] ?>" > <?php echo $pecah['ID_Status_Order'] ?>--<?php echo $pecah['Ket_Status_Order'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label> ID Status Pembayaran </label>
                        <select class="form-control" name="ID_Status_Pembayaran" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM status_pembayaran");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Status_Pembayaran'] ?>" > <?php echo $pecah['ID_Status_Pembayaran'] ?>--<?php echo $pecah['Ket_Status_Pembayaran'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Total Barang </label>
                    <input type="text" class="form-control" name="Total_Barang">
                    </div>
           
                    <div class="form-group">
                    <label> Total Bayar </label>
                    <input type="text" class="form-control" name="Total_Bayar">
                    </div>

                    <div class="form-group">
                    <label> QTY  </label>
                    <input type="text" class="form-control" name="QTY">
                    </div>

                    <div class="form-group">
                    <label> Tanggal Faktur Beli </label>
                    <input type="date" class="form-control" name="Tanggal_Faktur_Beli">
                    </div>

                    <div class="form-group">
                    <label> Nomor Pembayaran </label>
                    <input type="text" class="form-control" name="No_Pembayaran">
                    </div>

                    <div class="form-group">
                    <label> Nomor Rekening </label>
                    <input type="text" class="form-control" name="No_Rekening_Pembeli">
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
    $koneksi->query("INSERT INTO faktur_Beli (ID_Faktur_Beli,ID_Penjual, ID_Jasa_Pembayaran, Kode_Diskon,ID_Pembeli, ID_Status_Order, ID_Status_Pembayaran, Total_Barang, Total_Bayar, QTY, Tanggal_Faktur_Beli, No_Pembayaran, No_Rekening_Pembeli)
    VALUES ('$id_jasa_pembayaran','$_POST[ID_Penjual]','$_POST[ID_Jasa_Pembayaran]' ,'$_POST[Kode_Diskon]','$_POST[ID_Pembeli]', '$_POST[ID_Status_Order]','$_POST[ID_Status_Pembayaran]' ,'$_POST[Total_Barang]','$_POST[Total_Bayar]','$_POST[QTY]','$_POST[Tanggal_Faktur_Beli]','$_POST[No_Pembayaran]','$_POST[No_Rekening_Pembeli]')");
    
    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=faktur_beli'>";

}
?>

  </body>
</html>
