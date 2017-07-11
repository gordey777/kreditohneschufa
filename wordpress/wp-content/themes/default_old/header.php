<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/device.css" type="text/css" media="screen" />
		<link href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css" rel="stylesheet">
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.min.js"></script> 
	</head>
	<body>
		<!-- Header -->
		<div id="header">
			<div class="container">
				<div class="logo"><a href="/"><span>Kredit ohne Schufa</span></a></div>

<div class="menu-link">
<a onclick="$('#menu').slideToggle('slow');" href="javascript://"><span>Menu</span></a></div>


				<div id="menu"><div class="menu"><?php wp_nav_menu( array('menu' => 'Menu [Header]' )); ?></div></div>
			</div>
		</div>