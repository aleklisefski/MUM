<?php
	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$template_url = get_bloginfo('template_url');
	$display_heading = get_field('display_heading');
	$pre_content = get_field('pre-body_content');
	$pre_style = get_field('pre-body_style');
	$include_vw = get_field('include_visitors_weekend_date_picker');
	$include_vw_graphic = get_field('include_visitors_weekend_sidebar_graphic');
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
 			<?php if( !empty($pre_content) ) { ?>
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
 		
 			<?php if( have_rows('content_types') ): ?>
			<?php while ( have_rows('content_types') ) : the_row(); ?>	

				<!-- If Video Pop-up -->
		 		<?php if( get_row_layout() == 'video_pop-up' ): ?>
		 			<?php $videos = get_sub_field('choose_a_video');?>
					<?php if( $videos ): ?>
				        <?php foreach( $videos as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php 
				        	setup_postdata($post); 
				        	$image = get_field('image');
				        	$runtime = get_field('runtime');
				        	$video_url = get_field('video_url');
				        	$description = get_field('short_description');
				        	
							if( !empty($image) ) {
								$url = $image['url'];
								$alt = $image['alt'];
								$size = 'Box / Video';
								$thumb = $image['sizes'][ $size ];
								$width = $image['sizes'][ $size . '-width' ];
								$height = $image['sizes'][ $size . '-height' ];
							};
				        ?>
				        	<a class="item box right video fancybox-media" href="<?php echo $video_url; ?>" onClick="_gaq.push(['_trackEvent', '<?php the_title(); ?>', 'Open Lightbox Video', '<?php echo $description; ?>']);">
				 				<div class="image">
				 					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
				 					<span class="button green"><span><img src="/wp-content/themes/MUM/media/arrow_play@2x.png" alt="" /></span></span>
				 				</div>
				 				<div class="button">Watch Video <span class="light">(<?php echo $runtime; ?>)</span></div>
				 				<p><strong><?php the_title() ?></strong><br><?php echo $description; ?></p>
				 			</a>
						<?php endforeach; wp_reset_postdata(); ?>
					<?php endif; ?>	
				<?php endif; ?>				
			
			<?php endwhile; ?>
			<?php endif; ?>	
			
			<?php if( $include_vw == "Yes" ): ?>
				<?php include (TEMPLATEPATH . '/inc/vw-signup.php'); ?>
			<?php endif; ?>			
			
			<?php if( empty( $post->post_content) ) {
				// show nothing
				} else {
				the_content('');
			} ?>
 			
 			<?php include (TEMPLATEPATH . '/inc/flexible-content.php'); ?> 
 			
 			<?php if( is_page('mum-overview') ) { 
 				do_shortcode('[gravityform id="2" name="MUM overview" title="false" description="false"]'); 
 			}; ?> 
 			
 			<?php if( $include_vw == "Yes" ): ?>
				<?php include (TEMPLATEPATH . '/inc/vw-signup-wide.php'); ?>
			<?php endif; ?> 		
 		</article>
 	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>