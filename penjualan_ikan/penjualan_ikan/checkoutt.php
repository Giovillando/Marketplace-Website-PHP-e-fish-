<?php
session_start();
echo "<pre>";
echo  print_r($_SESSION);
echo "</pre>";
if(!isset($_SESSION["pembeli"]))
{
	echo "<script>alert('Silahkan login');</script>";
	echo "<script>location='login.php';</script>";
}
include('koneksi.php');

if(!isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Silahkan belanja dulu');</script>";
	echo "<script>location='shop.php';</script>";
}
if(!isset($_SESSION["pembeli"]['id_kota_pembeli']))
{
	
}
if(!isset($_GET["no"]))
{
	
}
else
{
	$nol=$_GET["no"];
	$_SESSION["ongkir"][$nol]=$_GET["tarif_pengiriman"];
	$_SESSION["tarif"][$nol]=$_GET['id_daftar_pengiriman'];
	//echo $_SESSION["ongkir"][$nol];
}
?>

<?php include 'header.php' ?>
<!--table Keranjang -->
<section class="konten">
	<h4 class="text-center mb-4"> CHECKOUT</h4>
	<div class="col-md-12">
 	<div class="col-md-12">
	<br>
	<div class="row">
		<div class="col-md-4">
		<label>Nama Pembeli</label>
			<div class="form-group"> 
				<input type="text" readonly value="<?php echo $_SESSION["pembeli"]['nm_pembeli']?>"class="form-control">
			</div>
		</div>
		<div class="col-md-4">
		<label>Alamat</label>
			<div class="form-group"> 
			<input type="text" readonly value="<?php echo $_SESSION["pembeli"]['almt_pembeli']?>"class="form-control">
			</div>
		</div>
		<div class="col-md-2">
			<label>No Handphone Pembeli</label>
			<div class="form-group"> 
				<input type="text" readonly value="<?php echo $_SESSION["pembeli"]['no_hp_pembeli']
				?>"class="form-control">
			</div>
		</div>
		<div class="col-md-2">
			<label>Kota Pembeli</label>
			<div class="form-group"> 
				<?php $kota_tujuan=$_SESSION["pembeli"]['id_kota_tujuan'];
				$ambilll=$koneksi->query("SELECT * FROM pembeli join kota on pembeli.id_kota_tujuan=kota.id_kota WHERE id_kota_tujuan='$kota_tujuan' "); 
					$pecahhh=$ambilll->fetch_assoc();
				 ?>
				<input type="text" readonly value="<?php echo $pecahhh['nm_kota'] ?>"class="form-control">
			</div>
		</div>
	</div>

	<br/>
	<div class="table-wrap">


			<?php $penjual=[]; $noo=0;?> <?php $totalkeseluruhan = 0; $subtotal=0; $totalbarang=0; ?>
			<?php foreach ($_SESSION['keranjang'] as $id_barang => $qty): ?>
			<?php $ambil=$koneksi->query("SELECT * FROM barang JOIN penjual ON barang.id_penjual=penjual.id_penjual JOIN kota ON penjual.kota=kota.id_kota WHERE id_barang='$id_barang' "); 
			  $pecah=$ambil->fetch_assoc(); ?>
			<?php 
			if ($noo == 0) { $penjual[]=$pecah['id_penjual']; $noo++;}
			else {$tc=0;$tcc=0;
				foreach($penjual as $id)
					if($id==$pecah['id_penjual']) {$tcc++;}
					if($tc==$tcc){$penjual[]=$pecah['id_penjual']; $noo++;}
					$tc++;
				}
				 endforeach; 
			
			?>
