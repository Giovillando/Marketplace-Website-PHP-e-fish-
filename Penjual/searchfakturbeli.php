<form method="post" action="index.php?halaman=cari_fakturbeli">
	<div class="row">
		<div class="col-md-3">
		<div class="form-group">
				<label> Dari Tanggal </label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai?>">
			</div>
		</div>
		<div class="col-md-3">
		<div class="form-group">
				<label> Sampai Tanggal </label>
				<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai?>">
			</div>
		</div>
		</div>
		<div class="row">
		
		<div class="col-md-3">
			<div class="form-group">
				<label>Status Bayar</label>
				<select class="form-control" name="status1">
					<option value=" " >Pilih status bayar</option>
					<option value="Sudah Bayar">Sudah Bayar</option>
					<option value="Belum Bayar">Belum Bayar</option>
					<option value="Pembayaran Sedang Diverifikasi">Pembayaran Sedang Diverifikasi</option>
					<option value="Pembayaran Ditolak">Pembayaran Ditolak</option>
				</select>
			</div>
		</div>
		
		<div class="col-md-2">
			<label></label><br>
			<button class="btn btn-primary" name="lihat">Lihat</button>
		</div>
	</div>
</form>
<br>
<?php 
$semuadata=array();
$tgl_mulai = "-";
$tgl_selesai = "-";
if(isset($_POST["lihat"]))
{
	$tgl_mulai=$_POST["tglm"];
	$tgl_selesai=$_POST["tgls"];
	$status1=$_POST["status1"];
	$ambil=$koneksi->query("SELECT*FROM faktur_beli JOIN pembeli ON faktur_beli.ID_Pembeli=pembeli.ID_Pembeli
							JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran
							Join status_pembayaran on faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran
							WHERE Ket_Status_Pembayaran='$status1' OR Tanggal_Faktur_Beli BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}



?>
<br>
<div class="container-fluid px-4">
<center><h3> Data Faktur dari <?php echo $tgl_mulai?> hingga <?php echo $tgl_selesai?> </h3>
</center>
<br>
</div>
<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                FAKTUR 
                            </div>
                            <div class="card-body">
<table id="datatablesSimple" class="table table-bordered border-dark" background="bgtable.png">
	<thead>
	<thead>
		<tr>
			<th> No. </th>
			<th> Kode Faktur </th>
			<th> Nama Pembeli </th>
			<th> Pengiriman </th>
			<th> Tanggal </th>
			<th> jasa Pembayaran </th>
			<th> Status bayar </th>
			<th> Status Kirim </th>
			<th> Diskon</th>
			<th> Total Bayar </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php foreach ($semuadata as $key =>$value):?>
		<tr>
			<td><?php echo $key+1;?></td>
			<td> <?php echo $value['ID_Faktur_Beli']; ?></td>          
			<td> <?php echo $value['Jenis_Diskon']; ?> </td>
			<td> <?php echo $value['Tanggal_Faktur_Beli']; ?></td>
			<td><?php echo $value['Nama_Pembeli']; ?></td>
			<td><?php echo $value['Ket_Status_Pembayaran']; ?></td>
			<td><?php echo $value['Nama_Jasa_Pembayaran']; ?></td>
			<td><?php echo $value['Total_Barang']; ?></td>
            <td> Rp.<?php echo number_format($value['Total_Bayar']); ?></td>
			<td><?php echo $value['QTY']; ?></td>
			<td><?php echo $value['No_Rekening_Pembeli']; ?></td>
            <td><?php echo $value['No_Pembayaran']; ?></td>
			<td> 
            <a href ="del_fakturbeli.php?ID_Faktur_Beli=<?php echo $db['ID_Faktur_Beli']?>" onclick ="return confirm ('Apakah anda yakin ingin menghapus data?')"name="hapus" class="btn btn-danger">Delete</a>   
            <a href ="edit_fakturbeli.php?halaman=edit_fakturbeli&ID_Faktur_Beli=<?php echo $db['ID_Faktur_Beli']?>" class="btn btn- btn-info">Edit</a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		</tr>
	</tfoot>
</table>
<a href="index.php?halaman=tambah_fakturbeli" class = "btn btn-primary"> Tambah Data </a>
</div>
</div>