<!DOCTYPE html>
<html lang="<?php echo substr(get_bloginfo ( 'language' ), 0, 2);?>">
<head>
	<meta charset="UTF-8">
	<title><?php
		global $page, $paged;

		wp_title( '|', true, 'right' );
		bloginfo( 'name' );

		$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
	?></title>

	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="<?php echo THEMEURL;?>humans.txt">

	<?php
	//generar el favicon usando http://www.favicomatic.com/ y agregar los archivos a images/favicon/
	include_once('inc/favicon.php');?>

	<!-- Facebook Metadata /-->
	<meta property="fb:page_id" content="" />
	<meta property="og:image" content="" />
	<meta property="og:description" content=""/>
	<meta property="og:title" content=""/>

	<!-- Google+ Metadata /-->
	<meta itemprop="name" content="">
	<meta itemprop="description" content="">
	<meta itemprop="image" content="">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">
	<link rel="stylesheet" href="https://jamesflorentino.github.io/nanoScrollerJS/css/nanoscroller.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.css">
	<link href="<?php echo THEMEURL ?>style.css" rel="stylesheet"/>


	<?php wp_head(); ?>
</head>
<body class="page__journal" id="journal-top">

	<header>
		<nav class="journal__navbar">
			<div class="grid__container journal__navbar--responsive--container">
				<div class="navbar-brand">
					<a class="navbar-item" href="<?php echo BLOGURL ?>/journal">
						<img class="journal__navbar--responsive--logo" src="<?php echo THEMEURL ?>images/logo-negro.svg" alt="" width="112" height="28">
					</a>
					<div class="navbar-burger journal__navbar--burger burger" data-target="navMenubd-example">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<div id="navMenubd-example" class="navbar-menu journal__navbar-menu">
					<div class="navbar-start">
						<a class="navbar-item journal__navbar--desktop--logo" href="<?php echo BLOGURL ?>/journal">
							<img src="<?php echo THEMEURL ?>images/logo-negro.svg" alt="" width="112" height="28">
						</a>
					</div>
					<div class="navbar-end">
						<a class="navbar-item journal__navbar-item" href="<?php echo BLOGURL ?>/journal/archive">ARCHIVE</a>
						<a class="navbar-item journal__navbar-item" href="#newsletter-journal">subscribe to shaun’s journal</a>
						<a class="navbar-item journal__navbar-item" href="<?php echo BLOGURL ?>">Back to main site</a>
					</div>
				</div>
			</div>
		</nav>
	</header>