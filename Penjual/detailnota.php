<h2> DETAIL PEMBELIAN </h2>
<?php 
$ambil= $koneksi->query("SELECT * FROM Nota JOIN Pembeli 
						ON Nota.ID_Pembeli=Pembeli.ID_Pembeli 
						WHERE Nota.No_Nota='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<strong><?php echo $detail['Nama_Pembeli'];?></strong><br> 
No Nota : <strong><?php echo $detail['No_Nota'];?></strong><br> 
Alamat Pembeli : <?php echo $detail['Alamat']?> <br>
<?php 
$ambill= $koneksi->query("SELECT * FROM Nota JOIN pengiriman 
						ON Nota.ID_Pengiriman=pengiriman.ID_Pengiriman 
						WHERE Nota.No_Nota='$_GET[id]'");
$detaill = $ambill->fetch_assoc();
?>
<?php 
$ambil= $koneksi->query("SELECT * FROM Nota JOIN Tagihan 
						ON Nota.ID_Tagihan=Tagihan.ID_Tagihan 
						WHERE Nota.No_Nota='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<p>
	Tanggal	: <?php echo $detail['Tgl_Pesan']; ?> <br>
</p>
<table class="table table-bordered">
	<thead>
		<tr>
			<th> No </th>
			<th> Nama Barang </th>
			<th> Harga </th>
			<th> Jumlah Barang </th>
			<th> Total Harga </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $totalbelanja=0;?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi JOIN barang ON transaksi.ID_Barang=barang.ID_Barang WHERE transaksi.No_Nota='$_GET[id]'");?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?> </td>
			<td><?php echo $pecah['Nama_Barang']; ?> </td>
			<td> Rp.<?php echo number_format ($pecah['Harga']); ?></td>
			<td><?php echo $pecah['QTY']; ?></td>
			<td> 
				Rp.<?php echo number_format($pecah['Harga']*$pecah['QTY']); ?> </td>
			</td>
		</tr>
		<?php $totalbelanja+=($pecah['Harga']*$pecah['QTY']);?>
		
		<?php $nomor++ ?>
		<?php } ?>
	</tbody>
	<tfoot>
				<tr>
					<th colspan="4"> Total Belanja</th>
					<th>Rp.<?php echo number_format( $totalbelanja)?>
				</tr>
				<tr>
					<th colspan="4"> Biaya Pengiriman</th>
					<th>Rp.<?php echo number_format( $detaill["Ongkir"]); ?> 
				</tr>
						<?php $total_bayar=$totalbelanja + $detaill["Ongkir"]; ?>

				<tr>
					<th colspan="4"> Total Bayar</th>
					<th>Rp. <?php echo number_format ($total_bayar);?></th>
				</tr>
			</tfoot>
</table>
