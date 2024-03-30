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

$query=mysqli_query($koneksi, "SELECT * FROM status_transfer_penjual WHERE ID_Status_Transfer_Penjual LIKE '%$keyword%'")
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Transaksi</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=searchtransaksi">
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
                                          <th>ID Faktur Rinci</th>
                                          <th>Kode Barang</th>
                                          <th>QTY Barang</th>
                                          <th>Sub Total Barang</th>
                                          </tr>
                                <tbody>
                                        <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM transaksi WHERE 
                                ID_Faktur_Rinci LIKE '%$keyword%' OR
                               Kode_Barang LIKE '%$keyword%' OR
                               QTY_Barang LIKE '%$keyword%' OR
                               Sub_Total_Barang LIKE '%$keyword%' ");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $pecah['ID_Faktur_Rinci'];?></td>
                                                    <td><?php echo $pecah['Kode_Barang'];?></td>
                                                     <td><?php echo $pecah['QTY_Barang'];?></td>
                                                     <td><?php echo $pecah['Sub_Total_Barang'];?></td>
                                                      
                                                    
                                                    <td>  <a href ="del_transaksi.php?ID_Faktur_Rinci=<?php echo $pecah['ID_Faktur_Rinci']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="edit_transaksi.php?halaman=edit_transaksi&ID_Faktur_Rinci=<?php echo $pecah['ID_Faktur_Rinci']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?>  
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="tambahtransaksi.php?halaman=tambahtransaksi" class = "btn btn-primary"> Tambah Data </a>
                            </div>