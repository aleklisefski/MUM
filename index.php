<?php
	/*
	Template Name: Home CURRENT	*/

	/*get_header();*/
?>
<?php include (TEMPLATEPATH . '/header-TEST.php'); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$template_url = get_bloginfo('template_url');
	$display_heading = get_field('display_heading');	
	$notice = get_the_content();
	$tags = array("<p>","</p>");
	$notice = str_replace($tags, "", $notice);
	
	$intro_heading = get_field('intro_heading');
	$intro_subheading = get_field('intro_subheading');
	$intro_button_link = get_field('intro_button_link');
	$intro_button_text = get_field('intro_button_text');
	$intro_image = get_field('intro_image');
	
	if( !empty($intro_image) ) {
		$url = $intro_image['url'];
		$alt = $intro_image['alt'];
		$size = 'Home Slideshow';
		$thumb = $intro_image['sizes'][ $size ];
		$width = $intro_image['sizes'][ $size . '-width' ];
		$height = $intro_image['sizes'][ $size . '-height' ];
	};
	
	$news = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => 15,
		'category__not_in' => array( 0, 130, 128 )
		)
	);
?>

<section id="news" class="tan home">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
 		
 		<?php if( have_rows('notices') ): ?>
 		<span class="cycle-slideshow"
			data-cycle-fx="scrollHorz"
			data-cycle-pause-on-hover="false"
			data-cycle-speed="500"
			data-cycle-timeout="5000"
			data-cycle-slides="> span.slide"
			data-cycle-swipe="true"
		>
			<?php while( have_rows('notices') ) : the_row(); ?>
			<?php 
	        	$notice_content = get_sub_field('notice_content');
	        ?>
	        
 			<span class="slide"><?php echo $notice_content; ?></span>
 			
 			<?php endwhile; ?>
 		</span>
 		<?php endif; ?>
 		
 		<?php  
			$cta = get_field('cta');
		?>	
		<?php if( $cta ) { ?>
		<?php foreach( $cta as $post_object): ?>
			<?php 
				$cta_image = get_field('image', $post_object->ID);
				$link_text = get_field('link_text', $post_object->ID);
				$link_url = get_field('link_url', $post_object->ID);
				$title = get_the_title($post_object->ID);
				
				if( !empty($cta_image) ) {
					$url = $cta_image['url'];
					$alt = $cta_image['alt'];
					$size = 'CTA large';
					$thumb60 = $cta_image['sizes'][ $size ];
					$width = $cta_image['sizes'][ $size . '-width' ];
					$height = $cta_image['sizes'][ $size . '-height' ];
				};
			?>
			<div class="cta large">
				<div class="image">
					<a href="<?php echo $link_url; ?>"><img src="<?php echo $thumb60; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" /></a>
				</div>
				<h5><?php echo $title; ?></h5>
				<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
			</div>
		<?php endforeach; wp_reset_postdata(); ?>
		<?php } ?>

 		<div class="clearFix"></div>
 	</div>
</section>

<section class="intro tan">
	<div class="container center">	
		<h1><?php echo $intro_heading; ?></h1>
		<p><?php echo $intro_subheading; ?></p>
		<?php if( $intro_button_link ) { ?><p><a class="button" href="<?php echo $intro_button_link; ?>"><?php echo $intro_button_text; ?></a></p><?php } ?>
	</div>
</section>


