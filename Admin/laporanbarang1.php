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
     if(isset($_GET['jenis'])){
      $jenis = $_GET['jenis'];
      $strc[] = "kelompok_barang.Kode_Jenis_Barang= '$jenis'";
      $jmlget++;
    }
    if(isset($_GET['penjual'])){
      $penjual = $_GET['penjual'];
      $strc[] = "barang.ID_Penjual= '$penjual'";
      $jmlget++;
    }
    if(isset($_GET['kota'])){
      $kota = $_GET['kota'];
      $strc[] = "penjual.ID_Kota_Penjual= '$kota'";
      $jmlget++;
    }
    if (isset($_POST['keyword']))
    {
        $Nama_Penjual=$_POST['keyword'];
        $strc[]="penjual.Nama_Penjual LIKE '%$Nama_Penjual%'";
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
              join jenis_barang on kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang join penjual on barang.ID_Penjual=penjual.ID_Penjual
        $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);
  
    $query_kelompok  = "SELECT * FROM kelompok_barang";
    $result_kelompok = mysqli_query($koneksi,$query_kelompok);

    $query_jenis  = "SELECT * FROM jenis_barang";
    $result_jenis = mysqli_query($koneksi,$query_jenis);
    
    $query_penjual = "SELECT * FROM penjual";
    $result_penjual = mysqli_query($koneksi,$query_penjual);

    $query_kota = "SELECT * FROM kota";
    $result_kota = mysqli_query($koneksi,$query_kota);
