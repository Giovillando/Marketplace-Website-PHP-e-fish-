<?php
include ('koneksi.php');
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Laporan Dana</h6>
                        </div>
 <br>
</a><table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NO Faktur</th>
			<th>Tanggal Pemesanan</th>
			<th>Nama Pembeli</th>
			<th>Jasa Pembayaran</th>
			<th>Keterangan Status Order</th>
			<th>Keterangan Status Pembayaran</th>
			<th>Kode Diskon</th>
			<th>Nama Penjual</th>
			<th>Total Bayar</th>
		</tr>
	<tbody>
		<?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
		<tr>
			<td><?php echo $No?></td>
			<td><?php echo $db['ID_Faktur_Beli']; ?></td>
			<td><?php echo $db['Tanggal_Faktur_Beli']; ?></td>
			<td><?php echo $db['Nama_Pembeli']; ?></td>
			<td><?php echo $db['ID_Jasa_Pembayaran']; ?></td>
			<td><?php echo $db['Ket_Status_Order']; ?></td>
			<td><?php echo $db['Ket_Status_Pembayaran']; ?></td>
			<td><?php echo $db['Jenis_Diskon']; ?> </td>
			<td><?php echo $db['Nama_Penjual']; ?></td>
		    <td>Rp<?php echo number_format ($db['Total_Bayar']); ?></td>
		</tr>
		<?php $No++;  } ?>
	</tbody>
</thead>
</table>

<?php
include ('koneksi.php');
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Laporan Dana</h6>
                        </div>
 <br>
</a><table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NO Faktur</th>
			<th>Tanggal Pemesanan</th>
			<th>Nama Pembeli</th>
			<th>Jasa Pembayaran</th>
			<th>Keterangan Status Order</th>
			<th>Keterangan Status Pembayaran</th>
			<th>Kode Diskon</th>
			<th>Nama Penjual</th>
			<th>Total Bayar</th>
		</tr>
	<tbody>
		<?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
		<tr>
			<td><?php echo $No?></td>
			<td><?php echo $db['ID_Faktur_Beli']; ?></td>
			<td><?php echo $db['Tanggal_Faktur_Beli']; ?></td>
			<td><?php echo $db['Nama_Pembeli']; ?></td>
			<td><?php echo $db['ID_Jasa_Pembayaran']; ?></td>
			<td><?php echo $db['Ket_Status_Order']; ?></td>
			<td><?php echo $db['Ket_Status_Pembayaran']; ?></td>
			<td><?php echo $db['Jenis_Diskon']; ?> </td>
			<td><?php echo $db['Nama_Penjual']; ?></td>
		    <td>Rp<?php echo number_format ($db['Total_Bayar']); ?></td>
		</tr>
		<?php $No++;  } ?>
	</tbody>
</thead>
</table>

<?php
include ('koneksi.php');
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Laporan Dana</h6>
                        </div>
 <br>
</a><table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NO Faktur</th>
			<th>Tanggal Pemesanan</th>
			<th>Nama Pembeli</th>
			<th>Jasa Pembayaran</th>
			<th>Keterangan Status Order</th>
			<th>Keterangan Status Pembayaran</th>
			<th>Kode Diskon</th>
			<th>Nama Penjual</th>
			<th>Total Bayar</th>
		</tr>
	<tbody>
		<?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
		<tr>
			<td><?php echo $No?></td>
			<td><?php echo $db['ID_Faktur_Beli']; ?></td>
			<td><?php echo $db['Tanggal_Faktur_Beli']; ?></td>
			<td><?php echo $db['Nama_Pembeli']; ?></td>
			<td><?php echo $db['ID_Jasa_Pembayaran']; ?></td>
			<td><?php echo $db['Ket_Status_Order']; ?></td>
			<td><?php echo $db['Ket_Status_Pembayaran']; ?></td>
			<td><?php echo $db['Jenis_Diskon']; ?> </td>
			<td><?php echo $db['Nama_Penjual']; ?></td>
		    <td>Rp<?php echo number_format ($db['Total_Bayar']); ?></td>
		</tr>
		<?php $No++;  } ?>
	</tbody>
</thead>
</table>

<?php
include ('koneksi.php');
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Laporan Dana</h6>
                        </div>
 <br>
