<?php
	/*
	Template Name: Event Calendar
	*/

	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$template_url = get_bloginfo('template_url');
	$display_heading = get_field('display_heading');
?>

<section id="page-header" class="tan">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<aside>
			<?php include (TEMPLATEPATH . '/inc/subnav.php'); ?>
		</aside>
		<article>
			<?php include (TEMPLATEPATH . '/inc/cta.php'); ?>
			<h1>Calendar of Events</h1>
			<div id="breadcrumbs">
				<a class="home" href="/">Home</a>|<a href="/whats-happening">What's Happening</a>|<a href="/events">Calendar of Events</a>
			</div>	
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
		
 			<!-- The Content -->
 			<?php the_content(''); ?> 
 			
  		</article>
 	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>