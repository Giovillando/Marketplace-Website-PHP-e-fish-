<?php
include ('koneksi.php');

if(isset($_POST['cari']))
{
	$_SESSION['session_pencarian']=$_POST["keyword"];
	$keyword=$_SESSION['session_pencarian'];
}
else
{
	$keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM barang JOIN Kelompok_barang ON barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual JOIN kota ON penjual.ID_Kota=kota.ID_Kota WHERE Kode_Barang LIKE '%$keyword%'")
?>

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Barang</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_barang">
                                    <div class="col-10">
                                    <table border="0">
                                    <tr>
                                        <td><div class="form-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
                                        <td><button class="btn btn-primary" name="cari"> Search For ... </button>
                                        </div>
                                    </tr>
                                    </table>
                                    </div>
                                </form>
                       <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:OliveDrab;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>Tanggal Barang Masuk</th>
                                          <th>Kode Barang</th>
                                          <th>Nama Barang</th>
                                          <th>Deskripsi Barang</th>
                                          <th>Kode Kelompok Barang</th>
                                          <th>Nama Penjual</th>
                                          <th>Nama Kota Penjual</th>
                                          <th>Stok Barang</th>
                                          <th>Berat Barang</th>
                                          <th>Harga Barang</th>
                                          <th>Foto Barang</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM barang  JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual JOIN kota ON penjual.ID_Kota=kota.ID_Kota WHERE 
                                Tgl_Barang_Masuk LIKE '%$keyword%' OR
                                Kode_Barang LIKE '%$keyword%' OR
                                Nama_Barang LIKE '%$keyword%' OR
                                Deskripsi_Barang LIKE '%$keyword%' OR
                                Kode_Kelompok_Barang LIKE '%$keyword%' OR
                                Nama_Penjual LIKE '%$keyword%'OR
                                Nama_Kota LIKE '%$keyword%'OR
                                Stok_Barang LIKE '%$keyword%' OR
                                Berat_Barang LIKE '%$keyword%' OR
                                Harga_Barang LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $pecah['Tgl_Barang_Masuk'];?></td>
                                                   <td><?php echo $pecah['Kode_Barang'];?></td>
                                                    <td><?php echo $pecah['Nama_Barang'];?></td>
                                                     <td><?php echo $pecah['Deskripsi_Barang'];?></td>
                                                      <td><?php echo $pecah['Kode_Kelompok_Barang'];?></td>
                                                      <td><?php echo $pecah['Nama_Penjual'];?></td>
                                                      <td><?php echo $pecah['Nama_Kota'];?></td>
                                                      <td><?php echo $pecah['Stok_Barang'];?></td>
                                                      <td><?php echo $pecah['Berat_Barang'];?>kg</td>
                                                      <td>Rp.<?php echo number_format($pecah['Harga_Barang']);?></td>
                                                      <td> <img src="../admin/Foto_Produk/<?php echo $pecah['Foto_Barang'];?>" width="100"></td>
                                                    
                                                    <td>  <a href ="del_barang.php?Kode_Barang=<?php echo $pecah['Kode_Barang']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_barang.php?halaman=edit_barang&Kode_Barang=<?php echo $pecah['Kode_Barang']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="tambah_barang.php?halaman=tambah_barang" class = "btn btn-primary"> Tambah Data </a>
                            </div>