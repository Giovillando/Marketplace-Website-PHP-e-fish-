<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Penjual</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_penjual">
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
                                          <th>Tanggal</th>
                                          <th>ID Penjual</th>
                                          <th>Nama Penjual</th>
                                          <th>Username Penjual</th>
                                          <th>Password Penjual</th>
                                          <th>Nama Kota Penjual</th>
                                          <th>Alamat Penjual</th>
                                          <th>ID Bank</th>
                                          <th>No Rekening Penjual</th>
                                          <th>No Handphone Penjual</th>
                                        </tr>
                                <tbody>
                                <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM penjual JOIN bank ON penjual.ID_Bank=bank.ID_Bank JOIN kota ON penjual.ID_Kota_Penjual=kota.ID_Kota");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['Tanggal'];?></td>
                                                   <td><?php echo $db['ID_Penjual'];?></td>
                                                    <td><?php echo $db['Nama_Penjual'];?></td>
                                                     <td><?php echo $db['Username_Penjual'];?></td>
                                                      <td><?php echo $db['Password_Penjual'];?></td>
                                                      <td><?php echo $db['Nama_Kota'];?></td>
                                                      <td><?php echo $db['Alamat_Penjual'];?></td>
                                                      <td><?php echo $db['ID_Bank'];?></td>
                                                      <td><?php echo $db['No_Rekening_Penjual'];?></td>
                                                      <td><?php echo $db['No_Handphone_Penjual'];?></td>
                                                      
                                                    
                                                    <td>  <a href ="del_penjual.php?ID_Penjual=<?php echo $db['ID_Penjual']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_penjual.php?halaman=edit_penjual&ID_Penjual=<?php echo $db['ID_Penjual']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_penjual" class = "btn btn-primary"> Tambah Data </a>
                            </div>