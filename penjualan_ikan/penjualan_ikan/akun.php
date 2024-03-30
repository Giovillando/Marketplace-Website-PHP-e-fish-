<?php
    include 'koneksi.php';
    session_start();
    if(!isset($_SESSION["login"]))
    {
        
    }

    //mendapatkan kode faktur dari url
    $ambil = $koneksi->query("SELECT * FROM pembeli JOIN jenis_pembeli ON pembeli.Kode_Jenis_Pembeli =pembeli.Kode_Jenis_Pembeli ");
    $_SESSION["login"] = $ambil->fetch_assoc();

    //medapatkan id pembeli
    $id_cus = $_SESSION["login"]["Nama_Pembeli"];
    //mendapatka id yg login
    $id_log = $_SESSION["login"]["Nama_Pembeli"];

    if ($id_log !== $id_cus) 
    {
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>E-FISH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/Logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/Logo.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>
<?php include "header.php" ?>

<body>
    <section class="container py-1">
        <div class="col-lg-12 m-auto">
            <div class="row text-center pt-5">
                <h1 class="text-success h1"><strong>PROFIL AKUN</h1></strong>
                <center> <img src="profil (1).png" width="100"></center>
                <br> <br> <br>
            </div>
        </div>
        <center>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Loyality Pengguna</th>
                        <td><?php echo $_SESSION["login"]["Nama_Jenis_Pembeli"];?> Account</td>
                    </tr>

                    <tr>
                        <th>ID Pembeli</th>
                        <td><?php echo $_SESSION["login"]["ID_Pembeli"]; ?></td>
                    </tr>

                    <tr>
                        <th>Username Pembeli</th>
                        <td><?php echo $_SESSION["login"]["Username_Pembeli"]; ?></td>
                    </tr>

                    <tr>
                        <th>Nama Pembeli</th>
                        <td><?php echo $_SESSION["login"]["Nama_Pembeli"]; ?></td>
                    </tr>

                    <tr>
                        <th>Alamat Pembeli</th>
                        <td><?php echo $_SESSION["login"]["Alamat_Pembeli"]; ?></td>
                    </tr>

                    <tr>
                        <th>Password Pembeli</th>
                        <td><?php echo $_SESSION["login"]["Password_Pembeli"]; ?></td>
                    </tr>

                    <tr>
                        <th>No Rekening Pembeli</th>
                        <td><?php echo $_SESSION["login"]["No_Rekening_Pembeli"]; ?></td>
                    </tr>

                    <tr>
                        <th>No Handhpone Pembeli</th>
                        <td><?php echo $_SESSION["login"]["No_Handphone_Pembeli"]; ?></td>
                    </tr>

                </table>
                </br>
            </div>
        </center>
            <br>
            <td> 
             <a href ="edit_pembeli.php?halaman=edit_pembeli&ID_Pembeli=<?php echo $_SESSION["login"]['ID_Pembeli']?>" class="btn btn- btn-info">Edit Profil</a>
         </td>
        </div>
    </div>
</section>
</body>
<br>
<?php include "footer.php" ?>
</html>