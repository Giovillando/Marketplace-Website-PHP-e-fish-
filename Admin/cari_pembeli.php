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

$query=mysqli_query($koneksi, "SELECT * FROM pembeli WHERE ID_pembeli LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Pembeli</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_pembeli">
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
                                          <th>ID Pembeli</th>
                                          <th>Nama Pembeli</th>
                                          <th>Alamat Pembeli</th>
                                          <th>Username Pembeli</th>
                                          <th>Password Pembeli</th>
                                          <th>No Handphone Pembeli</th>
                                          <th>No Rekening Pembeli</th>
                                          <th>Kode Jenis Pembeli</th>
                                        </tr>
                                <tbody>
                                        <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM pembeli WHERE 
                                ID_Pembeli LIKE '%$keyword%' OR
                                Nama_Pembeli LIKE '%$keyword%' OR
                                Alamat_Pembeli LIKE '%$keyword%' OR
                                Username_Pembeli LIKE '%$keyword%' OR
                                Password_Pembeli LIKE '%$keyword%' OR
                                No_Handphone_Pembeli LIKE '%$keyword%' OR
                                No_Rekening_Pembeli LIKE '%$keyword%' OR
                                Kode_Jenis_Pembeli LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $pecah['ID_Pembeli'];?></td>
                                                    <td><?php echo $pecah['Nama_Pembeli'];?></td>
                                                     <td><?php echo $pecah['Alamat_Pembeli'];?></td>
                                                      <td><?php echo $pecah['Username_Pembeli'];?></td>
                                                      <td><?php echo $pecah['Password_Pembeli'];?></td>
                                                      <td><?php echo $pecah['No_Handphone_Pembeli'];?></td>
                                                      <td><?php echo $pecah['No_Rekening_Pembeli'];?></td>
                                                      <td><?php echo $pecah['Kode_Jenis_Pembeli'];?></td>                                                      
                                                    
                                                    <td>  <a href ="index.php?halaman=del_pembeli=<?php echo $db['ID_Pembeli']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="index.php?halaman=edit_pembeli=<?php echo $db['ID_Pembeli']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="tambah_pembeli.php?halaman=tambah_pembeli" class = "btn btn-primary"> Tambah Data </a>
                            </div>