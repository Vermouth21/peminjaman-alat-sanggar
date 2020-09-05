<?php
	include "koneksi.php";
	include"fungsi.php";
	session_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Sanggar Seni Sabai Nan Aluih</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="images/favicon.png">
	<link rel="apple-touch-icon" href="images/icon.png">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="style.css">

	<!-- Cusom css -->
    <link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.css"/>

	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/moment-with-locales.js"></script>
	<script src="js/bootstrap-datetimepicker.js"></script>
	<script src="js/vendor/modernizr-3.5.0.min.js"></script>
</head>
<body>
	<!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Main wrapper -->
	<div class="wrapper" id="wrapper">
		<!-- Header -->
		<header id="wn__header" class="oth-page header__area header__absolute sticky__header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<div class="logo">
							<a href="index.php">
								<img src="images/logo2.png" alt="logo images">
							</a>
						</div>
					</div>
					<div class="col-lg-8 d-none d-lg-block">
						<nav class="mainmenu__nav">
							<ul class="meninmenu d-flex justify-content-start">
								<?php if(ISSET($_SESSION['id_customer'])) { ?>
								<li><a href="index.php">Home</a></li>
								
								<?php kategori();?>
								
								<li><a href="tentang kami.php">Tentang Kami</a></li>

								<li><a href="faqs.php">FAQS</a></li>

								<?php } else { ?>

								<li><a href="index.php">Home</a></li>
								
								<?php kategori();?>
								
								<li><a href="tentang kami.php">Tentang Kami</a></li>

								<li><a href="faqs.php">FAQS</a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
					<div class="col-md-6 col-sm-6 col-6 col-lg-2">
						<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
							<li class="shop_search"><a class="search__active" href="#"></a></li>
							
							<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
							<?php if(ISSET($_SESSION['id_customer'])) { ?>
							<b><p style="color: #ffffff; text-transform: uppercase;"><?php echo $_SESSION['nama_lengkap'];?></p></b>
							<?php } ;?></li>
								<div class="searchbar__content setting__block">
									<div class="content-inner">
										<div class="switcher-currency">	
											<div class="switcher-options">
												<div class="switcher-currency-trigger">
													<div class="setting__menu">
														<?php if(ISSET($_SESSION['id_customer'])) { ?>
														<span><a href="detailsewa.php">Detail Sewa</a></span>
														<span><a href="konfirmasi.php">Upload Bukti Pembayaran</a></span>
														<span><a href="riwayatsewa.php">Riwayat Sewa</a></span>
														<span><a href="logout.php">Logout</a></span>
														<?php } else { ?>
														<span><a href="akun.php">Registrasi</a></span>
														<span><a href="akun.php">Login</a></span>		
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>								
							</li>
						</ul>
					</div>
				</div>
				<!-- Start Mobile Menu -->
				<div class="row d-none">
					<div class="col-lg-12 d-none">
						<nav class="mobilemenu__nav">
							<ul class="meninmenu">
								<?php if (ISSET($_SESSION['id_customer'])) { ?>
								<li><a href="index.html">Home</a></li>
								
								<?php kategori();?>
								
								<li><a href="index.php">Tentang Kami</a></li>											
								<li><a href="index.php">FAQS</a></li>											
								<li><a href="contact.html">Hubungi Kami</a></li>
								<?php } else { ?>
								<li><a href="index.html">Home</a></li>
								
								<?php kategori();?>
								
								<li><a href="index.php">Tentang Kami</a></li>											
								<li><a href="index.php">FAQS</a></li>											
								<li><a href="contact.html">Hubungi Kami</a></li>
								<?php } ?>
							</ul>
						</nav>
					</div>
				</div>
				<!-- End Mobile Menu -->
	            <div class="mobile-menu d-block d-lg-none">
	            </div>
	            <!-- Mobile Menu -->	
			</div>		
		</header>
		<!-- //Header -->
		<!-- Start Search Popup -->
		<div class="brown--color box-search-content search_active block-bg close__top">
			<form id="search_mini_form" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->