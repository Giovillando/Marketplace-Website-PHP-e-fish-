<h2> PENGIRIMAN </h2>
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchpengiriman">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan ID atau Nama Kota" autofocus autocomplete="off">
			
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</form>
 <br>
<table class="table table-bordered"background="27.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID Pengiriman</th>
			<th>Sistem Jasa</th>
			<th>Nama Kota</th>
			<th>Ongkir</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT*FROM pengiriman 
		 JOIN tujuan ON pengiriman.ID_Tujuan=tujuan.ID_Tujuan
					JOIN sistem_pengiriman ON pengiriman.ID_Sistemjasa=sistem_pengiriman.ID_Sistemjasa
					JOIN jasa_kirim ON sistem_pengiriman.ID_Jasakirim=jasa_kirim.ID_Jasakirim
					JOIN kategori_jasa ON sistem_pengiriman.ID_Kategori=kategori_jasa.ID_Kategori"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Pengiriman']; ?></td>
			<td><?php echo $pecah['Nama_Jasakirim']; ?>-<?php echo $pecah['Nama_Kategori']; ?></td>
			<td><?php echo $pecah['Nama_Kota']; ?></td>
			<td><?php echo number_format ($pecah['Ongkir']); ?></td>
			<td>
				<a href="index.php?halaman=hapuspengiriman&id=<?php echo $pecah['ID_Pengiriman']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahpengiriman&id=<?php echo $pecah['ID_Pengiriman']; ?>" class="btn-warning btn">ubah</a>
			</td>

		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<td>
	<a href="index.php?halaman=tambahpengiriman" class="btn-info btn">Tambah</a>
</td>