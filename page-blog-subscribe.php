<?php
	/*
	Template Name: Blogletter Subscription Form
	*/

	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$template_url = get_bloginfo('template_url');
	$display_heading = get_field('display_heading');
	$pre_content = get_field('pre-body_content');
	$pre_style = get_field('pre-body_style');
?>

<section id="page-header" class="tan">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<aside>
			<?php include (TEMPLATEPATH . '/inc/subnav.php'); ?>
		</aside>
		<article>
			<?php include (TEMPLATEPATH . '/inc/cta.php'); ?>
			<h1><?php if( $display_heading != null ) { echo $display_heading; } else { the_title(); }?></h1>
			<?php include (TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
		</article>
 	</div>
</section>

<section class="body">
 	<div class="container">	
 		<aside>
			<p>&nbsp;</p>
			<div class="clearFix"></div>
 		</aside>
 		<article>
 			<?php if( $pre_content ) { ?>
 				<?php if( $pre_style == "Yes" ) { ?>
 				<div class="call-out">
 				<?php } ?>
 					<?php echo $pre_content; ?>
 					<div class="clearFix"></div>
 				<?php if( $pre_style == "Yes" ) { ?>
 				</div>
 				<?php } else { ?>
 				<hr />
 				<?php } ?>
 			<?php } ?>
 			
 			<?php the_content(''); ?>
 			
 			<!-- Begin MailChimp Signup Form -->
			<div id="mc_embed_signup">
			<form action="//mum.us8.list-manage.com/subscribe/post?u=22fad1e3d15e93d858349d4a6&amp;id=870d667446" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			    <fieldset>
					<label for="mce-EMAIL">* Email Address</label>
					<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">

					<label>* Which blogs would you like to subscribe to?</label>
					<p class="radio">    
						<label><input type="checkbox" value="65536" name="group[15001][65536]" id="mce-group[15001]-15001-15">Admissions</label><br/>
						<label><input type="checkbox" value="16384" name="group[15001][16384]" id="mce-group[15001]-15001-13">Alumni Updates</label><br/>
						<label><input type="checkbox" value="512" name="group[15001][512]" id="mce-group[15001]-15001-9">Business</label><br/>
						<label><input type="checkbox" value="4096" name="group[15001][4096]" id="mce-group[15001]-15001-12">Career Coach</label><br/>
						<label><input type="checkbox" value="32768" name="group[15001][32768]" id="mce-group[15001]-15001-14">Catching the Big Fish</label><br/>
						<label><input type="checkbox" value="256" name="group[15001][256]" id="mce-group[15001]-15001-8">Computer Science</label><br/>
						<label><input type="checkbox" value="262144" name="group[15001][262144]" id="mce-group[15001]-15001-17">Continuing Education</label><br/>
						<label><input type="checkbox" value="131072" name="group[15001][131072]" id="mce-group[15001]-15001-16">Creatives in the Community</label><br/>
						<label><input type="checkbox" value="1024" name="group[15001][1024]" id="mce-group[15001]-15001-10">Maharishi Vedic Science</label><br/>
						<label><input type="checkbox" value="64" name="group[15001][64]" id="mce-group[15001]-15001-6">Media and Communications</label><br/>
						<label><input type="checkbox" value="1" name="group[15001][1]" id="mce-group[15001]-15001-0">MUM Achievements</label><br/>
						<label><input type="checkbox" value="2" name="group[15001][2]" id="mce-group[15001]-15001-1">MUM Editorial</label><br/>
						<label><input type="checkbox" value="16" name="group[15001][16]" id="mce-group[15001]-15001-4">MUM Events</label><br/>
						<label><input type="checkbox" value="128" name="group[15001][128]" id="mce-group[15001]-15001-7">Physiology and Health</label><br/>
						<label><input type="checkbox" value="8" name="group[15001][8]" id="mce-group[15001]-15001-3">Press Releases</label><br/>
						<label><input type="checkbox" value="4" name="group[15001][4]" id="mce-group[15001]-15001-2">The Review</label><br/>
						<label><input type="checkbox" value="2048" name="group[15001][2048]" id="mce-group[15001]-15001-11">Sustainable Living</label><br/>	
					</p>

					<div class="response" id="mce-error-response" style="display:none"></div>
					<div class="response" id="mce-success-response" style="display:none"></div>
				    <div style="position: absolute; left: -5000px;"><input type="text" name="b_22fad1e3d15e93d858349d4a6_870d667446" tabindex="-1" value=""></div>
				   
				</fieldset>
				<div class="call-out">
					 <p><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button width-100"></a>
				</div>
			</form>
			</div>
			
			<!--End mc_embed_signup-->
 			
 			<?php include (TEMPLATEPATH . '/inc/flexible-content.php'); ?> 		
 		</article>
 	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>