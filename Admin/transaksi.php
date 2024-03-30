<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Transaksi</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_transaksi">
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
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:olivedrab;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>Tanggal</th>   
                                          <th>ID Faktur Rinci</th>
                                          <th>Kode Barang</th>
                                          <th>Kelompok Barang</th>
                                          <th>Nama Barang</th>
                                          <th>QTY Barang</th>
                                          <th>Sub Total Barang</th>
                                          </tr>
                                <tbody>
                                         <?php $No=1; ?>
                                            <?php $ambildata=$koneksi->query("SELECT * FROM transaksi inner join faktur_rinci on transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci join barang on transaksi.Kode_Barang=barang.Kode_Barang inner join kelompok_barang on barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang "); ?>
                                            <?php while($db=$ambildata->fetch_assoc()){ ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['Tanggal'];?></td>
                                                   <td><?php echo $db['ID_Faktur_Rinci'];?></td>
                                                    <td><?php echo $db['Kode_Barang'];?></td>
                                                    <td><?php echo $db['Nama_Kelompok_Barang'];?></td>
                                                    <td><?php echo $db['Nama_Barang'];?></td>
                                                     <td><?php echo $db['QTY_Barang'];?></td>
                                                     <td><?php echo $db['Sub_Total'];?></td>
                                                      
                                                    
                                                    <td>  <a href ="del_transaksi.php?ID_Faktur_Rinci=<?php echo $db['ID_Faktur_Rinci']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_transaksi.php?halaman=edit_transaksi&ID_Faktur_Rinci=<?php echo $db['ID_Faktur_Rinci']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="tambah_transaksi.php?halaman=tambahtransaksi" class = "btn btn-primary"> Tambah Data </a>
                            </div>