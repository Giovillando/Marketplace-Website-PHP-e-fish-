<?php
include 'koneksi.php';
if(isset($_POST['cari']))
{
  $_SESSION['session_pencarian'] = $_POST["keyword"];
  $keyword=$_SESSION['session_pencarian'];
}
else
{
  $keyword=$_SESSION['session_pencarian'];
}
$query= mysqli_query ($koneksi,"SELECT * FROM kota
where Nama_Kota LIKE '%$keyword%'");
?> 
 
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">LAPORAN DATA BARANG</h5></center>
                        </div>
                        </ol>
</div>
      <form class="form-inline" role="search" method="post" action="index.php?halaman=laporanterlariss">
      <div class="col-10">
      <table border="0">
      <tr><div class="col-md-3">
    <div class="form-inline">
      <input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Barang" autofocus autocomplete="off"><br>
    <div class="text-end">
      <button class="btn btn-primary" name="cari">Cari</button>
    </div>
    </div>
  </form>
<h2>
  <div class="card-body">
  <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:olivedrab;">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Nama Kota</th>
                                          <th>Nama Kelompok</th>
                                          <th>Nama Jenis</th>
                                          <th>Nama Barang</th>
                                          <th>Nama Kota</th>
                                          <th>Jumlah Penjual</th>
                                        </tr>
                                <tbody>
                                <?php 
                                             $ambildata =mysqli_query($koneksi, "SELECT Nama_Kota,Nama_Kelompok_Barang,Nama_Jenis_Barang,Nama_Penjual,COUNT(transaksi.Kode_Barang) 
                                             AS jumlah FROM transaksi INNER JOIN barang ON transaksi.Kode_Barang=barang.Kode_Barang 
                                             INNER JOIN kelompok_barang ON barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang 
                                             INNER JOIN jenis_barang ON kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang 
                                             INNER JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci
                                             INNER JOIN penjual ON faktur_rinci.ID_Penjual=penjual.ID_Penjual 
                                             INNER JOIN kota ON penjual.ID_Kota=kota.ID_Kota   
                                             WHERE Nama_Barang LIKE '%$keyword%' OR kota.Nama_Kota LIKE '%$keyword%' GROUP BY penjual.ID_Penjual;");
                                                 $No =1 ;
                                                  $jumlah= mysqli_num_rows($ambildata);
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>

                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['Nama_Kota'];?></td>
                                                   <td><?php echo $db['jumlah'];
                                               ?></td>

                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>