<?php
require_once 'verifica_sessao.php';
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
		<link rel="stylesheet" href="help/help.css">
		<link rel="stylesheet" href="help/main.css">
		<!-- Jquerry -->
		<script type="text/javascript" src="help/jquery.min.js"></script>
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
/*
			.nav-link>.mdi {
				margin-right: 0;
				font-size: 22px;
			}*/
			.mdi {
				vertical-align: text-bottom;
				margin-right: 7px;
				line-height: 1;
				display: initial;
			}
			.theme-help .nav-toggle>a:focus, .theme-primary .nav-toggle>a:focus, .theme-help>.wrap>.sidebar .nav-link.active, .theme-primary>.wrap>.sidebar .nav-link.active {
				border-left: 3px solid var(--blue);
				color: var(--blue) !important;
			}


			.alert.mdi::before,
.breadcrumb .mdi::before,
.btn.mdi::before,
.card-title.mdi::before,
.card-subtitle.mdi::before,
.card-link.mdi::before,
.dropdown-item.mdi::before,
.list-group-item.mdi::before,
.nav-link.mdi::before {
    font-size: 1.25em;
    line-height: initial;
    position: relative;
    top: 0.09rem;
}
.alert.mdi::before,
.breadcrumb .mdi:not(:empty)::before,
.btn.mdi:not(:empty)::before,
.card-title.mdi:not(:empty)::before,
.card-subtitle.mdi:not(:empty)::before,
.card-link.mdi:not(:empty)::before,
.dropdown-item.mdi:not(:empty)::before,
.nav-link.mdi:not(:empty)::before {
    margin-right: 0.25rem;
}
.list-group-item.mdi:not(:empty)::before {
    margin-right: 0.5rem;
}
.dropdown-item.mdi:not(:empty)::before {
    margin-left: -0.75rem;
}
.alert.mdi::before,
.list-group-item.mdi:not(:empty)::before {
    margin-left: -0.5rem;
}
.modal-title.mdi::before {
    font-size: 1.5em;
    line-height: 0.5;
    position: relative;
    top: 0.26rem;
    margin-right: 0.5rem;
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
					<?php //include PASTA_PARTS.'/content.php'; ?>
					<?php //include PASTA_PARTS.'/makeuser.php'; ?>
					<?
					//include 'ir.php';
					$Conteudo = $_REQUEST['go'];
					if($Conteudo == '')	{	$Conteudo = 'home';	}

					if(file_exists('parts/' . $Conteudo . '.php')){
						require('parts/' . $Conteudo . '.php');
					}else{
						require('ir.php');
					}
					?>
				</section>
			</div>
		</div>
		<?php //include PASTA_PARTS.'/chat.php';?>
		<?php //include PASTA_PARTS.'/right_float.php';?>
		</div>
		<!--script type="text/javascript" src="plugins/jquery-3.2.1.min.js"></script-->

		<script type="text/javascript" src="plugins/popper.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/chartjs/dist/Chart.min.js"></script>
		<script type="text/javascript" src="pages/charts/utils.js"></script>
		<script type="text/javascript" src="help/help.js"></script>

		<!--script type="text/javascript" src="help/main.js"></script-->
		<?php echo $scripsjs; ?>
		<?php //scripts ?>
	</body>
</html>