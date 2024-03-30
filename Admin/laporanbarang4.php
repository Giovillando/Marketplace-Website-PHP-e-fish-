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
    if(isset($_GET['kota'])){
      $kota = $_GET['kota'];
      $strc[] = "penjual.ID_Kota_Penjual= '$kota'";
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
              join jenis_barang on kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang 
        $strw";
    $result=mysqli_query($koneksi,$query);
    $resnum = mysqli_num_rows($result);

    $query_kota = "SELECT * FROM kota";
    $result_kota = mysqli_query($koneksi,$query_kota);
?>


<div class="container-fluid px-4">
                        <h3 class="mt-4">LAPORAN KOTA DENGAN PENJUALAN TERBANYAK</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index2.php?halaman=laporanbarang2">Dashboard</a></li>
                            <li class="breadcrumb-item active">LAPORAN PRODUK TERLARIS</li>
                        </ol>
                <br>
                                <i><b><h5> Berdasarkan : </h5></b></i>
                <form method="post">
                <input type="radio" name="rekap3" value="barang"/> Barang
                <input type="radio" name="rekap1" value="kelompok"/> Kelompok Barang
                <input type="radio" name="rekap2" value="jenis"/> Jenis Barang
<br>
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
                <label>  Kota  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="kota" class="form-control">
                        <option selected disabled>-- KOTA -- </option>
                             <?php while($row = mysqli_fetch_assoc($result_kota)) { ?>
                                <option value="<?php echo $row['Nama_Kota']; ?>"> <?php echo $row['Nama_Kota']; ?></option>
                             <?php } ?>
                        </select>
                      </div></div>

                <div class="col-md-3">
                  <button type="submit" class="btn btn-primary" value="lihat" name="l4"> Tampil </button>
                </div>
              </form></div></form>

       <hr>         
<div class="table-responsive"> 
<?php 
if (isset ($_POST['l4'])and isset($_POST['rekap1']) and isset($_POST['tgl1']) and isset($_POST['tgl2'])){?>
      <?php $dt1=$_POST['tgl1'];
      $dt2=$_POST['tgl2'];
      $kota=$_POST['kota'];
      echo "<b>Informasi : </b><i> Pencarian <b>kelompok barang</b> terlaris berdasarkan $kota </i>";?>
<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:olivedrab;">
                                    <thead>
      <tr>
      <th><center>No.</th>
      <th><center>Nama Kelompok Barang</th>
      <th><center>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil= mysqli_query ($koneksi,"SELECT Nama_Kelompok_Barang,sum(QTY_barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
     where faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' GROUP BY barang.Kode_Barang order by Jumlah desc limit 10");?>
      <?php while($row=mysqli_fetch_array($ambil)){?>
      
      <tr>
        <td><center><?php echo $nomor; ?> </td>
        <td><center><?php echo $row['Nama_Kelompok_BarangK']; ?> </td>
        <td><center><?php echo $row['Jumlah']; ?></td>
      </tr>
      <?php $total+=($row['Jumlah']);?>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="2"><center> Total </th>
      <th><center><?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table><?php }; ?>




  <?php 
if (isset ($_POST['l4'])and isset($_POST['rekap2']) and isset($_POST['tgl1']) and isset($_POST['tgl2'])){?>
   <?php $dt1=$_POST['tgl1'];
         $dt2=$_POST['tgl2'];
         $kota=$_POST['kota'];
         echo "<b>Informasi : <i></b> Pencarian <b>jenis barang</b> terlaris berdasarkan $kota </i>";?>
<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:olivedrab;">
                                    <thead>
      <tr>
      <th><center>No.</th>
      <th><center>Nama Jenis Barang</th>
      <th><center>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil= mysqli_query ($koneksi,"SELECT Nama_Jenis_Barang,sum(QTY_barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
     where faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' GROUP BY barang.Kode_Barang order by Jumlah desc limit 10");?>
      <?php while($row=mysqli_fetch_array($ambil)){?>
      
      <tr>
        <td><center><?php echo $nomor; ?> </td>
        <td><center><?php echo $row['Nama_Jenis_Barang']; ?> </td>
        <td><center><?php echo $row['Jumlah']; ?></td>
      </tr>
      <?php $total+=($row['Jumlah']);?>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="2"><center> Total </th>
      <th><center><?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table><?php }; ?>



  <?php 
if (isset ($_POST['l4'])and isset($_POST['rekap3'])and isset($_POST['tgl1']) and isset($_POST['tgl2'])){?>
  <?php $dt1=$_POST['tgl1'];
         $dt2=$_POST['tgl2'];
         $kota=$_POST['kota'];
         echo "<b>Informasi : </b><i>Pencarian <b>barang</b> terlaris berdasarkan $kota </i>";?>
<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:olivedrab;">
                                    <thead>
      <tr>
      <th><center>No.</th>
      <th><center>Nama Barang</th>
      <th><center>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil= mysqli_query ($koneksi,"SELECT Nama_Barang,  sum(QTY_barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
     where faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' GROUP BY barang.Kode_Barang order by Jumlah desc limit 10");?>
      <?php while($row=mysqli_fetch_array($ambil)){?>
      
      <tr>
        <td><center><?php echo $nomor; ?> </td>
        <td><center><?php echo $row['Nama_Barang']; ?> </td>
        <td><center><?php echo $row['Jumlah']; ?></td>
      </tr>
      <?php $total+=($row['Jumlah']);?>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="2"><center> Total </th>
      <th><center><?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table><?php }; ?>

  <?php 
if (isset ($_POST['l4'])  and !isset($_POST['rekap1'])  and !isset($_POST['rekap2']) and !isset($_POST['rekap3'])and isset($_POST['tgl1']) and isset($_POST['tgl2'])){?>
  <?php $dt1=$_POST['tgl1'];
         $dt2=$_POST['tgl2'];
         $kota=$_POST['kota'];
         echo "<b>Informasi : </b><i>Pencarian <b>barang</b> terlaris berdasarkan $kota </i>";?>
<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:olivedrab;">
                                    <thead>
      <tr>
      <th><center>No.</th>
      <th><center>Nama Barang</th>
      <th><center>Kelompok Barang</th>
      <th><center>Jenis Barang</th>
      <th><center>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil= mysqli_query ($koneksi,"SELECT Nama_Barang,  sum(QTY_barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
     where faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' GROUP BY barang.Kode_Barang order by Jumlah desc limit 10");
    $ambil2= mysqli_query ($koneksi,"SELECT Nama_Kelompok_Barang,  sum(QTY_barang) AS Jumlah FROM transaksi 
    LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
    LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
    JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
    JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
    JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
     where faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' GROUP BY kelompok_barang.Kode_Jenis_Barang order by Jumlah desc limit 10");
     $ambil3= mysqli_query ($koneksi,"SELECT Nama_Jenis_Barang,  sum(QTY_barang) AS Jumlah FROM transaksi 
     LEFT JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang
     LEFT JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
     JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang
     JOIN jenis_barang On kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
     JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
     JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
      where faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' GROUP BY barang.Kode_Kelompok_Barang order by Jumlah desc limit 10");?>
      <?php while($row=mysqli_fetch_array($ambil) AND $row2=mysqli_fetch_array($ambil2) and $row3=mysqli_fetch_array($ambil3)){?>
      
      <tr>
        <td><center><?php echo $nomor; ?> </td>
        <td><center><?php echo $row['Nama_Barang']; ?> </td>
        <td><center><?php echo $row2['Nama_Kelompok_Barang']; ?> </td>
        <td><center><?php echo $row3['Nama_Jenis_Barang']; ?> </td>
        <td><center><?php echo $row['Jumlah']; ?></td>
      </tr>
      <?php $total+=($row['Jumlah']);?>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="4"><center> Total </th>
      <th><center><?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table><?php }; ?>

<button  onclick="window.print()"  class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
        <span><button type="button" class="btn btn-success btn-rounded btn-fw" 
           onclick="location.href='index2.php?halaman=laporanbarang2'" data-toggle="tooltip" data-placement="top" title="Kembali">
          Kembali
          </button>