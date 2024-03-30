<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Daftar Pengiriman</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=searchdaftarpengiriman">
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
                                          <th>Kode Daftar Pengiriman</th>
                                          <th>ID Kota Asal</th>
                                          <th>Nama Kota Asal</th>
                                          <th>ID Kota Tujuan</th>
                                          <th>Nama Kota Tujuan</th>
                                          <th>Kode Sistem Pengiriman</th>
                                          <th>ID Kategori</th>
                                          <th>Tarif Pengiriman</th>
                                        </tr>
                                <tbody>
                                     <?php $No=1; ?>
                                          <?php $ambildata=$koneksi->query("SELECT * FROM daftar_pengiriman"); ?>
                                          <?php while ($db=$ambildata->fetch_assoc()){ ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['Kode_Daftar_Pengiriman'];?></td>
                                                    <td><?php echo $db['ID_Kota_Asal'];?></td>
                                                     <td><?php echo $db['Nama_Kota'];?></td>
                                                      <td><?php echo $db['ID_Kota_Tujuan'];?></td>
                                                      <td><?php echo $db['Nama_Kota'];?></td>
                                                      <td><?php echo $db['Kode_Sistem_Pengiriman'];?></td>
                                                      <td><?php echo $db['ID_Kategori'];?></td>
                                                      <td>Rp.<?php echo number_format($db['Tarif_Pengiriman']);?></td>
                                                    
                                                    <td>  <a href ="hapusdaftarpengiriman.php?Kode_Daftar_Pengiriman=<?php echo $db['Kode_Daftar_Pengiriman']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="ubahdaftarpengiriman.php?halaman=ubahdaftarpengiriman&Kode_Daftar_Pengiriman=<?php echo $db['Kode_Daftar_Pengiriman']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambahdaftarpengiriman" class = "btn btn-primary"> Tambah Data </a>
                            </div>