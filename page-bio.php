<?php
	/*
	Template Name: Faculty / Alumni Bio
	*/

	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$template_url = get_bloginfo('template_url');
	
	$email = get_field('email');
	$phone = get_field('phone');
	$cell = get_field('cell');
	$fax = get_field('fax');
	$location = get_field('location');
	$hours = get_field('hours');
	$website = get_field('website');
	$video = get_field('video'); 
	
	$headshot = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'Circle / Headshot');
	$url = $headshot[0];
?>

<section id="page-header" class="tan">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<aside>
			<?php include (TEMPLATEPATH . '/inc/subnav.php'); ?>
		</aside>
		<article>
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
 		
 			<div class="block side right">
	 			<div class="item circle">
	 				<div class="image">
	 					<img class="border" src="<?php echo $url  ?>" alt="<?php the_title(); ?>" width="200" height="200" />
	 					<label>
	 						<img src="/wp-content/themes/MUM/media/bg_label-circle.png" alt="" />
	 						<span><?php the_title(); ?></span>
	 					</label>
	 				</div>
	 				<?php if( have_rows('title_position_degree') ): $count = 1; ?>
						<ul class="title">
						<?php while( have_rows('title_position_degree') ) : the_row();?>
				        <?php 
				        	$title = get_sub_field('title');
				        ?>
				        	<li><?php echo $title; ?></li>
						<?php $count++; endwhile; ?>
						</ul>
					<?php endif; ?>	
	 				
	 				<?php if( $email || $phone || $cell || $location || $hours || $website ) { ?>
	 				<ul class="contact">
	 					<?php if( $email) { ?>
	 						<li class="email"><a href="mailto:<?php echo $email; ?>">Email Me</a></li>
	 					<?php } ?>
	 					<?php if( $phone) { ?>
	 						<li class="phone"><?php echo $phone; ?></li>
	 					<?php } ?>
	 					<?php if( $cell) { ?>
	 						<li class="cell"><?php echo $cell; ?></li>
	 					<?php } ?>
	 					<?php if( $fax) { ?>
	 						<li class="fax"><?php echo $fax; ?></li>
	 					<?php } ?>
	 					<?php if( $location) { ?>
	 						<li class="location"><?php echo $location; ?></li>
	 					<?php } ?>
	 					<?php if( $hours) { ?>
	 						<li class="hours"><?php echo $hours; ?></li>
	 					<?php } ?>
	 					<?php if( $website) { ?>
	 						<li class="website"><a href="<?php echo $website; ?>">Visit Website</a></li>
	 					<?php } ?>
	 				</ul>
	 				<?php } ?>
	 			</div>
	 		</div>
	 		<div class="clearFix mobile"></div>
	
 			<!-- The Content -->
 			<?php the_content(''); ?>
 			
 			<?php if( !empty($video) ) { ?>
				<div class="video-frame">
					<?php echo $video; ?>
				</div>
			<?php } ?>	 
 			
   		</article>
 	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>