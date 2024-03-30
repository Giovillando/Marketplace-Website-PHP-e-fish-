<?php
include 'koneksi.php';
$strq="";
$strw="";
$jmlh=0;
$tgl_mulai="";
$tgl_selesai="";


if (isset($_POST['tgl_mulai']))
{
    $tgl_mulai=$_POST['tgl_mulai'];
} 
if (isset($_POST['tgl_selesai']))
{
    $tgl_selesai=$_POST['tgl_selesai'];
} 
if (isset($_POST['keyword']))
{
    $Nama_Barang=$_POST['keyword'];
    $strc[]="barang.Nama_Barang LIKE '%$Nama_Barang%' OR penjual.Nama_Penjual LIKE '%$Nama_Barang%'";
    $jmlh++;

} 

$i=1;
if($jmlh>0)
{
    $strw="WHERE ";
    foreach ($strc as $strs)
    {
        $strw .=$strs;
        if($i<$jmlh)
        {
            $strw .=" AND ";
            $i++;
        }
    }
}
$query="SELECT * FROM barang JOIN Kelompok_barang ON barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual JOIN kota ON penjual.ID_Kota_Penjual=kota.ID_Kota $strw AND Tgl_Barang_Masuk BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
$result=mysqli_query($koneksi,$query);
$resnum=mysqli_num_rows($result);                                                    
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">DATA BARANG  </h5></center>
                        </div>
                        </ol>
</p> 

<form action="index.php?halaman=Barang" method="post" class="form">
    <br/>
    <div class="form-inline">
      <input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Pencarian" autofocus autocomplete="off">
    <div class="text-end">
      <button class="btn btn-primary" name="cari">Cari</button>
    </div>
    </div><br>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Mulai :</label>
                <input type="date" class="form-control" name="tgl_mulai" value="<?php echo $tgl_mulai?>" required >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Selesai :</label>
                <input type="date" class="form-control" name="tgl_selesai" value="<?php echo $tgl_selesai?>" required >
            </div>
        </div>
        <div class="col-md-2">
            <br/>
            <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
        </div>
    </div>
    <br/><br/>
</form>
                       <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:OliveDrab;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>Tanggal Masuk Barang</th>
                                          <th>Kode Barang</th>
                                          <th>Nama Barang</th>
                                          <th>Deskripsi Barang</th>
                                          <th>Nama Kelompok Barang</th>
                                          <th>Nama Penjual</th>
                                          <th>Nama Kota</th>
                                          <th>Stok Barang</th>
                                          <th>Berat Barang</th>
                                          <th>Harga Barang</th>
                                          <th>Foto Barang</th>
                                        </tr>
                                <tbody>
                                <?php  $No =1 ;
                                                while ($db= $result->fetch_assoc()){ ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['Tgl_Barang_Masuk'];?></td>
                                                   <td><?php echo $db['Kode_Barang'];?></td>
                                                    <td><?php echo $db['Nama_Barang'];?></td>
                                                     <td><?php echo $db['Deskripsi_Barang'];?></td>
                                                      <td><?php echo $db['Nama_Kelompok_Barang'];?></td>
                                                      <td><?php echo $db['Nama_Penjual'];?></td>
                                                      <td><?php echo $db['Nama_Kota'];?></td>
                                                      <td><?php echo $db['Stok_Barang'];?> kg</td>
                                                      <td><?php echo $db['Berat_Barang'];?> kg</td>
                                                      <td>Rp.<?php echo number_format($db['Harga_Barang']);?></td>
                                                      <td> <img src="../admin/Foto_Produk/<?php echo $db['Foto_Barang'];?>" width="100"></td>
                                                    
                                                    <td>  <a href ="del_barang.php?Kode_Barang=<?php echo $db['Kode_Barang']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_barang.php?halaman=edit_barang&Kode_Barang=<?php echo $db['Kode_Barang']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_barang" class = "btn btn-primary"> Tambah Data </a>
                            </div>