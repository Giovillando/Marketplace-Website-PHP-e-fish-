<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM kategori WHERE ID_Kategori='$_GET[ID_Kategori]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Jenis Kategori</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT JENIS KATEGORI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                                    
                    <div class="form-group">
                        <label> Kode Jenis Kategori </label>
                        <select class="form-control" name="ID_Kategori" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM kategori");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Kategori'] ?>" > <?php echo $pecah['ID_Kategori'] ?>--<?php echo $pecah['Nama_Kategori'] ?></option>
                        <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Kode Jenis Kategori </label>
                    <input type="text" class="form-control" name="Kode_Jenis_Kategori">
                    </div>

                    <div class="form-group">
                    <label> Nama Kategori </label>
                    <input type="text" class="form-control" name="Nama_Kategori">
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
          $koneksi->query("UPDATE kategori set
          ID_Kategori='$_POST[ID_Kategori]',
          Nama_Kategori='$_POST[Nama_Kategori]'
          WHERE ID_Kategori='$_GET[ID_Kategori]'");
          
          echo "<script> alert(' Data kategori Berhasil Diubah');</script>";
          echo "<script>location='index.php?halaman=kategori';</script>";
          }
          ?>
   </body>
</html>