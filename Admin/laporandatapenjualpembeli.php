<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Pembeli</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_pembeli">
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
                                          <th>ID Pembeli</th>
                                          <th>Nama Pembeli</th>
                                        </tr>
                                <tbody>
                                        <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM pembeli JOIN jenis_pembeli ON pembeli.Kode_Jenis_Pembeli=jenis_pembeli.Kode_Jenis_Pembeli");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['ID_Pembeli'];?></td>
                                                    <td><?php echo $db['Nama_Pembeli'];?></td>                                                      
                                                    
                                                    <td>  <a href ="del_pembeli.php?ID_Pembeli=<?php echo $db['ID_Pembeli']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_pembeli.php?halaman=edit_pembeli&ID_Pembeli=<?php echo $db['ID_Pembeli']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambah_pembeli" class = "btn btn-primary"> Tambah Data </a>
                            </div>
                            <br><br>

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
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50" style="background-color:OliveDrab;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>ID Penjual</th>
                                          <th>Nama Penjual</th>
                                        </tr>
                                <tbody>
                                <?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM penjual JOIN bank ON penjual.ID_Bank=bank.ID_Bank");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['ID_Penjual'];?></td>
                                                    <td><?php echo $db['Nama_Penjual'];?></td>
                                                      
                                                    
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