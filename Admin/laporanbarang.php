<?php

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="smart_farming";

$koneksi=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

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
      $strc[] = "penjual.ID_Kota= '$kota'";
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
                        <h3 class="mt-4">LAPORAN BARANG TERLARIS BERDASARKAN KOTA</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php?halaman=laporan_barang_terlaris">Dashboard</a></li>
                            <li class="breadcrumb-item active">LAPORAN BARANG BERDASARKAN KOTA</li>
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
                  <button type="submit" class="btn btn-primary" value="lihat" name="l4"> Tampil </button>
                </div>
              </form></div></form>

                
<div class="table-responsive"> 
<?php 
if (isset ($_POST['l4']) and isset($_POST['rekap3']) and isset($_POST['tgl1']) and isset($_POST['tgl2'])){
    $dt1=$_POST['tgl1'];
    $dt2=$_POST['tgl2'];
    ?>

<table table class="table table-bordered border-dark" >
    <thead >
      <tr>
      <th>No.</th>
      <th>Nama Barang</th>
      <th>Nama Kota</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil1= mysqli_query ($koneksi,"SELECT Nama_Barang, Nama_Kota, SUM(transaksi.QTY_Barang) AS Jumlah FROM transaksi join barang on transaksi.Kode_Barang=barang.Kode_Barang Join faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci join kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual JOIN kota on penjual.ID_Kota = kota.ID_Kota JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang JOIN faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli JOIN status_pembayaran on faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran

                where faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' AND faktur_beli.ID_Status_Pembayaran='StatBayar02'  GROUP BY barang.id_penjual order by jumlah desc limit 10 ");?>
      <?php echo $kota; $ambil1 ; while($row=mysqli_fetch_array($ambil1)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['Nama_Barang']; ?> </td>
        <td><?php echo $row['Nama_Kota']; ?> </td>
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
<?php }
else if (isset ($_POST['l4']) and isset($_POST['rekap2']) and isset($_POST['tgl1']) and isset($_POST['tgl2']) and isset($_POST['rekap2'])){
    $dt1=$_POST['tgl1'];
    $dt2=$_POST['tgl2'];
    ?>

<table table class="table table-bordered border-dark" >
    <thead >
      <tr>
      <th>No.</th>
      <th>Nama Jenis Barang</th>
      <th>Nama Kota</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil1= mysqli_query ($koneksi,"SELECT Nama_Jenis_Barang, Nama_Kota, SUM(transaksi.QTY_Barang) AS Jumlah FROM transaksi join barang on transaksi.Kode_Barang=barang.Kode_Barang Join faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci join kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual JOIN kota on penjual.ID_Kota = kota.ID_Kota JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang JOIN faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli JOIN status_pembayaran on faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran 

                where faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' AND faktur_beli.ID_Status_Pembayaran='StatBayar02' GROUP BY barang.Kode_Barang order by Jumlah desc limit 10 ");?>
      <?php echo $kota; $ambil1 ; while($row=mysqli_fetch_array($ambil1)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['Nama_Jenis_Barang']; ?> </td>
        <td><?php echo $row['Nama_Kota']; ?> </td>
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
<?php }
else if (isset ($_POST['l4']) and isset($_POST['rekap2']) and isset($_POST['tgl1']) and isset($_POST['tgl2']) and isset($_POST['rekap1'])){
    $dt1=$_POST['tgl1'];
    $dt2=$_POST['tgl2'];
    ?>

<table table class="table table-bordered border-dark" >
    <thead >
      <tr>
      <th>No.</th>
      <th>Nama Jenis Barang</th>
      <th>Nama Kota</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil1= mysqli_query ($koneksi,"SELECT Nama_Jenis_Barang, Nama_Kota, SUM(transaksi.QTY_Barang) AS Jumlah FROM transaksi join barang on transaksi.Kode_Barang=barang.Kode_Barang Join faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci join kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual JOIN kota on penjual.ID_Kota= kota.ID_Kota JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang JOIN faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli JOIN status_pembayaran on faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran 

                where faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' AND faktur_beli.ID_Status_Pembayaran='StatBayar02\\' GROUP BY jenis_barang.Kode_Jenis_Barang order by jumlah desc limit 10 ");?>
      <?php echo $kota; $ambil1 ; while($row=mysqli_fetch_array($ambil1)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['Nama_Jenis_Barang']; ?> </td>
        <td><?php echo $row['Nama_Kota']; ?> </td>
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
<?php }
else if (isset ($_POST['l4']) and isset($_POST['rekap1']) and isset($_POST['tgl1']) and isset($_POST['tgl2']) and isset($_POST['rekap1'])){
    $dt1=$_POST['tgl1'];
    $dt2=$_POST['tgl2'];
    ?>

<table table class="table table-bordered border-dark" >
    <thead >
      <tr>
      <th>No.</th>
      <th>Nama Kelompok Barang</th>
      <th>Nama Kota</th>
      <th>Jumlah Terjual</th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $ambil1= mysqli_query ($koneksi,"SELECT Nama_Kelompok_Barang, Nama_Kota, SUM(transaksi.QTY_Barang) AS Jumlah FROM transaksi join barang on transaksi.Kode_Barang=barang.Kode_Barang Join faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci join kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual JOIN kota on penjual.ID_Kota = kota.ID_Kota JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang JOIN faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli JOIN status_pembayaran on faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran 

                where faktur_rinci.Tanggal BETWEEN '$dt1' AND '$dt2' AND faktur_beli.ID_Status_Pembayaran='StatBayar02' GROUP BY kelompok_barang.Kode_Kelompok_Barang order by jumlah desc limit 10 ");?>
      <?php echo $kota; $ambil1 ; while($row=mysqli_fetch_array($ambil1)){?>
      
      <tr>
        <td><?php echo $nomor; ?> </td>
        <td><?php echo $row['Nama_Kelompok_Barang']; ?> </td>
        <td><?php echo $row['Nama_Kota']; ?> </td>
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
  </table> <?php } ?>

<button  onclick="window.print()"  class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
        <span><button type="button" class="btn btn-success btn-rounded btn-fw" 
           onclick="location.href='index.php?halaman=laporanbarang'" data-toggle="tooltip" data-placement="top" title="Kembali">
          Kembali
          </button>