<?php if( have_rows('slides') ): $count = 1; ?>
<section id="home-4-col" class="tan new">
	<div class="container">
		
		<?php while( have_rows('slides') ) : the_row(); ?>
		<?php 
        	$image = get_sub_field('image');
        	$heading = get_sub_field('heading');
        	$content = get_sub_field('content');
        	$link = get_sub_field('link');
        	
        	if( !empty($image) ) {
				$url = $image['url'];
				$alt = $image['alt'];
				$size = 'Home Grid';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
			};
        ?>
        
		<a class="item<?php if( $count % 6 == 0 ) { ?> sixth<?php } elseif( $count % 5 == 0 ) { ?> fifth<?php } elseif( $count % 4 == 0 ) { ?> fourth<?php } elseif( $count % 3 == 0 ) { ?> third<?php } elseif ( $count % 2 == 0 ) { ?> second<?php } else { ?> first<?php } ?>" href="<?php echo $link; ?>">
			<img src="<?php echo $thumb; ?>" alt="<?php if( !empty($alt) ) { echo $alt; } else { echo $heading; } ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
			<div class="overlay">
				<h3><?php echo $heading; ?></h3>
				<div class="content">
					<?php echo $content; ?><br /><span class="more">Learn More</span>
				</div>
			</div>
			
		</a>
		<?php $count++; endwhile; ?>
		<div class="clearFix"></div>
		
		<?php $count = 1; while( have_rows('slides') ) : the_row(); ?>
		<?php 
        	$image = get_sub_field('image');
        	$heading = get_sub_field('heading');
        	
        	if( !empty($image) ) {
				$url = $image['url'];
				$alt = $image['alt'];
				$size = 'Home Grid';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
			};
        ?>
		<?php $count++; endwhile; ?>
		<div class="clearFix"></div>
					
	</div>
</section>
<?php endif; ?>

<section>
	<div class="container">	
		<div class="visitors-weekend blue">
			<img src="<?php echo $template_url; ?>/media/visitors-weekend-home.jpg" alt="happy students" />
			<div>
				<h3>Experience MUM</h3>
				<p>Come for three days and open your eyes to a new world of education</p>
				<a class="button green" href="/admissions/visitors-weekends/"><span>Visit<br>Us</span></a>
			</div>
		</div>
	</div>
</section>

<?php 
	if ( $news->have_posts() ) : $count = 1; 
	$news_heading = get_field('news_heading');
?>
<section class="gray">
 	<div class="container">
 		<h2><?php echo $news_heading; ?></h2>
 		<div class="grid thirds boxes news equalHeight">
 			<div class="slider cycle-slideshow"
				data-cycle-fx="scrollHorz"
				data-cycle-pause-on-hover="false"
				data-cycle-speed="750"
				data-cycle-timeout="0"
				data-cycle-prev="a.slide-left.news"
				data-cycle-next="a.slide-right.news"
				data-cycle-slides="div.news"
				data-cycle-swipe="true"
			>
				<div class="slide news">
					
					<?php while ( $news->have_posts() ) : $news->the_post(); ?>
					<?php
						$thetitle = get_the_title();
						$getlength = strlen($thetitle);
						$thelength = 55;
		
						$myExcerpt = get_the_excerpt();
						$finalExcerpt = strip_tags($myExcerpt);
					?>
				
			
				<?php if( $count == 4 || $count == 7 || $count == 10 || $count == 13 || $count == 16 ) { ?>
		 		</div>
		 		<div class="slide news">
		 		<?php } ?>		
			 						
		 			<a class="item<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>" href="<?php the_permalink(); ?>">
		 				<h3><?php echo substr($thetitle, 0, $thelength); if ($getlength > $thelength) echo "..."; ?></h3>
		 				<div class="image">
		 					<?php echo get_the_post_thumbnail($page->ID, 'Slide / Blog Featured'); ?>
		 				</div>	
		 				<p><?php echo substr($finalExcerpt, 0,180); ?>...</p>
		 			</a>
			 		
		 			<?php $count++; endwhile; wp_reset_postdata(); ?> 
				</div>
	 		</div>
	 	</div>	
		<div class="clearFix"></div>
 		<p class="center margin-top">
			<a class="button" href="/whats-happening/mum-blogs/">View all News</a>
		</p>
 	</div>
 	<a class="slide-left news" href="#"></a>
	<a class="slide-right news" href="#"></a>
</section>
<?php endif; ?>

<?php if( have_rows('circles') ): $count = 1; ?>
<?php 
	$circles_heading = get_field('circles_heading');
