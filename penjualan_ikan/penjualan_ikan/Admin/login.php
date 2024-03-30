<?php
session_start ();
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="smart_farming";

$koneksi=mysqli_connect($db_host,$db_user,$db_pass,$db_name);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-FISH - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
    <body>
    <body background="../loginbg.jpg">
    <div class="container">
    <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                
         <div class="row ">
            <div class="col-lg-3 d-lg-block "></div>
                            <div class="col-lg-6">   
                  <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Di E-FISH</h1>
                                    </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" method="POST">
                                       <br />
                                     <div class="form-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <input type="text" class="form-control" name="Username" />
                                        </div>
                                    <div class="form-group ">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  name="Password_Admin" />
                                        </div>
                                        <label>Level</label>
                                        <select class="form-control" name="Level_Admin" required>
                                        <option value="" > Pilih Level </option>
                                        <option value="Admin" > Admin </option>
                                        </select>
                                    </br>
                                            <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" name="login">Login</button>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                    <hr />
                                    <div class="text-center">
                                        <a class="btn btn-info" class="small" href="../Penjual/loginpenjual.php">Mulai sebagai Penjual</a>
                                    </div> <br>

                                     <div class="text-center">
                                        <a class="btn btn-info" class="small" href="../login.php">Masuk sebagai Pembeli</a>
                                    </div>

                                    </form>
                                    <?php
                                if (isset($_POST["login"]))
                                {
                                    $db_user = $_POST["Username"];
                                    $db_pass = $_POST["Password_Admin"];
                                    $cek = $koneksi->query("SELECT * FROM admin
                                                        WHERE Username='$db_user' AND Password_Admin='$db_pass'");
                                    
                                    $cocok = $cek->num_rows;
                                    if ($cocok==1)
                                    {
                                        $akuncus = $cek->fetch_assoc();
                                        $_SESSION["Username"] = $akuncus;
                                        echo "<script>alert('Anda sukses login');</script>";
                                        echo "<script>location='index.php?halaman=index';</script>";
                                   }
                                    else
                                    {
                                        echo "<script>alert('Username dan Password Anda Salah');</script>";
                                        echo "<script>location='login.php';</script>";
                                    }
                                }
                            ?>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
   
   
   
   

</body>
</html>
