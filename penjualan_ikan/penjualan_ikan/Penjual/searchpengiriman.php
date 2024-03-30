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

$query=mysqli_query($koneksi, "SELECT * FROM pengiriman WHERE ID_Pengiriman LIKE '%$keyword%'
 OR ID_Sistemjasa LIKE '%$keyword%'OR Nama_Kota LIKE '%$keyword%'OR Ongkir LIKE '%$keyword%'")


?>
<h3> Pengiriman </h3>


		<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchpengiriman">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan ID Jenis atau Nama Kota" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</form>

<table class="table table-bordered"background="27.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID Pengiriman</th>
			<th>ID Sistem Jasa</th>
			<th>Nama Kota</th>
			<th>Ongkir</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT*FROM pengiriman 
		JOIN tujuan On pengiriman.ID_Tujuan=tujuan.ID_Tujuan
		"); ?>
		
				<?php $ambil=mysqli_query($koneksi, "SELECT * FROM pengiriman 
		JOIN tujuan On pengiriman.ID_Tujuan=tujuan.ID_Tujuan WHERE ID_Pengiriman LIKE '%$keyword%'
 OR ID_Sistemjasa LIKE '%$keyword%'OR Nama_Kota LIKE '%$keyword%'OR Ongkir LIKE '%$keyword%'");?>

		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Pengiriman']; ?></td>
			<td><?php echo $pecah['ID_Sistemjasa']; ?></td>
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