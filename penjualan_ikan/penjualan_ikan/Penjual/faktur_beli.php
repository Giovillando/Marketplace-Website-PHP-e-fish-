<?php
include 'koneksi.php';
$ID_Status_Pembayaran="";
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
if (isset($_POST['ID_Status_Pembayaran']))
{
    $ID_Status_Pembayaran=$_POST['ID_Status_Pembayaran'];
    $strc[]="faktur_beli.ID_Status_Pembayaran='$ID_Status_Pembayaran'";
    $jmlh++;
}
if (isset($_POST['keyword']))
{
    $Nama_Pembeli=$_POST['keyword'];
    $strc[]="pembeli.Nama_Pembeli LIKE '%$Nama_Pembeli%'";
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
$penjual=$_SESSION["Username_Penjual"]["ID_Penjual"];
$query="SELECT *FROM faktur_beli  JOIN pembeli ON faktur_beli.ID_Pembeli=pembeli.ID_Pembeli 
        inner JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran 
        inner JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran
        inner JOIN diskon on faktur_beli.Kode_Diskon=diskon.Kode_Diskon
        inner JOIN faktur_rinci ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli 
        JOIN penjual ON faktur_rinci.ID_Penjual=penjual.ID_Penjual $strw AND penjual.ID_Penjual='$penjual' AND Tanggal_Faktur_Beli BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
$result=mysqli_query($koneksi,$query);
$resnum=mysqli_num_rows($result);                   
$pecah2=$koneksi->query("SELECT * From status_pembayaran");                                   
?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <center> <h5 class="m-0 font-weight-bold text-dark">FAKTUR BELI </h5></center>
                        </div>
                        </ol>
</p> 

<form action="index.php?halaman=faktur_beli" method="post" class="form">
    <br/>
    <div class="form-inline">
      <input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Pembeli" autofocus autocomplete="off">
    <div class="text-end">
      <button class="btn btn-primary" name="cari">Cari</button>
    </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Mulai :</label>
                <input type="date" class="form-control" name="tgl_mulai" value="<?php echo $tgl_mulai?>" required >
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Selesai :</label>
                <input type="date" class="form-control" name="tgl_selesai" value="<?php echo $tgl_selesai?>" required >
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Kota :</label>
                <select class="form-control" name="ID_Status_Pembayaran">
                    <option selected disabled>-- PILIH STATUS PEMBAYARAN -- </option>
                    <?php while($row = mysqli_fetch_assoc($pecah2)) { ?>
                        <option value="<?php echo $row['ID_Status_Pembayaran']; ?>"> <?php echo $row['Ket_Status_Pembayaran']; ?></option>
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
    

            <div class="card">
              <!-- /.card-header -->
               <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:rebeccapurple;">
                            <thead>
                            <tr>
                                <th> No. </th>
                                <th> ID Faktur Beli </th>
                                <th> Diskon </th>
                                <th> Tanggal </th>
                                <th> Nama Pembeli </th>
                                <th> Status Pembayaran </th>
                                <th> Jasa Pembayaran </th>
                                <th> Total Barang </th>
                                <th> Total Bayar </th>
                                <th> QTY </th>
                                <th> No Rekening Pembeli </th>
                                <th> No Pembayaran </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php while($pecah=$result->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td> <?php echo $pecah['ID_Faktur_Beli']; ?></td>
            <td> <?php echo $pecah['Jenis_Diskon']; ?> </td>
            <td><?php echo $pecah['Tanggal_Faktur_Beli']; ?></td>
            <td> <?php echo $pecah['Nama_Pembeli']; ?></td>
            <td><?php echo $pecah['Ket_Status_Pembayaran']; ?></td>
            <td><?php echo $pecah['Nama_Jasa_Pembayaran']; ?></td>
            <td><?php echo $pecah['Total_Barang']; ?></td>
            <td>Rp.<?php echo number_format ($pecah['Total_Bayar']); ?></td>
            <td><?php echo $pecah['QTY']; ?></td>
            <td><?php echo $pecah['No_Rekening_Pembeli']; ?></td>
            <td><?php echo $pecah['No_Pembayaran']; ?></td>
            <td> 
                
                         <a href ="del_fakturbeli.php?ID_Faktur_Beli=<?php echo $pecah['ID_Faktur_Beli']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>  

                                               
                        <?php if($pecah['Ket_Status_Pembayaran']=="Pembayaran Sedang Diverifikasi"  ):?>
                       <a href="index.php?halaman=bayar&id=<?php echo $pecah['ID_Faktur_Beli']?>" class="btn btn-success"> Lihat Pembayaran</a>
                        <?php endif?>

                        <?php if($pecah['Ket_Status_Pembayaran']=="Sudah Bayar"  ):?>
                            <a href="index.php?halaman=detailfakturbeli&id=<?php echo $pecah['ID_Faktur_Beli']?>" class="btn btn-info" > Detail</a> <?php if($pecah['Ket_Status_Pembayaran']!=="Belum Dibayar"):?> 
                        <?php endif?>
                        
                        <?php if($pecah['Ket_Status_Pembayaran']=="Belum Bayar"  ):?>                                                   
                           <a href="index.php?halaman=bayar&id=<?php echo $pecah['ID_Faktur_Beli']?>" class="btn btn-success"> Lihat Pembayaran</a>
                        <?php endif?>

                         <?php if($pecah['Ket_Status_Pembayaran']=="Pembayaran Ditolak"  ):?>
                        <?php endif?>
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