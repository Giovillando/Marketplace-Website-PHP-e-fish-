<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Jenis Pembeli</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH JENIS PEMBELI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                    <label> Kode Jenis Pembeli </label>
                    <input type="text" class="form-control" name="Kode_Jenis_Pembeli">
                    </div>
                    
                    <div class="form-group">
                        <label> Nama Jenis Pembeli </label>
                        <input type="text" class="form-control" name="Nama_Jenis_Pembeli">
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
                    mysqli_query($koneksi,"INSERT INTO jenis_pembeli(Kode_Jenis_Pembeli, Nama_Jenis_Pembeli) VALUES ('$_POST[Kode_Jenis_Pembeli]','$_POST[Nama_Jenis_Pembeli]')");
                    
                    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jenis_pembeli'>";
                    }
         ?>

  </body>
</html>
