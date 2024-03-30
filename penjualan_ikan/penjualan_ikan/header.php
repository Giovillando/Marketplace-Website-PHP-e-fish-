    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fab fa-instagram fa-sm fa-fw me-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="">E-FISH | 082281992802</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

        <img src="udang.jpeg" width="70"><a class="navbar-brand text-primary logo h1 align-self-center" href="index.php">
               E-FISH
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-row  d-flex justify-content-start" id="templatemo_main_nav">
                <div class="flex-row">
                    <ul class="nav navbar-nav d-flex justify-content-start mx-lg-auto">
                        <li class="p-2 bd-highlight">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="p-2 bd-highlight">
                            <a class="nav-link" href="menu.php">Menu</a>
                        </li>
                            <?php if(isset($_SESSION['login'])): ?>
                                <li class="p-2 bd-highlight"> <a class="nav-link" href="logout.php">Logout </a> </li>
                            <?php else: ?>
                                <li class="p-2 bd-highlight"> <a class="nav-link"href="login.php">Login </a> </li>
                            <?php endif ?>

                            <?php if(isset($_SESSION['login'])): ?>
                                <li class="p-2 bd-highlight"> <a class="nav-link" href="checkout.php"> Checkout </a> </li>
                            <?php else: ?>
                                <li class="p-2 bd-highlight"> <a class="nav-link"href=""> </a> </li>
                            <?php endif ?>
                            
                        <li class="p-2 bd-highlight">
                            <a class="nav-link" href="keranjang.php">Keranjang</a>
                        </li>

                        <li class="p-2 bd-highlight">
                            <a class="nav-link" href="diskon.php">Voucher</a>
                        </li>

                         <li class="p-2 bd-highlight">
                            <a class="nav-link" href="akun.php">Akun </a>
                        </li>

                        <li class="p-2 bd-highlight">
                            <a class="nav-link" href="riwayatpembayaran.php">Daftar Pembayaran</a>
                        </li>

                        <li class="p-2 bd-highlight">
                            <a class="nav-link" href="riwayat.php">Daftar Riwayat</a>
                        </li>
                        
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                <form action="pencarian.php" role="search" method="post" class="form-inline">
                    <input type="text" class="form-inline" name="keyword" placeholder="Search ..."> <br>
                    <button class="btn btn-primary">Search</button>
    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->