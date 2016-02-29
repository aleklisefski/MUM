<?php
	/*
	Template Name: Page Full-width w/Sidebar
	*/

	get_header();
	$template_url = get_bloginfo('template_url');	
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$display_heading = get_field('display_heading');
	$pre_body_content = get_field('pre-body_content');
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
 			<div class="pre-body"><?php if( !empty($pre_body_content) ) { echo $pre_body_content; } ?></div>
 			<div class="col main">
 				<?php the_content(''); ?>
 				<?php include (TEMPLATEPATH . '/inc/flexible-content.php'); ?>
 			</div>		
			<div class="col side">
				<?php include (TEMPLATEPATH . '/inc/sidebar.php'); ?>
			</div>	
 		</article>
 	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>