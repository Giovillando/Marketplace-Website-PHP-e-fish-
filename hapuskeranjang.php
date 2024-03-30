<?php

session_start();
$ID_Barang=$_GET["id"];
unset($_SESSION["keranjang"][$ID_Barang]);

echo "<script>alert('Barang telah dihapus dari keranjang');</script>";
echo "<script>location='keranjang.php';</script>";


?>