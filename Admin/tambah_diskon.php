<?php
include ('koneksi.php');
 
    // mengambil data Faktur Rinci dengan kode paling besar
    $query1 = mysqli_query($koneksi, "SELECT max(Kode_Diskon) as kodeTerbesar FROM diskon");
    $data1 = mysqli_fetch_array($query1);
    $id_jasa_pembayaran = $data1['kodeTerbesar'];
 
    // mengambil angka dari kode Faktur Rinci terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($id_jasa_pembayaran, 7, 2);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode Faktur Rinci baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "Diskon";
    $id_jasa_pembayaran = $huruf . sprintf("%03s", $urutan);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Diskon</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH DISKON
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                    <label> Kode Diskon </label>
                    <input type="text" class="form-control" name="Kode_Diskon" readonly value=<?php echo $id_jasa_pembayaran;?>>
                    </div>
                    
                    <div class="form-group">
                        <label> Jenis Diskon </label>
                        <input type="text" class="form-control" name="Jenis_Diskon">
                    </div>

                    <div class="form-group">
                        <label> Jumlah Diskon </label>
                        <input type="text" class="form-control" name="Jumlah_Diskon">
                    </div>
                    
                    <div class="form-group">
                    <label> Tanggal Diskon </label>
                    <input type="date" class="form-control" name="Tgl_Muncul">
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
                    include "koneksi.php";
                    if(isset($_POST['save'])){
                    mysqli_query($koneksi,"INSERT INTO diskon (Kode_Diskon, Jenis_Diskon, Jumlah_Diskon, Tgl_Muncul) VALUES ('$id_jasa_pembayaran','$_POST[Jenis_Diskon]',
                      '$_POST[Jumlah_Diskon]','$_POST[Tgl_Muncul]')");
                    
                    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=diskon'>";
                    }
         ?>

  </body>
</html>
