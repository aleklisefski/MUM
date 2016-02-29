<?php
	/*
	Template Name: Landing Page - Video
	*/

	get_header();
	$template_url = get_bloginfo('template_url');	
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$display_heading = get_field('display_heading');
	$blog_section_heading = get_field('blog_section_heading');
	$select_blog_posts = get_field('select_blog_posts');
	$include_breadcrumbs = get_field('include_breadcrumbs');
	$include_vw = get_field('include_visitors_weekend_date_picker');
	
	// MailChimp subscribe form
	$form_heading_1 = get_field('form_heading_1');
	$form_heading_2 = get_field('form_heading_2');
	$subscription_form_code = get_field('subscription_form_code');
	$download_image = get_field('download_image');
	$download_description = get_field('download_description');
	
	// Background Video / Image
	$webm_video_file = get_field('webm_video_file');
	$mp4_video_file = get_field('mp4_video_file');
	$still_image = get_field('still_image');
?>

<section id="page-header" class="tan landing new">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<?php if( $include_vw == "Yes" ) { ?>
			<?php include (TEMPLATEPATH . '/inc/vw-signup-not-mobile.php'); ?>
		<?php } else {   } ?>
		
		<h1 class="small"><?php the_title() ?></h1>
		<h2 class="large"><?php echo $display_heading; ?></h2>
		<?php if( $include_breadcrumbs == "Yes" ) { include (TEMPLATEPATH . '/inc/breadcrumbs.php'); } ?>
		
		<?php if( $include_vw == "Yes" ) { ?>
			<?php include (TEMPLATEPATH . '/inc/vw-signup-mobile.php'); ?>
		<?php } ?> 	
	</div>
</section>

<?php if( !empty($still_image) ): ?>
<section id="hero" class="bg-video overflow">
	<div class="slider">
        <div class="slide">
        	<?php if( !empty($webm_video_file) ) { ?>
	            <video autoplay loop poster="<?php echo $still_image; ?>" id="bgvid" class="not-mobile" style="background-image: url('<?php echo $still_image; ?>')">
					<source src="<?php echo $webm_video_file; ?>" type="video/webm">
					<source src="<?php echo $mp4_video_file; ?>" type="video/mp4">
				</video>
				<img class="mobile tablet" src="<?php echo $still_image; ?>" alt="<?php echo $optional_h1_heading_for_seo; ?>" />
			<?php } else { ?>
				<img src="<?php echo $bg_thumb; ?>" alt="<?php echo $bg_alt; ?>" width="<?php echo $bg_width; ?>" height="<?php echo $bg_height; ?>" />
			<?php } ?>
            <div class="slide-info download blue">
                <div class="heading blue border-top">
                  <h5><?php echo $form_heading_1; ?></h5>
                  <h3><?php echo $form_heading_2; ?></h3>
                </div>
                <?php if( !empty($download_image) ) { ?><img src="<?php echo $download_image; ?>" alt="<?php echo $form_heading_2; ?>" /><?php } ?>
                <div class="description">
                	<p><?php echo $download_description; ?></p>
                	<p><a class="button" href="#">Download Now</a></p>
                </div>
                <div class="form hidden">
                	Please sign up to download
                	<?php echo $subscription_form_code; ?>
                </div>
                <div class="clearFix"></div>
            </div>
        </div>
	</div>
</section>
<?php endif; ?>

