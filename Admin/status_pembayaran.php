<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Status Pembayaran</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_statuspembayaran">
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
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:Blue;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                          <th>ID Status Pembayaran</th>
                                          <th>Keterangan Status Pembayaran</th>
                                        </tr>
                                <tbody>
                                <?php 
                                    $ambildata=mysqli_query($koneksi, "SELECT * FROM status_pembayaran order by  ID_Status_Pembayaran desc");
                                     $No =1 ;
                                    while ( $db=mysqli_fetch_array ($ambildata,)){
                                            ?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $db['ID_Status_Pembayaran'];?></td>
                                               <td><?php echo $db['Ket_Status_Pembayaran'];?></td>
                                                      
                                                    
                                                    <td>  <a href ="del_statuspembayaran.php?ID_Status_Pembayaran=<?php echo $db['ID_Status_Pembayaran']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_statuspembayaran.php?halaman=edit_statuspembayaran&ID_Status_Pembayaran=<?php echo $db['ID_Status_Pembayaran']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_statuspembayaran" class = "btn btn-primary"> Tambah Data </a>
                            </div>