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

?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Penjual</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_penjual">
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
                                          <th>ID Penjual</th>
                                          <th>Nama Penjual</th>
                                          <th>Username Penjual</th>
                                          <th>Password Penjual</th>
                                          <th>Alamat Penjual</th>
                                          <th>ID Bank</th>
                                          <th>No Rekening Penjual</th>
                                          <th>No Handphone Penjual</th>
                                        </tr>
                                <tbody>
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM penjual WHERE 
                                ID_Penjual LIKE '%$keyword%' OR
                                Nama_Penjual LIKE '%$keyword%' OR
                                Username_Penjual LIKE '%$keyword%' OR
                                Password_Penjual LIKE '%$keyword%' OR
                                Alamat_Penjual LIKE '%$keyword%' OR
                                ID_Bank LIKE '%$keyword%' OR
                                No_Rekening_Penjual LIKE '%$keyword%' OR
                                No_Handphone_Penjual LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $pecah['ID_Penjual'];?></td>
                                                    <td><?php echo $pecah['Nama_Penjual'];?></td>
                                                     <td><?php echo $pecah['Username_Penjual'];?></td>
                                                      <td><?php echo $pecah['Password_Penjual'];?></td>
                                                      <td><?php echo $pecah['Alamat_Penjual'];?></td>
                                                      <td><?php echo $pecah['ID_Bank'];?></td>
                                                      <td><?php echo $pecah['No_Rekening_Penjual'];?></td>
                                                      <td><?php echo $pecah['No_Handphone_Penjual'];?></td>
                                                      
                                                    
                                                    <td>  <a href ="index.php?halaman=del_penjual=<?php echo $db['ID_Penjual']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="index.php?halaman=edit_penjual=<?php echo $db['ID_Penjual']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="tambah_penjual.php?halaman=tambah_penjual" class = "btn btn-primary"> Tambah Data </a>
                            </div>