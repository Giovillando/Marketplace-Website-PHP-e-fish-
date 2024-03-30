<h2> TUJUAN </h2>
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchtujuan">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan ID atau Nama Kota" autofocus autocomplete="off">
			
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</div>
		</form>

<br>
<table class="table table-bordered"background="33.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID Tujuan</th>
			<th>Nama Kota</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT*FROM Tujuan"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Tujuan']; ?></td>
			<td><?php echo $pecah['Nama_Kota']; ?></td>
			<td>
				<a href="index.php?halaman=hapustujuan&id=<?php echo $pecah['ID_Tujuan']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahtujuan&id=<?php echo $pecah['ID_Tujuan']; ?>" class="btn-warning btn">ubah</a>
			</td>

		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<td>
	<a href="index.php?halaman=tambahtujuan" class="btn-info btn">Tambah</a>
</td>