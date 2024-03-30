<?php

include ('koneksi.php');
if(isset($_POST['cari']))
{
	$_SESSION['session_pencarian'] = $_POST["keyword"];
	$keyword=$_SESSION['session_pencarian'];
}
else
{
	$keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM barang WHERE Kode_Barang LIKE '%$keyword%' OR Nama_Barang LIKE '%$keyword%' 
	OR Stok_Barang LIKE '%$keyword%' ")


?>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-dark">Laporan Stok</h6>
                        </div>
                                    <form class="form-inline" role="search" method="post" action="index.php?halaman=pencarianstok">
                                    <div class="col-md-3">
                                    <table border="0">
                                    <tr>
                                        <td><div class="form-group">
                                            <input type="text" class="form-control" name="keyword" placeholder="Masukkan Pencarian" autofocus autocomplete="off"></input>
                                        <td><button class="btn btn-primary" name="cari"> Search For ... </button>
                                        </div>
                                    </tr>
                                    </table>
                                    </div>
                                </form>
<br>


<form method="post" action="index.php?halaman=searchstok">
	<div class="row">
		
		<div class="col-md-2">
			<div class="form-group">
				<select class="form-control" name="status">
					<option value=" " >Pilih stok</option>
					<option value="0" >Stok Habis</option>
			
				</select>
			</div>
		</div>
		
		<div class="col-md-2">
			
			<button class="btn btn-primary" name="lihat">Lihat</button>
		</div>
	</div>
</form>

<table class="table table-bordered">
	<thead>
	<thead>
		<tr>
			<th> No. </th>
			<th> Kode Barang </th>
			<th> Nama Barang </th>
			<th> Stok </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT *FROM barang WHERE Kode_Barang LIKE '%$keyword%' OR Nama_Barang LIKE '%$keyword%' 
	OR Stok_Barang LIKE '%$keyword%' ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['Kode_Barang']; ?></td>
			<td><?php echo $pecah['Nama_Barang']; ?></td>
			<td> <?php echo $pecah['Stok_Barang']; ?></td>
			
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>	