<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Sistem Pengiriman</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_sistempengiriman">
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
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:rebeccapurple;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>Kode Sistem Pengiriman</th>
                                          <th>ID Jasa Kirim</th>
                                          <th>Nama Sistem Pengiriman</th>
                                        </tr>
                                <tbody>
                                        <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM sistem_pengiriman JOIN jasa_kirim ON sistem_pengiriman.ID_Jasa_Kirim=jasa_kirim.ID_Jasa_Kirim");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['Kode_Sistem_Pengiriman'];?></td>
                                                    <td><?php echo $db['ID_Jasa_Kirim'];?></td>
                                                     <td><?php echo $db['Nama_Sistem_Pengiriman'];?></td>
                                                      
                                                    
                                                    <td>  <a href ="index.php?halaman=hapussistempengiriman=<?php echo $db['Kode_Sistem_Pengiriman']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="index.php?halaman=ubahsistempengiriman=<?php echo $db['Kode_Sistem_Pengiriman']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambahsistempengiriman" class = "btn btn-primary"> Tambah Data </a>
                            </div>