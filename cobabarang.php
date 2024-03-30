<?php 

  require_once "koneksi.php";

$Kode_Jenis_Barang = $_POST['Kode_Jenis_Barang'];

$sql = mysqli_query($koneksi, "SELECT * FROM kelompok_barang WHERE Kode_Jenis_Barang = '$Kode_Jenis_Barang' ");
echo '<option>Pilih Kelompok </option>';
while ($row = mysqli_fetch_array($sql)) {
  echo '<option value="'.$row['Kode_Kelompok_Barang'].'">'.$row['Nama_Kelompok_Barang'].'</option>';
}

?>