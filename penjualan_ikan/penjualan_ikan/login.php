<?php
   session_start();
   if(isset($_SESSION['Username_Pembeli'])) {
   header(''); }
   require_once("koneksi.php");
?>

<head>
    <title>E-FISH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/foto.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

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
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

        <img src="udang.jpeg" width="70"><a class="navbar-brand text-primary logo h1 align-self-center" href="index.php">
               E-FISH
            </a>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu.php">Daftar Menu</a>
                        </li>
							<?php if(isset($_SESSION['login'])): ?>
								<li class="nav-item"> <a class="nav-link" href="logout.php">Logout </a> </li>
							<?php else: ?>
								<li class="nav-item"> <a class="nav-link"href="login.php">Login </a> </li>
							<?php endif ?>
							
						<li class="nav-item">
                            <a class="nav-link" href="keranjang.php">Keranjang</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <div class="work-area">
        <div class="container-fluid min-hight">
            <div class="col-md-12">
                <div class="row login-with " background="Penjual/img/1.png">
                    <div class="col-md-3 mx-auto">
                        <div class="login-box ">
						<br> <br> <br> 
                            <h3><center> Login </center></h3>
							<br> 
							<h6><small> <center>Silahkan Masukkan Username dan Password </h6></small></center>
							<br>
                            <form method="POST" id="signup-form">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="Username_Pembeli"></input>

                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control"name="Password_Pembeli"></input>

                                </div>
								<br>
                                <div class="form-check">
                                <center><button class="btn btn-primary hand-cursor" name="login"> <i class="fa fa-user-o"></i>
                                    Login </button>	</center>
							</form>
							<div>
								<?php
									require 'koneksi.php';
                                        if (isset($_POST['login'])){
                                        $Username_Pembeli=$_POST['Username_Pembeli'];
                                        $Password_Pembeli=$_POST['Password_Pembeli'];
                                        $ambil=mysqli_query($koneksi, "SELECT * FROM pembeli WHERE Username_Pembeli='$Username_Pembeli' AND Password_Pembeli='$Password_Pembeli'");
                                        $cocok=mysqli_num_rows($ambil);
                                        if ($cocok>0)
                                        {
											$akun=$ambil->fetch_assoc();
                                            $_SESSION["login"] = true ;
											$_SESSION["login"] = $akun ;
                                            echo "<script>alert('Login Sukses');</script>";
											
											//jika sudah belanja
											if(isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang']))
											{
												echo "<meta http-equiv='refresh' content='1;url=checkout.php'>"; 
											}
											else 
											{
												echo "<meta http-equiv='refresh' content='1;url=index.php'>";
											}
										}
										else 
										{  
                                            echo "<script>alert('Login Gagal');</script>";
											echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                        }
										}
								?>
								</br><center><h5>Belum punya akun?</h5></center>
								<center><a href="registrasi.php"><h6> Registrasi  </h6></a></center>
								<br>
								<div class="text-center">
                                        <a class="btn btn-warning" class="small" href="Penjual/loginpenjual.php">Mulai sebagai Penjual</a>
                                    </div> <br>

                                     <div class="text-center">
                                        <a class="btn btn-warning" class="small" href="Admin/login.php">Masuk sebagai Admin</a>
                                    </div>
							</div>
							
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br> <br> <br><br> <br> <br>
	
	<!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-primary border-bottom pb-3 border-light logo">SMART FARMING VILLAGE MARKET</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Indralaya, Sumatera Selatan, Indonesia
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="">080117826549</a>
                        </li>
                        <li>
                            <i class="fab fa-instagram fa-sm fa-fw me-2"></i>
                            <a class="text-decoration-none" href="">@smartfarmingvillagemarket</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2022 Smart Farming Village Market
                            | Designed by Smart Farming Village Market
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->