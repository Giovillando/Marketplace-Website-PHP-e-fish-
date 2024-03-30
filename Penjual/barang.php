<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Barang</h6>
                        </div>

<form class="form-inline" role="search" method="post" action="index.php?halaman=searchbarang">
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

<br>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered text-light"id="dataTable" width="100%" cellspacing="50"style="background-color:RebeccaPurple;">
	<thead>
                                        <tr>
                                             <th>No</th>
                                          <th>Kode Barang</th>
                                          <th>Tanggal Barang Masuk</th>
                                          <th>Nama Barang</th>
                                          <th>Deskripsi Barang</th>
                                          <th>Kode Kelompok Barang</th>
                                          <th>ID Penjual</th>
                                          <th>Stok Barang</th>
                                          <th>Berat Barang</th>
                                          <th>Harga Barang</th>
                                          <th>Foto Barang</th>
                                        </tr>
                                <tbody>
                                	<?php $No=1; ?>
                                	<?php 
						                $penjual=$_SESSION["Username_Penjual"]["ID_Penjual"];
						                $ambildata=$koneksi->query("SELECT * FROM barang JOIN kelompok_barang ON barang.Kode_Kelompok_Barang= Kelompok_barang.Kode_Kelompok_Barang WHERE ID_Penjual = '$penjual'"); ?>
						                <?php while ($db=$ambildata->fetch_assoc()){ ?>
                                                   <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['Kode_Barang'];?></td>
                                                   <td><?php echo $db['Tanggal_Barang_Masuk'];?></td>
                                                    <td><?php echo $db['Nama_Barang'];?></td>
                                                     <td><?php echo $db['Deskripsi_Barang'];?></td>
                                                      <td><?php echo $db['Kode_Kelompok_Barang'];?></td>
                                                      <td><?php echo $db['Stok_Barang'];?></td>
                                                      <td><?php echo $db['Berat_Barang'];?> kg</td>
                                                      <td>Rp.<?php echo number_format($db['Harga_Barang']);?></td>
                                                      <td> <img src="../admin/img/<?php echo $db['Foto_Barang'];?>" width="100"></td>
                                                    
                                                    <td>  
                                                    <a href ="index.php?Kode_Barang=<?php echo $db['Kode_Barang']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="index.php?halaman=ubahbarang&Kode_Barang=<?php echo $db['Kode_Barang']?>" class="btn btn- btn-info">Edit</a>
                                                    <?php $No++; ?>
                                        <?php }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambahbarang" class = "btn btn-primary"> Tambah Data </a>
                            </div>