</a><table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NO Faktur</th>
			<th>Tanggal Pemesanan</th>
			<th>Nama Pembeli</th>
			<th>Jasa Pembayaran</th>
			<th>Keterangan Status Order</th>
			<th>Keterangan Status Pembayaran</th>
			<th>Kode Diskon</th>
			<th>Nama Penjual</th>
			<th>Total Bayar</th>
		</tr>
	<tbody>
		<?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
		<tr>
			<td><?php echo $No?></td>
			<td><?php echo $db['ID_Faktur_Beli']; ?></td>
			<td><?php echo $db['Tanggal_Faktur_Beli']; ?></td>
			<td><?php echo $db['Nama_Pembeli']; ?></td>
			<td><?php echo $db['ID_Jasa_Pembayaran']; ?></td>
			<td><?php echo $db['Ket_Status_Order']; ?></td>
			<td><?php echo $db['Ket_Status_Pembayaran']; ?></td>
			<td><?php echo $db['Jenis_Diskon']; ?> </td>
			<td><?php echo $db['Nama_Penjual']; ?></td>
		    <td>Rp<?php echo number_format ($db['Total_Bayar']); ?></td>
		</tr>
		<?php $No++;  } ?>
	</tbody>
</thead>
</table>

<?php
include ('koneksi.php');
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Laporan Dana</h6>
                        </div>
 <br>
</a><table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NO Faktur</th>
			<th>Tanggal Pemesanan</th>
			<th>Nama Pembeli</th>
			<th>Jasa Pembayaran</th>
			<th>Keterangan Status Order</th>
			<th>Keterangan Status Pembayaran</th>
			<th>Kode Diskon</th>
			<th>Nama Penjual</th>
			<th>Total Bayar</th>
		</tr>
	<tbody>
		<?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
		<tr>
			<td><?php echo $No?></td>
			<td><?php echo $db['ID_Faktur_Beli']; ?></td>
			<td><?php echo $db['Tanggal_Faktur_Beli']; ?></td>
			<td><?php echo $db['Nama_Pembeli']; ?></td>
			<td><?php echo $db['ID_Jasa_Pembayaran']; ?></td>
			<td><?php echo $db['Ket_Status_Order']; ?></td>
			<td><?php echo $db['Ket_Status_Pembayaran']; ?></td>
			<td><?php echo $db['Jenis_Diskon']; ?> </td>
			<td><?php echo $db['Nama_Penjual']; ?></td>
		    <td>Rp<?php echo number_format ($db['Total_Bayar']); ?></td>
		</tr>
		<?php $No++;  } ?>
	</tbody>
</thead>
</table>

<?php
include ('koneksi.php');
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Laporan Dana</h6>
                        </div>
 <br>
</a><table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NO Faktur</th>
			<th>Tanggal Pemesanan</th>
			<th>Nama Pembeli</th>
			<th>Jasa Pembayaran</th>
			<th>Keterangan Status Order</th>
			<th>Keterangan Status Pembayaran</th>
			<th>Kode Diskon</th>
			<th>Nama Penjual</th>
			<th>Total Bayar</th>
		</tr>
	<tbody>
		<?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
		<tr>
			<td><?php echo $No?></td>
			<td><?php echo $db['ID_Faktur_Beli']; ?></td>
			<td><?php echo $db['Tanggal_Faktur_Beli']; ?></td>
			<td><?php echo $db['Nama_Pembeli']; ?></td>
			<td><?php echo $db['ID_Jasa_Pembayaran']; ?></td>
			<td><?php echo $db['Ket_Status_Order']; ?></td>
			<td><?php echo $db['Ket_Status_Pembayaran']; ?></td>
			<td><?php echo $db['Jenis_Diskon']; ?> </td>
			<td><?php echo $db['Nama_Penjual']; ?></td>
		    <td>Rp<?php echo number_format ($db['Total_Bayar']); ?></td>
		</tr>
		<?php $No++;  } ?>
	</tbody>
</thead>
</table>

<?php
include ('koneksi.php');
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Laporan Dana</h6>
                        </div>
 <br>
