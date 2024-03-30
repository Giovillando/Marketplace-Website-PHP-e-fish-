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

$query=mysqli_query($koneksi, "SELECT * FROM Kategori_Jasa WHERE Nama_Kategori LIKE '%$keyword%'
 OR ID_Kategori LIKE '%$keyword%'")


?>
<h3> Kategori Jasa </h3>


		<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchkategorijasa">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan ID Jenis atau Nama Kategori Jasa" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</form>

<table class="table table-bordered"background="26.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID Kategori</th>
			<th>Nama Kategori</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=mysqli_query($koneksi, "SELECT * FROM Kategori_Jasa WHERE Nama_Kategori LIKE '%$keyword%' OR ID_Kategori LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Kategori']; ?></td>
			<td><?php echo $pecah['Nama_Kategori']; ?></td>
			<td>
				<a href="index.php?halaman=hapuskategorijasa&id=<?php echo $pecah['ID_Kategori']; ?>" 
				class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahkategorijasa&id=<?php echo $pecah['ID_Kategori']; ?>"
				class="btn-warning btn">ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<td>
	<a href="index.php?halaman=tambahkategorijasa" class="btn-info btn">Tambah</a>
</td>