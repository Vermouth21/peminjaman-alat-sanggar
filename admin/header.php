<?php
include "koneksi.php";
session_start();
if(empty($_SESSION['id_admin'])){
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="assets/images/favicon.png" type="image/png">
  <title>Administrator | Sanggar Seni Sabai Nan Aluih</title>

    <link href="assets/plugins/morris-chart/morris.css" rel="stylesheet">
    <link href="assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"/>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/datatables/css/jquery.dataTables-custom.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body class="sticky-header">


    <!--Start left side Menu-->
    <div class="left-side sticky-left-side">

        <!--logo-->
        <div class="logo">
            <a href="index.php"><img src="assets/images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index.php"><img src="assets/images/logo-icon.png" alt=""></a>
        </div>
        <!--logo-->

        <div class="left-side-inner">
            <!--Sidebar nav-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li>
                    <a href="index.php"><i class="icon-home"></i><span> Dashboard</span></a>
                </li>

                <li>
                    <a href="dataproduk.php"><i class="icon-layers"></i><span> Busana & Tarian</span></a>
                </li>

                <li>
                    <a href="datakategori.php"><i class="icon-list"></i><span> Kategori</span></a>
                </li>

                <li class="menu-list"><a href="#"><i class="icon-bag"></i> <span>Sewa</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="datasewabayar.php"> Menunggu Pembayaran</a></li>
                        <li><a href="datasewakonfirmasi.php"> Menunggu Konfirmasi</a></li>
                        <li><a href="datasewakembali.php"> Pengembalian Produk</a></li>
                        <li><a href="datasewaselesai.php"> Sewa</a></li>
                    </ul>
                </li>

                <li class="menu-list"><a href="#"><i class="icon-user"></i> <span>User</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="dataadmin.php"> Admin</a></li>
                        <li><a href="datacustomer.php"> Customer</a></li>
                    </ul>
                </li>

                <li class="menu-list"><a href="#"><i class="icon-note"></i> <span>Laporan</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="laporanperhari.php"> Laporan Perhari</a></li>
                        <li><a href="laporanperbulan.php"> Laporan Perbulan</a></li>
                        <li><a href="laporanpertahun.php"> Laporan Pertahun</a></li>
                    </ul>
                </li>

                <li>
                    <a href="datapertanyaan.php"><i class="icon-envelope-open"></i><span> Kontak</span></a>
                </li>
            </ul>
            <!--End sidebar nav-->

        </div>
    </div>
    <!--End left side menu-->

    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <a class="toggle-btn"><i class="fa fa-bars"></i></a>

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">          
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <?php echo $_SESSION['nama_lengkap'];?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                          <li> <a href="profil.php"> <i class="fa fa-user"></i> Profil </a> </li>
                          <li> <a href="logout.php"> <i class="fa fa-lock"></i> Logout </a> </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->