<?php
session_start();
if(!isset($_SESSION["login"]['ID_Kota_Pembeli']))
{
	echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";
	echo "<script>location='login.php';</script>";
}
include('koneksi.php');

if(!isset($_SESSION["keranjang"]))
{
	
}
if(!isset($_GET["no"]))
{
	
}
else
{
	$nol=$_GET["no"];
	$_SESSION["ongkir"][$nol]=$_GET["Tarif_Pengiriman"];
	$_SESSION["tarif"][$nol]=$_GET['Kode_Daftar_Pengiriman'];
	echo $_SESSION["ongkir"][$nol];
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>E-FISH</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="apple-touch-icon" href="assets/img/Logo.png">
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/Logo.png">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/templatemo.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<!-- Load fonts style after rendering the layout styles -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
	<link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
	<!-- Header -->
	<?php include 'header.php' ?>
	<br>
<section class="konten">
	<h4 class="text-center mb-4"> CHECKOUT</h4>
	<div class="col-md-12">
 	<div class="col-md-12">
	<br>
	<div class="row">
		<div class="col-md-4">
		<label>Nama Pembeli</label>
			<div class="form-group"> 
				<input type="text" readonly value="<?php echo $_SESSION["login"]['Nama_Pembeli']?>"class="form-control">
			</div>
		</div>
		<div class="col-md-4">
		<label>Alamat</label>
			<div class="form-group"> 
			<input type="text" readonly value="<?php echo $_SESSION["login"]['Alamat_Pembeli']?>"class="form-control">
			</div>
		</div>
		<div class="col-md-2">
			<label>No Handphone Pembeli</label>
			<div class="form-group"> 
				<input type="text" readonly value="<?php echo $_SESSION["login"]['No_Handphone_Pembeli']
				?>"class="form-control">
			</div>
		</div>
		<div class="col-md-2">
			<label>Kota Pembeli</label>
			<div class="form-group"> 
				<?php $kota_pembeli=$_SESSION["login"]['ID_Kota_Pembeli'];
				$ambilll=$koneksi->query("SELECT * FROM pembeli join kota on pembeli.ID_Kota_Pembeli=kota.id_kota WHERE ID_Kota_Pembeli='$kota_pembeli' "); 
					$pecahhh=$ambilll->fetch_assoc();
				 ?>
				<input type="text" readonly value="<?php echo $pecahhh['Nama_Kota'] ?>"class="form-control">
			</div>
		</div>
	</div>

	<br/>
	<div class="table-wrap">


			<?php $penjual=[]; $noo=0;?>
			<?php $totalkeseluruhan = 0; $Sub_Total=0; $Total_Barang=0; ?>
			<?php foreach ($_SESSION['keranjang'] as $Kode_Barang => $QTY): ?>
			<?php $ambil=$koneksi->query("SELECT * FROM barang JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual JOIN kota ON penjual.ID_Kota=kota.ID_Kota WHERE Kode_Barang='$Kode_Barang' "); 
			  $pecah=$ambil->fetch_assoc(); ?>
			<?php 
			if ($noo == 0) { $penjual[]=$pecah['ID_Penjual']; $noo++;}
			else {$tc=0;$tcc=0;
				foreach($penjual as $id)
					if($id==$pecah['ID_Penjual']) {$tcc++;}
					if($tc==$tcc){$penjual[]=$pecah['ID_Penjual']; $noo++;}
					$tc++;
				}
				 endforeach; 
			
			?>
<?php $nop=0; $nopp=1; $ongkir=[]; $tarif=[]; $tot_sub=[]; $totalbarang=[];?>
<?php foreach ($penjual as $id): ?>	
	<?php 
		$barang=[];
		$qtyy=[];
		foreach ($_SESSION['keranjang'] as $Kode_Barang => $QTY): 
		$ambil=$koneksi->query("SELECT * FROM barang JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual JOIN kota ON penjual.ID_Kota=kota.ID_Kota WHERE Kode_Barang='$Kode_Barang' AND penjual.ID_Penjual='$id'"); 
		$pecah=$ambil->fetch_assoc();
		if (empty($pecah['Kode_Barang'])) {;}
		else{$barang[]= $pecah['Kode_Barang'];
			 $qtyy[]= $QTY;}

	endforeach;
	?>
		<p><p><p>
		<table class="table">
		<thead class="thead-primary">
		<tr>
			<th> No</th>
			<th> Penjual </th>
			<th> Kota Penjual </th>
			<th> Barang </th>
			<th> Harga </th>
			<th> Berat </th>
			<th> QTY </th>
			<th> Sub Harga</th> 
			<th></th> 
		</tr>
		</thead>
		<tbody class="tbody-primary">
		<?php $no=1; ?>
		<?php $totalpesanan=0; $totalbelanja=0; $noj=0?>
		<?php $berat_ttl=0; ?>
		<?php foreach ($barang as $Kode_Barang): ?>
			<!--Menampilkan Produk yang diperulangkan dari id produk line 64-->
		<?php $ambil=$koneksi->query("SELECT * FROM barang JOIN penjual ON barang.ID_Penjual=penjual.ID_Penjual JOIN kota ON penjual.ID_Kota=kota.ID_Kota WHERE Kode_Barang='$Kode_Barang' AND penjual.ID_Penjual='$id'"); 
			  $pecah=$ambil->fetch_assoc();
			  $subharga= $pecah['Harga_Barang']*$qtyy[$no-1];
			  $Berat_Barang=$pecah['Berat_Barang']*$qtyy[$no-1];
			  $totalbarang[]+=$qtyy[$no-1];
			  $kota_penjual=$pecah['Nama_Kota'];
			  $totalbelanja+= $subharga; 
		?>
		
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $pecah['Nama_Penjual']?></td>
				<td><?php echo $pecah['Nama_Kota']?></td>
				<td><?php echo $pecah['Nama_Barang']?></td>
				<td>Rp.<?php echo number_format($pecah['Harga_Barang']); ?></td>
				<td><?php echo number_format($pecah['Berat_Barang']); ?> kg</td>
				<td><?php echo $qtyy[$no-1] ?></td>
				<td>Rp.<?php echo number_format($subharga); ?></td>
				<td></td>
			</tr>
		<?php $no++; ?>
		<?php $totalpesanan+=$subharga; ?>
		<?php $berat_ttl+=$Berat_Barang;?>
		<?php $kota_penjual= $pecah['Nama_Kota']; ?>
		<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr> 
				<th colspan='7' > Berat Total </th>
				<th>  <?php  echo number_format($berat_ttl) ?> kilogram </th>
				<th>  </th>
			</tr>
			<?php $ambil1=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman 
            JOIN jasa_kirim ON sistem_pengiriman.ID_Jasa_Kirim=jasa_kirim.ID_Jasa_Kirim JOIN kategori ON daftar_pengiriman.ID_Kategori=kategori.ID_Kategori 
            JOIN kota ON daftar_pengiriman.ID_Kota_Asal=kota.ID_Kota WHERE Nama_Kota= '$kota_penjual'");
            $ambil3=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman 
            JOIN jasa_kirim ON sistem_pengiriman.ID_Jasa_Kirim=jasa_kirim.ID_Jasa_Kirim JOIN kategori ON daftar_pengiriman.ID_Kategori=kategori.ID_Kategori 
            JOIN kota ON daftar_pengiriman.ID_Kota_Asal=kota.ID_Kota ");
                    $ambil2=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN kota ON daftar_pengiriman.ID_Kota_Tujuan =kota.ID_Kota 
                    WHERE ID_Kota_Tujuan='$kota_pembeli'  ")?>
			<?php $pecah=$ambil1->fetch_assoc() AND $pecah1=$ambil2->fetch_assoc() and $pecah1=$ambil3->fetch_assoc() ?>
			<?php if (isset($_GET['Tarif_Pengiriman']) AND isset($_GET['Kode_Daftar_Pengiriman'])){
						$id_tarif=$_SESSION["tarif"][$nop];
				$ambil4=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.Kode_Sistem_Pengiriman=sistem_pengiriman.Kode_Sistem_Pengiriman 
				JOIN jasa_kirim ON sistem_pengiriman.ID_Jasa_Kirim=jasa_kirim.ID_Jasa_Kirim JOIN kategori ON daftar_pengiriman.ID_Kategori=kategori.ID_Kategori JOIN kota ON daftar_pengiriman.ID_Kota_Asal=kota.ID_Kota WHERE Nama_Kota= '$kota_penjual' AND Kode_Daftar_Pengiriman='$id_tarif'"); $pecah4=$ambil4->fetch_assoc()?>
				<th colspan='6' >  <?php echo $pecah1['Nama_Kota']?>-<?php echo $pecah4['Nama_Kategori']?>-<?php echo $pecah4['Nama_Jasa_Kirim']?>  </th>
				<?php } else {?>
				<th colspan='6' >  <?php echo $pecah1['Nama_Kota']?>-<?php echo $pecah['Nama_Kategori']?>-<?php echo $pecah['Nama_Jasa_Kirim']?>  </th> <?php } ?>
				<th>  Rp.  <?php  if (!isset($_GET['Tarif_Pengiriman']) AND !isset($_GET['Kode_Daftar_Pengiriman'])){ ?>
                        <?php $_SESSION["ongkir"][$nop]=$pecah['Tarif_Pengiriman'];
                            $_SESSION["tarif"][$nop]=$pecah['Kode_Daftar_Pengiriman'];
						echo $_SESSION["ongkir"][$nop]; ?> 
                        <?php } 
                        else if ($nop==$nol){ ?>
						<?php echo $_SESSION["ongkir"][$nop] ;?>
                        <?php } 
						else { 
                         echo $_SESSION["ongkir"][$nop];?>
                        <?php } ?> 
						
				<td>  <a href ="edit_tarif.php?Nama_Kota=<?php echo $pecah['Nama_Kota']?>&no=<?php echo $nop?>" class="btn btn- btn-light"> UBAH</a> </td>
			</tr>
			<tr> 
				<th colspan='7' > Total Pesanan </th>
				<?php $total_seluruh[] = $totalpesanan +$_SESSION["ongkir"][$nop]; ?>
				<th> Rp. <?php echo number_format($total_seluruh[$nop]) ?>  </th>  
				<th>  </th>  
			</tr>
		</tfoot>
		</table> 
		<table>
		<tr><p></tr>
		<tr><p></tr>
		<tr><p></tr>
		</table>
		<?php $Total_Barang+= $totalbarang[$nop];?>
		<?php $tot_sub[]=$subharga; $Sub_Total+=$tot_sub[$nop]?>
		<?php $totalkeseluruhan += $total_seluruh[$nop]; ?>
		
		<?php $nop++; $nopp++; endforeach; ?>


	<p style="text-align: right;" ><b> Subtotal Untuk Produk: Rp. <?php  echo number_format($Sub_Total) ?> </b></p>	
	<p style="text-align: right;" ><b> Total Belanja : Rp. <?php  echo number_format($totalkeseluruhan) ?> </b></p>	

</select></div></form></div></div>

<form method="post"> 
<div class="row">
		

<!--UNTUK Benefit Pengguna-->
			<!-- div  class="col-md-4"-->
				<!--label class="control-label">Benefit Pengguna :</label-->
				<!--input type="text" name="Benefit" value="<!-?php 
				$ID_Pengguna=$_SESSION['login']["ID_Pembeli"];
				$ambily=$koneksi->query("SELECT * FROM pembeli join jenis_pembeli on pembeli.Kode_Jenis_Pembeli = jenis_pembeli.Kode_Jenis_Pembeli
				JOIN kota on pembeli.ID_Kota_Pembeli=kota.ID_Kota WHERE ID_Pembeli='$ID_Pengguna'");
				$arraypengguna=$ambily->fetch_assoc();
				$Jenis=$arraypengguna['Nama_Jenis_Pembeli'];
				$benefit=$arraypengguna['Jumlah_Potongan'];
				echo "$Jenis       $benefit %";
			?>" class="form-control" readonly-->
		<!--/div-->

		<!--UNTUK Metode Pembayaran-->
		<div class="col-md-4">
            <label> Jenis Pembayaran :</label>
            <select class="form-control" name="Kode_Jenis_Pembayaran" id="Kode_Jenis_Pembayaran" required>
              <option value="">Pilih Pembayaran</option>
              <?php
              $ambil=$koneksi->query("SELECT * FROM jenis_pembayaran");
              while($pembayaran=$ambil->fetch_assoc()){
                ?>
                <option value="<?php echo $pembayaran['Kode_Jenis_Pembayaran']; ?>">
                  <?php echo $pembayaran['Nama_Jenis_Pembayaran'];?>
                </option>
              <?php }?>
            </select>
          </div>
          <div class="col-md-4">
            <label>Metode Pembayaran :</label>
            <select class="form-control" name="ID_Jasa_Pembayaran" id="ID_Jasa_Pembayaran" required>
              <option value="">Pilih Metode Pembayaran</option>
              <option></option>
            </select>
          </div>
		
	<div class="form-group">	
	<button class="btn btn-primary" name="checkout" > Check Out</button>
</div>
</form></form>
		</div></div></div></div><br><br>
		<section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

  <script src="js/vendor/bootstrap.min.js"></script>

  <script src="js/datepicker.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/jquery.js"></script>
  <script>
    $(document).ready(function() {
      $('#Kode_Jenis_Pembayaran').change(function() {
        var Kode_Jenis_Pembayaran = $(this).val();

        $.ajax({
          type: 'POST',
          url: 'cobajasa.php',
          data: 'Kode_Jenis_Pembayaran='+Kode_Jenis_Pembayaran,
          success: function(response) {
            $('#ID_Jasa_Pembayaran').html (response);
          }
        });
      })
    });
  </script>
</section>

<!-- Start Footer -->
<?php include 'footer.php' ?>
<!--Ended table Keranjang -->
<?php
if (isset ( $_POST['checkout']))
{
			$ID_Pembeli=$_SESSION["login"]["ID_Pembeli"];
			$No_Rekening_Pembeli=$_SESSION["login"]["No_Rekening_Pembeli"];
			$Tanggal_Faktur_Beli=date("Y-m-d");
			$ID_Jasa_Pembayaran=$_POST["ID_Jasa_Pembayaran"];
			

		    $a="FKBL";
			$b=$ID_Pembeli;
			
			$c="NPSD";

			$ID_Faktur_Beli=$a.$b.rand(100,999);
			$No_Pembayaran=$c.rand(100,999);


			//untuk diskon
		 $ID_Status_Pembayaran="StatBayar01";
 
    $koneksi->query("INSERT INTO faktur_beli (ID_Faktur_Beli, ID_Jasa_Pembayaran, Kode_Diskon, ID_Pembeli, ID_Status_Pembayaran, Total_Barang, Total_Bayar, QTY, Tanggal_Faktur_Beli, No_Pembayaran, No_Rekening_Pembeli) VALUES ('$ID_Faktur_Beli', '$ID_Jasa_Pembayaran', '$Kode_Diskon', '$ID_Pembeli', '$ID_Status_Pembayaran', '$Total_Barang', '$totalkeseluruhan','$Total_Barang','$Tanggal_Faktur_Beli', '$No_Pembayaran', '$No_Rekening_Pembeli')");
		
   			$f="RNCI";
			$ID_Faktur_Rinci=$f.rand(100,999);
   		    $nota_faktur=[];
    foreach ($_SESSION["keranjang"] as $Kode_Barang=>$qty)
    {
    	$nota_faktur[] = $ID_Faktur_Rinci=$f.rand(100,999);
    }
    
		$tarifff=[]; $nof=0; $nor=0;
		$ID_status_Pengiriman="SPENG2";//Belum Bayar ("I8B2")
		$ID_Status_Transfer_Penjual="STF002";
		$Transfer_Uang_Penjual="0";
		$nota_beli=$ID_Faktur_Beli; 

		foreach ($_SESSION["keranjang"] as $Kode_Barang=>$qtyyy)
			{
			 $ambilll=$koneksi->query("SELECT * FROM barang WHERE Kode_Barang='$Kode_Barang'");
			 $pecah2=$ambilll->fetch_assoc();
			 $ID_Penjual=$pecah2['ID_Penjual'];
			 $Harga_Barang=$pecah2['Harga_Barang'];
			 $Sub_Total=$qtyyy*$Harga_Barang;
			 $tarifff[]=$_SESSION["tarif"][$nor];


			$koneksi->query("INSERT INTO faktur_rinci (ID_Faktur_Rinci, ID_Faktur_Beli, ID_status_Pengiriman, Tanggal, Kode_Daftar_Pengiriman, ID_Status_Transfer_Penjual, ID_Penjual, Transfer_Uang_Penjual, QTY_Barang_Per_Toko, Total_Rinci)
			VALUES ('$nota_faktur[$nor]','$nota_beli','$ID_status_Pengiriman', '$Tanggal_Faktur_Beli','$tarifff[$nor]', '$ID_Status_Transfer_Penjual', '$ID_Penjual', '$Transfer_Uang_Penjual', '$qtyyy', '$Sub_Total' )");

			$koneksi->query("INSERT INTO transaksi (ID_Faktur_Rinci, Kode_Barang, QTY_Barang, Sub_Total)
			VALUES ('$nota_faktur[$nor]', '$Kode_Barang', '$qtyyy', '$Sub_Total')");
			$nor++;

			//skrip update stok
        		$koneksi->query("UPDATE barang SET Stok_Barang=Stok_Barang-$qtyyy WHERE Kode_Barang='$Kode_Barang'");
			}

			//mengosongkan keranjang belanja & ongkir
            unset($_SESSION['keranjang'], $_SESSION['ongkir'], $_SESSION['tarif'] );
           	echo "<script>alert('Pembelian Sukses');</script>";
            echo "<script>location='fakturbeli.php?id=$ID_Faktur_Beli';</script>";
}
?>