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

$query=mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE ID_Pembayaran LIKE '%$keyword%'
 OR Met_Pembayaran LIKE '%$keyword%'")


?>
<h3> Pembayaran</h3>


		<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchpembayaran">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan ID Jenis atau Nama Jenis" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</form>

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
		<?php $ambil=mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE ID_Pembayaran LIKE '%$keyword%' OR Met_Pembayaran LIKE '%$keyword%'");?>
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