      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">LAPORAN BARANG TERLARIS BERDASARKAN PENJUAL</h5></center>
                        </div>
                        </ol>
</div>
      <form class="form-inline" role="search" method="post" action="index.php?halaman=laporanbarang5">
      <div class="col-10">
      <table border="0">
      <tr><div class="col-md-3">
    <div class="form-inline">
      <input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Penjual..." autofocus autocomplete="off"><br>
    <div class="text-end">
      <button class="btn btn-primary" name="cari">Cari</button>
    </div>
    </div>
  </div>
</tr>
</table>
</div>
</form>
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
$query= mysqli_query ($koneksi,"SELECT * FROM penjual
where Nama_Penjual LIKE '%$keyword%'");
?> 

<br><?php echo "<i><b>Informasi : </b> Pencarian berdasarkan Nama Penjual '$keyword' </i>";?>
                            <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:olivedrab;">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Nama Barang</th>
                                          <th>Jumlah Barang Terjual</th>
                                        </tr>
                                <tbody>
                                <?php 
                                             $ambildata =mysqli_query($koneksi, "SELECT Nama_Barang, SUM(transaksi.Qty_Barang) AS jumlah FROM transaksi 
                                                INNER JOIN barang ON transaksi.Kode_Barang=barang.Kode_Barang 
                                                INNER JOIN kelompok_barang ON kelompok_barang.Kode_Kelompok_Barang=barang.Kode_Kelompok_Barang 
                                                INNER JOIN jenis_barang ON jenis_barang.Kode_Jenis_Barang=kelompok_barang.Kode_Jenis_Barang 
                                                INNER JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual 
                                                INNER JOIN kota ON penjual.ID_Kota_Penjual=kota.ID_Kota 
                                                WHERE Nama_Penjual LIKE '%$keyword%' GROUP BY penjual.ID_Penjual order by jumlah desc;");
                                                 $No =1 ;
                                                 $total=0;
                                                  $jumlah= mysqli_num_rows($ambildata);
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>

                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['Nama_Barang'];?></td>
                                                   <td><?php echo $db['jumlah'];
                                               ?></td>

                                  </tr>
      <?php $total+=($db['jumlah']);?>
      <?php $No++ ?>
      <?php } ?>
    </tbody>
  <tfoot>
    <tr>
      <th colspan="2"><center> Total </th>
      <th><?php echo number_format( $total)?>
    </tr>
    </tfoot>
  </table>