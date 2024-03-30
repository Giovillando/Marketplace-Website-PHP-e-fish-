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

<?php 

  $semuadata=array();
  $tgl_mulai = "-";
  $tgl_selesai = "-";
  $status="";

  if (isset($_POST["lihat"])) 
  {
    $tgl_mulai = $_POST["tglm"];
    $tgl_selesai = $_POST["tgls"];

    
    $ambildata=$koneksi->query("SELECT * FROM faktur_rinci JOIN  faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli JOIN status_pengiriman ON faktur_rinci.ID_Status_Pengiriman=status_pengiriman.ID_Status_Pengiriman JOIN daftar_pengiriman ON faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman JOIN status_transfer_penjual ON faktur_rinci.ID_Status_Transfer_Penjual =status_transfer_penjual.ID_Status_Transfer_Penjual JOIN penjual ON faktur_rinci.ID_Penjual =penjual.ID_Penjual 
    
    WHERE (Ket_Status_Pengiriman='$_POST[status_pengiriman]' AND
    Tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai') OR  (Ket_Status_Pengiriman='$_POST[status_pengiriman]' AND
    Ket_Status_Transfer_Penjual='$_POST[status_transfer_penjual]') OR (Ket_Status_Transfer_Penjual='$_POST[status_transfer_penjual]' AND
    Tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai')  ");
    
    while($value = $ambildata->fetch_assoc())
    {
      $semuadata[]=$value;
    }
  }
?>


<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Faktur Rinci</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=cari_fakturrinci">
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
<form method="post">
<div class="card-body">
  <div class="row">
    <div class ="col-md-3">   
      <label> <center>Tanggal Mulai </center></label>
      <input type="date" class="form-control" name= "tglm">
    </div>
    <div class ="col-md-3">
      <label><center>Tanggal Selesai</center> </label>
      <input type="date" class="form-control" name= "tgls">
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Status Transfer Penjual</label>
        <select class="form-control" name="status_transfer_penjual">
          <option value="">Pilih status</option>
          <option value="Belum Bayar">Belum di Transfer</option>
          <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
          <option value="Lunas">Sudah di Transfer</option>
          <option value="Tidak Sesuai">Tidak Sesuai Transfer</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label>Status Pengiriman</label>
        <select class="form-control" name="status_pengiriman">
          <option value="">Pilih status</option>
          <option value="Sudah Dikirim"       >Sudah Dikirim</option>
          <option value="Belum Dikirim"     >Belum Dikirim</option>
          <option value="Selesai"       >Selesai</option>
          <option value="Komplain"     >Komplain</option>
        </select>
      </div>
    </div>
    
    <div class ="col-md-12">
      <button class="btn btn-primary" name="lihat"> Lihat Laporan </button>
    </div>
    
  </div>
  
</form>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:OliveDrab;">
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
                                <?php $No=1; ?>
                                    <?php $ambildata=$koneksi->query("SELECT * FROM faktur_rinci WHERE 
                                ID_Faktur_Rinci LIKE '%$keyword%' OR
                                ID_Faktur_Beli LIKE '%$keyword%' OR
                                ID_Status_Pengiriman LIKE '%$keyword%' OR
                                Tanggal LIKE '%$keyword%' OR
                                Kode_Daftar_Pengiriman LIKE '%$keyword%' OR
                                ID_Status_Transfer_Penjual LIKE '%$keyword%' OR
                                ID_Penjual LIKE '%$keyword%' OR
                                Transfer_Uang_Penjual LIKE '%$keyword%' OR
                                QTY_Barang_Per_Toko LIKE '%$keyword%' OR
                                Total_Rinci LIKE '%$keyword%'");?>
                                    <?php while($pecah = $ambildata->fetch_assoc()){?>
                                               <tr>
                                                   <td><?php echo $No?></td>
                                                   <td><?php echo $pecah['ID_Faktur_Rinci'];?></td>
                                                   <td><?php echo $pecah['ID_Faktur_Beli'];?></td>
                                                    <td><?php echo $pecah['ID_Status_Pengiriman'];?></td>
                                                     <td><?php echo $pecah['Tanggal'];?></td>
                                                      <td><?php echo $pecah['Kode_Daftar_Pengiriman'];?></td>
                                                      <td><?php echo $pecah['ID_Status_Transfer_Penjual'];?></td>
                                                      <td><?php echo $pecah['ID_Penjual'];?></td>
                                                      <td><?php echo $pecah['Transfer_Uang_Penjual'];?></td>
                                                      <td><?php echo $pecah['QTY_Barang_Per_Toko'];?></td>
                                                      <td><?php echo $pecah['Total_Rinci'];?></td>
                                                      
                                                    <td>  <a href ="index.php?halaman=del_fakturrinci=<?php echo $db['ID_Faktur_Rinci']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
                                                    <a href ="index.php?halaman=edit_fakturrinci=<?php echo $db['ID_Faktur_Rinci']?>" class="btn btn- btn-info">Edit</a>
                                        <?php $No++;
                                        }
                                        ?> 
                                        </tbody>
                                    </thead>
                                </table>
                                <a href="tambah_fakturrinci.php?halaman=tambah_fakturrinci" class = "btn btn-primary"> Tambah Data </a>
                            </div>