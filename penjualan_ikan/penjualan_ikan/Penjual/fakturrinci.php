<?php
include ('koneksi.php');
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Faktur Rinci</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=searchfakturrinci">
                                    <div class="col-md-3">
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
            <!-- form filter data berdasarkan range tanggal  -->
           <form class="form-inline" role="search" method="post" action="index.php?halaman=faktur_rinci">
                <div class="card-header py-3">
                    <div class="col-auto">
                        <label class="m-0 font-weight-bold text-dark">Periode</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="dari" required>
                    </div>
                    <div class="col-md-3">
                        -
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="ke" required>
                    </div>
                    <br>
                    <div class="col-md-3">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
<br>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:rebeccapurple;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>ID Faktur Rinci</th>
                                          <th>ID Faktur Beli</th>
                                          <th>ID Status Pengiriman</th>
                                          <th>Tanggal</th>
                                          <th>Kode Daftar Pengiriman</th>
                                          <th>ID Status Transfer Penjual</th>
                                          <th>ID Penjual</th>
                                          <th>Transfer Uang Penjual</th>
                                          <th>QTY Barang Per Toko</th>
                                          <th>Total Rinci</th>
                                        </tr>
                                <tbody>
                                  <?php 
                            //jika tanggal dari dan tanggal ke ada maka

                            if(isset($_POST['dari']) && isset($_POST['ke'])){
                                // tampilkan data yang sesuai dengan range tanggal yang dicari 
                                $ambildata = mysqli_query($koneksi, "SELECT * FROM faktur_rinci JOIN  faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli JOIN status_pengiriman ON faktur_rinci.ID_Status_Pengiriman=status_pengiriman.ID_Status_Pengiriman JOIN daftar_pengiriman ON faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman JOIN status_transfer_penjual ON faktur_rinci.ID_Status_Transfer_Penjual =status_transfer_penjual.ID_Status_Transfer_Penjual JOIN penjual ON faktur_rinci.ID_Penjual =penjual.ID_Penjual  WHERE Tanggal BETWEEN '".$_POST['dari']."' and '".$_POST['ke']."'");
                            }
                            else
                            {
                                //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh ambildata
                                 $ambildata =mysqli_query($koneksi, "SELECT * FROM faktur_rinci JOIN  faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli JOIN status_pengiriman ON faktur_rinci.ID_Status_Pengiriman=status_pengiriman.ID_Status_Pengiriman JOIN daftar_pengiriman ON faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman JOIN status_transfer_penjual ON faktur_rinci.ID_Status_Transfer_Penjual =status_transfer_penjual.ID_Status_Transfer_Penjual JOIN penjual ON faktur_rinci.ID_Penjual =penjual.ID_Penjual ");  
                            }
                            // $no digunakan sebagai penomoran 
                            $No = 1;
                            $penghasilan=0;
                            // while digunakan sebagai perulangan ambildata 
                            while($db = mysqli_fetch_array($ambildata)){
                      ?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $db['ID_Faktur_Rinci'];?></td>
                                                   <td><?php echo $db['ID_Faktur_Beli'];?></td>
                                                    <td><?php echo $db['ID_Status_Pengiriman'];?></td>
                                                     <td><?php echo $db['Tanggal'];?></td>
                                                      <td><?php echo $db['Kode_Daftar_Pengiriman'];?></td>
                                                      <td><?php echo $db['ID_Status_Transfer_Penjual'];?></td>
                                                      <td><?php echo $db['ID_Penjual'];?></td>
                                                      <td>Rp.<?php echo number_format( $db['Transfer_Uang_Penjual']);?></td>
                                                      <td><?php echo $db['QTY_Barang_Per_Toko'];?></td>
                                                      <td>Rp.<?php echo number_format( $db['Total_Rinci']);?></td>
                                                    
                                                    <td>  <a href ="hapusfakturrinci.php?ID_Faktur_Rinci=<?php echo $db['ID_Faktur_Rinci']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="ubahfakturrinci.php?halaman=ubahfakturrinci&ID_Faktur_Rinci=<?php echo $db['ID_Faktur_Rinci']?>" class="btn btn- btn-info">Edit</a>
                                       <?php $No++;
                                       $penghasilan+=$db['Total_Rinci'];
                                        }
                                         ?>
                                        </tbody>
                                    </thead>
                                </table>
                                <b>Penjualan = Rp. <th><?php echo number_format( $penghasilan)?></b>
                                <br><br>
                                <a href="index.php?halaman=tambahfakturrinci" class = "btn btn-primary"> Tambah Data </a>
                            </div>