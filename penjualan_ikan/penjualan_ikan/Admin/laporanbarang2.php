<?php

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="smart_farming";

$koneksi=mysqli_connect($db_host,$db_user,$db_pass,$db_name);


  $semuadata=array();
  $tgl_mulai = "-";
  $tgl_selesai = "-";
?>
<?php
$jenis ="";
$kelompok ="";
$penjual ="";
$kota ="";
$strw = "";
$jmlget =0;
 if(isset($_GET['kelompok'])){
      $kelompok = $_GET['kelompok'];
      $strc[] = "barang.Kode_Kelompok_Barang= '$kelompok'";
      $jmlget++;
    }
  
  $i = 1;
    if($jmlget > 0){
      $strw = "WHERE ";
      foreach($strc as $strs){
        $strw .= $strs;
        if($i < $jmlget){
          $strw .= " AND ";
          $i++;
        }
      }
    }
$query = "SELECT * FROM `barang`  
              join kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
        $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);
  
    $query_kelompok  = "SELECT * FROM kelompok_barang";
    $result_kelompok = mysqli_query($koneksi,$query_kelompok);
?>


      <!-- Content -->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">LAPORAN BARANG TERLARIS BERDASARKAN KELOMPOK BARANG</h5></center>
                        </div>
                        </ol>

    <form  method="POST">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Tanggal Mulai</label>
          <input type="date" class="form-control" name="tgl1">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>  Tanggal Selesai  </label>
          <input type="date" class="form-control" name="tgl2">
        </div>
      </div>

                       <div class="col-md-3">
        <label>  Kelompok Barang  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="kelompok" class="form-control">
                        <option selected disabled>-- KELOMPOK BARANG-- </option>
                             <?php while($row = mysqli_fetch_assoc($result_kelompok)) { ?>
                                <option value="<?php echo $row['Nama_Kelompok_Barang']; ?>"> <?php echo $row['Nama_Kelompok_Barang']; ?></option>
                             <?php } ?>
                        </select>
                      </div></div>
            
      
      <div class="col-md-2">
        <div class="form-group">
        <label>&nbsp; </label><br>
          <button  name="proses" class="btn btn-primary"><i class="fa fa-play-circle-o"></i> Lihat</button>
        </div>
      </div>
    </div>
  </form>
  
  <?php
    //proses jika sudah klik tombol pencarian data
    if(isset($_POST['proses']))
    {
      //menangkap nilai form
      $dt1=$_POST['tgl1'];
      $dt2=$_POST['tgl2'];

  if((!empty($dt1) && empty($dt2)) || (empty($dt1) && !empty($dt2)))
  {
    //jika data tanggal kosong
?>
  
      
<?php
    }
    else
    {
?>

  <br>
    <i>
      <b>Informasi : </b> 
        Hasil pencarian data berdasarkan periode Tanggal 
        <b>
          <?php echo $_POST['tgl1']?>
        </b> 
          s/d 
          <b>
            <?php echo $_POST['tgl2']?>
          </b>
    </i>
<br>
    
<?php
if(!empty($dt1) && !empty($dt2))
{
    $ambil= mysqli_query ($koneksi,"SELECT Nama_Barang, sum(QTY_Barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
     JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
              
    where  (Tanggal_Faktur_Beli BETWEEN '$dt1' AND '$dt2') GROUP BY kelompok_barang.Kode_Kelompok_Barang order by Jumlah desc limit 10");

}
if(!empty($_POST['kelompok']))
{
    $kelompok=$_POST['kelompok'];
    echo "<i><b>Informasi : </b> Pencarian berdasarkan $kelompok </i>";
    $ambil= mysqli_query ($koneksi,"SELECT Nama_Barang, sum(QTY_Barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
     JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
              
    where Nama_Kelompok_Barang= '$kelompok' GROUP BY kelompok_barang.Kode_Kelompok_Barang order by Jumlah desc limit 10");
}
if(!empty($_POST['kelompok']) && !empty($dt1) && !empty($dt2))
{
    $kelompok=$_POST['kelompok'];
    $ambil= mysqli_query ($koneksi,"SELECT Nama_Barang, sum(QTY_Barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
     JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
              
    where (Tanggal_Faktur_Beli BETWEEN '$dt1' AND '$dt2' AND Nama_Kelompok_Barang= '$kelompok') 
    GROUP BY kelompok_barang.Kode_Kelompok_Barang order by Jumlah desc limit 10");
}
if(empty($dt1) && empty($dt2) && empty($_POST['kelompok']))
{
    $ambil= mysqli_query ($koneksi,"SELECT Nama_Barang, sum(QTY_Barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang GROUP BY kelompok_barang.Kode_Kelompok_Barang order by Jumlah desc limit 10");
}
  }
?>

</p> 

  <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:olivedrab;">
                                    <thead>
      <tr>
      <th>No.</th>
      <th>Nama Barang</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php while($row=mysqli_fetch_array($ambil)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['Nama_Barang']; ?> </td>
        <td><?php echo $row['Jumlah']; ?></td>
      </tr>
      <?php $total+=($row['Jumlah']);?>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="2"><center> Total </th>
      <th><?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table>



    <table>
      <tr>
                <td colspan="8" align="center"> 
                <?php
                  //jika pencarian data tidak ditemukan
                  if(mysqli_num_rows($ambil)==0)
                  {
                    echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
                  }
              ?>
                </td>
            </tr> 
        </table>
<?php
    }
    else
    {
        unset($_POST['proses']);
    
    }
?>
<?php if (isset($_POST['proses'])): ?>
        <button  onclick="window.print()"  class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
        <span><button type="button" class="btn btn-success btn-rounded btn-fw" 
           onclick="location.href='index.php?halaman=laporanbarang2'" data-toggle="tooltip" data-placement="top" title="Kembali">
          Kembal
          </button>
          </span>
      <?php endif ?>

  
  </div>
    </div>