?>


      <!-- Content -->
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">LAPORAN BARANG TERLARIS BERDASARKAN SEMUANYA</h5></center>
                        </div>
                        </ol>

  <form class="form-inline" role="search" method="post" action="index.php?halaman=laporanbarang1">
                                    <div class="col-10">
                                    <table border="0">
                                    <tr>
                                        <td><div class="form-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Penjual" autofocus autocomplete="off"></input>
                                        <td><button class="btn btn-primary" name="cari"> Search For ... </button>
                                        </div>
                                    </tr>
                                    </table>
                                    </div>
                                </form>

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
      <label>  Jenis Barang  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="jenis" class="form-control">
                        <option selected disabled>-- JENIS BARANG-- </option>
                             <?php while($row = mysqli_fetch_assoc($result_jenis)) { ?>
                                <option value="<?php echo $row['Nama_Jenis_Barang']; ?>"> <?php echo $row['Nama_Jenis_Barang']; ?></option>
                             <?php } ?>
                        </select>
                      </div></div>

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

                <div class="col-md-3">
                <label>  Kota  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="kota" class="form-control">
                        <option selected disabled>-- KOTA -- </option>
                             <?php while($row = mysqli_fetch_assoc($result_kota)) { ?>
                                <option value="<?php echo $row['Nama_Kota']; ?>"> <?php echo $row['Nama_Kota']; ?></option>
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
    $ambil= mysqli_query ($koneksi,"SELECT *, sum(QTY_Barang) AS QTY FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
    JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
              
    where  (Tanggal_Faktur_Beli BETWEEN '$dt1' AND '$dt2') GROUP BY barang.Kode_Barang order by QTY desc limit 10");

}
if(!empty($_POST['kelompok']))
{
    $kelompok=$_POST['kelompok'];
    echo "<i><b>Informasi : </b> Pencarian berdasarkan $kelompok </i>";
    $ambil= mysqli_query ($koneksi,"SELECT *, sum(QTY_Barang) AS QTY FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
    JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
              
    where Nama_Kelompok_Barang= '$kelompok'  GROUP BY kelompok_barang.Kode_Kelompok_Barang order by QTY desc limit 10");
}
if(!empty($_POST['jenis']))
{
    $jenis=$_POST['jenis'];
    echo "<i><b>Informasi : </b> Pencarian berdasarkan $jenis </i>";
    $ambil= mysqli_query ($koneksi,"SELECT *, sum(QTY_Barang) AS QTY FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
    JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
              
    where Nama_Jenis_Barang= '$jenis' GROUP BY kelompok_barang.Kode_Kelompok_Barang order by QTY desc limit 10");
}
if(!empty($_POST['kota']))
{
    $kota=$_POST['kota'];
    echo "<i><b>Informasi : </b> Pencarian berdasarkan $kota </i>";
    $ambil= mysqli_query ($koneksi,"SELECT *, sum(QTY_Barang) AS QTY FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
    JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
              
    where Nama_Kota= '$kota'GROUP BY kota.ID_Kota order by QTY desc limit 10");
}
if(!empty($_POST['kelompok']) && !empty($dt1) && !empty($dt2))
{
    $kelompok=$_POST['kelompok'];
    $ambil= mysqli_query ($koneksi,"SELECT *, sum(QTY_Barang) AS QTY FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota 
    JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
              
    where (Tanggal_Faktur_Beli BETWEEN '$dt1' AND '$dt2' AND Nama_Kelompok_Barang= '$kelompok') 
    GROUP BY kelompok_barang.Kode_Kelompok_Barang order by QTY desc limit 10");
}
if(!empty($_POST['jenis']) && !empty($dt1) && !empty($dt2))
{
    $jenis=$_POST['jenis'];
    $ambil= mysqli_query ($koneksi,"SELECT *, sum(QTY_Barang) AS QTY FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
    JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
              
    where (Tanggal_Faktur_Beli BETWEEN '$dt1' AND '$dt2' AND Nama_Jenis_Barang= '$jenis') 
    GROUP BY kelompok_barang.Kode_Kelompok_Barang order by QTY desc limit 10");
}
if(!empty($_POST['kota']) && !empty($dt1) && !empty($dt2))
{
    $kota=$_POST['kota'];
    $ambil= mysqli_query ($koneksi,"SELECT *, sum(QTY_Barang) AS QTY FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
    JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
              
    where (Tanggal_Faktur_Beli BETWEEN '$dt1' AND '$dt2' AND Nama_Kota= '$kota') 
    GROUP BY kelompok_barang.Kode_Kelompok_Barang order by QTY desc limit 10");
}
if(!empty($_POST['jenis']) && !empty($_POST['kelompok']))
{
    echo "<div class='alert alert-info'>Pilih salah satu antara jenis dan kelompok barang!</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=laporanbarang1'>";
}
if(!empty($_POST['kota']) && !empty($dt1) && !empty($dt2) && !empty($_POST['jenis']))
{
    $kota=$_POST['kota'];
    $jenis=$_POST['jenis'];
    $ambil= mysqli_query ($koneksi,"SELECT *, sum(QTY_Barang) AS QTY FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
    JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
              
    where (Tanggal_Faktur_Beli BETWEEN '$dt1' AND '$dt2' AND Nama_Kota= '$kota' AND Nama_Jenis_Barang='$jenis') 
    GROUP BY barang.Kode_Barang order by QTY desc limit 10");
}
if(!empty($_POST['kota']) && !empty($dt1) && !empty($dt2) && !empty($_POST['kelompok']))
{
    $kota=$_POST['kota'];
    $kelompok=$_POST['kelompok'];
    $ambil= mysqli_query ($koneksi,"SELECT *, sum(QTY_Barang) AS QTY FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
    JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
              
    where (Tanggal_Faktur_Beli BETWEEN '$dt1' AND '$dt2' AND Nama_Kota= '$kota' AND Nama_Kelompok_Barang='$kelompok') 
    GROUP BY kelompok_barang.Kode_Kelompok_Barang order by QTY desc limit 10");
}
if(empty($_POST['jenis']) && empty($dt1) && empty($dt2) && empty($_POST['kelompok']) &&  empty($_POST['kota']))
{
    $ambil= mysqli_query ($koneksi,"SELECT *, sum(QTY_Barang) AS QTY FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
    JOIN faktur_beli on faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli GROUP BY barang.Kode_Barang order by QTY desc limit 10");
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
      <th>Jenis Barang</th>
      <th>Kelompok Barang</th>
      <th>Penjual</th>
      <th>Kota</th>
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
        <td><?php echo $row['Nama_Jenis_Barang']; ?> </td>
        <td><?php echo $row['Nama_Kelompok_Barang']; ?> </td>
        <td><?php echo $row['Nama_Penjual']; ?> </td>
        <td><?php echo $row['Nama_Kota']; ?> </td>
        <td><?php echo $row['QTY']; ?></td>
      </tr>
      <?php $total+=($row['QTY']);?>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="6"><center> Total </th>
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
           onclick="location.href='index.php?halaman=laporanbarang1'" data-toggle="tooltip" data-placement="top" title="Kembali">
          Kembal
          </button>
          </span>
      <?php endif ?>

  
  </div>
    </div>