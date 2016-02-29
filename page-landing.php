<?php
	/*
	Template Name: Landing Page
	*/

	get_header();
	$template_url = get_bloginfo('template_url');	
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$display_heading = get_field('display_heading');
	$contact_form_heading = get_field('contact_form_heading');
	$contact_form_subheading = get_field('contact_form_subheading');
	$blog_section_heading = get_field('blog_section_heading');
	$select_blog_posts = get_field('select_blog_posts');
?>

<section id="page-header" class="tan landing">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<?php include (TEMPLATEPATH . '/inc/cta.php'); ?>
		<h1><?php if( $display_heading != null ) { echo $display_heading; } else { the_title(); }?></h1>
 	</div>
</section>

<section class="body landing">
 	<div class="container">	
 		<article class="full">
			<div class="col main">
				<?php the_content(''); ?>
				<?php include (TEMPLATEPATH . '/inc/flexible-content.php'); ?>
			</div>		
			<div class="col side">
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
					 				<p><?php echo $description; ?></p>
					 			</a>
							<?php endforeach; wp_reset_postdata(); ?>
						<?php endif; ?>	
					<?php endif; ?>				
				
				<?php endwhile; ?>
				<?php endif; ?>	
				<h3 class="margin-none"><?php if( $contact_form_heading != null ) { echo $contact_form_heading; } else { echo 'Want to learn more?'; } ?></h3>
				<p class="margin-bottom-30"><?php if( $contact_form_subheading != null ) { echo $contact_form_subheading; } else { echo 'Please fill out the contact form below.'; } ?></p>
				<!-- Contact Form -->
				<div class="blue border-top contactForm" id="form-footer">				
					<?php include (TEMPLATEPATH . '/inc/contact-form.php'); ?>	
				</div>
				<!-- END Contact Form -->
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