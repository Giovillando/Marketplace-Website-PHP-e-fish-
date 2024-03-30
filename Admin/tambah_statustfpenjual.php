<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Tambah Status Transfer Penjual</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              TAMBAH STATUS TRANSFER PENJUAL
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                
                    <div class="form-group">
                    <label> ID Status Status Transfer Penjual </label>
                    <input type="text" class="form-control" name="ID_Status_Transfer_Penjual">
                    </div>
                    
                    <div class="form-group">
                        <label> Keterangan Status Transfer_Penjual </label>
                        <input type="text" class="form-control" name="Ket_Status_Transfer_Penjual">
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
                    mysqli_query($koneksi,"INSERT INTO status_transfer_penjual(ID_Status_Transfer_Penjual, Ket_Status_Transfer_Penjual) VALUES ('$_POST[ID_Status_Transfer_Penjual]','$_POST[Ket_Status_Transfer_Penjual]')");
                    
                    echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
                    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=status_transfer_penjual'>";
                    }
         ?>

  </body>
</html>
