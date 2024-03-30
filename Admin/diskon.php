<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Diskon</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_diskon">
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
                                          <th>Kode Diskon</th>
                                          <th>Jenis Diskon</th>
                                          <th>Jumlah Diskon</th>
                                          <th>Tanggal Diskon</th>
                                        </tr>
                                <tbody>
                                <?php 
                                    $ambildata=mysqli_query($koneksi, "SELECT * FROM diskon order by Kode_Diskon desc");
                                     $No =1 ;
                                    while ( $db=mysqli_fetch_array ($ambildata,)){
                                            ?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $db['Kode_Diskon'];?></td>
                                               <td><?php echo $db['Jenis_Diskon'];?></td>
                                               <td><?php echo number_format($db['Jumlah_Diskon']);?>%</td>
                                               <td><?php echo $db['Tgl_Muncul'];?></td>
                                                    
                                                    <td>  <a href ="del_diskon.php?Kode_Diskon=<?php echo $db['Kode_Diskon']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_diskon.php?halaman=edit_diskon&Kode_Diskon=<?php echo $db['Kode_Diskon']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_diskon" class = "btn btn-primary"> Tambah Data </a>
                            </div>