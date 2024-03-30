<h2> TAGIHAN </h2>

<table class="table table-bordered"background="32.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID Tagihan</th>
			<th>Total Tagihan</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT*FROM Tagihan"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Tagihan']; ?></td>
			<td>Rp<?php echo number_format ($pecah['Total_Tagihan']); ?></td>
			<td>
				<a href="index.php?halaman=hapustagihan&id=<?php echo $pecah['ID_Tagihan']; ?>"
				class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahtagihan&id=<?php echo $pecah['ID_Tagihan']; ?>"
				class="btn-warning btn">ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<td>
	<a href="index.php?halaman=tambahtagihan" class="btn-info btn">Tambah</a>
</td>