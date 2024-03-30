<?php
include "koneksi.php";
if(!isset($_SESSION['Username']))
{
        echo "
            <script> alert('Silahkan Masuk Terlebih Dahulu');
                document.location='login.php';
</script>";}
?>

<div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Bukti Pembayaran</h6>
                        </div>
<!-- /. ROW  -->
<hr />

<?php

$ID_Faktur_Beli=$_GET['id'];

//mengambildata pmbyrn brdsrkan idfaktur
$ambil=$koneksi->query("SELECT * FROM faktur_beli  
JOIN pembeli ON faktur_beli.ID_Pembeli=pembeli.ID_Pembeli
		JOIN jasa_pembayaran ON faktur_beli.ID_Jasa_Pembayaran=jasa_pembayaran.ID_Jasa_Pembayaran 
		JOIN status_pembayaran ON faktur_beli.ID_Status_Pembayaran=status_pembayaran.ID_Status_Pembayaran
		 WHERE faktur_beli.ID_Faktur_Beli='$_GET[id]' ");
$detail = $ambil->fetch_assoc();

?>

<table class="table table-bordered" background="img.jpg">
<div class="row">
	<div class="col-md-6"></div>
		
			<tr>
				<td><strong>Nama</strong></td>
				<td><strong>ID Faktur </strong></td>
				<td><strong>Pembayaran </strong></td>
				<td><strong>Jumlah </td>
                <td><strong>No Pembayaran </td>
				<td><strong>Bukti Pembayaran </td>
				
			</tr>			
			<tr>
				<td><?php echo $detail['Nama_Pembeli'];?></td>
				<td><?php echo $detail['ID_Faktur_Beli'];?></td>
				<td><?php echo $detail['Nama_Jasa_Pembayaran'];?></td>
				<td><?php echo number_format($detail['Total_Bayar']);?></td>
                <td><?php echo $detail['No_Pembayaran'];?></td>
				<td> 
				<img src="../Bukti_Pembayaran/<?php echo $detail['Bukti_Pembayaran']; ?>" width="150" class="img-responsif">
				</td>
				
			</tr>
		
</div>
</table>



<form method="post">
	<div class = "form-group">
		
		<label> Status Bayar </label>
		<select class="form-control" name="status_pembayaran">
			<option value="">Pilih Status</option>
			<?php $ambil="SeLEcT * FROM status_pembayaran";
			$hasil=mysqli_query($koneksi,$ambil);
			while ($pecah=mysqli_fetch_array($hasil)) { ?>
			 	<option value="<?php echo $pecah['ID_Status_Pembayaran']; ?>"><?php echo $pecah['Ket_Status_Pembayaran']; ?></option>
			 <?php } ?>
		</select>
	</div>
		<button class="btn btn-primary" name="proses">Proses</button>
</form>
<?php

if(isset($_POST["proses"]))
{
	$ID_Status_Pembayaran=$_POST["status_pembayaran"];
	$noresi=$_POST["No_Pembayaran"];
	$koneksi->query(" UPDATE faktur_beli SET ID_Status_Pembayaran='$ID_Status_Pembayaran'  WHERE faktur_beli.ID_Faktur_Beli='$_GET[id]'");
	
	echo "<script>alert('Status Pembelian Diperbarui');</script>";
	echo "<script>location='index.php?halaman=faktur_beli';</script>";
}

?>
