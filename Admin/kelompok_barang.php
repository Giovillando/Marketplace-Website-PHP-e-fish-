<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Kelompok Barang</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_barang">
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
                                          <th>Kode Kelompok Barang</th>
                                          <th>Kode Jenis Barang</th>
                                          <th>Nama Kelompok Barang</th>
                                          </tr>
                                <tbody>
                                <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM kelompok_barang JOIN jenis_barang ON kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['Kode_Kelompok_Barang'];?></td>
                                                    <td><?php echo $db['Kode_Jenis_Barang'];?></td>
                                                     <td><?php echo $db['Nama_Kelompok_Barang'];?></td>                                                    
                                                    <td>  
                                                        <a href ="del_kelompokbarang.php?Kode_Kelompok_Barang=<?php echo $db['Kode_Kelompok_Barang']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                        <a href ="edit_kelompokbarang.php?halaman=edit_kelompokbarang&Kode_Kelompok_Barang=<?php echo $db['Kode_Kelompok_Barang']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_kelompokbarang" class = "btn btn-primary"> Tambah Data </a>
                            </div>