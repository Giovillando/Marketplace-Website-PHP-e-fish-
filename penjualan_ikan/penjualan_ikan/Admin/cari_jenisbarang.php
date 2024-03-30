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

$query=mysqli_query($koneksi, "SELECT * FROM jenis_barang WHERE Kode_Jenis_Barang LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Jenis Barang</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_jenisbarang">
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
                                          <th>Kode Jenis Barang</th>
                                          <th>Nama Jenis Barang</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM jenis_barang WHERE 
                                Kode_Jenis_Barang LIKE '%$keyword%' OR
                                Nama_Jenis_Barang LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $pecah['Kode_Jenis_Barang'];?></td>
                                               <td><?php echo $pecah['Nama_Jenis_Barang'];?></td>
                                                    
                                                    <td>  <a href ="del_jenisbarang.php?Kode_Jenis_Barang=<?php echo $pecah['Kode_Jenis_Barang']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_jenisbarang.php?halaman=edit_jenisbarang&Kode_Jenis_Barang=<?php echo $pecah['Kode_Jenis_Barang']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="tambah_jenisbarang.php?halaman=tambah_jenisbarang" class = "btn btn-primary"> Tambah Data </a>
                            </div>