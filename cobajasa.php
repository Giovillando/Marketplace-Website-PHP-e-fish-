<?php 

  require_once "koneksi.php";

$Kode_Jenis_Pembayaran = $_POST['Kode_Jenis_Pembayaran'];

$sql = mysqli_query($koneksi, "SELECT * FROM jasa_pembayaran WHERE Kode_Jenis_Pembayaran = '$Kode_Jenis_Pembayaran' ");
echo '<option>Pilih Metode Pembayaran</option>';
while ($row = mysqli_fetch_array($sql)) {
  echo '<option value="'.$row['ID_Jasa_Pembayaran'].'">'.$row['Nama_Jasa_Pembayaran'].'</option>';
}

?>