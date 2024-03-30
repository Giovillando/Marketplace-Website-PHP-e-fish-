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

$query=mysqli_query($koneksi, "SELECT * FROM daftar_pengiriman WHERE Kode_Daftar_Pengiriman LIKE '%$keyword%'")
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Daftar Pengiriman</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_daftarpengiriman">
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
                                          <th>Kode Daftar Pengiriman</th>
                                          <th>ID Kota Asal</th>
                                          <th>ID Kota Tujuan</th>
                                          <th>Kode Sistem Pengiriman</th>
                                          <th>ID Kategori</th>
                                          <th>Tarif Pengiriman</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN kategori ON daftar_pengiriman.ID_Kategori=kategori.ID_Kategori JOIN sistem_pengiriman ON daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman WHERE 
                                Kode_Daftar_Pengiriman LIKE '%$keyword%' OR
                                ID_Kota_Asal LIKE '%$keyword%' OR
                                Nama_Kota_Asal LIKE '%$keyword%' OR
                                ID_Kota_Tujuan LIKE '%$keyword%' OR
                                Nama_Kota_Tujuan LIKE '%$keyword%'OR
                                Nama_Sistem_Pengiriman LIKE '%$keyword%' OR
                                Nama_Kategori LIKE '%$keyword%' OR 
                                Tarif_Pengiriman LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $pecah['Kode_Daftar_Pengiriman'];?></td>
                                                    <td><?php echo $pecah['ID_Kota_Asal'];?></td>
                                                     <td><?php echo $pecah['Nama_Kota_Asal'];?></td>
                                                      <td><?php echo $pecah['ID_Kota_Tujuan'];?></td>
                                                      <td><?php echo $pecah['Nama_Kota_Tujuan'];?></td>
                                                      <td><?php echo $pecah['Nama_Sistem_Pengiriman'];?></td>
                                                      <td><?php echo $pecah['Nama_Kategori'];?></td>
                                                      <td><?php echo $pecah['Tarif_Pengiriman'];?></td>

                                                    
                                                    <td> <a href ="del_daftarpengiriman.php?Kode_Daftar_Pengiriman=<?php echo $db['Kode_Daftar_Pengiriman']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_daftarpengiriman.php?halaman=edit_daftarpengiriman&Kode_Daftar_Pengiriman=<?php echo $db['Kode_Daftar_Pengiriman']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_daftarpengiriman" class = "btn btn-primary"> Tambah Data </a>
                            </div>