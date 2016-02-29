<?php
	/*
	Template Name: Video Cafe
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
 			<?php the_content(''); ?> 
 			<div class="blog-header category inline"><strong>Featured Videos</strong></div>
 			<?php $videos = get_field('featured_videos');?>
			<?php if( $videos ): $count = 1 ?>
		        <div class="grid thirds boxes video">
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
		 			<a class="item video fancybox-media<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>" href="<?php echo $video_url; ?>" onClick="_gaq.push(['_trackEvent', 'Video Showcase', 'Open Lightbox Video', '<?php echo $description; ?>']);">
		 				<div class="image">
		 					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
		 					<span class="button green"><span><img src="/wp-content/themes/MUM/media/arrow_play@2x.png" alt="play" width="17" height"24" /></span></span>
		 				</div>
		 				<div class="button">Play <span class="light">(<?php echo $runtime; ?>)</span></div>
		 				<h4><?php the_title(); ?></h4>
		 				<p><?php echo $description; ?></p>
		 			</a>
				<?php $count++; endforeach; wp_reset_postdata(); ?>
				<div class="clearFix"></div>
				</div>
			<?php endif; ?>
 		</article>
 	</div>
</section>


<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>