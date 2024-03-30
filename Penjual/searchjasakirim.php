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

$query=mysqli_query($koneksi, "SELECT * FROM jasa_kirim WHERE Nama_Jasakirim LIKE '%$keyword%'
 OR ID_Jasakirim LIKE '%$keyword%'")


?>
<h3> Jasa Kirim </h3>


		<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchjasakirim">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan ID Jenis atau Nama Jasa Kirim" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</form>

<table class="table table-bordered"background="20.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID Jasa Kirim</th>
			<th>Nama Jasa Kirim</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=mysqli_query($koneksi, "SELECT * jasa_kirim WHERE Nama_Jasakirim LIKE '%$keyword%' OR ID_Jasakirim LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Jasakirim']; ?></td>
			<td><?php echo $pecah['Nama_Jasakirim']; ?></td>
			<td>
				<a href="index.php?halaman=hapusjasakirim&id=<?php echo $pecah['ID_Jasakirim']; ?>" 
				class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahjasakirim&id=<?php echo $pecah['ID_Jasakirim']; ?>" class="btn-warning btn">ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<td>
	<a href="index.php?halaman=tambahjasakirim" class="btn-info btn">Tambah</a>
</td>