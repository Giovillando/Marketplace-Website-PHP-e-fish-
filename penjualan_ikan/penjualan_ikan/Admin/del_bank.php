
<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM bank WHERE ID_Bank='$_GET[ID_Bank]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM bank WHERE ID_Bank='$_GET[ID_Bank]' ");


echo "<script> alert(' Data Bank Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=bank';</script>";
?>