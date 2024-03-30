<?php

if(isset($_POST['cari']))
{
	$_SESSION['session_pencarian'] = $_POST["keyword"];
	$keyword=$_SESSION['session_pencarian'];
}
else
{
	$keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT*FROM nota 
		JOIN pembeli ON nota.ID_Pembeli=pembeli.ID_Pembeli
		JOIN pembayaran On nota.ID_Pembayaran=pembayaran.ID_Pembayaran
		JOIN status_pengiriman On nota.ID_Statkirim=status_pengiriman.ID_Statkirim
		JOIN status_pembayaran On nota.ID_Statbayar=status_pembayaran.ID_Statbayar
		JOIN tagihan On nota.ID_Tagihan=tagihan.ID_Tagihan WHERE ID_Ajuandana LIKE '%$keyword%'
 ")


?>
<h2> LAPORAN DANA </h2>
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchlaporandana">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Keterangan(Belum Diajukan),(Sedang Diajukan),(Diproses),(Selesai),(Komplain)" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</div>
</form>

<br>
<table class="table table-bordered"background="23.jpg">
	<thead>
		<tr>
			<th>NO Nota</th>
			<th>Tanggal Pemesanan</th>
			<th>Nama Pembeli</th>
			<th>Metode Pembayaran</th>
			<th>Keterangan Status Pembayaran</th>
			<th>Keterangan Status Pengiriman</th>
			<th>Total Tagihan</th>
			<th>ID Pengiriman</th>
			<th>Keterangan</th>
			<th>Aksi Dana</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		
				<?php $ambil=mysqli_query($koneksi, "SELECT*FROM nota 
		JOIN pembeli ON nota.ID_Pembeli=pembeli.ID_Pembeli
		JOIN pembayaran On nota.ID_Pembayaran=pembayaran.ID_Pembayaran
		JOIN status_pengiriman On nota.ID_Statkirim=status_pengiriman.ID_Statkirim
		JOIN status_pembayaran On nota.ID_Statbayar=status_pembayaran.ID_Statbayar
		JOIN tagihan On nota.ID_Tagihan=tagihan.ID_Tagihan WHERE ID_Ajuandana LIKE '%$keyword%'");?>
<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $pecah['No_Nota']; ?></td>
			<td><?php echo $pecah['Tgl_Pesan']; ?></td>
			<td><?php echo $pecah['Nama_Pembeli']; ?></td>
			<td><?php echo $pecah['Met_Pembayaran']; ?></td>
			<td><?php echo $pecah['Ket_Statbayar']; ?></td>
<td>
				<?php echo $pecah['Ket_Statkirim']; ?>
				</br>
				<?php if (!empty($pecah["noresi"])): ?>
					Resi : <?php echo $pecah['noresi']; ?>
				<?php endif ?>
			</td>			<td>Rp<?php echo number_format ($pecah['Total_Tagihan']); ?></td>
			<td><?php echo $pecah['ID_Pengiriman']; ?></td>
			<td>
				<a href="index.php?halaman=detailnota&id=<?php echo $pecah['No_Nota']; ?>"
				class="btn-primary btn">detail</a>
				<?php if($pecah['Ket_Statbayar']!=="Belum Bayar"):?>
				<a href="index.php?halaman=pembayarann&id=<?php echo $pecah['No_Nota']?>
				" class="btn btn-success"> Lihat Pembayaran</a>
				<?php endif?>
				
				<?php if($pecah['Ket_Statbayar']=="Sudah Bayar" AND ($pecah['Ket_Statkirim']=="Selesai" OR $pecah['Ket_Statkirim']=="Komplain")):?>
				<a href="index.php?halaman=penilaian&id=<?php echo $pecah['No_Nota']?>
				" class="btn btn-warning"> Lihat Penilaian</a>
				<?php endif?>
			</td>
			<td>
			<?php if($pecah['ID_Ajuandana']=="Sedang Diajukan" ):?>
			<a href="index.php?halaman=konfirmasiajuandana&id=<?php echo $pecah['No_Nota']; ?>"
				class="btn btn-primary btn-xs">Lihat Ajuan Penarikan Dana</a>
				<?php endif?>
				<?php if($pecah['ID_Ajuandana']=="Belum Diajukan" ):?>
									<div class="alert alert-info"> <strong>Belum Diajukan</strong> </div>

				<?php endif?>
				<?php if($pecah['ID_Ajuandana']=="Diproses" ):?>
			<div class="alert alert-info"> <strong>Diproses</strong> </div>
				<?php endif?>
				<?php if($pecah['ID_Ajuandana']=="Selesai" ):?>
						<div class="alert alert-info"> <strong>Diterima</strong> </div>
				<?php endif?>
				
				<?php if($pecah['ID_Ajuandana']=="Komplain" ):?>
						<div class="alert alert-info"> <strong>Komplain</strong> </div>
				<?php endif?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>