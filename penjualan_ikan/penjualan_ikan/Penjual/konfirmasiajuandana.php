<?php

$id_faktur=$_GET['id'];

//mengambildata pmbyrn brdsrkan idfaktur
$ambil=$koneksi->query("SELECT * FROM nota JOIN pembeli on nota.ID_Pembeli=pembeli.ID_Pembeli 
						JOIN pembayaran on nota.ID_Pembayaran=pembayaran.ID_Pembayaran
						JOIN tagihan on nota.ID_Tagihan=tagihan.ID_Tagihan
						JOIN status_pengiriman on nota.ID_Statkirim=status_pengiriman.ID_Statkirim
						JOIN status_pembayaran on nota.ID_Statbayar=status_pembayaran.ID_Statbayar
						JOIN pengiriman ON nota.ID_Pengiriman=pengiriman.ID_Pengiriman
						JOIN tujuan
						ON pengiriman.ID_Tujuan=tujuan.ID_Tujuan
						JOIN sistem_pengiriman ON pengiriman.ID_Sistemjasa=sistem_pengiriman.ID_Sistemjasa
					JOIN jasa_kirim ON sistem_pengiriman.ID_Jasakirim=jasa_kirim.ID_Jasakirim
					JOIN kategori_jasa ON sistem_pengiriman.ID_Kategori=kategori_jasa.ID_Kategori
						
						WHERE No_Nota='$id_faktur' ");




$detail = $ambil->fetch_assoc();


?>
<h2> DETAIL </h2>
<?php 
$ambil= $koneksi->query("SELECT * FROM Nota JOIN Pembeli 
						ON Nota.ID_Pembeli=Pembeli.ID_Pembeli 
						WHERE Nota.No_Nota='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
No Nota : <strong><?php echo $detail['No_Nota'];?></strong><br> 
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
<br>
<table class="table table-bordered">
	<thead>
		<tr>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $totalbelanja=0;?>
		<?php $ambil=$koneksi->query("SELECT * FROM transaksi JOIN barang ON transaksi.ID_Barang=barang.ID_Barang WHERE transaksi.No_Nota='$_GET[id]'");?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>

		</tr>
		<?php $totalbelanja+=($pecah['Harga']*$pecah['QTY']);?>
		
		<?php $nomor++ ?>
		<?php } ?>
	</tbody>
	<tfoot>
				<tr>
					<th colspan="4"> Total Belanja : Rp.<?php echo number_format( $totalbelanja)?>
				</tr>
				
			</tfoot>
</table>
<br>
<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label><strong>Lakukan Pengiriman Dana dan Input Foto Pengiriman Dana jika Anda menyetujui dan telah mengirimkan dana kepada penjual.</strong></label>
				<input type="file" name="bukti" class="form-control" required>
			</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>

<?php

if(isset($_POST["kirim"]))
		{
			$namabukti=$_FILES["bukti"]["name"];
			$lokasibukti=$_FILES["bukti"]["tmp_name"];
			move_uploaded_file($lokasibukti, "../bukti_dana/".$namabukti);

			$koneksi->query("UPDATE nota SET bukti_dana='$namabukti'WHERE No_Nota='$id_faktur'");

			$koneksi->query("UPDATE nota SET ID_Ajuandana='Diproses' WHERE No_Nota='$id_faktur'");
		
			echo "<script>alert('Konfirmasi pengiriman dana berhasil.');</script>";
	echo "<script>location='index.php?halaman=nota';</script>";
}
		
?>