<?php 

if(isset($_POST['lihat']))
{
	$_SESSION['session_pencarian'] = $_POST["cari"];
	$keyword=$_SESSION['session_pencarian'];
}
else
{
	$keyword=$_SESSION['session_pencarian'];
}




$query=mysqli_query($koneksi, "SELECT barang.*,  barang.Nama_Barang,Kelompok_Barang.Nama_Kelompok_Barang, Kelompok_Barang.Kode_Kelompok_Barang
				 , jenis_barang.Nama_Jenis_Barang,penjual.Nama_Penjual
				 FROM barang, Kelompok_Barang, jenis_barang,penjual  WHERE barang.ID_Penjual=penjual.ID_Penjual AND barang.Kode_Kelompok_Barang=Kelompok_Barang.Kode_Kelompok_Barang AND
				 Kelompok_Barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
							 and(Stok_Barang='$keyword' OR Nama_Barang 
								LIKE '%$keyword%' OR Nama_Kelompok_Barang LIKE '%$keyword%' OR Nama_Jenis_Barang LIKE '%$keyword%' OR Nama_Penjual LIKE '%$keyword%' )")


?>
 <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Data Laporan Barang</h6>
                        </div>

<form method="post">
	<div class="row">
		<div class="col-md-3">
		<div class="form-group">
				
				<input type="int" class="form-control" name="cari"  placeholder="Search For...">
			</div>
		</div>

		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="lihat">Lihat</button>
		</div>
	</div>
</form>


<form method="post">
	<div class="row">
		<div class="col-md-3">
		<div class="form-group">
				<select class="form-control" name="cari">
					<option value=" " >Pilih stok</option>
					<option value="0" >Stok Habis</option>
			
				</select>
			</div>
		</div>

		<div class="col-md-3">
		<div class="form-group">
				<select class="form-control" name="cari">
					<option value=" " >Pilih Penjual</option>
					<?php $ambil=mysqli_query($koneksi, "SELECT * FROM penjual"); ?>
					<?php while($pecah=$ambil->fetch_assoc()){?>
					<option value="<?php echo $pecah['Nama_Penjual']; ?>"><?php echo $pecah['Nama_Penjual']; ?></option>
				<?php } ?>
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="lihat">Lihat</button>
		</div>
	</div>
</form>

<div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered text-light" id="dataTable" width="100%" cellspacing="50"style="background-color:rebeccapurple;">
	<thead>
		<tr>
			<th> No. </th>
			<th> Kode Barang </th>
			<th> Nama Penjual </th>
			<th> Nama Barang </th>
			<th> Nama Jenis Barang </th>
			<th> Kelompok_Barang  </th>
			<th> Foto Barang </th>
			<th> Harga Barang </th>
			<th> Stok Barang </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=mysqli_query($koneksi, "SELECT barang.*,  barang.Nama_Barang,kelompok_barang.Nama_Kelompok_Barang, kelompok_barang.Kode_Kelompok_Barang
				 ,jenis_barang.Nama_Jenis_Barang, penjual.Nama_Penjual
				 FROM barang, kelompok_barang, jenis_barang,penjual  WHERE barang.ID_Penjual=penjual.ID_Penjual AND barang.Kode_Kelompok_Barang=kelompok_barang.Kode_Kelompok_Barang AND
				 kelompok_barang.Kode_Jenis_Barang=jenis_barang.Kode_Jenis_Barang
							 and(Stok_Barang='$keyword' OR Nama_Barang 
								LIKE '%$keyword%' OR Nama_Kelompok_Barang LIKE '%$keyword%' OR Nama_Jenis_Barang LIKE '%$keyword%' OR Nama_Penjual LIKE '%$keyword%')");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['Kode_Barang']; ?></td>
			<td> <?php echo $pecah['Nama_Penjual']; ?></td>
			<td><?php echo $pecah['Nama_Barang']; ?></td>
			<td><?php echo $pecah['Nama_Jenis_Barang']; ?></td>
			<td><?php echo $pecah['Nama_Kelompok_Barang']; ?></td>
			<td> 
				<img src="../admin/Foto_Produk/<?php echo $pecah['Foto_Barang'];?>" width="100">
			</td>
			<td> <?php echo $pecah['Harga_Barang']; ?></td>
			<td> <?php echo $pecah['Stok_Barang']; ?> kg</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>