?>
<section>
 	<div class="container">	
 		<h2><?php echo $circles_heading; ?></h2>
 		<div class="grid thirds circles">
 			<?php while( have_rows('circles') ) : the_row(); ?>
				<?php 
		        	$image = get_sub_field('image');
		        	$heading = get_sub_field('heading');
		        	$content = get_sub_field('content');
		        	$button_text = get_sub_field('button_text');
		        	$button_link = get_sub_field('button_link');
		        	
		        	if( !empty($image) ) {
						$url = $image['url'];
						$alt = $image['alt'];
						$size = 'Circle / Headshot';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];
					};
		        ?>
 			<div class="item<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>">
 				<div class="image">
 					<img class="border" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
 					<label>
 						<img src="/wp-content/themes/MUM/media/bg_label-circle.png" alt="" />
 						<span><?php echo $heading; ?></span>
 					</label>
 				</div>
 				<p><?php echo $content; ?></p>
 				<a class="button" href="<?php echo $button_link; ?>"><?php if( $button_text ) { echo $button_text; } else { echo 'Learn More'; }?></a>
 			</div>
 			<?php $count++; endwhile; wp_reset_postdata();?>
 			<div class="clearFix"></div>
 		</div>
 	</div>
</section>
<?php endif; ?>

<section class="green contact" id="contact-home">
 	<div class="container">
 		<h3>Have Questions?</h3>
 		<a class="anchor contact" href="#emailScroll" onClick="_gaq.push(['_trackEvent', 'Contact', 'Open Form', 'Home Link']);">
 			<span class="icon contact"></span>
 			<h4>Email Us</h4>
 		</a>
 		<a class="anchor" href="/about-mum/location/contact-us/">
 			<span class="icon phone"></span>
 			<h4>Call Today</h4>
 		</a>
 	</div>
</section>

<?php if( have_rows('featured_content_boxes') ): $count = 1; ?>
<section class="featured gray">
 	<div class="container">	
 		<h2>University Highlights</h2>
 		<div class="grid thirds boxes equalHeight">
		<?php while( have_rows('featured_content_boxes') ) : the_row();  ?>
		<?php 
        	$image = get_sub_field('image');
        	$heading = get_sub_field('heading');
        	$content = get_sub_field('content');
        	$button_text = get_sub_field('button_text');
        	$button_link = get_sub_field('button_link');
        	$is_video = get_sub_field('is_video');
        	
        	if( !empty($image) ) {
				$url = $image['url'];
				$alt = $image['alt'];
				$size = 'Box / Video';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
			};
        ?>
		
 			
 			<?php if( $is_video == "Yes" ) { ?>
				<a class="item video fancybox-media<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>" href="<?php echo $button_link; ?>">
			<?php } else { ?>
				<a class="item<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>" href="<?php echo $button_link; ?>">
			<?php } ?>

 				<h3><?php echo $heading; ?></h3>
 				<div class="image">
 					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
 				</div>
 				<div class="button"><?php if( $button_text ) { echo $button_text; } else { echo 'Learn More'; }?></div>
 				<p><?php echo $content; ?></p>
 			</a>
			
			<?php $count++; endwhile; wp_reset_postdata(); ?>
			</div>
 		<div class="clearFix"></div>
 	</div> 	
</section>
<?php endif; ?>

<?php	
	$programs_heading = get_field('academic_programs_heading');
	$programs_1 = get_field('academic_programs_col_1');
	$programs_2 = get_field('academic_programs_col_2');
	$programs_3 = get_field('academic_programs_col_3');
	$programs_4 = get_field('academic_programs_col_4');
?>

<section>
	<div class="container">
		<h2><?php echo $programs_heading; ?></h2>
		<div class="grid fourths">
			<div class="item">
				<?php echo $programs_1; ?>
			</div>
			<div class="item">
				<?php echo $programs_2; ?>
			</div>
			<div class="item">
				<?php echo $programs_3; ?>
			</div>
			<div class="item fourth">
				<?php echo $programs_4; ?>
			</div>
			<div class="clearFix"></div>
		</div>
		<p class="center mobile-margin-top">
			<a class="button" href="/academic-departments">View all Academic Departments</a>
		</p>
	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>