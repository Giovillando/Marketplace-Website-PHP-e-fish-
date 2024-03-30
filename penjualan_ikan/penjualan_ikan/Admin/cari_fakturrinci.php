<?php
include ('koneksi.php');

if(isset($_POST['cari']))
{
    $_SESSION['session_pencarian']=$_POST["keyword"];
    $keyword=$_SESSION['session_pencarian'];
}
else
{
    $keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM faktur_rinci WHERE ID_Faktur_Rinci LIKE '%$keyword%'")
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Faktur Rinci</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_fakturrinci">
                                    <div class="col-md-4">
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
           <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_fakturrinci">
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
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:olivedrab;">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                          <th>ID Faktur Rinci</th>
                                          <th>ID Faktur Beli</th>
                                          <th>ID Status Pengiriman</th>
                                          <th>Tanggal</th>
                                          <th>Kode Daftar Pengiriman</th>
                                          <th>ID Status Transfer Penjual</th>
                                          <th>Nama Penjual</th>
                                          <th>Transfer Uang Penjual</th>
                                          <th>QTY Barang Per Toko</th>
                                          <th>Total Rinci</th>
                                        </tr>
                                <tbody>
                                <?php 
                            //jika tanggal dari dan tanggal ke ada maka

                            if(isset($_POST['dari']) && isset($_POST['ke'])){
                                // tampilkan data yang sesuai dengan range tanggal yang dicari 
                                $ambildata = mysqli_query($koneksi, "SELECT * FROM faktur_rinci JOIN  faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli JOIN status_pengiriman ON faktur_rinci.ID_Status_Pengiriman=status_pengiriman.ID_Status_Pengiriman  JOIN status_order ON faktur_rinci.ID_Status_Order=status_order.ID_Status_Order JOIN daftar_pengiriman ON faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman JOIN status_transfer_penjual ON faktur_rinci.ID_Status_Transfer_Penjual =status_transfer_penjual.ID_Status_Transfer_Penjual JOIN penjual ON faktur_rinci.ID_Penjual =penjual.ID_Penjual  WHERE Tanggal BETWEEN '".$_POST['dari']."' and '".$_POST['ke']."'");
                            }
                            else
                            {
                                //jika tidak ada tanggal dari dan tanggal ke maka tampilkan seluruh ambildata
                                 $ambildata =mysqli_query($koneksi, "SELECT * FROM faktur_rinci JOIN  faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli JOIN status_pengiriman ON faktur_rinci.ID_Status_Pengiriman=status_pengiriman.ID_Status_Pengiriman  JOIN status_order ON faktur_rinci.ID_Status_Order=status_order.ID_Status_Order JOIN daftar_pengiriman ON faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman JOIN status_transfer_penjual ON faktur_rinci.ID_Status_Transfer_Penjual =status_transfer_penjual.ID_Status_Transfer_Penjual JOIN penjual ON faktur_rinci.ID_Penjual =penjual.ID_Penjual ");  
                            }
                            // $no digunakan sebagai penomoran 
                            $No = 1;
                            // while digunakan sebagai perulangan ambildata 
                            while($db = mysqli_fetch_array($ambildata)){
                      ?>
                          
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM faktur_rinci JOIN penjual ON faktur_rinci.ID_Penjual =penjual.ID_Penjual JOIN status_pengiriman ON faktur_rinci.ID_Status_Pengiriman=status_pengiriman.ID_Status_Pengiriman  JOIN status_order ON faktur_rinci.ID_Status_Order=status_order.ID_Status_Order WHERE 
                                Tanggal LIKE '%$keyword%' OR
                                ID_Faktur_Rinci LIKE '%$keyword%' OR
                                ID_Faktur_Beli LIKE '%$keyword%' OR
                                ID_Status_Pengiriman LIKE '%$keyword%' OR
                                Ket_Status_Order LIKE '%$keyword%' OR
                                Kode_Daftar_Pengiriman LIKE '%$keyword%' OR
                                Ket_Status_Transfer_Penjual LIKE '%$keyword%' OR
                                Nama_Penjual LIKE '%$keyword%' OR
                                Transfer_Uang_Penjual LIKE '%$keyword%' OR
                                QTY_Barang_Per_Toko LIKE '%$keyword%' OR
                                Total_Rinci LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $pecah['Tanggal'];?></td>
                                                   <td><?php echo $pecah['ID_Faktur_Rinci'];?></td>
                                                   <td><?php echo $pecah['ID_Faktur_Beli'];?></td>
                                                    <td><?php echo $pecah['Ket_Status_Pengiriman'];?></td>
                                                     <td><?php echo $pecah['Ket_Status_Order'];?></td>
                                                      <td><?php echo $pecah['Kode_Daftar_Pengiriman'];?></td>
                                                      <td><?php echo $pecah['Ket_Status_Transfer_Penjual'];?></td>
                                                      <td><?php echo $pecah['Nama_Penjual'];?></td>
                                                      <td><?php echo $pecah['Transfer_Uang_Penjual'];?></td>
                                                      <td><?php echo $pecah['QTY_Barang_Per_Toko'];?></td>
                                                      <td><?php echo $pecah['Total_Rinci'];?></td>
                                                      
                                                    <td>  <a href ="del_fakturrinci.php?ID_Faktur_Rinci=<?php echo $pecah['ID_Faktur_Rinci']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_fakturrinci.php?halaman=edit_fakturrinci&ID_Faktur_Rinci=<?php echo $pecah['ID_Faktur_Rinci']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                    }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                 <a href="index.php?halaman=tambah_fakturrinci" class = "btn btn-primary"> Tambah Data </a>
                            </div>