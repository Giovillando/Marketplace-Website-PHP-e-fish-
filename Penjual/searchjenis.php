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

$query=mysqli_query($koneksi, "SELECT * FROM jenis_barang WHERE Nama_Jenis LIKE '%$keyword%'
 OR ID_Jenis LIKE '%$keyword%'")


?>
<h3> Jenis Barang </h3>


		<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchjenis">
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

<table class="table table-bordered"background="22.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID Jenis</th>
			<th>Nama Jenis</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=mysqli_query($koneksi, "SELECT * FROM jenis_barang WHERE Nama_Jenis LIKE '%$keyword%' OR ID_Jenis LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Jenis']; ?></td>
			<td><?php echo $pecah['Nama_Jenis']; ?></td>
			<td>
				<a href="index.php?halaman=hapusjenisbarang&id=<?php echo $pecah['ID_Jenis']; ?>"
				class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahjenisbarang&id=<?php echo $pecah['ID_Jenis']; ?>"
				class="btn-warning btn">ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<td>
	<a href="index.php?halaman=tambahjenisbarang" class="btn-info btn">Tambah</a>
</td>