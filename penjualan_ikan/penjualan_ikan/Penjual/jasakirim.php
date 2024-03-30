                    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Jasa Kirim</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_jasakirim">
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
                                          <th>ID Jasa Kirim</th>
                                          <th>Nama Jasa Kirim</th>
                                        </tr>
                                <tbody>
                                <?php $nomor=1; ?>
                                        <?php $ambil=$koneksi->query("SELECT * FROM jasa_kirim"); ?>
                                        <?php while ($pecah=$ambil->fetch_assoc()){ ?>
                                               <tr>
                                               <td><?php echo $nomor?></td>
                                               <td><?php echo $pecah['ID_Jasa_Kirim'];?></td>
                                               <td><?php echo $pecah['Nama_Jasa_Kirim'];?></td>
                                                    
                                                    <td>  <a href ="hapusjasakirim.php?ID_Jasa_Kirim=<?php echo $db['ID_Jasa_Kirim']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="ubahjasakirim.php?halaman=ubahjasakirim&ID_Jasa_Kirim=<?php echo $db['ID_Jasa_Kirim']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $nomor++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="index.php?halaman=tambahjasakirim" class = "btn btn-primary"> Tambah Data </a>
                            </div>