<?php $nop=0; $nopp=1; $tot_sub=[]; $tarif=[]; $tot_barang=[];?>
<?php foreach ($penjual as $id): ?>	
	<?php 
		$barang=[];
		$qtyy=[]; 
		foreach ($_SESSION['keranjang'] as $id_barang => $qty): 
		$ambil=$koneksi->query("SELECT * FROM barang JOIN penjual ON barang.id_penjual=penjual.id_penjual JOIN kota ON penjual.kota=kota.id_kota WHERE id_barang='$id_barang' AND penjual.id_penjual='$id'"); 
		$pecah=$ambil->fetch_assoc();
		if (empty($pecah['id_barang'])) {;}
		else{$barang[]= $pecah['id_barang'];
			 $qtyy[]= $qty;}

	endforeach;
	//print_r($barang);
	?>
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
		</tr>
		</thead>
		<tbody class="tbody-primary">
		<?php $no=1; ?>
		<?php $totalpesanan=0; $noj=0; ?>
		<?php $berat_ttl=0; ?>
		<?php foreach ($barang as $id_barang): ?>
			<!--Menampilkan Produk yang diperulangkan dari id produk line 64-->
		<?php $ambil=$koneksi->query("SELECT * FROM barang JOIN penjual ON barang.id_penjual=penjual.id_penjual JOIN kota ON penjual.kota=kota.id_kota WHERE id_barang='$id_barang' AND penjual.id_penjual='$id'"); 
			  $pecah=$ambil->fetch_assoc();
			  $subharga= $pecah['harga']*$qtyy[$no-1];
			  $Berat_Barang=$pecah['berat']*$qtyy[$no-1];
			  $tot_barang[]=$qtyy[$no-1];
			  $kota_penjual=$pecah['nm_kota']; 
			  //print_r($kota_penjual);
		?>
		
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $pecah['nm_pen']?></td>
				<td><?php echo $pecah['nm_kota']?></td>
				<td><?php echo $pecah['nm_barang']?></td>
				<td>Rp.<?php echo number_format($pecah['harga']); ?></td>
				<td><?php echo number_format($pecah['berat']); ?> kg</td>
				<td><?php echo $qtyy[$no-1] ?></td>
				<td>Rp.<?php echo number_format($subharga); ?></td>
			</tr>
		<?php $no++; ?>
		<?php $totalpesanan+=$subharga; ?>
		<?php $berat_ttl+=$Berat_Barang;?>
		<?php $kota_penjual= $pecah['nm_kota']; ?>
		<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr> 
				<th colspan='7' > Berat Total </th>
				<th>  <?php  echo number_format($berat_ttl) ?> kilogram </th>
			</tr>
			<tr> 
			<?php 
			$ambil1=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.id_sistem_pengiriman=sistem_pengiriman.id_sistem_pengiriman 
				JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim JOIN kategori ON daftar_pengiriman.id_kategori=kategori.id_kategori JOIN kota ON daftar_pengiriman.id_kota_asal=kota.id_kota WHERE nm_kota= '$kota_penjual'");
			$ambil3=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.id_sistem_pengiriman=sistem_pengiriman.id_sistem_Pengiriman 
				JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim JOIN kategori ON daftar_pengiriman.id_kategori=kategori.id_kategori 
				JOIN kota ON daftar_pengiriman.id_kota_asal=kota.id_kota");
			$ambil2=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN kota ON daftar_pengiriman.id_kota_tujuan =kota.id_kota 
					WHERE id_kota_tujuan='$kota_tujuan'")?>
			<?php $pecah=$ambil1->fetch_assoc() AND $pecah1=$ambil2->fetch_assoc() and $pecah1=$ambil3->fetch_assoc() ?>

			<tr> 
				<th> Pengiriman </th>
				<?php if (isset($_GET['tarif_pengiriman']) AND isset($_GET['id_daftar_pengiriman'])){
						$id_tarif=$_SESSION["tarif"][$nop];
				$ambil4=$koneksi->query("SELECT * FROM daftar_pengiriman JOIN sistem_pengiriman ON daftar_pengiriman.id_sistem_pengiriman=sistem_pengiriman.id_sistem_pengiriman 
				JOIN jasa_kirim ON sistem_pengiriman.id_jasa_kirim=jasa_kirim.id_jasa_kirim JOIN kategori ON daftar_pengiriman.id_kategori=kategori.id_kategori JOIN kota ON daftar_pengiriman.id_kota_asal=kota.id_kota WHERE nm_kota= '$kota_penjual' AND id_daftar_pengiriman='$id_tarif'"); $pecah4=$ambil4->fetch_assoc()?>
				<th colspan='5' >  <?php echo $pecah1['nm_kota']?>-<?php echo $pecah4['nm_kategori']?>-<?php echo $pecah4['nm_jasa_kirim']?>  </th>
				<?php } else {?>
				<th colspan='5' >  <?php echo $pecah1['nm_kota']?>-<?php echo $pecah['nm_kategori']?>-<?php echo $pecah['nm_jasa_kirim']?>  </th> <?php } ?>
				<th>  Rp.  <?php  if (!isset($_GET['tarif_pengiriman']) AND !isset($_GET['id_daftar_pengiriman'])){ ?>
                        <?php $_SESSION["ongkir"][$nop]=$pecah['tarif_pengiriman'];
                        	  $_SESSION["tarif"][$nop]=$pecah['id_daftar_pengiriman'];
						echo $_SESSION["ongkir"][$nop]; ?> 
                        <?php } 
                        else if ($nop==$nol){ ?>

						<?php echo $_SESSION["ongkir"][$nop] ;?>
                        <?php } 
						else { 
                         echo $_SESSION["ongkir"][$nop];?>
                        <?php } ?>
				<td>  <a href ="daftar_pengiriman_ubahh.php?nm_kota=<?php echo $pecah['nm_kota']?>&no=<?php echo $nop?>" class="btn btn- btn-light"> UBAH</a> </td>
			</tr>
			</tr>
			<tr> 
				<th colspan='7' > Total Pesanan </th>
				<th> Rp. <?php  $total_seluruh[] = $totalpesanan +$_SESSION["ongkir"][$nop];
				echo number_format($total_seluruh[$nop])?>  </th>  
				<th>  </th>  
			</tr>
		</tfoot>
		</table> 
		<?php $totalbarang+= $tot_barang[$nop];?>
		<?php $tot_sub[]=$subharga; $subtotal+=$tot_sub[$nop]?>
		<?php $totalkeseluruhan += $total_seluruh[$nop]; ?>
		<?php $nop++; $nopp++; endforeach; //print_r($totalbarang)?>	
	<form method="POST">
		<div class="row">
					<div class="col-md-4">
						<label>Jenis Pembayaran :</label>
						<select class="form-control" name="id_jenis_pembayaran" id="id_jenis_pembayaran" required>
							<option value="">Pilih Pembayaran</option>
							<?php
							$ambil=$koneksi->query("SELECT * FROM jenis_pembayaran");
							while($pembayaran=$ambil->fetch_assoc()){
								?>
								<option value="<?php echo $pembayaran['id_jenis_pembayaran']; ?>">
									<?php echo $pembayaran['nm_jenis_pembayaran'];?>
								</option>
							<?php }?>
						</select>
					</div>
					<div class="col-md-4">
						<label>Metode Pembayaran :</label>
						<select class="form-control" name="id_jasa_pembayaran" id="id_jasa_pembayaran" required>
							<option value="">Pilih Metode Pembayaran</option>
							<option></option>
						</select>
					</div>
		</div>
    <p style="text-align: right;" ><b> Subtotal Untuk Produk: Rp. <?php  echo number_format($subtotal) ?> </b></p>	
		<p style="text-align: right;" ><b> Total Belanja: Rp. <?php  echo number_format($totalkeseluruhan) ?> </b></p>
		<button class="btn btn-primary" name="checkout"> Check Out </button>
	</form>
</div></div></div>
<!--Ended table Keranjang -->
<?php include 'footer.php' ?>
<?php
if (isset ( $_POST['checkout']))
{
			$id_pembeli=$_SESSION["pembeli"]["id_pembeli"];
			$no_rekening=$_SESSION["pembeli"]["no_rek_pembeli"];
			$tanggal=date("Y-m-d");

			//KODE FAKTUR
    // mengambil data Faktur Rinci dengan kode paling besar
    $query1 = mysqli_query($koneksi, "SELECT max(id_faktur_beli) as kodeTerbesar FROM faktur_beli");
    $data1 = mysqli_fetch_array($query1);
    $id_faktur_beli = $data1['kodeTerbesar'];
 
    // mengambil angka dari kode Faktur Rinci terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($id_faktur_beli, 6, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode Faktur Rinci baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "FBTLRI";
    $id_faktur_beli = $huruf . sprintf("%03s", $urutan);

    //Nomor_Pembayaran 
    $query1 = mysqli_query($koneksi, "SELECT max(no_pembayaran) as kodeTerbesar FROM faktur_beli");
    $data1 = mysqli_fetch_array($query1);
    $no_pembayaran = $data1['kodeTerbesar'];
 
    // mengambil angka dari kode Faktur Rinci terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($no_pembayaran, 6, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode Faktur Rinci baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "VCSHUI"; 
    $no_pembayaran = $huruf . sprintf("%03s", $urutan) ;


			//untuk diskon
		 $id_status_pembayaran="STAPEM002";
		 $id_diskon= "IDKOSN001";
 
    $koneksi->query("INSERT INTO faktur_beli (id_faktur_beli, id_jasa_pembayaran, id_diskon, id_pembeli, id_status_pembayaran, tot_barang, tot_bayar, qty, tgl, no_pembayaran, no_rekening) VALUES ('$id_faktur_beli', '$_POST[id_jasa_pembayaran]', '$id_diskon', '$id_pembeli', '$id_status_pembayaran', '$totalbarang', '$totalkeseluruhan','$totalbarang','$tanggal', '$no_pembayaran', '$no_rekening')");
		

	//Faktur Rinci 
    // mengambil data Faktur Rinci dengan kode paling besar
    $query1 = mysqli_query($koneksi, "SELECT max(id_faktur_rinci) as kodeTerbesar FROM faktur_rinci");
    $data1 = mysqli_fetch_array($query1);
    $id_faktur_rinci = $data1['kodeTerbesar'];
 
    // mengambil angka dari kode Faktur Rinci terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($id_faktur_rinci, 6, 3);
 
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
 
    // membentuk kode Faktur Rinci baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "FTRRNC";
    $nota_faktur=[];
    foreach ($_SESSION["keranjang"] as $id_barang=>$qty)
    {
    	$nota_faktur[] = $huruf . sprintf("%03s", $urutan);
    	$urutan++;
    }
    
		$tarifff=[]; $nof=0; $nor=0;
		$id_status_pengiriman="STATPENG002";//Belum Bayar ("I8B2")
		$id_status_transfer_penjual="018C1";
		$transfer_penjual="0";
		$nota_beli=$id_faktur_beli;

		foreach ($_SESSION["keranjang"] as $id_barang=>$qtyyy)
			{
			 $ambilll=$koneksi->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
			 $pecah2=$ambilll->fetch_assoc();
			 $id_penjual=$pecah2['id_penjual'];
			 $harga_barang=$pecah2['harga'];
			 $subtotal_barang=$qtyyy*$harga_barang;
			 $tarifff[]=$_SESSION["tarif"][$nor];


			$koneksi->query("INSERT INTO faktur_rinci (id_faktur_rinci, id_faktur_beli, id_status_pengiriman, tgl_rinci, id_daftar_pengiriman, id_status_transfer_penjual, id_penjual, transfer_uang_penjual, qty_barang_per_toko, total_bayar)
			VALUES ('$nota_faktur[$nor]','$nota_beli','$id_status_pengiriman', '$tanggal','$tarifff[$nor]', '$id_status_transfer_penjual', '$id_penjual', '$transfer_penjual', '$qtyyy', '$subtotal_barang' )");

			$koneksi->query("INSERT INTO transaksi (id_faktur_rinci, id_barang, qty_barang, sub_total)
			VALUES ('$nota_faktur[$nor]', '$id_barang1', '$qty', '$subtotal_barang')");
			$nor++;
			}

			$nof=0;
			foreach ($_SESSION["keranjang"] as $id_barang=>$qtyyz)
			{
			 $ambilll=$koneksi->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
			 $pecah2=$ambilll->fetch_assoc();
			 $id_barang1=$pecah2['id_barang'];
			 $id_penjual=$pecah2['id_penjual'];
			 $harga_barang=$pecah2['harga'];
			 $subtotal_barang1=$qtyyz*$harga_barang;

			$koneksi->query("INSERT INTO transaksi (id_faktur_rinci, id_barang, qty_barang, sub_tot)
			VALUES ('$nota_faktur[$nof]', '$id_barang1', '$qtyyz', '$subtotal_barang1')");
			$nof++;
			}

			//mengosongkan keranjang belanja & ongkir
            unset($_SESSION['keranjang'], $_SESSION['ongkir'], $_SESSION['tarif'] );
           	echo "<script>alert('Pembelian Sukses');</script>";
            echo "<script>location='faktur_beli_co.php?id=$id_faktur_beli';</script>";
}
?>
<script>
		$(document).ready(function() {
			$('#id_jenis_pembayaran').change(function() {
				var id_jenis_pembayaran = $(this).val();

				$.ajax({
					type: 'POST',
					url: 'ambilmetode.php',
					data: 'id_jenis_pembayaran='+id_jenis_pembayaran,
					success: function(response) {
						$('#id_jasa_pembayaran').html (response);
					}
				});
			})
		});
</script>