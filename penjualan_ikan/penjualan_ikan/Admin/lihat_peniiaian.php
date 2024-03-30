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

	<section class="container py-1">
		<div class="col-lg-12 m-auto">
			<div class="row text-center pt-5">
                <h4 class="h4 text-success"><strong> Penilaian Pembeli </h4></strong>
				<br> <br> <br>
			</div>
		</div>
		
	Penilaian Pembeli : 
		<div class="col-md-5">
			<form method="post" enctype="multipart/form-data" >
				<div class="form-group"> 
					<input type="text" readonly value="<?php echo $detail["Penilaian"]?>"class="form-control">
				</div>	
			</form>
			<br>
				<a href="index.php?halaman=faktur_rinci" class="btn btn-success">Kembali</a>
			</div>
		</div>
	
		
		
		
	</section>