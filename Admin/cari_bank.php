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

$query=mysqli_query($koneksi, "SELECT * FROM bank WHERE ID_Bank LIKE '%$keyword%'")
?>
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Bank</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_bank">
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
										  <th>ID Bank</th>
										  <th>Nama Bank</th>
										</tr>
								<tbody>
								<?php $No=1; ?>
									<?php $ambildata=$koneksi->query("SELECT * FROM bank WHERE 
								ID_Bank LIKE '%$keyword%' OR
								Nama_Bank LIKE '%$keyword%'");?>
									<?php while($pecah = $ambildata->fetch_assoc()){?>
											   <tr>
											   <td><?php echo $No?></td>
											   <td><?php echo $pecah['ID_Bank']; ?></td>
											   <td><?php echo $pecah['Nama_Bank']; ?></td>
                                                    
                                                    <td>  <a href ="del_bank.php?ID_Bank=<?php echo $db['ID_Bank']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_bank.php?halaman=edit_bank&ID_Bank=<?php echo $db['ID_Bank']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="tambah_bank.php?halaman=tambah_bank" class = "btn btn-primary"> Tambah Data </a>
                            </div>