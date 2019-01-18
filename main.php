<?php
require_once 'config.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>aa</title>
		<link rel="shortcut icon" href="images/favicon.png">
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<!-- Icones -->
		<link rel="stylesheet" type="text/css" href="plugins/materialdesignicons/css/materialdesignicons.min.css">
		<link rel="stylesheet" type="text/css" href="plugins/material-icon/css/material-icons.css">
		<!-- Style Personalizados -->
		<link rel="stylesheet" href="xakti-bs/xakti-bs.css">
		<link rel="stylesheet" href="xakti-bs/main.css">
		<style type="text/css">
			.logoHelp {
				height: 50px;
				margin-top: -10px;
			}
			.theme-help>.navbar, .theme-pink-orange>.wrap>.sidebar>.sb-header>.sb-bg {
				background: linear-gradient(to right, #0064fb, #3c418a);
			}

			.sidebar .nav-link>.mdi, .layout-icon .wrap .sidebar .sidebar-nav .nav-item.nav-toggle .nav-dropdown .nav-link .mdi {
				margin-right: 15px;
			}

			.nav-link>.mdi {
				margin-right: 0;
				font-size: 22px;
			}
			.mdi {
				vertical-align: text-bottom;
				font-size: 18px;
				margin-right: 7px;
				line-height: 1;
			}
		</style>
		<?php //style ?>

	</head>
	<body>
		<div class="views layout-default theme-help sidebar-dark">
			<nav class="navbar navbar-expand-md shadow-1 fixed-top">
				<div class="navbar-brand brand-1" href="#">
					<a href="#" class="navbar-toggle hide-lg wave"><span class="gg-icon material-icons">menu</span></a>
					<img src="images/logohelp.png" class="logoHelp"><img src="images/intra.png" class="demo-logo"> <span class="text-logo">help!ntra</span>
				</div>
				<button class="btn btn-sm wave d-block d-sm-none btn-toggle-navbar-head"><span class="gg-icon material-icons">keyboard_arrow_down</span></button>
				<a class="sb-toggle wave" href="javascript:void(0);"><span class="gg-icon material-icons">menu</span></a>
				<?php // navbar ?>
				<?php include PASTA_PARTS.'/navbar.php'; ?>
			</nav>
			<div class="wrap">
				<section class="sidebar">
					<?php //sb-header ?>

					<?php include PASTA_PARTS.'/menu.php'; ?>
				</section>
				<section class="main-content">

					<?php // breadcrumb.php ?>
					<?php include PASTA_PARTS.'/breadcrumb.php'; ?>
					<?php // Content.php ?>
					<?php include PASTA_PARTS.'/content.php'; ?>
				</section>
			</div>
		</div>
		<?php //include PASTA_PARTS.'/chat.php';?>
		<?php include PASTA_PARTS.'/right_float.php';?>
		</div>
		<script type="text/javascript" src="plugins/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="plugins/popper.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/chartjs/dist/Chart.min.js"></script>
		<script type="text/javascript" src="pages/charts/utils.js"></script>
		<script type="text/javascript" src="xakti-bs/xakti-bs.js"></script>
		<script type="text/javascript" src="xakti-bs/main.js"></script>
		<?php //scripts ?>
	</body>
</html>