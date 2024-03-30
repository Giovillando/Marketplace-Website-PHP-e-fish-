<?php
$ambil=$koneksi->query("SELECT*FROM nota WHERE No_Nota='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
$ID_Ajuandana="Sedang Diajukan";
				$koneksi->query("UPDATE nota SET ID_Ajuandana='$ID_Ajuandana' WHERE No_Nota='$_GET[id]'");
			

echo "<script> alert('Pengajuan Berhasil Diajukan');</script>";
echo "<script> location='index.php?halaman=nota';</script>";
?>