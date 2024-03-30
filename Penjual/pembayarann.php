<h2> Data Pembayaran </h2>
</br>
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


<div class="row">
	<div class="col-md-6"></div>
		<table class="table table-bodered">
			<tr>
				<td>Nama</td>
				<td>No Nota  </td>
				<td>Metode Pembayaran  </td>
				<td>Jumlah Pembayaran </td>
				<td>Tanggal  </td>
				<td>Bukti Pembayaran  </td>
			</tr>			
			<tr>
				<td><?php echo $detail['Nama_Pembeli'];?></td>
				<td><?php echo $detail['No_Nota'];?></td>
				<td><?php echo $detail['Met_Pembayaran'];?></td>
				<td>RP. <?php echo number_format($detail['Total_Tagihan']);?></td>
				<td><?php echo $detail['Tgl_Pesan'];?></td>
				<td><img src="../bukti_pembayaran/<?php echo $detail['bukti_pembayaran'];?>" width="200" class="img-responsive"></td>
			</tr>
		</table>
</div>

<form method="post">

	<div class="form-group">
		<label> No Resi  </label>
		<input type="text" class="form-control" name="resi" value="<?php echo $detail['noresi'];?>">
	</div>


	<div class="form=group">
		<label>Status Pembayaran </label>
		<select class="form-control" name="status_pembayaran" >
		<?php $ambil=$koneksi->query("SELECT * FROM status_pembayaran"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Statbayar'] ?>" > <?php echo $pecah['Ket_Statbayar'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	
	<div class="form=group">
		<label>Status Pengiriman </label>
		<select class="form-control" name="status_pengiriman" >
		<?php $ambil=$koneksi->query("SELECT * FROM status_pengiriman"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Statkirim'] ?>" >  <?php echo $pecah['Ket_Statkirim'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	</br>
		<button class="btn btn-primary" name="proses">Proses</button>
</form>
<?php

if(isset($_POST["proses"]))
{
	$noresi=$_POST["resi"];
	$Statbayar=$_POST["status_pembayaran"];
	$Statkirim=$_POST["status_pengiriman"];
	$koneksi->query(" UPDATE nota SET ID_Statbayar='$Statbayar',ID_Statkirim='$Statkirim',noresi='$noresi' WHERE No_Nota='$id_faktur'");
	
	
	echo "<script>alert('Status Pembelian Diperbarui');</script>";
	echo "<script>location='index.php?halaman=nota';</script>";
}

?>