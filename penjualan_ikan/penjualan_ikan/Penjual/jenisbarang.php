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
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:Blue;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                          <th>Kode Jenis Barang</th>
                                          <th>Nama Jenis Barang</th>
                                        </tr>
                                <tbody>
                                <?php 
                                    $ambildata=mysqli_query($koneksi, "SELECT * FROM jenis_barang order by Kode_Jenis_Barang desc");
                                     $No =1 ;
                                    while ( $db=mysqli_fetch_array ($ambildata,)){
                                            ?>
                                               <tr>
                                               <td><?php echo $No?></td>
                                               <td><?php echo $db['Kode_Jenis_Barang'];?></td>
                                               <td><?php echo $db['Nama_Jenis_Barang'];?></td>
                                                    
                                                    <td>  <a href ="hapusjenisbarang.php?Kode_Jenis_Barang=<?php echo $db['Kode_Jenis_Barang']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="ubahjenisbarang.php?halaman=ubahjenisbarang&Kode_Jenis_Barang=<?php echo $db['Kode_Jenis_Barang']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambahjenisbarang" class = "btn btn-primary"> Tambah Data </a>
                            </div>