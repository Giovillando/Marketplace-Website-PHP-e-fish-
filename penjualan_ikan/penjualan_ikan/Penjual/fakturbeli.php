<?php
include ('koneksi.php');
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <center><h6 class="m-0 font-weight-bold text-dark">Faktur Beli</h6></center>
                        </div>
<form method="post" action="index.php?halaman=searchfakturrinci.php">
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
        <label>Status Pembayaran</label>
        <select class="form-control" name="status_pembayaran">
          <option value="">Pilih status</option>
          <option value="STP101">Belum Bayar</option>
          <option value="STP103">Sedang Diverifikasi</option>
          <option value="STP102">Sudah Melakukan Pembayaran</option>
          <option value="STP104">Ditolak</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
    <button class="btn btn-primary" name="lihat"> Lihat Laporan </button>
    </div> 
    </div> 
</form>

 <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="50">
  <thead>
    <tr>
          <th><center> No </th>
                  <th><b> ID Faktur Beli</b></th>
                  <th><b> Nama Jasa Pembayaran </b></th>
                  <th><b> Jenis Diskon </b></th>
                  <th><b> Nama Pembeli</b></th>
                  <th><b> Status Pembayaran</b></th>
                  <th><b> Tanggal</b></th>
                  <th><b> QTY </b></th>
                  <th><b> Total </b></th>
                  <th><b> No Pembayaran</b></th>
                  <th><b> No Rekening</b></th>
                  <th><b> Aksi </b></th>
    </tr>
  <tbody>
  <?php $nomor=1; ?>
  <?php 
  $batas=5;
  $hal=isset($_GET['hal'])?(int)$_GET['hal']:1;
  $halawal=($hal>1)?($hal*$batas)-$batas:0;
  $mun=$hal-1;
  $maju=$hal+1;
  $diambil=$koneksi->query("SELECT * FROM faktur_beli inner join pembeli on faktur_beli.ID_Pembeli=pembeli.ID_Pembeli join diskon on faktur_beli.Kode_Diskon=diskon.Kode_Diskon join jasa_pembayaran on faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran inner join status_pembayaran on faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");
  $sum=mysqli_num_rows($diambil);
  $tot=ceil($sum/$batas);?>
  <?php $nomor=$halawal+1; 
  $ambil=$koneksi->query("SELECT * FROM faktur_beli inner join pembeli on faktur_beli.ID_Pembeli=pembeli.ID_Pembeli join diskon on faktur_beli.Kode_Diskon=diskon.Kode_Diskon join jasa_pembayaran on faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran inner join status_pembayaran on faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran limit $halawal, $batas");
  ?>
  <?php While($pecah=$ambil->fetch_assoc()){ ?>
  <tr>
   <td><center> <?php echo $nomor?> </td>
                  <td> <?php echo $pecah['ID_Faktur_Beli']?> </td>
                  <td> <?php echo $pecah['Nama_Jasa_Pembayaran']?> </td>
                  <td> <?php echo $pecah['Jenis_Diskon']?> </td>
                  <td> <?php echo $pecah['Nama_Pembeli']?> </td>
                  <td> <?php echo $pecah['Ket_Status_Pembayaran']?> </td>
                  <td> <?php echo $pecah['Tanggal_Faktur_Beli']?> </td>
                  <td> <?php echo $pecah['QTY']?> </td>
                  <td> RP. <?php echo number_format($pecah['Total_Bayar']); ?> </td>
                  <td> <?php echo $pecah['No_Pembayaran']?> </td>
                  <td> <?php echo $pecah['No_Rekening_Pembeli']?> </td>
      <td> 
      <div class="row">
      <a href ="hapusfakturrinci.php?ID_Faktur_Rinci=<?php echo $db['ID_Faktur_Rinci']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>  
      <a href ="ubahfakturrinci.php?halaman=ubahfakturrinci&ID_Faktur_Rinci=<?php echo $db['ID_Faktur_Rinci']?>" class="btn btn- btn-info">Edit</a>
      <a href="faktur_beli1?id=<?php echo $pecah['ID_Faktur_Beli'];?> "class="btn btn-info"> Detail </i></a>
      <?php if (($pecah['ID_Status_Pembayaran']!="StatBayar01") AND ($pecah['ID_Status_Pembayaran']!="StatBayar04")): ?>
      <a href="../lihat_pembayaran.php?id=<?php echo $pecah['ID_Faktur_Beli'];?>" class="btn btn-success" > Lihat Pembayaran </i></a> 
    </div>
  </div>
</div>
      <?php endif ?>

    <?php $nomor++; ?>
  <?php } ?>
  </tbody>
   </thead>
</table>
  <center><nav>
  <ul class="pagination justify-content-center">
    <?php if ($hal!=1) {?>
    <li class="page-item">
      <a class="page-link" <?php echo "href='?hal=$mun'"; ?>>Previous</a>
    </li>
    <?php } ?>
    <?php
      for($x=1;$x<=$tot;$x++){
    ?>
    <li class="page-item"><a class="page-link" href="?hal=<?php echo $x ?>"><?php echo $x; ?></a></li>
    <?php } ?>
    <?php if (($hal!=$tot) and ($hal!=1)) {?>
    <li class="page-item">
      <a  class="page-link" <?php echo "href='?hal=$maju'"; ?>>Next</a>
    </li>
    <?php } ?>
  </ul>
</nav></center>