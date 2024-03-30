<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Admin</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_laporanadmin">
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
                                          <th>Nama Admin</th>
                                          <th>Username</th>
                                          <th>Password</th>
                                          <th>Level</th>
                                        </tr>
                                <tbody>
                                <?php 
                                    $ambildata=mysqli_query($koneksi, "SELECT * FROM admin order by Username desc");
                                     $No =1 ;
                                    while ( $db=mysqli_fetch_array ($ambildata,)){
                                            ?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $db['Nama_Admin'];?></td>
                                               <td><?php echo $db['Username'];?></td>
                                               <td><?php echo $db['Password_Admin'];?></td>
                                               <td><?php echo $db['Level_Admin'];?></td>
                                                    
                                                    <td>  <a href ="del_laporanadmin.php?Username=<?php echo $db['Username']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_laporanadmin.php?halaman=edit_laporanadmin&Username=<?php echo $db['Username']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_laporanadmin" class = "btn btn-primary"> Tambah Data </a>
                            </div>