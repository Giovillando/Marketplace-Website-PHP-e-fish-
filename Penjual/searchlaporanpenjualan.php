

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

$query=mysqli_query($koneksi, "SELECT * FROM transaksi LEFT 
	JOIN barang ON transaksi.ID_Barang=barang.ID_Barang
	JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual
JOIN nota ON transaksi.No_Nota=nota.No_Nota  WHERE 
  OR Nama_Penjual LIKE '%$keyword%' ")


?>
<h3>Laporan Penjualan Barang</h3>


		<form class="form-horizontal" role="search" method="post" action="index.php?halaman=searchlaporanpenjualan">
		<div class="">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Nama Penjual" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
		</form>
 <br>
<table class="table table-bordered"background="37.jpg">
		<thead>
		<tr>
			<th>No</th>
			<th>Nama Barang</th>
						<th>Nama Penjual</th>
						<th>Harga </th>

			<th>Foto </th>
						<th> Jumlah Stok </th>

			<th>Stok Terjual</th>
			<th>Sisa Stok</th>
						<th>Total Harga Terjual</th>

		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=mysqli_query($koneksi,"SELECT *, sum(QTY) AS QTY FROM transaksi
    						inner join barang on transaksi.ID_Barang = barang.ID_Barang 
							inner JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual
							inner join nota on transaksi.No_Nota=nota.No_Nota  		 
								GROUP BY barang.ID_Barang order by QTY desc limit 5");?>
		<?php $ambil=mysqli_query($koneksi, "SELECT * FROM transaksi LEFT 
	JOIN barang ON transaksi.ID_Barang=barang.ID_Barang
	JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual
JOIN nota ON transaksi.No_Nota=nota.No_Nota  WHERE Nama_Penjual LIKE '%$keyword%' ");?>
<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah["Nama_Barang"]; ?></td>
			<td><?php echo $pecah["Nama_Penjual"]; ?></td>
			<td><?php echo $pecah["Harga"]; ?></td>
			<td> 
				<img src="../foto_barang/<?php echo $pecah['Foto'];?>" width="100">
			</td>
			<td><?php echo ($pecah["Stok"]+$pecah['QTY']); ?></td>
			<td><?php echo $pecah["QTY"]; ?></td>
				<td><?php echo number_format ($pecah['Stok']); ?> </td>
				<td>Rp. <?php echo number_format($pecah['Harga']*$pecah['QTY']); ?> </td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>