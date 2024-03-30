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
$stok="";
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
  
    $query_kelompok  = "SELECT * FROM kelompok_barang";
    $result_kelompok = mysqli_query($koneksi,$query_kelompok);

    $query_jenis  = "SELECT * FROM jenis_barang";
    $result_jenis = mysqli_query($koneksi,$query_jenis);

?>


      <!-- Content -->
             <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">LAPORAN STOK BARANG</h5></center>
                           <h6><i><b>Penjual :</b><?php echo $_SESSION["Username_Penjual"]["Nama_Penjual"]?></i></h6>
                        </div>
<br><br>
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
      <label>  Stok Barang  </label>
                <div class="products-sort-by mt-2 mt-lg-0" width="15">
                      <select name="stok" class="form-control">
                      <option selected disabled>-- STOK BARANG-- </option>
                      <option value="100">>50</option>
                      <option value="50">21-50</option>
                      <option value="20">1-20</option>
                      <option value="Habis">stok habis</option>
                      <option value="semua">semua</option>
                        </select>
                      </div></div>
      
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
      $penjual = $_SESSION["Username_Penjual"]["Nama_Penjual"];
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
if(!empty($_POST['stok']) && $_POST['stok']=="semua")
{
    $ambil=$koneksi->query("SELECT * FROM barang 
      JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
      JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang 
      JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang = jenis_barang.Kode_Jenis_Barang
      JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota 
      
      WHERE Nama_Penjual='$penjual'GROUP BY barang.Kode_Barang ");
}
if(!empty($_POST['stok']) && $_POST['stok']=="100")
{
    $ambil=$koneksi->query("SELECT * FROM barang 
      JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
      JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang 
      JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang = jenis_barang.Kode_Jenis_Barang
      JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota 
      
      WHERE Nama_Penjual='$penjual' AND Stok_Barang>51 GROUP BY barang.Kode_Barang ");
}
if(!empty($_POST['stok']) && $_POST['stok']=="50")
{
    $ambil=$koneksi->query("SELECT * FROM barang 
      JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
      JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang 
      JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang = jenis_barang.Kode_Jenis_Barang
      JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota 
      
      WHERE Nama_Penjual='$penjual' AND Stok_Barang>21 AND Stok_Barang<50 GROUP BY barang.Kode_Barang ");
}
if(!empty($_POST['stok']) && $_POST['stok']=="20")
{
    $ambil=$koneksi->query("SELECT * FROM barang 
      JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
      JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang 
      JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang = jenis_barang.Kode_Jenis_Barang
      JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota 
      
      WHERE Nama_Penjual='$penjual' AND Stok_Barang>1 AND Stok_Barang<20 GROUP BY barang.Kode_Barang ");
}
if(!empty($_POST['stok']) && $_POST['stok']=="Habis")
{
    $ambil=$koneksi->query("SELECT * FROM barang 
      JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
      JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang 
      JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang = jenis_barang.Kode_Jenis_Barang
      JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota 
      
      WHERE Nama_Penjual='$penjual' AND Stok_Barang<=0 GROUP BY barang.Kode_Barang ");
}
if(!empty($dt1) && !empty($dt2))
{
    $ambil= mysqli_query ($koneksi,"SELECT * FROM barang 
      JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
      JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang 
      JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang = jenis_barang.Kode_Jenis_Barang
      JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
              
    where  (Nama_Penjual='$penjual' AND  Tgl_Barang_Masuk BETWEEN '$dt1' AND '$dt2') GROUP BY barang.Kode_Barang ");

}
if(!empty($_POST['kelompok']))
{
    $kelompok=$_POST['kelompok'];
    echo "<i><b>Informasi : </b> Pencarian berdasarkan $kelompok </i>";
    $ambil= mysqli_query ($koneksi,"SELECT * FROM barang 
      JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
      JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang 
      JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang = jenis_barang.Kode_Jenis_Barang
      JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
              
    where Nama_Penjual='$penjual' AND  Nama_Kelompok_Barang= '$kelompok' GROUP BY kelompok_barang.Kode_Kelompok_Barang ");
}
if(!empty($_POST['jenis']))
{
    $jenis=$_POST['jenis'];
    echo "<i><b>Informasi : </b> Pencarian berdasarkan $jenis </i>";
    $ambil= mysqli_query ($koneksi,"SELECT * FROM barang 
      JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
      JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang 
      JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang = jenis_barang.Kode_Jenis_Barang
      JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
              
    where Nama_Penjual='$penjual' AND Nama_Jenis_Barang= '$jenis' GROUP BY kelompok_barang.Kode_Kelompok_Barang ");
}
if(!empty($_POST['kelompok']) && !empty($dt1) && !empty($dt2))
{
    $kelompok=$_POST['kelompok'];
    $ambil= mysqli_query ($koneksi,"SELECT * FROM barang 
      JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
      JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang 
      JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang = jenis_barang.Kode_Jenis_Barang
      JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota

    where (Nama_Penjual='$penjual' AND Tgl_Barang_Masuk BETWEEN '$dt1' AND '$dt2' AND Nama_Kelompok_Barang= '$kelompok') 
    GROUP BY kelompok_barang.Kode_Kelompok_Barang ");
}
if(!empty($_POST['jenis']) && !empty($dt1) && !empty($dt2))
{
    $jenis=$_POST['jenis'];
    $ambil= mysqli_query ($koneksi,"SELECT * FROM barang 
      JOIN penjual on barang.ID_Penjual=penjual.ID_Penjual
      JOIN kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang 
      JOIN jenis_barang on kelompok_barang.Kode_Jenis_Barang = jenis_barang.Kode_Jenis_Barang
      JOIN kota on penjual.ID_Kota_Penjual=kota.ID_Kota
              
    where (Nama_Penjual='$penjual' AND Tgl_Barang_Masuk BETWEEN '$dt1' AND '$dt2' AND Nama_Jenis_Barang= '$jenis') 
    GROUP BY kelompok_barang.Kode_Kelompok_Barang");
}
if(!empty($_POST['jenis']) && !empty($_POST['kelompok']))
{
    echo "<div class='alert alert-info'>Pilih salah satu antara jenis dan kelompok barang!</div>";
}
  }
?>


</p> 

<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:rebeccapurple;">
                                    <thead>
      <tr>
      <th> No. </th>
      <th> Tanggal Masuk Barang </th> 
      <th> Kode Barang </th>
      <th> Nama Barang </th>
      <th> Nama Jenis Barang </th>
      <th> Kelompok_Barang  </th>
      <th> Foto Barang </th>
      <th> Harga Barang </th>
      <th> Stok Barang </th>
    </tr>
    </thead>
    <tbody>
      <?php $total=0; ?>
      <?php $nomor=1; ?>
      <?php $penjual = $_SESSION["Username_Penjual"]["Nama_Penjual"];
      while($row=mysqli_fetch_array($ambil)){?>
      
      <tr>
        <td><?php echo $nomor; ?></td>
        <td><?php echo $row['Tgl_Barang_Masuk']; ?></td>
        <td><?php echo $row['Kode_Barang']; ?></td>
        <td><?php echo $row['Nama_Barang']; ?></td>
        <td><?php echo $row['Nama_Jenis_Barang']; ?></td>
        <td><?php echo $row['Nama_Kelompok_Barang']; ?></td>
        <td> 
        <img src="../admin/Foto_Produk/<?php echo $row['Foto_Barang'];?>" width="100">
      </td>
      <td> <?php echo $row['Harga_Barang']; ?></td>
      <td> <?php echo $row['Stok_Barang']; ?> bungkus</td>
      </tr>
      <?php $nomor++ ?>
      <?php } ?>
    </tbody>
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
           onclick="location.href='index.php?halaman=laporanstokpj'" data-toggle="tooltip" data-placement="top" title="Kembali">
          Kembali
          </button>
          </span>
      <?php endif ?>

  
  </div>
    </div>
