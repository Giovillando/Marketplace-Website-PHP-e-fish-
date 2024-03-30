<h2> Penilaian Produk </h2>
</br>
<?php

$id_faktur=$_GET['id'];

//mengambildata pmbyrn brdsrkan idfaktur
$ambil=$koneksi->query("SELECT * FROM nota JOIN pembeli on nota.ID_Pembeli=pembeli.ID_Pembeli WHERE No_Nota='$id_faktur' ");
$detail = $ambil->fetch_assoc();


?>


<div class="row">
	<div class="col-md-6"></div>
		<table class="table table-bodered">
			<tr>
				<td>Nama</td>
				<td>No Nota  </td>
				<td>Penilaian  </td>
			</tr>			
			<tr>
				<td><?php echo $detail['Nama_Pembeli'];?></td>
				<td><?php echo $detail['No_Nota'];?></td>
				<td><?php echo $detail['Penilaian'];?></td>
			</tr>
		</table>
</div>