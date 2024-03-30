<h2> Tambah BARANG </h2>
</br>
	<form method="post" enctype="multipart/form-data">
	<div class="form=group">
		<label>Kode Barang</label>
		<input type="text" class="form-control" name="Kode_Barang">
	</div>
	<div class="form=group">
		<label>Nama Barang </label>
		<input type="text" class="form-control" name="Nama_Barang">
	</div>
	<div class="form=group">
		<label>Berat Barang </label>
		<input type="text" class="form-control" name="Berat_Barang">
	</div>
	<div class="form=group">
		<label>Deskripsi Barang </label>
		<input type="text" class="form-control" name="Deskripsi_Barang">
	</div>
	<div class="form=group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="form=group">
		<label>Harga (Rp) </label>
		<input type="number" class="form-control" name="Harga_Barang">
	</div>
	<div class="form=group">
		<label>Stok</label>
		<input type="number" class="form-control" name="Stok_Barang">
	</div>
	<div class="form=group">
		<label>ID Penjual</label>
		<select class="form-control" name="ID_Penjual" >
		<?php $ambil=$koneksi->query("SELECT * FROM penjual"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['ID_Penjual']?>"> <?php echo $pecah['ID_Penjual'] ?> - <?php echo $pecah['Nama_Penjual'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	<div class="form=group">
		<label>ID Kelompok</label>
		<select class="form-control" name="Kode_Kelompok_Barang" >
		<?php $ambil=$koneksi->query("SELECT * FROM kelompok_barang"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<option value="<?php echo $pecah['Kode_Kelompok_Barang'] ?>" > <?php echo $pecah['Kode_Kelompok_Barang'] ?> - <?php echo $pecah['Nama_Kelompok_Barang'] ?>
		</option>
        <?php } ?>
        </select>
	</div>
	</br>
	<button class="btn btn-primary" name="Simpan">Simpan</button>
	</form>
	<?php
	if(isset($_POST['Simpan']))
	{
		$nama=$_FILES['foto']['name'];
		$lokasi=$_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi,"../Admin/img".$nama);
		$koneksi->query("INSERT INTO barang 
			(Kode_Barang,Nama_Barang,Berat_Barang,Deskripsi_Barang,Foto_Barang,Harga_Barang,Stok_Barang,ID_Penjual,Kode_Kelompok_Barang)
			VALUES('$_POST[Kode_Barang]',
			'$_POST[Nama_Barang]','$_POST[Berat_Barang]','$_POST[Deskripsi_Barang]','$nama','$_POST[Harga_Barang]','$_POST[Stok_Barang]','$_POST[ID_Penjual]','$_POST[Kode_Kelompok_Barang]')");
		echo "<div class='alert alert-info'>Data Tersimpan </div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=barang'>";
	}
	?>