<h2> Data Admin </h2>
</br>
<table class="table table-bordered"background="02.png">
	<thead>
		<tr>
			<th> No. </th>
			<th> Username </th>
			<th> Password </th>
			<th> Nama </th>
			<th> Level </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM admin");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['username']; ?></td>
			<td> <?php echo $pecah ['password']; ?></td>
			<td> <?php echo $pecah ['nama']; ?></td>
			<td><?php echo $pecah['level']; ?></td>
			<td> 
		<a href="index2.php?halaman=hapusadmin&id=<?php echo $pecah['username'];?> " class="btn-danger btn" >Hapus</a>
		<a href="index2.php?halaman=ubahadmin&id=<?php echo $pecah['username'];?>" class="btn btn-warning"> Ubah </a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href=" index2.php?halaman=tambahadmin" class ="btn btn-primary"> Tambah </a>