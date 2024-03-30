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

$query=mysqli_query($koneksi, "SELECT*FROM sistem_pengiriman 
		JOIN jasa_kirim ON sistem_pengiriman.ID_Jasakirim=jasa_kirim.ID_Jasakirim
		JOIN kategori_jasa On sistem_pengiriman.ID_Kategori=kategori_jasa.ID_Kategori WHERE ID_Sistemjasa LIKE '%$keyword%'
 OR Nama_Jasakirim LIKE '%$keyword%' OR Nama_Kategori LIKE '%$keyword%'")


?>
<h3>Barang</h3>


		<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchsistempengiriman">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan ID atau Nama Jasa Kirim atau Nama Kategori" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</form>
 <br>
 
 
 <table class="table table-bordered"background="29.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>ID Sistem Jasa</th>
			<th>Nama Jasa Kirim</th>
			<th>Nama Kategori</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT*FROM sistem_pengiriman 
		JOIN jasa_kirim ON sistem_pengiriman.ID_Jasakirim=jasa_kirim.ID_Jasakirim
		JOIN kategori_jasa On sistem_pengiriman.ID_Kategori=kategori_jasa.ID_Kategori
		"); ?>
		
		<?php $ambil=mysqli_query($koneksi, "SELECT*FROM sistem_pengiriman 
		JOIN jasa_kirim ON sistem_pengiriman.ID_Jasakirim=jasa_kirim.ID_Jasakirim
		JOIN kategori_jasa On sistem_pengiriman.ID_Kategori=kategori_jasa.ID_Kategori WHERE ID_Sistemjasa LIKE '%$keyword%'
 OR Nama_Jasakirim LIKE '%$keyword%' OR Nama_Kategori LIKE '%$keyword%'");?>
		
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['ID_Sistemjasa']; ?></td>
			<td><?php echo $pecah['Nama_Jasakirim']; ?></td>
			<td><?php echo $pecah['Nama_Kategori']; ?></td>
			<td>
				<a href="index.php?halaman=hapussistempengiriman&id=<?php echo $pecah['ID_Sistemjasa']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahsistempengiriman&id=<?php echo $pecah['ID_Sistemjasa']; ?>" class="btn-warning btn">ubah</a>
			</td>

		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<td>
	<a href="index.php?halaman=tambahsistempengiriman" class="btn-info btn">Tambah</a>
</td>