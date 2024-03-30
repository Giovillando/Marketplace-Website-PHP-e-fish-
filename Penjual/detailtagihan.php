<h2> DETAIL TAGIHAN </h2>
<?php 
$ambill= $koneksi->query("SELECT * FROM Nota JOIN pengiriman 
						ON Nota.ID_Pengiriman=pengiriman.ID_Pengiriman 
						WHERE Nota.No_Nota='$_GET[id]'");
$detaill = $ambill->fetch_assoc();
?>
<h2> DETAIL PEMBELIAN </h2>

<table class="table table-bordered"background="34.jpg">
	<thead>
		<tr>
			<th>NO</th>
			<th>No Nota</th>
			<th>ID Barang</th>
			<th>QTY</th>
			<th>Total Harga</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomor=1; ?>
			<?php $totalbelanja=0;?>

		<?php $ambil=$koneksi->query("SELECT*FROM Transaksi"); ?>
		<?php while($spech=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $spech['No_Nota']; ?></td>
			<td><?php echo $spech['ID_Barang']; ?></td>
			<td><?php echo $spech['QTY']; ?></td>
			<td><?php echo $spech['Total_Harga']; ?></td>
			<td>
				<a href="" class="btn-danger btn">hapus</a>
				<a href="" class="btn-warning btn">ubah</a>
			</td>
		</tr>
				<?php $totalbelanja+=$spech['Total_Harga'];?>

		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
	<tfoot>
				<tr>
					<th colspan="4"> Total Belanja</th>
					<th>Rp.<?php echo number_format( $totalbelanja)?>
				</tr>

			</tfoot>
</table>
<td>
	<a href="" class="btn-info btn">tambah</a>
</td>