</a><table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NO Faktur</th>
			<th>Tanggal Pemesanan</th>
			<th>Nama Pembeli</th>
			<th>Jasa Pembayaran</th>
			<th>Keterangan Status Order</th>
			<th>Keterangan Status Pembayaran</th>
			<th>Kode Diskon</th>
			<th>Nama Penjual</th>
			<th>Total Bayar</th>
		</tr>
	<tbody>
		<?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
		<tr>
			<td><?php echo $No?></td>
			<td><?php echo $db['ID_Faktur_Beli']; ?></td>
			<td><?php echo $db['Tanggal_Faktur_Beli']; ?></td>
			<td><?php echo $db['Nama_Pembeli']; ?></td>
			<td><?php echo $db['ID_Jasa_Pembayaran']; ?></td>
			<td><?php echo $db['Ket_Status_Order']; ?></td>
			<td><?php echo $db['Ket_Status_Pembayaran']; ?></td>
			<td><?php echo $db['Jenis_Diskon']; ?> </td>
			<td><?php echo $db['Nama_Penjual']; ?></td>
		    <td>Rp<?php echo number_format ($db['Total_Bayar']); ?></td>
		</tr>
		<?php $No++;  } ?>
	</tbody>
</thead>
</table>

<?php
include ('koneksi.php');
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Laporan Dana</h6>
                        </div>
 <br>
</a><table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NO Faktur</th>
			<th>Tanggal Pemesanan</th>
			<th>Nama Pembeli</th>
			<th>Jasa Pembayaran</th>
			<th>Keterangan Status Order</th>
			<th>Keterangan Status Pembayaran</th>
			<th>Kode Diskon</th>
			<th>Nama Penjual</th>
			<th>Total Bayar</th>
		</tr>
	<tbody>
		<?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
		<tr>
			<td><?php echo $No?></td>
			<td><?php echo $db['ID_Faktur_Beli']; ?></td>
			<td><?php echo $db['Tanggal_Faktur_Beli']; ?></td>
			<td><?php echo $db['Nama_Pembeli']; ?></td>
			<td><?php echo $db['ID_Jasa_Pembayaran']; ?></td>
			<td><?php echo $db['Ket_Status_Order']; ?></td>
			<td><?php echo $db['Ket_Status_Pembayaran']; ?></td>
			<td><?php echo $db['Jenis_Diskon']; ?> </td>
			<td><?php echo $db['Nama_Penjual']; ?></td>
		    <td>Rp<?php echo number_format ($db['Total_Bayar']); ?></td>
		</tr>
		<?php $No++;  } ?>
	</tbody>
</thead>
</table>

<?php
include ('koneksi.php');
?>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Laporan Dana</h6>
                        </div>
 <br>
</a><table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>NO Faktur</th>
			<th>Tanggal Pemesanan</th>
			<th>Nama Pembeli</th>
			<th>Jasa Pembayaran</th>
			<th>Keterangan Status Order</th>
			<th>Keterangan Status Pembayaran</th>
			<th>Kode Diskon</th>
			<th>Nama Penjual</th>
			<th>Total Bayar</th>
		</tr>
	<tbody>
		<?php 
                                              $ambildata =mysqli_query($koneksi, "SELECT * FROM faktur_beli  JOIN penjual ON faktur_beli.ID_Penjual =penjual.ID_Penjual JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran JOIN diskon ON faktur_beli.Kode_Diskon=diskon.Kode_Diskon JOIN pembeli ON faktur_beli.ID_Pembeli =pembeli.ID_Pembeli JOIN status_order ON faktur_beli.ID_Status_Order=status_order.ID_Status_Order JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran");
                                                 $No =1 ;
                                                while ($db= $ambildata->fetch_assoc()){
                                            ?>
		<tr>
			<td><?php echo $No?></td>
			<td><?php echo $db['ID_Faktur_Beli']; ?></td>
			<td><?php echo $db['Tanggal_Faktur_Beli']; ?></td>
			<td><?php echo $db['Nama_Pembeli']; ?></td>
			<td><?php echo $db['ID_Jasa_Pembayaran']; ?></td>
			<td><?php echo $db['Ket_Status_Order']; ?></td>
			<td><?php echo $db['Ket_Status_Pembayaran']; ?></td>
			<td><?php echo $db['Jenis_Diskon']; ?> </td>
			<td><?php echo $db['Nama_Penjual']; ?></td>
		    <td>Rp<?php echo number_format ($db['Total_Bayar']); ?></td>
		</tr>
		<?php $No++;  } ?>
	</tbody>
</thead>
</table>

