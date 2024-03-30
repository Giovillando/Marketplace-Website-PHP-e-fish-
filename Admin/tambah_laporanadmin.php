<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Admin</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH ADMIN
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                    <label> Nama Admin </label>
                    <input type="text" class="form-control" name="Admin">
                    </div>
                    
                    <div class="form-group">
                        <label> Username </label>
                        <input type="text" class="form-control" name="Username">
                    </div>

                    <div class="form-group">
                    <label> Password Admin </label>
                    <input type="text" class="form-control" name="Password_Admin">
                    </div>
                    
                    <div class="form-group">
                        <label> Level Admin </label>
                        <input type="text" class="form-control" name="Level_Admin">
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
                    mysqli_query($koneksi,"INSERT INTO admin(Nama_Admin, Username,Password_Admin, Level_Admin) VALUES ('$_POST[Nama_Admin]','$_POST[Username]','$_POST[Password_Admin]','$_POST[Level_Admin]')");
                    
                    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=laporanadmin'>";
                    }
         ?>

  </body>
</html>
