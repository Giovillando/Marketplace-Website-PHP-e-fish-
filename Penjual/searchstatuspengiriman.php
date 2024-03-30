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

$query=mysqli_query($koneksi, "SELECT * FROM Status_Pengiriman WHERE ID_Statkirim LIKE '%$keyword%'
 OR Ket_Statkirim LIKE '%$keyword%'")


?>
<h3> Status Pengiriman</h3>


		<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchstatuspengiriman">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan ID atau Keterangan Status Pengiriman" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</form>
<br>
<table class="table table-bordered"background="31.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID Status Pengiriman</th>
			<th>Keterangan Status Pengiriman</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=mysqli_query($koneksi, "SELECT * FROM Status_Pengiriman WHERE ID_Statkirim LIKE '%$keyword%' OR Ket_Statkirim LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Statkirim']; ?></td>
			<td><?php echo $pecah['Ket_Statkirim']; ?></td>
			<td>
				<a href="index.php?halaman=hapusstatuspengiriman&id=<?php echo $pecah['ID_Statkirim']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahstatuspengiriman&id=<?php echo $pecah['ID_Statkirim']; ?>" class="btn-warning btn">ubah</a>
			</td>

		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<td>
	<a href="index.php?halaman=tambahstatuspengiriman" class="btn-info btn">Tambah</a>
</td>