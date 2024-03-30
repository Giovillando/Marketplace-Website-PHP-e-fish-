<?php
include ('koneksi.php');
$ambildata=$koneksi->query("SELECT * FROM status_transfer_penjual WHERE ID_Status_Transfer_Penjual='$_GET[ID_Status_Transfer_Penjual]'");
$pecah=$ambildata->fetch_assoc();

$koneksi->query("DELETE FROM status_transfer_penjual WHERE ID_Status_Transfer_Penjual='$_GET[ID_Status_Transfer_Penjual]' ");


echo "<script> alert('Data Status Transfer Penjual Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=status_transfer_penjual';</script>";
?>