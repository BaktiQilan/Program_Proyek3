<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Bank Sampah</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link type="text/css" href="<?= base_url('assets'); ?>/css/bootstrap-responsive.css" rel="stylesheet">
	<link type="text/css" href="<?= base_url('assets'); ?>/css/style.css" rel="stylesheet">
	<link type="text/css" href="<?= base_url('assets'); ?>/color/default.css" rel="stylesheet">
	<link type="text/css" rel="shortcut icon" href="<?= base_url('assets'); ?>/img/logo_img.ico">

	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<body>
	<!-- navbar -->
	<div class="navbar-wrapper">
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner ">
				<div class="container">
					<!-- Responsive navbar -->
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</a>
					<h1 class="brand"><a href="index.html">Bank Sampah</a></h1>
					<!-- navigation -->
					<nav class="pull-right nav-collapse collapse">
						<ul id="menu-main" class="nav">
							<li><a title="tentang" href="#tentang">Tentang</a></li>
							<li><a title="works" href="<?= base_url('auth'); ?>">Login</a></li>
							<li><a title="blog" href="<?= base_url('auth/registration'); ?>">Daftar</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- Header area -->
	<div id="header-wrapper" class="header-slider">
		<header class="clearfix">
			<div class="logo">
				<img src="<?= base_url('assets/'); ?>img/3R.png" alt="" />
			</div>
			<div class="container">
				<div class="row">
					<div class="span12">
						<div id="main-flexslider" class="flexslider">
							<ul class="slides">
								<li>
									<p class="home-slide-content">
										<strong>reduce</strong>
									</p>
								</li>
								<li>
									<p class="home-slide-content">
										<strong>reuse</strong>
									</p>
								</li>
								<li>
									<p class="home-slide-content">
										<strong>recycle</strong>
									</p>
								</li>
							</ul>
						</div>
						<!-- end slider -->
					</div>
				</div>
			</div>
		</header>
	</div>
	<!-- spacer section -->
	<section class="spacer green">
		<div class="container">
			<div class="row">
				<div class="span6 alignright flyLeft">
					<blockquote class="large">
						Sampah satu orang adalah harta orang lain<cite>Anonim</cite>
					</blockquote>
				</div>
				<div class="span6 aligncenter flyRight">
					<i class="fas fa-trash-alt icon-10x"></i>
				</div>
			</div>
		</div>
	</section>
	<!-- end spacer section -->
	<!-- section: team -->
	<section id="tentang" class="section">
		<div class="container">
			<h4>Apa Bank Sampah itu ?</h4>
			<div class="row">
				<div class="span4 offset1">
					<div>
						<h2><strong>Bank Sampah</strong></h2>
						<p>
							adalah suatu tempat yang digunakan untuk mengumpulkan sampah yang sudah dipilah-pilah.
							Hasil dari pengumpulan sampah yang sudah dipilah akan disetorkan ke tempat pembuatan kerajinan dari sampah atau ke tempat pengepul sampah.
							Bank sampah dikelola menggunakan sistem seperti perbankkan yang dilakukan oleh petugas.
							Penyetor adalah warga yang tinggal di sekitar lokasi bank serta mendapat buku tabungan seperti menabung di bank.
						</p>
					</div>
				</div>
				<div class="span6" style="margin-top:80px">
					<div class="aligncenter">
						<img src="<?= base_url('assets'); ?>/img/icons/logo-big.png" alt="" />
					</div>
				</div>
			</div>
		</div>
		<!-- /.container -->
	</section>
	<!-- end section: team -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="span6 offset3">
					<ul class="social-networks">
						<li><a href="https://github.com/BaktiQilan/Program_Proyek3"><i class="icon-circled icon-bgdark icon-github icon-2x"></i></a></li>
						<p class="copyright">
							&copy; Bakti Qilan & Arrizal Furqona
							<div class="credits">
								Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
							</div>
						</p>
				</div>
			</div>
		</div>
		<!-- ./container -->
	</footer>
	<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bgdark icon-2x"></i></a>
	<script src="<?= base_url('assets/'); ?>js/jquery.js"></script>
	<script src="<?= base_url('assets/'); ?>js/jquery.scrollTo.js"></script>
	<script src="<?= base_url('assets/'); ?>js/jquery.nav.js"></script>
	<script src="<?= base_url('assets/'); ?>js/jquery.localScroll.js"></script>
	<script src="<?= base_url('assets/'); ?>js/bootstrap.js"></script>
	<script src="<?= base_url('assets/'); ?>js/jquery.prettyPhoto.js"></script>
	<script src="<?= base_url('assets/'); ?>js/isotope.js"></script>
	<script src="<?= base_url('assets/'); ?>js/jquery.flexslider.js"></script>
	<script src="<?= base_url('assets/'); ?>js/inview.js"></script>
	<script src="<?= base_url('assets/'); ?>js/animate.js"></script>
	<script src="<?= base_url('assets/'); ?>js/custom.js"></script>
	<script src="<?= base_url('assets/'); ?>contactform/contactform.js"></script>
</body>

</html>