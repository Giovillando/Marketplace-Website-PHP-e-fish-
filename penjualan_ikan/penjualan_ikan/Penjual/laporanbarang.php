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
$strw = "";
$jmlget =0;
  
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
              join jenis_barang on kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang 
        $strw";
?>


<div class="container-fluid px-4">
                        <h3 class="mt-4">LAPORAN PRODUK TERLARIS</h3>
                        <h6><i><b>Penjual :</b><?php echo $_SESSION["Username_Penjual"]["Nama_Penjual"]?></i></h6>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?halaman=laporanbarang">Dashboard</a></li>
                            <li class="breadcrumb-item active">LAPORAN PRODUK TERLARIS</li>
                        </ol>
                <br>
                                <i><b><h5> Berdasarkan : </h5></b></i>
                <form method="post">
                <input type="radio" name="rekap3" value="barang"/> Barang
                <input type="radio" name="rekap1" value="kelompok"/> Kelompok Barang
                <input type="radio" name="rekap2" value="jenis"/> Jenis Barang

                    <div class="row">
      <div class="col-md-3"> 
        <div class="form-group">
          <label>Tanggal Mulai</label>
          <input type="date" class="form-control" name="tgl1" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label>  Tanggal Selesai  </label>
          <input type="date" class="form-control" name="tgl2" required>
        </div>
      </div>
      <div class="col-md-3">
                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary" value="lihat" name="l4"> Tampil </button>
                </div>
              </form></div></form>
 
                
<div class="table-responsive"> 
<?php 
if (isset ($_POST['l4'])and isset($_POST['rekap1']) and isset($_POST['tgl1']) and isset($_POST['tgl2'])){?>
      <?php $dt1=$_POST['tgl1'];
      $dt2=$_POST['tgl2'];
      $penjual = $_SESSION["Username_Penjual"]["Nama_Penjual"];
      echo "<b>Informasi : </b><i> Pencarian <b>kelompok barang</b> terlaris</i>";?>
<table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Nama Kelompok Barang</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil= mysqli_query ($koneksi,"SELECT Nama_Kelompok_Barang,sum(QTY_Barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.Kode_Faktur_Rinci=faktur_rinci.Kode_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
     where Nama_Penjual='$penjual' AND faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' GROUP BY kelompok_barang.Kode_Kelompok_Barang order by Jumlah desc limit 10");?>
      <?php while($row=mysqli_fetch_array($ambil)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['Nama_Kelompok_Barang']; ?> </td>
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
  </table><?php }; ?>




  <?php 
if (isset ($_POST['l4'])and isset($_POST['rekap2']) and isset($_POST['tgl1']) and isset($_POST['tgl2'])){?>
   <?php $dt1=$_POST['tgl1'];
         $dt2=$_POST['tgl2'];
         $penjual = $_SESSION["Username_Penjual"]["Nama_Penjual"];
         echo "<b>Informasi : <i></b> Pencarian <b>jenis barang</b> terlaris</i>";?>
<table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Nama Jenis Barang</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil= mysqli_query ($koneksi,"SELECT Nama_Jenis_Barang, sum(QTY_Barang) AS Jumlah FROM transaksi
       LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang 
       LEFT JOIN faktur_rinci ON transaksi.Kode_Faktur_Rinci=faktur_rinci.Kode_Faktur_Rinci
       JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
       JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    where Nama_Penjual='$penjual' AND faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' GROUP BY jenis_barang.Kode_Jenis_Barang order by Jumlah desc limit 10");?>
      <?php while($row=mysqli_fetch_array($ambil)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['Nama_Jenis_Barang']; ?> </td>
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
  </table><?php }; ?>



  <?php 
if (isset ($_POST['l4'])and isset($_POST['rekap3'])and isset($_POST['tgl1']) and isset($_POST['tgl2'])){?>
  <?php $dt1=$_POST['tgl1'];
         $dt2=$_POST['tgl2'];
         $penjual = $_SESSION["Username_Penjual"]["Nama_Penjual"];
         echo "<b>Informasi : </b><i>Pencarian <b>barang</b> terlaris</i> ";?>
<table table class="table table-bordered border-dark" >
    <thead class="bg-primary">
      <tr>
      <th>No.</th>
      <th>Nama Barang</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil= mysqli_query ($koneksi,"SELECT Nama_Barang,  sum(QTY_Barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.Kode_Faktur_Rinci=faktur_rinci.Kode_Faktur_Rinci
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    where Nama_Penjual='$penjual' AND faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' GROUP BY barang.Kode_Barang order by Jumlah desc limit 10");?>
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
  </table><?php }; ?>


<button  onclick="window.print()"  class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
        <span><button type="button" class="btn btn-success btn-rounded btn-fw" 
           onclick="location.href='index.php?halaman=rekapterlaris'" data-toggle="tooltip" data-placement="top" title="Kembali">
          Kembali
          </button>

</span></th></center></th></tr></tfoot></table></th></center></th></tr></tfoot></table></th></center></th></tr></tfoot></table></div></div>