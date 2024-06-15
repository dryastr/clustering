<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<title>Clustering</title>

	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" />

	<!-- CSS Files -->
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/light-bootstrap-dashboard.css?v=2.0.1') ?>" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?= base_url('assets/css/demo.css') ?>" rel="stylesheet" />
	<!-- MAPS -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/fonts/font-awesome/css/all.min.css') ?>" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

	<style>
		body {
			margin: 0;
			padding: 0;
			background-image: url('assets/img/All Logo PNG/bg 1.jpg');
		}

		#map {
			width: 100%;
			height: 50vh;
		}

		.sidebar {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			width: 260px;
			display: block;
			z-index: 1;
			color: #fff;
			font-weight: 200;
			background: linear-gradient(to bottom, rgba(31, 119, 208, 0.3), rgba(147, 112, 219, 0.1));
			/* Gradient warna biru-ungu transparan */
			background-size: cover;
			background-position: center center;
		}

		.icon {
			width: 24px;
			height: 24px;
		}

		.nav .collapse ul {
			padding-left: 1rem;
		}

		.nav .collapse a {
			font-size: 0.9rem;
			padding: 0.5rem 1rem;
		}
	</style>

	<script>
		var BASEURL = '<?= base_url() ?>';
	</script>
</head>

<body>
	<div class="wrapper">
		<div class="sidebar" data-image="../assets/img/sidebar-5.jpg" data-color="blue">

			<div class="sidebar-wrapper">
				<div class="logo">
					<a href="<?= base_url() ?>" class="simple-text">
						<!-- <img src="<?= base_url('assets/icon-1/person-circle.svg') ?>" alt="" class="icon-fluid" width="50%" height="50%"> -->
						<!-- <i class="fas fa-home"></i> -->

					</a>
				</div>
				<ul class="nav">
					<li class="nav-item">
						<a class="nav-link text-white">
							<h2 class="my-0 text-center"><label id="hours"><?= date('H') ?></label>:<label id="minutes"><?= date('i') ?></label>:<label id="seconds"><?= date('s') ?></label></h2>
						</a>
					</li>
					<li class="nav-item <?= @$_active ?>">
						<a class="nav-link" href="<?= base_url() ?>">
							<i class="fas fa-home"></i>
							<p>Home</p>
						</a>
					</li>
					<li class="nav-item <?= @$_active ?>">
						<a class="nav-link" href="<?= base_url('karyawan') ?>">
							<i class="fas fa-user-plus"></i>
							<p>Management User</p>
						</a>
					</li>
					<li class="nav-item <?= @$_active ?>">
						<a class="nav-link" href="<?= base_url('data-barang') ?>">
							<i class="fas fa-clipboard-list"></i>
							<p>Data Barang</p>
						</a>
					</li>
					<li class="nav-item <?= @$_active ?>">
						<a class="nav-link" href="<?= base_url('data-barang-masuk') ?>">
							<i class="fas fa-arrow-alt-circle-down"></i>
							<p>Data Masuk</p>
						</a>
					</li>
					<li class="nav-item <?= @$_active ?>">
						<a class="nav-link" href="<?= base_url('data-barang-keluar') ?>">
							<i class="fas fa-arrow-alt-circle-up"></i>
							<p>Data Keluar</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link collapsed" href="#submenuClustering" data-toggle="collapse" aria-expanded="false" aria-controls="submenuClustering">
							<i class="fas fa-sitemap"></i>
							<p>Clustering Data</p>
						</a>
						<div id="submenuClustering" class="collapse">
							<ul class="nav flex-column ml-3">
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url('data-clustering') ?>">Data Clustering</a>
								</li>
								<?php if ($this->session->userdata('level') === 'Manager') : ?>
									<li class="nav-item">
										<a class="nav-link" href="<?= base_url('tentukan-clustering') ?>">Tentukan Clustering</a>
									</li>
								<?php endif; ?>
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url('hasil-clustering') ?>">Hasil Clustering</a>
								</li>
								<!-- Tambahkan sub-menu lainnya sesuai kebutuhan -->
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('dashboard/logout') ?>">
							<span>Log out <i class="nc-icon nc-button-power"></i></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="main-panel">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg " color-on-scroll="500">
				<div class=" container-fluid">
					<a class="navbar-brand" href="#pablo">
						<img src="assets/img/All Logo PNG/Logo Emblem Pusri Dark.png" alt="Logo Pupuk Sriwidjaja Palembang" style="max-height: 40px; margin-right: 10px;">
						<span style="margin-right: 10px;">Pupuk Sriwidjaja Palembang</span>
					</a>
					<button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-bar burger-lines"></span>
						<span class="navbar-toggler-bar burger-lines"></span>
						<span class="navbar-toggler-bar burger-lines"></span>
					</button>
				</div>
			</nav>
			<!-- End Navbar -->
			<div class="content">
				<div class="container-fluid">
					<div id="alert">
						<?php if (@$this->session->response) : ?>
							<div class="alert alert-<?= $this->session->response['status'] == 'error' ? 'danger' : $this->session->response['status'] ?> alert-dismissible fade show" role="alert" style="background-color: rgba(0, 0, 0, 0.5);">
								<?= $this->session->response['message'] ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php endif; ?>
					</div>
					<?= $content ?>
				</div>
			</div>
			<footer class="footer">
				<div class="container">
					<nav>
						<p class="copyright text-center">
							&copy; 2024 <a href="http://clustering.co.id">Clustering</a>
						</p>
					</nav>
				</div>
			</footer>
		</div>
	</div>
</body>

<!--   Core JS Files   -->
<script src="<?= base_url('assets/js/core/jquery.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/core/popper.min.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/js/core/bootstrap.bundle.min.js') ?>" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?= base_url('assets/js/plugins/bootstrap-switch.js') ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?= base_url('assets/js/plugins/bootstrap-notify.js') ?>"></script>
<!-- SweetAlert -->
<script src="<?= base_url('assets/js/plugins/sweetalert.min.js') ?>"></script>

<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?= base_url('assets/js/light-bootstrap-dashboard.js?v=2.0.1') ?>" type="text/javascript"></script>

<!-- Main Js -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>

<!-- Custom Script -->
<script>
	var hoursLabel = document.getElementById("hours");
	var minutesLabel = document.getElementById("minutes");
	var secondsLabel = document.getElementById("seconds");
	setInterval(setTime, 1000);

	function setTime() {
		secondsLabel.innerHTML = pad(Math.floor(new Date().getSeconds()));
		minutesLabel.innerHTML = pad(Math.floor(new Date().getMinutes()));
		hoursLabel.innerHTML = pad(Math.floor(new Date().getHours()));
	}

	function pad(val) {
		var valString = val + "";
		if (valString.length < 2) {
			return "0" + valString;
		} else {
			return valString;
		}
	}

	<?php if (@$this->session->absen_needed) : ?>
		var absenNeeded = '<?= json_encode($this->session->absen_needed) ?>';
		<?php $this->session->sess_unset('absen_needed') ?>
	<?php endif; ?>
</script>

</html>