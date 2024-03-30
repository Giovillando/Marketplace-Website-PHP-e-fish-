<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Status Pengiriman</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_statustfpenjual">
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
                                          <th>ID Status Pengiriman</th>
                                          <th>Keterangan Status Transfer Penjual</th>
                                        </tr>
                                <tbody>
                                <?php 
                                    $ambildata=mysqli_query($koneksi, "SELECT * FROM status_transfer_penjual order by ID_Status_Transfer_Penjual desc");
                                     $No =1 ;
                                    while ( $db=mysqli_fetch_array ($ambildata,)){
                                            ?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $db['ID_Status_Transfer_Penjual'];?></td>
                                               <td><?php echo $db['Ket_Status_Transfer_Penjual'];?></td>
                                                      
                                                    
                                                    <td>  <a href ="del_statustfpenjual.php?ID_Status_Transfer_Penjual=<?php echo $db['ID_Status_Transfer_Penjual']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_statustfpenjual.php?halaman=edit_statustfpenjual&ID_Status_Transfer_Penjual=<?php echo $db['ID_Status_Transfer_Penjual']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_statustfpenjual" class = "btn btn-primary"> Tambah Data </a>
                            </div>