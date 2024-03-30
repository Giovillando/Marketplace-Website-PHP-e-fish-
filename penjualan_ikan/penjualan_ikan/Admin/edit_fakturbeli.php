<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM faktur_beli WHERE ID_Faktur_Beli='$_GET[ID_Faktur_Beli]'");
$pecah=$ambildata->fetch_assoc ();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Faktur Beli</title>
  </head>

     <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT FAKTUR BELI
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                

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
                    <label> ID Faktur Beli </label>
                    <input type="text" class="form-control" name="ID_Faktur_Beli">
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
                        <label> ID Pembeli </label>
                        <select class="form-control" name="ID_Pembeli" required>
                        <?php $ambildata=$koneksi->query("SELECT * FROM pembeli");?>
                        <?php while($pecah=$ambildata->fetch_assoc()){?>
                    <option value="<?php echo $pecah['ID_Pembeli'] ?>" > <?php echo $pecah['ID_Pembeli'] ?>--<?php echo $pecah['Nama_Pembeli'] ?></option>
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
                            <input type="text" class="form-control" placeholder="Total_Barang" aria-label="Total_Barang" name="Total_Barang" required>
                    </div>
           
                    <div class="form-group">
                    <label> Total Bayar </label>
                    <input type="text" class="form-control" name="Total_Bayar">
                    </div>

                    <div class="form-group">
                    <label> QTY </label>
                    <input type="text" class="form-control" name="QTY">
                    </div>

                    <div class="form-group">
                    <label> Tanggal </label>
                    <input type="date" class="form-control" name="Tanggal_Faktur_Beli">
                    </div>

                    <div class="form-group">
                    <label> Nomor Pembayaran </label>
                    <input type="text" class="form-control" name="No_Pembayaran">
                    </div>

                    <div class="form-group">
                    <label> Nomor Rekening </label>
                    <input type="text" class="form-control" name="No_Rekening">
                    </div>

	<button class="btn btn-primary" name="ubah">Ubah </button>
</form>
</div>
          </div>
        </div>
      </div>
    </div>
<?php
if(isset ($_POST['ubah']))
{
	
	$koneksi->query("UPDATE faktur_beli SET ID_Faktur_Beli='$_POST[ID_Faktur_Beli]', 
	ID_Jasa_Pembayaran='$_POST[ID_Jasa_Pembayaran]', 
	Kode_Diskon='$_POST[Kode_Diskon]', 
	ID_Pembeli='$_POST[ID_Pembeli]', 
	ID_Status_Pembayaran='$_POST[ID_Status_Pembayaran]',
    Total_Barang='$_POST[Total_Barang]',
    Total_Bayar='$_POST[Total_Bayar]',
    QTY='$_POST[QTY]', 
    Tanggal_Faktur_Beli='$_POST[Tanggal_Faktur_Beli]', 
    No_Pembayaran='$_POST[No_Pembayaran]',
    No_Rekening_Pembeli='$_POST[No_Rekening_Pembeli]' WHERE ID_Faktur_Beli='$_GET[ID_Faktur_Beli]'");
		
	echo "<script> alert(' Data Faktur Beli Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=faktur_beli';</script>";
}
?>
	 </body>
</html>