<?php if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE 7' ) ) {
    header( 'Location: https://www.mum.edu/ie7-error' );
} ?>

<!-- No caching for application -->
<?php if ( is_page_template( 'page-application.php' ) || is_page_template( 'page-applicationv1.php' ) ) { 
	header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
	header("Pragma: no-cache"); // HTTP 1.0.
	header("Expires: 0"); // Proxies.
} ?>

<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?php wp_title(''); ?></title>
	<meta name="robots" content="index,follow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
	
	<!-- No caching for application -->
	<?php if ( is_page_template( 'page-application.php' ) || is_page_template( 'page-applicationv1.php' ) ) { ?>
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Cache-Control" content="max-age=0"/>
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
	<?php } ?>


	<?php $template_url = get_bloginfo('template_url'); ?>
	
	<!--<script src="/wp-content/themes/MUM/js/jquery-1.11.0-min.js"></script>-->
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>

	<link rel="shortcut icon" type="image/x-icon" href="/wp-content/themes/MUM/media/favicon.ico" />

	<!-- Desktop / Tablet / Mobile CSS -->
	<link rel="stylesheet" href="/wp-content/themes/MUM/css/stylesheet.css?version=2.3">
	<link rel="stylesheet" media="only screen and (max-width: 1023px)" href="/wp-content/themes/MUM/css/tablet.css" />
	<link rel="stylesheet" media="only screen and (max-width: 639px)" href="/wp-content/themes/MUM/css/mobile.css" />
	
	<!-- David Lynch MA in Film -->
	<?php if ( is_page_template( 'page-department_Lynch-MA.php' ) || is_page_template( 'page-department_Lynch-MA_TEST.php' ) ) { ?>
		<link rel="stylesheet" href="/wp-content/themes/MUM/css/lynch-ma.css">
	<?php } ?>
	
	<!-- Departent Interest Selct Landing pages -->
	<?php if ( is_page_template( 'page-department_select_interest_with-popup.php' ) || is_page_template( 'page-department_select_interest_with-popup_no-subnav.php' ) ) { ?>
		<link rel="stylesheet" href="/wp-content/themes/MUM/css/interest-select.css">
	<?php } ?>

	<!-- Select Box Styling -->
	<script src="/wp-content/themes/MUM/js/jquery-ui.min.js"></script>
	<script src="/wp-content/themes/MUM/js/jquery.ui.selectmenu.js"></script>
	<link rel="stylesheet" href="/wp-content/themes/MUM/css/selectmenu.css">
	<link rel="stylesheet" href="/wp-content/themes/MUM/css/selectmenu_application.css">
	
	<!-- Checkbox Styling -->
	<link rel="stylesheet" href="/wp-content/themes/MUM/css/checkbox.css">

	<!-- Smooth Scrolling -->
	<script src="/wp-content/themes/MUM/js/jquery.scrollTo.js"></script>
	<script src="/wp-content/themes/MUM/js/jquery.localScroll.js"></script>
	<script src="/wp-content/themes/MUM/js/jquery.easing.js"></script>

	<!-- Sliders -->
	<script src="/wp-content/themes/MUM/js/jquery.cycle2.js"></script>
	<script src="/wp-content/themes/MUM/js/jquery.cycle2.swipe.min.js"></script>

	<!-- Form Validation -->
	<script src="/wp-content/themes/MUM/js/jquery.validate.min.js"></script>
	<script src="/wp-content/themes/MUM/js/additional-methods.min.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script src="/wp-content/themes/MUM/js/fancybox/jquery.fancybox.js"></script>
	<script src="/wp-content/themes/MUM/js/fancybox/helpers/jquery.fancybox-media.js"></script>
	<link rel="stylesheet" href="/wp-content/themes/MUM/js/fancybox/jquery.fancybox.css" media="screen" />

	<!-- International Contact Form? -->
	<script type="text/javascript">
	$international_required = false;
	</script>

	<?php if( is_page(3373) ) { ?>
	<script type="text/javascript">
	$international_required = true;
	</script>
	<?php } ?>

	<!-- Initialize / Basic Functions -->
	<script src="/wp-content/themes/MUM/js/jquery.matchHeight-min.js"></script>
	<script src="/wp-content/themes/MUM/js/init.js"></script>
	<script src="/wp-content/themes/MUM/js/validation_contactus.js"></script>


    <!--[if lt IE 9]>
    	<script src="/wp-content/themes/MUM/js/html5shiv.js"></script>
    	<link rel="stylesheet" href="/wp-content/themes/MUM/css/IE8.css" />
    	<script>document.createElement('video');</script>
	<![endif]-->
    <!--[if lt IE 8]>
    	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
	<![endif]-->
	

	<!-- Google Analytics -->	
	<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-252215-1']);
	_gaq.push(['_gat._forceSSL']);
	_gaq.push(['_trackPageview']);

	(function () {
		var ga = document.createElement('script');
		ga.type = 'text/javascript';
		ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(ga, s);
	})();
	</script>
	
	
	<!-- Start Visual Website Optimizer Asynchronous Code -->
	<script type='text/javascript'>
	var _vwo_code=(function(){
	var account_id=61616,
	settings_tolerance=2000,
	library_tolerance=2500,
	use_existing_jquery=false,
	// DO NOT EDIT BELOW THIS LINE
	f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
	</script>
	<!-- End Visual Website Optimizer Asynchronous Code -->
	
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','//connect.facebook.net/en_US/fbevents.js');
	
	fbq('init', '1498614650427213');
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=1498614650427213&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->
	
	<!-- Hotjar Tracking Code for mum.edu -->
	<script>
	   (function(h,o,t,j,a,r){
	       h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	       h._hjSettings={hjid:86373,hjsv:5};
	       a=o.getElementsByTagName('head')[0];
	       r=o.createElement('script');r.async=1;
	       r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	       a.appendChild(r);
	   })(window,document,'//static.hotjar.com/c/hotjar-','.js?sv=');
	</script>	

</head>
<body id="top">

<!-- Disqus -->
<?php if( is_single() ) { ?>
	<script type="text/javascript">
	    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
	    var disqus_shortname = 'maharishiuniversity'; // Required - Replace example with your forum shortname

	    /* * * DON'T EDIT BELOW THIS LINE * * */
	    (function() {
	        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
	        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
	        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
	    })();
	</script>
<?php }?>

<!-- Facebook Like -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=179459298777330";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Twitter Share -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<!-- LinkedIn Share -->
<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>

<?php include (TEMPLATEPATH . '/inc/nav-mobile.php'); ?>
<header class="green new">
	<div class="container">
		<div class="topNav">
			<div class="anchor last">
				<div class="icon search"></div>
				<span>Search</span>
				<div class="popUp blue border-top search">
					<div class="arrow"></div>
					<a class="close"></a>
					<?php include (TEMPLATEPATH . '/inc/searchform.php'); ?>
				</div>
			</div>
			<div class="anchor">
				<div class="icon connect"></div>
				<span>Connect</span>
				<div class="popUp blue border-top">
					<div class="arrow"></div>
					<a class="close"></a>
					<ul class="social">
						<li><a href="http://www.facebook.com/Maharishi.University" class="icon facebook">Facebook</a></li>
						<li><a href="http://www.twitter.com/maharishiu" class="icon twitter">Twitter</a></li>
						<li><a href="https://plus.google.com/u/0/116959779618900502274/posts" class="icon google">Google+</a></li>
						<li class="last"><a href="http://www.youtube.com/maharishiu" class="icon youtube">YouTube</a></li>
					</ul>
				</div>
			</div>
			<a class="anchor no-drop" href="/apply/">
				<div class="icon apply"></div>
				<span>Apply</span>
			</a>
			<a class="anchor no-drop" href="/admissions/visitors-weekends/">
				<div class="icon visit"></div>
				<span>Visit Us</span>
			</a>
			<div class="anchor">
				<div class="icon contact"></div>
				<span>Contact</span>
				<div class="popUp blue border-top contact">
					<div class="arrow"></div>
					<a class="close"></a>
					<ul>
						<li class="first"><a href="#emailScroll" onClick="_gaq.push(['_trackEvent', 'Contact', 'Open Form', 'Header Link']);"><span class="icon contact"></span>Contact us</a></li>
						<li class="last"><a href="/contact-us/"><span class="icon phone"></span>(800) 369-6480</a></li>
					</ul>
				</div>
			</div>
			<div class="clearFix"></div>
		</div>
		<a class="logo desktop" href="<?php echo home_url(); ?>"></a>
		<div class="topNav" id="portals">
			<div class="anchor">
				<span>
					<strong>Current Students</strong><br>&amp; More<br>
					<div class="icon arrow"></div>
					<div class="popUp blue border-top portals">
						<div class="arrow"></div>
						<a class="close"></a>
						<ul>
							<li><a href="http://portals.mum.edu/RelId/606502/ISvars/default/Current_Students.htm">Current Students</a></li>
							<li><a href="https://www.mum.edu/mum-online">MUM Online</a></li>
							<li><a href="http://portals.mum.edu/RelId/606499/ISvars/default/Campus_Services.htm">Campus Services</a></li>
							<li><a href="http://portals.mum.edu/default.aspx?relid=640312">Faculty & Staff</a></li>
							<li><a href="http://portals.mum.edu/RelId/606508/ISvars/default/Alumni.htm">Alumni</a></li>
							<li><a href="http://portals.mum.edu/RelId/606511/ISvars/default/Trustees.htm">Trustees</a></li>
							<li><a href="http://portals.mum.edu/RelId/606517/ISvars/default/Giving.htm">Giving</a></li>
							<li class="last"><a href="http://portals.mum.edu/default.aspx?relid=692170">MyMUM - Login</a></li>
							<!--<li class="last"><a href="#">Login</a></li>-->
						</ul>
					</div>
				</span>
			</div>
			<div class="clearFix"></div>
		</div>
	</div>
</header>
<?php include (TEMPLATEPATH . '/inc/nav.php'); ?>