<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Jasa Kirim</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH JASA KIRIM
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                    <label> ID Jasa Kirim </label>
                    <input type="text" class="form-control" name="ID_Jasa_Kirim">
                    </div>
                    
                    <div class="form-group">
                        <label> Nama Jasa Kirim </label>
                        <input type="text" class="form-control" name="Nama_Jasa_Kirim">
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
                    mysqli_query($koneksi,"INSERT INTO jasa_kirim (ID_Jasa_Kirim, Nama_Jasa_Kirim) VALUES ('$_POST[ID_Jasa_Kirim]','$_POST[Nama_Jasa_Kirim]')");
                    
                    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jasa_kirim'>";
                    }
         ?>

  </body>
</html>