<?php if( have_rows('landing_content_blocks') ): $count = 1; ?>
	<?php while( have_rows('landing_content_blocks') ) : the_row(); ?>
	<?php 
		$video = get_sub_field('large_video');
		$video_image = get_sub_field('large_video_image');
		$image = get_sub_field('image');
		$image_caption = get_sub_field('image_caption');
		$image_position = get_sub_field('image_position');
		$content = get_sub_field('content');
		$button_link = get_sub_field('button_link');
		$button_text = get_sub_field('button_text');
		
		if( !empty($video_image) ) {
			$url = $video_image['url'];
			$alt = $video_image['alt'];
			$size = 'Video Large';
			$thumb = $video_image['sizes'][ $size ];
			$width = $video_image['sizes'][ $size . '-width' ];
			$height = $video_image['sizes'][ $size . '-height' ];
		};
		
		if( !empty($image) ) {
			$url = $image['url'];
			$alt = $image['alt'];
			$size = 'Video Large';
			$thumb = $image['sizes'][ $size ];
			$width = $image['sizes'][ $size . '-width' ];
			$height = $image['sizes'][ $size . '-height' ];
		};
		
	?>
	<section<?php if( $count % 2 == 0 ) { ?> class="gray"<?php } ?>>
	 	<div class="container landing">	
	 		<article class="full">
	 		
		 		<div class="col width-40<?php if( $image_position == 'left' ) { echo ' left'; } else { echo ' right'; } ?>">
	 			<?php if( $video ) { ?>
			        <?php foreach( $video as $post): // variable must be called $post (IMPORTANT) ?>
			        <?php 
			        	setup_postdata($post); 
			        	$image = get_field('image');
			        	$runtime = get_field('runtime');
			        	$video_url = get_field('video_url');
			        	$description = get_field('short_description');
			        	
						if( !empty($image) && empty($video_image) ) {
							$url = $image['url'];
							$alt = $image['alt'];
							$size = 'Video Large';
							$thumb = $image['sizes'][ $size ];
							$width = $image['sizes'][ $size . '-width' ];
							$height = $image['sizes'][ $size . '-height' ];
						};
			        ?>
			        	<a class="item box video large fancybox-media" href="<?php echo $video_url; ?>" onClick="_gaq.push(['_trackEvent', '<?php the_title(); ?>', 'Open Lightbox Video', '<?php echo $description; ?>']);">
			 				<div class="image">
			 					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
			 					<span class="button green"><span><img src="/wp-content/themes/MUM/media/arrow_play@2x.png" alt="" /></span></span>
			 				</div>
			 				<div class="button">Play Video <span class="light">(<?php echo $runtime; ?>)</span></div>
			 				<p><strong><?php the_title() ?></strong><br><?php echo $description; ?></p>
			 			</a>
					<?php endforeach; wp_reset_postdata(); ?>
				<?php } else { ?>
					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
					<div class="caption"><?php echo $image_caption; ?></div>
				<?php } ?>	
		 		</div>
		 		
		 		<div class="col width-60<?php if( $image_position == 'left' ) { echo ' right'; } else { echo ' left'; } ?>">
		 			<?php echo $content; ?>
		 			<?php if( !empty($button_link) && !empty($button_text) ) { ?>
		 				<p class="margin-top"><a class="button" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a></p>
		 			<?php } ?>
		 		</div>
			
			<div class="clearFix"></div>
			</article>
	 	</div>
	</section>
	</div>	
	<?php $count++; endwhile; ?>
<?php endif; ?>


<section<?php if( $count % 2 == 0 ) { ?> class="gray"<?php } ?>>
 	<div class="container landing">	
 		<article class="full">
			<div class="col main">
				<?php the_content(''); ?>
				<?php include (TEMPLATEPATH . '/inc/flexible-content.php'); ?>
				<?php if( $include_vw == "Yes" ): ?>
					<?php include (TEMPLATEPATH . '/inc/vw-signup-wide.php'); ?>
				<?php endif; ?> 
			</div>		
			<div class="col side">
				<?php include (TEMPLATEPATH . '/inc/sidebar.php'); ?>
			</div>
			<div class="clearFix"></div>	
		</article>
 	</div>
</section>

<?php if( $select_blog_posts ): $count = 1 ?>
<section class="gray">
 	<div class="container">
 		<?php if( $blog_section_heading != null ) { ?><h2><?php echo $blog_section_heading; ?></h2><?php } ?>
 		<div class="grid thirds boxes news">
 			<div class="slider cycle-slideshow"
				data-cycle-fx="scrollHorz"
				data-cycle-pause-on-hover="false"
				data-cycle-speed="750"
				data-cycle-timeout="0"
				data-cycle-prev=".slide-left.news"
				data-cycle-next=".slide-right.news"
				data-cycle-slides="> div.slide"
				data-cycle-swipe="true"
				data-cycle-pager=".slide-tabs.news"
				>
				
				<div class="slide">
				
				<?php foreach( $select_blog_posts as $post): setup_postdata($post); ?>
				<?php
					$thetitle = get_the_title();
					$getlength = strlen($thetitle);
					$thelength = 50;

					$myExcerpt = get_the_excerpt();
					$tags = array("<p>","</p>","<a>","</a>");
					$myExcerpt = str_replace($tags, "", $myExcerpt);
				?>
				
				<?php if( $count == 4 || $count == 7 || $count == 10 ) { ?>
		 			</div>
		 			<div class="slide">	
		 		<?php } ?>	
		 			<a class="item<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>" href="<?php the_permalink(); ?>">
		 				<h3><?php echo substr($thetitle, 0, $thelength); if ($getlength > $thelength) echo "..."; ?></h3>
		 				<div class="image">
		 					<?php echo get_the_post_thumbnail($page->ID, 'medium'); ?>
		 				</div>	
		 				<p><?php echo substr($myExcerpt, 0,180); ?>...</p>
		 				<p><span class="button">Read More</span></p>
		 			</a>
	 			<?php $count++; endforeach; wp_reset_postdata(); ?> 
	 			</div>		
		 		<div class="clearFix"></div>
			</div>
 		</div>
 	</div>
 	<!-- empty element for pager links -->
	<!--<div class="slide-tabs pager news"></div>-->
 	<?php if( $count > 4 ) { ?>
 	<a class="slide-left news" href="#" onClick="_gaq.push(['_trackEvent', '<?php the_title(); ?>', 'News Nav', 'Prev']);"></a>
	<a class="slide-right news" href="#" onClick="_gaq.push(['_trackEvent', '<?php the_title(); ?>', 'News Nav', 'Next']);"></a>
	<?php } ?>
</section>
<?php endif; ?>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>