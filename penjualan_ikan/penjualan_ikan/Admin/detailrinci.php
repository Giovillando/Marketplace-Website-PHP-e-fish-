<?php
include 'koneksi.php';
?>
	
<h4><center><strong> Detail Faktur Rinci </strong></center></h4>
<br>


<!--/. <pre></?php print_r($detail) ?></pre> -->

<!-- if pembeli != yg login THEN dilarikan ke riwayat.php -->
<!-- pembeli harus yg login -->
<?php 
	//mendapatkan id pelanggan yg beli
	//$id_beli = $detail["kode_pembeli"];

	//mendapatkan id yg login
	//$id_login = $_SESSION["pembeli"]["kode_pembeli"];

	//if ($id_beli!==$id_login) 
	//{
	//	echo "<script>alert('Maaf, anda tidak dapat mengakses data orang lain');</script>";
	//	echo "<script>location='riwayat.php';</script>";
	//	exit();
	//}
//?>

<p>

<?php
$ambilll=$koneksi->query("SELECT * FROM faktur_rinci JOIN daftar_pengiriman ON faktur_rinci.Kode_Daftar_Pengiriman=daftar_pengiriman.Kode_Daftar_Pengiriman 
JOIN sistem_pengiriman ON daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman
JOIN jasa_kirim ON sistem_pengiriman.ID_Jasa_Kirim=jasa_kirim.ID_Jasa_Kirim
JOIN status_pengiriman ON faktur_rinci.ID_Status_Pengiriman=status_pengiriman.ID_Status_Pengiriman
JOIN faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli 
JOIN pembeli ON faktur_beli.ID_Pembeli=pembeli.ID_Pembeli 
JOIN penjual ON faktur_rinci.ID_Penjual=penjual.ID_Penjual 
JOIN kota ON penjual.ID_Kota_Penjual=kota.ID_Kota
WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[id]' ");
$detailll=$ambilll->fetch_assoc();
?>

<div class="row">
	<div class="col-md-4">
	<h5><strong>Penjualan</strong></h5>
<h6>  
Kode Faktur Rinci	: <?php echo $detailll['ID_Faktur_Rinci']; ?> <br>
Tanggal    			: <?php echo date("d F Y",strtotime($detailll['Tanggal_Faktur_Beli'])); ?> <br>
Total Harga 		: Rp. <?php echo number_format($detailll['Total_Rinci']); ?><br>
Nama Penjual    	: <?php echo $detailll['Nama_Penjual']; ?> <br>
kota				: <?php echo $detailll['Nama_Kota']; ?> <br>
</div>
	<div class="col-md-4">
	<h5><strong>Pengiriman</strong></h5>
	<h6> 
	Jasa 				: <?php echo $detailll['Nama_Jasa_Kirim'];?> - <?php echo $detailll['Nama_Sistem_Pengiriman'];?><br>	
<?php $ambil=$koneksi->query("SELECT * FROM pembeli INNER JOIN kota ON pembeli.ID_Kota_Pembeli=kota.ID_Kota WHERE ID_Pembeli='$detailll[ID_Pembeli]'");
$pecah=$ambil->fetch_assoc();
?>
	Tujuan 				: <?php echo $pecah['Nama_Kota'];?> <br>
	Ongkir 				: Rp. <?php echo number_format ($detailll["Tarif_Pengiriman"]); ?> <br>
	</div>
</P>
</br>
</br>
<table class="table table-bordered">
		<thead class="thead-primary">
		<tr>
			<th> No</th>
			<th> Penjual </th>
			<th> Kode Barang </th>
			<th> Barang </th>
			<th> Harga </th>
			<th> QTY </th>
			<th> Sub Harga</th> 
		</tr>
		</thead>
	<tbody>
	<?php $nomor=1;?>
	<?php $totalbelanja=0;?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi JOIN barang ON transaksi.Kode_Barang=barang.Kode_Barang join faktur_rinci on transaksi.ID_Faktur_Rinci=faktur_rinci.ID_Faktur_Rinci join penjual on barang.ID_Penjual=penjual.ID_Penjual WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[id]' "); ?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor ?></td>
			<td><?php echo $pecah['Nama_Penjual']; ?></td>
			<td><?php echo $pecah['Kode_Barang']; ?></td>
			<td><?php echo $pecah['Nama_Barang']; ?></td>
			<td><?php echo number_format ($pecah['Harga_Barang']); ?></td>
			<td><?php echo $pecah['QTY_Barang']; ?></td>
			<td><?php echo number_format ($pecah['Harga_Barang']*$pecah['QTY_Barang']);?></td>	
		</tr>
		<?php $nomor++; ?>
		<?php $totalbelanja+=($pecah['Harga_Barang']*$pecah['QTY_Barang']); ?>
		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="6"> Total Belanja </th>
			<th>Rp. <?php echo number_format ($totalbelanja) ?>
		</tr>
		<tr>
			<th colspan="6"> Biaya Pengiriman</th>
			<th>Rp. <?php echo number_format ($detailll ["Tarif_Pengiriman"]); ?>
		</tr>
		<tr>
			<th colspan="6"> Total Bayar</th>
			<th>Rp. <?php echo number_format ($detailll ["Tarif_Pengiriman"] + $totalbelanja ); ?>
		</tr>
</table>
	</div>
</section>
</body>
</html>