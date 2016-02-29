<?php
	/*
	Template Name: IE7 Error
	*/
?>

<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php wp_title(''); ?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="index,follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />

	<?php $template_url = get_bloginfo('template_url'); ?>
	<script src="/wp-content/themes/MUM/js/jquery-1.11.0-min.js"></script>

	<?php wp_head(); ?>

	<link rel="shortcut icon" type="image/x-icon" href="/wp-content/themes/MUM/media/favicon.ico" />

	<!-- Desktop / Tablet / Mobile CSS -->
	<link rel="stylesheet" href="/wp-content/themes/MUM/css/stylesheet.css">
	<link rel="stylesheet" media="only screen and (max-width: 1023px)" href="/wp-content/themes/MUM/css/tablet.css" />
	<link rel="stylesheet" media="only screen and (max-width: 639px)" href="/wp-content/themes/MUM/css/mobile.css" />

	<!-- Initialize / Basic Functions -->
	<script src="/wp-content/themes/MUM/js/init.js"></script>

    <!--[if lt IE 9]>
    	<script src="/wp-content/themes/MUM/js/html5shiv.js"></script>
    	<link rel="stylesheet" href="/wp-content/themes/MUM/css/IE8.css" />
	<![endif]-->
    <!--[if lt IE 8]>
    	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
	<![endif]-->
</head>

<header class="green ie7-error">
	<div class="container center">
		<div class="logo desktop"></div>
	</div>
</header>

<section class="body">
 	<div class="container">	
 		<div class="notice ie7-error">MUM.edu does not support older versions of Internet Explorer.<br />Please update your browser or use another browser such as <a href="https://www.google.com/chrome/browser/">Chrome</a> or <a href="https://www.mozilla.org/en-US/firefox/new/">Firefox</a> to view this site properly.</div>
 	</div>
</section>

<section class="footer">
	<div class="container center">
		<p class="copyright">Copyright &copy; <?php echo date('Y'); ?> MUM.  All rights reserved.</p>
	</div>
</section>