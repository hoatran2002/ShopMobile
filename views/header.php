<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php if(isset($title)){ echo $title; } else { echo 'Trang Demo';}?> - Shop Công Nghệ</title>
		<link rel="icon" href="/public/images/favicon.png" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/public/css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="/public/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="/public/css/slick-theme.css"/>
		<link type="text/css" rel="stylesheet" href="/public/css/nouislider.min.css"/>
		<link type="text/css" rel="stylesheet" href="/public/css/font-awesome.min.css">
		<link type="text/css" rel="stylesheet" href="/public/css/style.css"/>
    </head>
	<body>
		<header>
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<?php require_once('views/modules/topmenu.php'); ?>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="/admin"><i class="fa fa-user-o"></i> Administration</a></li>
					</ul>
				</div>
			</div>

			<div id="header">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="header-logo">
								<a href="/" class="logo">
									<img src="/public/images/logo.png" alt="">
								</a>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<input class="input" placeholder="Từ khóa..">
									<button class="search-btn">Tìm Kiếm</button>
								</form>
							</div>
						</div>

						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ Hàng</span>
										<div class="qty">!</div>
									</a>
									<div class="cart-dropdown"></div>
								</div>

								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<nav id="navigation">
			<div class="container">
				<div id="responsive-nav">
					<ul class="main-nav nav navbar-nav">
						<?php require_once('views/modules/mainmenu.php'); ?>
					</ul>
				</div>
			</div>
		</nav>