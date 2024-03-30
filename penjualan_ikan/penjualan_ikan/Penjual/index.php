<?php
session_start ();
//koneksi ke database
$koneksi= new mysqli("localhost","root","","smart_farming");

if (!isset($_SESSION["Username_Penjual"]))
{
	echo "
            <script> alert('Silahkan Masuk Terlebih Dahulu');
                document.location='loginpenjual.php';
</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="apple-touch-icon" href="../assets/img/Logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/Logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EFISH- Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color:RebeccaPurple;" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                	<i class="fas fa-seedling"></i>
                </div>
                 <div class="sidebar-brand-text mx-2">SFVM Penjual </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                MENU 
            </div>
			<hr class="sidebar-divider">
            <!-- Nav Item - Barang -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=barang">
                    <i class="fas fa-life-ring"></i>
                    <span>Barang</span></a>
            </li>
            <!-- Nav Item - Jenis Barang -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=jenisbarang">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jenis Barang</span></a>

			<!-- Nav Item - Nota -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=faktur_beli">
                    <i class="fas fa-fw Example of microchip fa-microchip"></i>
                    <span>Faktur Beli</span></a>
              </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=faktur_rinci">
                    <i class="fas fa-fw Example of microchip fa-receipt"></i>
                    <span>Faktur Rinci</span></a>

            </li>

			<!-- Nav Item - Pembeli -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?halaman=pembeli">
                    <i class="fas fa-users"></i>
                    <span>Pembeli</span></a>

            </li>	
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form>
                        <br>
                        <p class="font-weight-bold"> SELAMAT DATANG PENJUAL</p>
                    </form>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">Penjual</span>

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><strong><?php echo $_SESSION["Username_Penjual"]["Username_Penjual"]?></strong></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
				<div id="page-wrapper">
					<div id="page-inner">
						<?php
						if (isset($_GET['halaman']))
						{
							if($_GET['halaman']=="barang")
							{
								include 'barang.php';
							}

							else if($_GET['halaman']=="jenisbarang")
							{
								include 'jenisbarang.php';
							}
							elseif($_GET['halaman']=="faktur_beli")
							{
								include 'faktur_beli.php';
							}
							elseif($_GET['halaman']=="searchfakturbeli")
							{
								include 'searchfakturbeli.php';
							}
							elseif($_GET['halaman']=="hapusfakturbeli")
							{
								include 'hapusfakturbeli.php';
							}
							elseif($_GET['halaman']=="ubahfakturbeli")
							{
								include 'ubahfakturbeli.php';
							}
							elseif($_GET['halaman']=="tambahfakturbeli")
							{
								include 'tambahfakturbeli.php';
							}
							elseif($_GET['halaman']=="laporandana")
							{
								include 'laporandana.php';
							}
							elseif($_GET['halaman']=="searchlaporandana")
							{
								include 'searchlaporandana.php';
							}
							elseif($_GET['halaman']=="pembeli")
							{
								include 'pembeli.php';
							}
							elseif($_GET['halaman']=="laporanstok")
							{
								include 'laporanstok.php';
							}
							elseif($_GET['halaman']=="hapuslaporanstok")
							{
								include 'hapuslaporanstok.php';
							}
							elseif($_GET['halaman']=="transaksi")
							{
								include 'transaksi.php';
							}
							elseif($_GET['halaman']=="tambahtransaksi")
							{
								include 'tambahtransaksi.php';
							}
							elseif($_GET['halaman']=="searchtransaksi")
							{
								include 'searchtransaksi.php';
							}
							elseif($_GET['halaman']=="ubahtransaksi")
							{
								include 'ubahtransaksi.php';
							}
							elseif($_GET['halaman']=="hapustransaksi")
							{
								include 'hapustransaksi.php';
							}
							elseif($_GET['halaman']=="penilaian")
							{
								include 'penilaian.php';
							}
							elseif($_GET['halaman']=="faktur_rinci")
							{
								include 'faktur_rinci.php';
							}
							elseif($_GET['halaman']=="laporanpenjualan")
							{
								include 'laporanpenjualan.php';
							}
							elseif($_GET['halaman']=="laporanbarang")
							{
								include 'laporanbarang.php';
							}
							elseif($_GET['halaman']=="hapuslaporanbarang")
							{
								include 'hapuslaporanbarang.php';
							}
							elseif($_GET['halaman']=="search")
							{
								include 'search.php';
							}
							elseif($_GET['halaman']=="tambahbarang")
							{
								include 'tambahbarang.php';
							}
							elseif($_GET['halaman']=="tambahjenisbarang")
							{
								include 'tambahjenisbarang.php';
							}
							elseif($_GET['halaman']=="tambahpembeli")
							{
								include 'tambahpembeli.php';
							}
							elseif($_GET['halaman']=="semuanota")
							{
								include 'semuanota.php';
							}
							elseif($_GET['halaman']=="tambahfakturrinci")
							{
								include 'tambahfakturrinci.php';
							}
							elseif($_GET['halaman']=="ubahbarang")
							{
								include 'ubahbarang.php';
							}
							else if ($_GET['halaman']=="hapusjenisbarang")
							{
								include 'hapusjenisbarang.php';
							}
							else if ($_GET['halaman']=="ubahjenisbarang")
							{
								include 'ubahjenisbarang.php';
							}
							else if ($_GET['halaman']=="ubahpembeli")
							{
								include 'ubahpembeli.php';
							}
							else if ($_GET['halaman']=="hapuspembeli")
							{
								include 'hapuspembeli.php';
							}
							else if ($_GET['halaman']=="ubahfakturrinci")
							{
								include 'ubahfakturrinci.php';
							}
							else if ($_GET['halaman']=="hapusfakturrinci")
							{
								include 'hapusfakturrinci.php';
							}
							else if ($_GET['halaman']=="hapusbarang")
							{
								include 'hapusbarang.php';
							}
							else if ($_GET['halaman']=="ubahnota")
							{
								include 'ubahnota.php';
							}
							else if ($_GET['halaman']=="hapusnota")
							{
								include 'hapusnota.php';
							}
							else if ($_GET['halaman']=="searchjenisbarang")
							{
								include 'searchjenisbarang.php';
							}
							else if ($_GET['halaman']=="searchlaporanpenjualan")
							{
								include 'searchlaporanpenjualan.php';
							}
							else if ($_GET['halaman']=="searchlaporanbarang")
							{
								include 'searchlaporanbarang.php';
							}
							else if ($_GET['halaman']=="searchpembeli")
							{
								include 'searchpembeli.php';
							}
							else if ($_GET['halaman']=="searchbarang")
							{
								include 'searchbarang.php';
							}
							else if ($_GET['halaman']=="searchfakturrinci")
							{
								include 'searchfakturrinci.php';
							}
							else if ($_GET['halaman']=="searchstok")
							{
								include 'searchstok.php';
							}
							else if ($_GET['halaman']=="pencarianstok")
							{
								include 'pencarianstok.php';
							}
							else if ($_GET['halaman']=="faktur_beli1")
							{
								include 'faktur_beli1.php';
							}
							else if ($_GET['halaman']=="lihat_pembayaran")
							{
								include 'lihat_pembayaran.php';
							}
							else if ($_GET['halaman']=="searchlaporanbarang")
							{
								include 'searchlaporanbarang.php';
							}
							else if ($_GET['halaman']=="detail")
                            {
                                include 'detail.php';
                            }
                            else if ($_GET['halaman']=="detailfakturbeli")
                            {
                                include 'detailfakturbeli.php';
                            }
                            else if ($_GET['halaman']=="detailfakturrinci")
                            {
                                include 'detailfakturrinci.php';
                            }
                            else if ($_GET['halaman']=="pengirimanrinci")
                            {
                                include 'pengirimanrinci.php';
                            }
                            else if ($_GET['halaman']=="bayar")
                            {
                                include 'bayar.php';
                            }
                            else if ($_GET['halaman']=="lihat_penilaian")
                            {
                                include 'lihat_penilaian.php';
                            }
						}
						else
						{
							include 'dashboard.php';
						}
						?>						
					</div>
					 <!-- /.PAGE INNER -->
				</div>
				 <!-- /.PAGE WRAPPER -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "Logout" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../Admin/login.php">Logout</a>
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
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
</body>
</html>