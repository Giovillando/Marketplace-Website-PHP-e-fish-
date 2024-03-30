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

$query=mysqli_query($koneksi, "SELECT * FROM Penjual WHERE ID_Penjual LIKE '%$keyword%'
 OR Nama_Penjual LIKE '%$keyword%' OR No_Penjual LIKE '%$keyword%'")


?>
<h3> Penjual</h3>


		<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchpenjual">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan ID atau Nama atau Nomor Penjual" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</form>
<br>
<table class="table table-bordered"background="28.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID Penjual</th>
			<th>Nama Penjual</th>
			<th>Nomor Penjual</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=mysqli_query($koneksi, "SELECT * FROM Penjual WHERE ID_Penjual LIKE '%$keyword%'
 OR Nama_Penjual LIKE '%$keyword%' OR No_Penjual LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Penjual']; ?></td>
			<td><?php echo $pecah['Nama_Penjual']; ?></td>
			<td><?php echo $pecah['No_Penjual']; ?></td>
			<td>
				<a href="index.php?halaman=hapuspenjual&id=<?php echo $pecah['ID_Penjual']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahpenjual&id=<?php echo $pecah['ID_Penjual']; ?>" class="btn-warning btn">ubah</a>
			</td>

		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<td>
	<a href="index.php?halaman=tambahpenjual" class="btn-info btn">Tambah</a>
</td>