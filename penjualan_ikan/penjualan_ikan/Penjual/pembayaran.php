<h2> PEMBAYARAN </h2>
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchpembayaran">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan ID atau Metode Pembayaran" autofocus autocomplete="off">
			
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</form>
 <br>
<table class="table table-bordered"background="24.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID Pembayaran</th>
			<th>Metode Pembayaran</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT*FROM pembayaran"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Pembayaran']; ?></td>
			<td><?php echo $pecah['Met_Pembayaran']; ?></td>
			<td>
				<a href="index.php?halaman=hapuspembayaran&id=<?php echo $pecah['ID_Pembayaran'];?>"
				class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahpembayaran&id=<?php echo $pecah['ID_Pembayaran'];?>"
				class="btn-warning btn">ubah</a>
			</td>

		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<td>
	<a href="index.php?halaman=tambahpembayaran" class="btn-info btn">Tambah</a>
</td>