<?php
session_start();
include "koneksi.php";
if(!isset($_SESSION['Username']))
{
        echo "
            <script> alert('Silahkan Masuk Terlebih Dahulu');
                document.location='login.php';
</script>";}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Fish Dashboard</title>

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
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color:Blue;" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-user-alt"></i>
                </div>
                <div class="sidebar-brand-text mx-1">Admin </div>
                <div class="sidebar-brand-text mx-1">E-Fish </div>
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
                        <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-dolly"></i>
                    <span>Barang</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=jenis_barang">Jenis Barang</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=kelompok_barang">Kelompok Barang</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=Barang">Barang</a>
                    </div>
                </div>
            </li>
                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Status</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=status_pembayaran">Status Pembayaran</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=status_pengiriman">Status Pengiriman</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=status_transfer_penjual">Status Transfer Penjual</a>
                    </div>
                </div>
            </li>

                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-shipping-fast"></i>
                    <span>Pengiriman</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=jasa_kirim">Jasa Kirim</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=sistem_pengiriman">Sistem Pengiriman</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=daftar_pengiriman">Daftar Pengiriman</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=kota">Kota</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=kategori">Kategori</a>
                    </div>
                </div>
            </li>

                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-receipt"></i>
                    <span>Faktur</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=faktur_rinci">Faktur Rinci</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=faktur_beli">Faktur Beli</a>
                    </div>
                </div>
            </li>


                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-id-badge"></i>
                    <span>Pembeli</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=pembeli">Pembeli</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=jenis_pembeli">Jenis Pembeli</a>
                    </div>
                </div>
            </li>


                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-id-badge"></i>
                    <span>Pembayaran</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=bank">Bank</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=jenis_pembayaran">Jenis Pembayaran</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=jasa_pembayaran">Jasa Pembayaran</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=diskon">Diskon</a>
                    </div>
                </div>
            </li>

                <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Penjual</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=penjual">Penjual</a>
                    </div>
                </div>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?halaman=transaksi">Transaksi</a>
                    </div>
                </div>
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
                        <p class="font-weight-bold"> SELAMAT DATANG ADMIN</p>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter"></span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - Us er Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>

                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><strong><?php echo $_SESSION["Username"]["Username"]?></strong></span>
                                <img src="img/undraw_profile.svg" class="img-profile rounded-circle">
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

                <!-- Begin Page Content -->
               

                <!-- End of Topbar -->
               <div class="container-fluid">
                        <?php
                        if (isset($_GET['halaman']))
                        {
                            if($_GET['halaman']=="Barang")
                            {
                                include 'Barang.php';
                            }
                            else if($_GET['halaman']=="kelompok_barang")
                            {
                                include 'kelompok_barang.php';
                            }
                            else if($_GET['halaman']=="jenis_barang")
                            {
                                include 'jenis_barang.php';
                            }
                            else if($_GET['halaman']=="status_order")
                            {
                                include 'status_order.php';
                            }
                            else if($_GET['halaman']=="lihat_pembayaran")
                            {
                                include 'lihat_pembayaran.php';
                            }
                            else if($_GET['halaman']=="lihat_penilaian")
                            {
                                include 'lihat_penilaian.php';
                            }
                            else if($_GET['halaman']=="status_pembayaran")
                            {
                                include 'status_pembayaran.php';
                            }
                            else if($_GET['halaman']=="status_pengiriman")
                            {
                                include 'status_pengiriman.php';
                            }
                            else if($_GET['halaman']=="status_transfer_penjual")
                            {
                                include 'status_transfer_penjual.php';
                            }
                            else if($_GET['halaman']=="transferpenjual")
                            {
                                include 'transferpenjual.php';
                            }
                            else if($_GET['halaman']=="jasa_kirim")
                            {
                                include 'jasa_kirim.php';
                            }
                            else if($_GET['halaman']=="sistem_pengiriman")
                            {
                                include 'sistem_pengiriman.php';
                            }
                            else if($_GET['halaman']=="daftar_pengiriman")
                            {
                                include 'daftar_pengiriman.php';
                            }
                            else if($_GET['halaman']=="kota")
                            {
                                include 'kota.php';
                            }
                            else if($_GET['halaman']=="kategori")
                            {
                                include 'kategori.php';
                            }
                            else if($_GET['halaman']=="faktur_beli")
                            {
                                include 'faktur_beli.php';
                            }
                            else if($_GET['halaman']=="faktur_rinci")
                            {
                                include 'faktur_rinci.php';
                            }
                            else if($_GET['halaman']=="pembeli")
                            {
                                include 'pembeli.php';
                            }
                            else if($_GET['halaman']=="jenis_pembeli")
                            {
                                include 'jenis_pembeli.php';
                            }
                            else if($_GET['halaman']=="bank")
                            {
                                include 'bank.php';
                            }
                            else if($_GET['halaman']=="jenis_pembayaran")
                            {
                                include 'jenis_pembayaran.php';
                            }
                            else if($_GET['halaman']=="jasa_pembayaran")
                            {
                                include 'jasa_pembayaran.php';
                            }
                            else if($_GET['halaman']=="diskon")
                            {
                                include 'diskon.php';
                            }
                            else if($_GET['halaman']=="penjual")
                            {
                                include 'penjual.php';
                            }
                            else if($_GET['halaman']=="transaksi")
                            {
                                include 'transaksi.php';
                            }
                            else if($_GET['halaman']=="cari_bank")
                            {
                                include 'cari_bank.php';
                            }
                            else if($_GET['halaman']=="detailrinci")
                            {
                                include 'detailrinci.php';
                            }
                            else if($_GET['halaman']=="pengirimanrinci")
                            {
                                include 'pengirimanrinci.php';
                            }
                            else if($_GET['halaman']=="detail")
                            {
                                include 'detail.php';
                            }
                            else if($_GET['halaman']=="bayar")
                            {
                                include 'bayar.php';
                            }
                            else if($_GET['halaman']=="cari_kelompokbarang")
                            {
                                include 'cari_kelompokbarang.php';
                            }
                            else if($_GET['halaman']=="cari_barang")
                            {
                                include 'cari_barang.php';
                            }
                            else if($_GET['halaman']=="cari_daftarpengiriman")
                            {
                                include 'cari_daftarpengiriman.php';
                            }
                            else if($_GET['halaman']=="cari_diskon")
                            {
                                include 'cari_diskon.php';
                            }
                            else if($_GET['halaman']=="cari_fakturbeli")
                            {
                                include 'cari_fakturbeli.php';
                            }
                            else if($_GET['halaman']=="cari_fakturrinci")
                            {
                                include 'cari_fakturrinci.php';
                            }
                            else if($_GET['halaman']=="cari_jasapembayaran")
                            {
                                include 'cari_jasapembayaran.php';
                            }
                            else if($_GET['halaman']=="cari_jasakirim")
                            {
                                include 'cari_jasakirim.php';
                            }
                            else if($_GET['halaman']=="cari_jenisbarang")
                            {
                                include 'cari_jenisbarang.php';
                            }
                            else if($_GET['halaman']=="cari_jenispembayaran")
                            {
                                include 'cari_jenispembayaran.php';
                            }
                            else if($_GET['halaman']=="cari_jenispembeli")
                            {
                                include 'cari_jenispembeli.php';
                            }
                            else if($_GET['halaman']=="cari_kategori")
                            {
                                include 'cari_kategori.php';
                            }
                            else if($_GET['halaman']=="cari_kota")
                            {
                                include 'cari_kota.php';
                            }
                            else if($_GET['halaman']=="cari_pembeli")
                            {
                                include 'cari_pembeli.php';
                            }
                            else if($_GET['halaman']=="cari_penjual")
                            {
                                include 'cari_penjual.php';
                            }
                            else if($_GET['halaman']=="cari_sistempengiriman")
                            {
                                include 'cari_sistempengiriman.php';
                            }
                            else if($_GET['halaman']=="cari_statusorder")
                            {
                                include 'cari_statusorder.php';
                            }
                            else if($_GET['halaman']=="cari_statuspengiriman")
                            {
                                include 'cari_statuspengiriman.php';
                            }
                            else if($_GET['halaman']=="cari_statuspembayaran")
                            {
                                include 'cari_statuspembayaran.php';
                            }
                            else if($_GET['halaman']=="cari_statustfpenjual")
                            {
                                include 'cari_statustfpenjual.php';
                            }
                            else if($_GET['halaman']=="del_bank")
                            {
                                include 'del_bank.php';
                            }
                            else if($_GET['halaman']=="del_kelompokbarang")
                            {
                                include 'del_kelompokbarang.php';
                            }
                            else if($_GET['halaman']=="del_barang")
                            {
                                include 'del_barang.php';
                            }
                            else if($_GET['halaman']=="del_daftarpengiriman")
                            {
                                include 'del_daftarpengiriman.php';
                            }
                            else if($_GET['halaman']=="del_diskon")
                            {
                                include 'del_diskon.php';
                            }
                            else if ($_GET['halaman']=="del_fakturbeli")
                            {
                                include 'del_fakturbeli.php';
                            }
                            else if ($_GET['halaman']=="del_fakturinci")
                            {
                                include 'del_fakturinci.php';
                            }
                            else if ($_GET['halaman']=="del_jasakirim")
                            {
                                include 'del_jasakirim.php';
                            }
                            else if ($_GET['halaman']=="del_jasapembayaran")
                            {
                                include 'del_jasapembayaran.php';
                            }
                            else if ($_GET['halaman']=="del_jenisbarang")
                            {
                                include 'del_jenisbarang.php';
                            }
                            else if ($_GET['halaman']=="del_jenispembayaran")
                            {
                                include 'del_jenispembayaran.php';
                            }
                            else if ($_GET['halaman']=="del_jenispembeli")
                            {
                                include 'del_jenispembeli.php';
                            }
                            else if ($_GET['halaman']=="del_kategori")
                            {
                                include 'del_kategori.php';
                            }
                            else if ($_GET['halaman']=="del_kota")
                            {
                                include 'del_kota.php';
                            }
                            else if ($_GET['halaman']=="del_pembeli")
                            {
                                include 'del_pembeli.php';
                            }
                            else if ($_GET['halaman']=="del_penjual")
                            {
                                include 'del_penjual.php';
                            }
                            else if ($_GET['halaman']=="del_sistempengiriman")
                            {
                                include 'del_sistempengiriman.php';
                            }
                            else if ($_GET['halaman']=="del_statusorder")
                            {
                                include 'del_statusorder.php';
                            }
                            else if ($_GET['halaman']=="del_statuspembayaran")
                            {
                                include 'del_statuspembayaran.php';
                            }
                            else if ($_GET['halaman']=="del_statuspengiriman")
                            {
                                include 'del_statuspengiriman.php';
                            }
                            else if ($_GET['halaman']=="del_statustfpenjual")
                            {
                                include 'del_statustfpenjual.php';
                            }
                            else if ($_GET['halaman']=="edit_bank")
                            {
                                include 'edit_bank.php';
                            }
                            else if ($_GET['halaman']=="edit_kelompokbarang")
                            {
                                include 'edit_kelompokbarang.php';
                            }
                            else if ($_GET['halaman']=="edit_barang")
                            {
                                include 'edit_barang.php';
                            }
                            else if ($_GET['halaman']=="edit_daftarpengiriman")
                            {
                                include 'edit_daftarpengiriman.php';
                            }
                            else if ($_GET['halaman']=="edit_diskon")
                            {
                                include 'edit_diskon.php';
                            }
                            else if ($_GET['halaman']=="edit_fakturbeli")
                            {
                                include 'edit_fakturbeli.php';
                            }
                            else if ($_GET['halaman']=="edit_fakturrinci")
                            {
                                include 'edit_fakturrinci.php';
                            }
                            else if ($_GET['halaman']=="edit_jasakirim")
                            {
                                include 'edit_jasakirim.php';
                            }
                            else if ($_GET['halaman']=="edit_jasapembayaran")
                            {
                                include 'edit_jasapembayaran.php';
                            }
                            else if ($_GET['halaman']=="edit_jenisbarang")
                            {
                                include 'edit_jenisbarang.php';
                            }
                            else if ($_GET['halaman']=="edit_jenispembayaran")
                            {
                                include 'edit_jenispembayaran.php';
                            }
                            else if ($_GET['halaman']=="edit_jenispembeli")
                            {
                                include 'edit_jenispembeli.php';
                            }
                            else if ($_GET['halaman']=="edit_kategori")
                            {
                                include 'edit_kategori.php';
                            }
                            else if ($_GET['halaman']=="edit_kota")
                            {
                                include 'edit_kota.php';
                            }
                            else if ($_GET['halaman']=="edit_kota")
                            {
                                include 'edit_kota.php';
                            }
                            else if ($_GET['halaman']=="edit_pembeli")
                            {
                                include 'edit_pembeli.php';
                            }
                            else if ($_GET['halaman']=="edit_penjual")
                            {
                                include 'edit_penjual.php';
                            }
                            else if ($_GET['halaman']=="edit_sistempengiriman")
                            {
                                include 'edit_sistempengiriman.php';
                            }
                            else if ($_GET['halaman']=="edit_statusorder")
                            {
                                include 'edit_statusorder.php';
                            }
                            else if ($_GET['halaman']=="edit_statuspembayaran")
                            {
                                include 'edit_statuspembayaran.php';
                            }
                            else if ($_GET['halaman']=="edit_statuspengiriman")
                            {
                                include 'edit_statuspengiriman.php';
                            }
                            else if ($_GET['halaman']=="edit_statustfpenjual")
                            {
                                include 'edit_statustfpenjual.php';
                            }
                            else if ($_GET['halaman']=="edit_transaksi")
                            {
                                include 'edit_transaksi.php';
                            }
                            else if ($_GET['halaman']=="tambah_bank")
                            {
                                include 'tambah_bank.php';
                            }
                            else if ($_GET['halaman']=="tambah_barang")
                            {
                                include 'tambah_barang.php';
                            }
                            else if ($_GET['halaman']=="tambah_kelompokbarang")
                            {
                                include 'tambah_kelompokbarang.php';
                            }
                            else if ($_GET['halaman']=="tambah_daftarpengiriman")
                            {
                                include 'tambah_daftarpengiriman.php';
                            }
                            else if ($_GET['halaman']=="tambah_diskon")
                            {
                                include 'tambah_diskon.php';
                            }
                            else if ($_GET['halaman']=="tambah_fakturbeli")
                            {
                                include 'tambah_fakturbeli.php';
                            }
                            else if ($_GET['halaman']=="tambah_fakturrinci")
                            {
                                include 'tambah_fakturrinci.php';
                            }
                            else if ($_GET['halaman']=="tambah_jasakirim")
                            {
                                include 'tambah_jasakirim.php';
                            }
                            else if ($_GET['halaman']=="tambah_jasapembayaran")
                            {
                                include 'tambah_jasapembayaran.php';
                            }
                            else if ($_GET['halaman']=="tambah_jenisbarang")
                            {
                                include 'tambah_jenisbarang.php';
                            }
                            else if ($_GET['halaman']=="tambah_jenispembayaran")
                            {
                                include 'tambah_jenispembayaran.php';
                            }
                            else if ($_GET['halaman']=="tambah_jenispembeli")
                            {
                                include 'tambah_jenispembeli.php';
                            }
                            else if ($_GET['halaman']=="tambah_kategori")
                            {
                                include 'tambah_kategori.php';
                            }
                            else if ($_GET['halaman']=="tambah_kota")
                            {
                                include 'tambah_kota.php';
                            }
                            else if ($_GET['halaman']=="tambah_pembeli")
                            {
                                include 'tambah_pembeli.php';
                            }
                            else if ($_GET['halaman']=="tambah_penjual")
                            {
                                include 'tambah_penjual.php';
                            }
                            else if ($_GET['halaman']=="tambah_sistempengiriman")
                            {
                                include 'tambah_sistempengiriman.php';
                            }
                            else if ($_GET['halaman']=="tambah_statusorder")
                            {
                                include 'tambah_statusorder.php';
                            }
                            else if ($_GET['halaman']=="tambah_statuspengiriman")
                            {
                                include 'tambah_statuspengiriman.php';
                            }
                            else if ($_GET['halaman']=="tambah_statuspembayaran")
                            {
                                include 'tambah_statuspembayaran.php';
                            }
                            else if ($_GET['halaman']=="tambah_statustfpenjual")
                            {
                                include 'tambah_statustfpenjual.php';
                            } 
                            else if ($_GET['halaman']=="tambah_transaksi")
                            {
                                include 'tambah_transaksi.php';
                            }
                            else if ($_GET['halaman']=="laporandatapenjual")
                            {
                                include 'laporandatapenjual.php';
                            }
                            else if ($_GET['halaman']=="laporandatapenjual1")
                            {
                                include 'laporandatapenjual1.php';
                            }
                            else if ($_GET['halaman']=="laporandatapenjual2")
                            {
                                include 'laporandatapenjual2.php';
                            }
                            else if ($_GET['halaman']=="laporandatapenjual3")
                            {
                                include 'laporandatapenjual3.php';
                            }
                            else if ($_GET['halaman']=="laporandatapenjual4")
                            {
                                include 'laporandatapenjual4.php';
                            }
                            else if ($_GET['halaman']=="laporanpenjualan")
                            {
                                include 'laporanpenjualan.php';
                            }
                            else if ($_GET['halaman']=="laporanpenjualan1")
                            {
                                include 'laporanpenjualan1.php';
                            }
                            else if ($_GET['halaman']=="laporanpenjualan2")
                            {
                                include 'laporanpenjualan2.php';
                            }
                            else if ($_GET['halaman']=="laporanstok")
                            {
                                include 'laporanstok.php';
                            }
                            else if ($_GET['halaman']=="laporanbarang")
                            {
                                include 'laporanbarang.php';
                            }
                            else if ($_GET['halaman']=="laporanrating")
                            {
                                include 'laporanrating.php';
                            }
                            else if ($_GET['halaman']=="searchlaporanrating")
                            {
                                include 'searchlaporanrating.php';
                            }
                            else if ($_GET['halaman']=="laporanterlarisjenis")
                            {
                                include 'laporanterlarisjenis.php';
                            }
                            else if ($_GET['halaman']=="laporanterlariskelompok")
                            {
                                include 'laporanterlariskelompok.php';
                            }
                            else if ($_GET['halaman']=="laporanterlariskota")
                            {
                                include 'laporanterlariskota.php';
                            }
                            else if ($_GET['halaman']=="dashboardterlaris")
                            {
                                include 'dashboardterlaris.php';
                            }
                            else if ($_GET['halaman']=="rekapterlaris")
                            {
                                include 'rekapterlaris.php';
                            }
                            else if ($_GET['halaman']=="laporanterlaris1")
                            {
                                include 'laporanterlaris1.php';
                            }
                            else if ($_GET['halaman']=="laporanterlaris2")
                            {
                                include 'laporanterlaris2.php';
                            }
                            else if ($_GET['halaman']=="laporanterlaris3")
                            {
                                include 'laporanterlaris3.php';
                            }
                            else if ($_GET['halaman']=="laporanterlaris4")
                            {
                                include 'laporanterlaris4.php';
                            }
                            else if ($_GET['halaman']=="laporanterlaris5")
                            {
                                include 'laporanterlaris5.php';
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
                    <a class="btn btn-primary" href="../utama.php">Logout</a>
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