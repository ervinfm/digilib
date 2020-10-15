<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Selamat Datang di Digital Library</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url()?>assets/template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
			<div class="container">
			<a href="<?=base_url()?>" class="navbar-brand">
				<span class="brand-text font-weight-light">
					<img src="<?=base_url().'assets/image/head.png'?>" alt="logo" class="brand-image" style="width:150px; height:20px">
				</span>
			</a>
			
			<div class="collapse navbar-collapse order-3" id="navbarCollapse">
			</div>

			<!-- Right navbar links -->
				<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
					<li class="nav-item">
						<a href="<?=site_url()?>" class="nav-link">Home</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">FaQ</a>
					</li>
					<li class="nav-item">
						<a href="<?=site_url('login'.'?tk='.random_string('alnum', 50)).'&t='.date('Ymd').'&cat=login'?>" class="nav-link">Signin</a>
					</li>
					<!-- <li class="nav-item dropdown">
						<a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
						<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
						<li><a href="#" class="dropdown-item">Some action </a></li>
						<li><a href="#" class="dropdown-item">Some other action</a></li>

						<li class="dropdown-divider"></li>

						<li class="dropdown-submenu dropdown-hover">
							<a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
							<ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
							<li>
								<a tabindex="-1" href="#" class="dropdown-item">level 2</a>
							</li>

							<li class="dropdown-submenu">
								<a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
								<ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
								<li><a href="#" class="dropdown-item">3rd level</a></li>
								<li><a href="#" class="dropdown-item">3rd level</a></li>
								</ul>
							</li>

							<li><a href="#" class="dropdown-item">level 2</a></li>
							<li><a href="#" class="dropdown-item">level 2</a></li>
							</ul>
						</li>
						</ul>
					</li> -->
				</ul>
			</div>
		</nav>
		<!-- /.navbar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header"></div>
			<!-- /.content-header -->

			<!-- Main content -->
			<div class="content">
				<div class="container">
					<div class="row">
						<?=$contents?>
					</div>
					<!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<div class="float-right d-none d-sm-inline">
				Version 1.0
			</div>
			<!-- Default to the left -->
			<strong>Copyright &copy; <?=date('Y')?> <a href="#">Digital Library</a> Fakultas Kesehatan Masyarakat UAD.</strong> 
		</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/template/dist/js/demo.js"></script>
</body>
</html>
