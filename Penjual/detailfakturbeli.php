<h4><center><strong> Detail Faktur Beli </strong></center></h4>
<br>

<?php 
$ambil= $koneksi->query("SELECT * FROM faktur_beli JOIN pembeli 
						ON faktur_beli.ID_Pembeli=pembeli.ID_Pembeli
						WHERE faktur_beli.ID_Faktur_Beli='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
Nama Pembeli : <strong><?php echo $detail['Nama_Pembeli'];?></strong><br> 
ID Faktur Beli : <strong><?php echo $detail['ID_Faktur_Beli'];?></strong><br> 
Alamat Pengiriman : <strong><?php echo $detail['Alamat_Pembeli']?></strong> <br>
	<?php 
$ambill= $koneksi->query("SELECT * FROM faktur_beli JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran
						JOIN jenis_pembayaran ON jasa_pembayaran.Kode_Jenis_Pembayaran=jenis_pembayaran.Kode_Jenis_Pembayaran
						JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon
						JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran
						WHERE faktur_beli.ID_Faktur_Beli='$_GET[id]'");
$detaill = $ambill->fetch_assoc();
?>
	Jasa Pembayaran :<strong> <?php echo $detaill["Nama_Jasa_Pembayaran"]; ?> <br></strong>
	Jenis Pembayaran:<strong> <?php echo $detaill["Nama_Jenis_Pembayaran"]; ?> <br></strong>

<p>
	Tanggal	: <strong> <?php echo $detail['Tanggal_Faktur_Beli']; ?> <br></strong>
</p>
<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:rebeccapurple;">
                                    <thead>
		<tr>
			<th> No </th>
			<th> Nama Barang </th>
			<th> Harga </th>
			<th> Jumlah Barang </th>
			<th> Sub Total </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $totalbelanja=0;?>
	<?php $totalongkir=0; ?>
		<?php $qty1=0;?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi JOIN faktur_rinci ON transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci 
		JOIN daftar_pengiriman ON faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman
		JOIN faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli
		JOIN barang ON transaksi.Kode_Barang=barang.Kode_Barang
		WHERE faktur_rinci.ID_Faktur_Beli='$_GET[id]'");?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?> </td>
			<td><?php echo $pecah['Nama_Barang']; ?> </td>
			<td> Rp.<?php echo number_format ($pecah['Harga_Barang']); ?></td>
			<td><?php echo $pecah['QTY_Barang']; ?></td>
			<td> 
				Rp.<?php echo number_format($pecah['Harga_Barang']*$pecah['QTY_Barang']); ?> </td>
			</td>
		</tr>
		<?php $totalongkir += $pecah['Tarif_Pengiriman'];  ?>
		<?php $qty1+= $pecah['QTY_Barang']; ?>
		<?php $totalbelanja+=($pecah['Harga_Barang']*$pecah['QTY_Barang']);?>
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
					<th>Rp. <?php echo number_format ($totalongkir); ?>
				</tr>
				<tr>
					<th colspan="4"> Total Bayar</th>
					<th>Rp. <?php echo number_format($detail['Total_Bayar']);?></th>
				</tr>
			</tfoot>
</table>