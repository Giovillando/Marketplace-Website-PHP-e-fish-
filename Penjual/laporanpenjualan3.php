<?php 
$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai = "-";
if(isset($_POST["proses"]))
{
  $tgl_mulai=$_POST["tgl1"];
  $tgl_selesai=$_POST["tgl2"];
  $penjual = $_SESSION["Username_Penjual"]["Nama_Penjual"];
   $ambil=$koneksi->query("SELECT *, sum(transaksi.QTY_Barang) AS total_transaksi FROM transaksi INNER JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang Join penjual on barang.ID_Penjual=penjual.ID_Penjual  JOIN kelompok_barang on barang.Kode_Kelompok_Barang = kelompok_barang.Kode_Kelompok_Barang JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang WHERE Nama_Penjual='$penjual' AND faktur_rinci.Tanggal BETWEEN '$tgl_mulai' AND'$tgl_selesai'");
  while($pecah = $ambil->fetch_assoc())
  {
    $semuadata[]=$pecah;
  }
}
?>

<div class="container-fluid px-4">
<center><h3> Laporan Barang Berdasarkan Penjualan </h3>
</center><hr>
  <form method="post">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label> Dari Tanggal </label>
          <input type="date" class="form-control" name="tgl1" value="<?php echo $tgl_mulai?>">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label> Sampai Tanggal </label>
          <input type="date" class="form-control" name="tgl2" value="<?php echo $tgl_selesai?>">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label>Barang</label>
          <select class="form-control" name="Kode_Barang">
            <option value="barang">--Pilih Barang--</option>
            <?php $ambil=$koneksi->query("SELECT * FROM barang ");
                while($percabangbank=$ambil->fetch_assoc()){?>
                <option value="<?php echo $percabangbank['Nama_Barang']; ?>"><?php echo $percabangbank['Nama_Barang'];?>
                </option>
              <?php }?>
          </select>
        </div>
      </div>
      <div class="col-md-1">
        <div class="form-group">
        <label>&nbsp; </label><br>
          <button  name="proses" class="btn btn-primary"><i class="fa fa-play-circle-o"></i>Lihat</button>
        </div>
      </div>  
    </div>
  </form>
    <i>
      <b>Informasi : </b> 
        Hasil pencarian data berdasarkan periode Tanggal 
        <b>
          <?php echo $tgl_mulai?>
        </b> 
          s/d 
        <b>
          <?php echo $tgl_selesai?>
        </b>
    </i>
  <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:rebeccapurple;">
                                    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah Terjual</th>
        </tr>
    </thead>
    <tbody>

<?php
    //proses jika sudah klik tombol pencarian data
    if(isset($_POST['proses']))
    {
      //menangkap nilai form
      $dt1=$_POST['tgl1'];
      $dt2=$_POST['tgl2'];
      $Kode_Barang=$_POST['Kode_Barang'];
      $penjual = $_SESSION["Username_Penjual"]["Nama_Penjual"];
  if(empty($dt1) || empty($dt2))
  {
    //jika data tanggal kosong
?>
  <script language="JavaScript">
        alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
        document.location='index.php?halaman=laporanpenjualan3';
    </script> 

<?php
    }
    else
    {
?>
  <br>
<?php
$penjual = $_SESSION["Username_Penjual"]["Nama_Penjual"];
   $ambil=mysqli_query($koneksi,"SELECT *, sum(transaksi.QTY_Barang) AS total_transaksi FROM transaksi INNER JOIN barang ON transaksi.Kode_Barang = barang.Kode_Barang JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci JOIN kelompok_barang on barang.Kode_Kelompok_Barang = kelompok_barang.Kode_Kelompok_Barang  Join penjual on barang.ID_Penjual=penjual.ID_Penjual
    JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang WHERE Nama_Penjual='$penjual' AND Nama_Barang='$_POST[Kode_Barang]' AND faktur_rinci.Tanggal BETWEEN '$dt1' AND'$dt2' GROUP BY  penjual.ID_Penjual ORDER BY QTY_Barang DESC LIMIT 5");
  }
?>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php while($pecah=mysqli_fetch_array($ambil)){?>     
          <tr>
            <td><?php echo $nomor;?></td>
            <td><?php echo $pecah['Nama_Penjual'];?></td>  
            <td><?php echo $pecah['total_transaksi'];?> </td>
          </tr>
          <?php $total+=$pecah['total_transaksi'];?>
          <?php $nomor++ ?>
          <?php } ?>
          <tfoot>
    <tr>
      <th colspan="2"><center> Total </th>
      <th><?php echo number_format( $total)?>
    </tr>
    </tfoot>
      </tbody>
    </table>
  <?php if (isset($_POST['proses'])): ?>
      <?php endif ?>  
    <tr>
            <td colspan="4" align="center"> 
            <?php
              //jika pencarian data tidak ditemukan
              if(mysqli_num_rows($ambil)==0)
              {
               echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
              }
          ?>
            </td>
        </tr> 
<?php
    }
    else
    {
        unset($_POST['proses']);
    }
?>