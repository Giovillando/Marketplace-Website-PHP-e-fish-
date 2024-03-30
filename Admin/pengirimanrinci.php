<div class="row">
    <div class="col-lg-12">
        <h2>DETAIL PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php

$ID_Faktur_Rinci=$_GET['id'];

//mengambildata pmbyrn brdsrkan idfaktur
$ambil=$koneksi->query("SELECT * FROM faktur_rinci  
JOIN penjual ON faktur_rinci.ID_Penjual=penjual.ID_Penjual
		JOIN faktur_beli ON faktur_rinci.ID_Faktur_Beli=faktur_beli.ID_Faktur_Beli 
		JOIN status_pengiriman ON faktur_rinci.ID_Status_Pengiriman=status_pengiriman.ID_Status_Pengiriman
		JOIN daftar_pengiriman ON faktur_rinci.Kode_Daftar_Pengiriman=faktur_rinci.Kode_Daftar_Pengiriman
        JOIN sistem_pengiriman ON daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman 
        JOIN jasa_kirim ON sistem_pengiriman.ID_Jasa_Kirim=jasa_kirim.ID_Jasa_Kirim WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[id]' ");
$detail = $ambil->fetch_assoc();

?>

<table class="table table-bordered" background="img.jpg">
<div class="row">
	<div class="col-md-6"></div>
		
			<tr>
				<td><strong>Nama</strong></td>
				<td><strong>ID Faktur </strong></td>
				<td><strong>Sistem Pengiriman </strong></td>
                <td><strong>Jasa Pengiriman </strong></td>
				<td><strong>Total Rinci </td>
				<td><strong>Bukti Pembayaran </td>
				
			</tr>			
			<tr>
				<td><?php echo $detail['Nama_Penjual'];?></td>
				<td><?php echo $detail['ID_Faktur_Rinci'];?></td>
				<td><?php echo $detail['Nama_Sistem_Pengiriman'];?></td>
                <td><?php echo $detail['Nama_Jasa_Kirim'];?></td>
				<td><?php echo number_format($detail['Total_Bayar']);?></td>
				<td> 
				<img src="../Bukti_Pembayaran/<?php echo $detail['Bukti_Pembayaran'];?>" width="100">
				</td>
				
			</tr>
		
</div>
</table>



<form method="post">
	<div class = "form-group">
		
		<label> Status Pengiriman </label>
		<select class="form-control" name="status_pengiriman">
			<option value="">Pilih Status</option>
			<option value="SPENG103">Barang Dikirim</option>
			<option value="SPENG101">Belum Dikirim</option>
		</select>
	</div>
		<button class="btn btn-primary" name="proses">Proses</button>
</form>
<?php

if(isset($_POST["proses"]))
{
	$ID_Status_Pengiriman=$_POST["status_pengiriman"];
	$koneksi->query(" UPDATE faktur_rinci SET ID_Status_Pengiriman='$ID_Status_Pengiriman' WHERE faktur_rinci.ID_Faktur_Rinci='$_GET[id]'");
	
	echo "<script>alert('Status Pembelian Diperbarui');</script>";
	echo "<script>location='index.php?halaman=faktur_rinci';</script>";
}

?>