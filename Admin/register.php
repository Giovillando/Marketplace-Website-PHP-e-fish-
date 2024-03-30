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
    <title>SFVM - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
    <body>
    <body background="img/bg_1.jpg">
    <div class="container">
    <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                
         <div class="row ">
            <div class="col-lg-3 d-lg-block "></div>
                            <div class="col-lg-6">   
                  <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">REGISTER</h1>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">SFVM</h1>
                                    </div>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form role="form" method="POST">
                                       <br />
                                     <div class="form-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <input type="text" class="form-control" name="Username" placeholder="Username"/>
                                        </div>
                                    <div class="form-group ">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  name="Password_Admin" placeholder="Password"/>
                                        </div>
                                    <div class="form-group ">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="text" class="form-control"  name="Nama_Admin" placeholder="Nama Admin"/>
                                        </div>

                                        <label>Level</label>
                                        <select class="form-control" name="Level_Admin" required>
                                        <option value="" > Pilih Level </option>
                                        <option value="Admin" > Admin </option>
                                        </select>
                                        <br>
                                        <div class="text-center">
                                        <button class="btn btn-primary" name="register">Register</button>
                                    </form>
                            <?php if (isset($_POST["register"]))
                {
                    
                    $Username=$_POST["Username"];
                    $Password_Admin=$_POST["Password_Admin"];
                    $Nama_Admin=$_POST["Nama_Admin"];
                    $Level_Admin=$_POST["Level_Admin"];
                    $ambil=$koneksi->query("SELECT *FROM admin WHERE Username='$Username'");
                    $yangcocok=$ambil->num_rows;
                    if($yangcocok==1)
                    {
                        echo"<script>alert('PROSES REGISTRASI GAGAL. Username sudah digunakan.');</script>";
                        echo "<script>location='register.php';</script>";
                    }
                    else
                    {
                        $koneksi->query("INSERT INTO admin (Username,Password_Admin,Nama_Admin,Level_Admin)
                        VALUES('$Username','$Password_Admin','$Nama_Admin','$Level_Admin')");
                        echo"<script>alert('PROSES REGISTRASI SUKSES. Silahkan login.');</script>";
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
