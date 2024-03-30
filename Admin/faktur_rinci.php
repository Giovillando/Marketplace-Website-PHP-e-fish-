<?php
include 'koneksi.php';
$ID_Status_Pengiriman="";
$ID_Status_Transfer_Penjual="";
$strq="";
$strw="";
$jmlh=0;
$tgl_mulai="";
$tgl_selesai="";


if (isset($_POST['tgl_mulai']))
{
    $tgl_mulai=$_POST['tgl_mulai'];
} 
if (isset($_POST['tgl_selesai']))
{
    $tgl_selesai=$_POST['tgl_selesai'];
} 
if (isset($_POST['ID_Status_Pengiriman']))
{
    $ID_Status_Pengiriman=$_POST['ID_Status_Pengiriman'];
    $strc[]="faktur_rinci.ID_Status_Pengiriman='$ID_Status_Pengiriman'";
    $jmlh++;
}
if (isset($_POST['ID_Status_Transfer_Penjual']))
{
    $ID_Status_Transfer_Penjual=$_POST['ID_Status_Transfer_Penjual'];
    $strc[]="faktur_rinci.ID_Status_Transfer_Penjual='$ID_Status_Transfer_Penjual'";
    $jmlh++;
}
if (isset($_POST['keyword']))
{
    $Nama_Penjual=$_POST['keyword'];
    $strc[]="penjual.Nama_Penjual LIKE '%$Nama_Penjual%'";
    $jmlh++;
} 

$i=1;
if($jmlh>0)
{
    $strw="WHERE ";
    foreach ($strc as $strs)
    {
        $strw .=$strs;
        if($i<$jmlh)
        {
            $strw .=" AND ";
            $i++;
        }
    }
}
$query="SELECT * FROM faktur_rinci JOIN  faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli JOIN
         status_pengiriman ON faktur_rinci.ID_Status_Pengiriman=status_pengiriman.ID_Status_Pengiriman JOIN daftar_pengiriman 
         ON faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman JOIN status_transfer_penjual ON 
         faktur_rinci.ID_Status_Transfer_Penjual =status_transfer_penjual.ID_Status_Transfer_Penjual JOIN penjual ON 
         faktur_rinci.ID_Penjual =penjual.ID_Penjual $strw AND faktur_rinci.Tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
$result=mysqli_query($koneksi,$query);
$resnum=mysqli_num_rows($result);                   
$pecah2=$koneksi->query("SELECT * From status_transfer_penjual");
$pecah3=$koneksi->query("SELECT * From status_pengiriman");                                  
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">FAKTUR RINCI </h5></center>
                        </div>
                        </ol>
</p> 

<form action="index.php?halaman=faktur_rinci" method="post" class="form">
    <br/>
    <div class="form-inline">
      <input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Pembeli" autofocus autocomplete="off">
    <div class="text-end">
      <button class="btn btn-primary" name="cari">Cari</button>
    </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Tanggal Mulai :</label>
                <input type="date" class="form-control" name="tgl_mulai" value="<?php echo $tgl_mulai?>" required >
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Tanggal Selesai :</label>
                <input type="date" class="form-control" name="tgl_selesai" value="<?php echo $tgl_selesai?>" required >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Kota :</label>
                <select class="form-control" name="ID_Status_Pengiriman">
                    <option selected disabled>-- PILIH STATUS PENGIRIMAN -- </option>
                    <?php while($row = mysqli_fetch_assoc($pecah3)) { ?>
                        <option value="<?php echo $row['ID_Status_Pengiriman']; ?>"> <?php echo $row['Ket_Status_Pengiriman']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Kota :</label>
                <select class="form-control" name="ID_Status_Transfer_Penjual">
                    <option selected disabled>-- PILIH STATUS TRANSFER PENJUAL -- </option>
                    <?php while($row = mysqli_fetch_assoc($pecah2)) { ?>
                        <option value="<?php echo $row['ID_Status_Transfer_Penjual']; ?>"> <?php echo $row['Ket_Status_Transfer_Penjual']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <br/>
            <input type="submit" class="btn btn-primary mb-4" name="submit" value="Search">
        </div>
    </div>
    <br/><br/>
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
                        </thead>
    <tbody>
         <?php $nomor=1;?>
         <?php while($pecah=$result->fetch_assoc()){?>
        
            <tr>
            <td><?php echo $nomor?></td>
            <td><?php echo $pecah['ID_Faktur_Rinci'];?></td>
            <td><?php echo $pecah['ID_Faktur_Beli'];?></td>
            <td><?php echo $pecah['Ket_Status_Pengiriman'];?></td>
            <td><?php echo $pecah['Tanggal'];?></td>
            <td><?php echo $pecah['Kode_Daftar_Pengiriman'];?></td>
            <td><?php echo $pecah['Ket_Status_Transfer_Penjual'];?></td>
            <td><?php echo $pecah['Nama_Penjual'];?></td>
            <td>Rp.<?php echo number_format( $pecah['Transfer_Uang_Penjual']);?></td>
            <td><?php echo $pecah['QTY_Barang_Per_Toko'];?></td>
            <td><?php echo $pecah['Total_Rinci'];?></td>
            <td> 

             <a href ="del_fakturbeli.php?ID_Faktur_Rinci=<?php echo $pecah['ID_Faktur_Rinci']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>  
             <a href ="edit_fakturbeli.php?ID_Faktur_Beli=<?php echo $pecah['ID_Faktur_Beli']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-warning">Edit</a> 
                          
                        <?php if($pecah['Ket_Status_Pengiriman']=="Belum Dikirim"  ):?>
                      <a href="index.php?halaman=pengirimanrinci&id=<?php echo $pecah['ID_Faktur_Rinci']?>" class="btn btn-info">Lihat Pengiriman</a>
                        <?php endif?>

                        <?php if($pecah['Ket_Status_Pengiriman']=="Barang Dikemas"  ):?>
                      <a href="index.php?halaman=pengirimanrinci&id=<?php echo $pecah['ID_Faktur_Rinci']?>" class="btn btn-info">Lihat Pengiriman</a>
                        <?php endif?>

                        <?php if($pecah['Ket_Status_Pengiriman']=="Retur Barang"  ):?>
                      <a href="index.php?halaman=lihat_penilaian&id=<?php echo $pecah['ID_Faktur_Rinci']?>" class="btn btn-success">Lihat Komplain</a>
                        <?php endif?>

                        <?php if($pecah['Ket_Status_Pengiriman']=="Barang Dikirim" AND  $pecah['Ket_Status_Transfer_Penjual']=="Belum Ditransfer" ):?>
                      <a href="index.php?halaman=detailfakturrinci&id=<?php echo $pecah['ID_Faktur_Rinci']?>" class="btn btn-info">Detail</a>
                        <?php endif?>

                        <?php if($pecah['Ket_Status_Pengiriman']=="Barang Diterima" AND  $pecah['Ket_Status_Transfer_Penjual']=="Belum Ditransfer" ):?>
                      <a href="index.php?halaman=transferpenjual&id=<?php echo $pecah['ID_Faktur_Rinci']?>" class="btn btn-info">Transfer Penjual</a>
                        <?php endif?>

                        <?php if($pecah['Ket_Status_Transfer_Penjual']=="Sudah Ditransfer"  ):?>
                            <a href="index.php?halaman=detailfakturrinci&id=<?php echo $pecah['ID_Faktur_Rinci']?>" class="btn btn-info">Detail</a>
                        <?php endif?>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>
            <a href="index.php?halaman=tambah_fakturbeli" class = "btn btn-primary"> Tambah Data </a>
</div>
</div>
</tbody>