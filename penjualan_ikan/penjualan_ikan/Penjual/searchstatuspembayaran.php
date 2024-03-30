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

$query=mysqli_query($koneksi, "SELECT * FROM Status_Pembayaran WHERE ID_Statbayar LIKE '%$keyword%'
 OR Ket_Statbayar LIKE '%$keyword%'")


?>
<h3> Status Pembayaran </h3>


		<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchstatuspembayaran">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan ID Jenis atau Keterangan Status Pembayaran" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</form>
<br>
<table class="table table-bordered"background="30.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID Status Pembayaran</th>
			<th>Keterangan Status Pembayaran</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=mysqli_query($koneksi, "SELECT * FROM Status_Pembayaran WHERE ID_Statbayar LIKE '%$keyword%' OR Ket_Statbayar LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Statbayar']; ?></td>
			<td><?php echo $pecah['Ket_Statbayar']; ?></td>
			<td>
				<a href="index.php?halaman=hapusstatuspembayaran&id=<?php echo $pecah['ID_Statbayar']; ?>"
				class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahstatuspembayaran&id=<?php echo $pecah['ID_Statbayar']; ?>"
				class="btn-warning btn">ubah</a>
			</td>

		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<td>
	<a href="index.php?halaman=tambahstatuspembayaran" class="btn-info btn">Tambah</a>
</td>