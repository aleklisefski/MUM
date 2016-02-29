<?php
	/*
	Template Name: Home text MMY large
	*/

	get_header();
?>

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
		'posts_per_page' => 3,
		'category__not_in' => array( 0, 130, 128 )
		)
	);
?>

<section id="news" class="tan home">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
 		<?php  
			$cta = get_field('cta');
			
			if ( is_tax( 'video_category' ) ) { 
				$cta = get_field('cta', 1418);
			};
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

 		<span>
 			<?php echo $notice; ?>
 		</span>
 		<div class="clearFix"></div>
 	</div>
</section>

<section class="intro tan">
	<div class="container center">	
		<h1><?php echo $intro_heading; ?></h1>
		<p><?php echo $intro_subheading; ?></p>
		<p><a class="button" href="<?php echo $intro_button_link; ?>"><?php echo $intro_button_text; ?></a></p>
	</div>
</section>

<?php if( have_rows('slides') ): $count = 1; ?>
<section id="home-grid" class="tan">
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
			<h3><?php echo $heading; ?></h3>
			<span class="overlay">
				<h3><?php echo $heading; ?></h3>
				<p class="description hidden"><?php echo $content; ?> <span class="more">Learn More</span></p>
			</span>
		</a>
		<?php $count++; endwhile; ?>
		<div class="clearFix"></div>
					
	</div>
</section>
<?php endif; ?>

<?php if( have_rows('featured_content_boxes') ): $count = 1; ?>
<section class="featured">
 	<div class="container">	
 		<div class="grid thirds boxes">
 			<div class="slider cycle-slideshow"
				data-cycle-fx="scrollHorz"
				data-cycle-pause-on-hover="false"
				data-cycle-speed="750"
				data-cycle-timeout="0"
				data-cycle-prev=".slide-left.boxes"
				data-cycle-next=".slide-right.boxes"
				data-cycle-slides="> div.slide"
				data-cycle-swipe="true"
				>
				
				<div class="slide">
				<?php while( have_rows('featured_content_boxes') ) : the_row();  ?>
				<?php 
		        	$image = get_sub_field('image');
		        	$heading = get_sub_field('heading');
		        	$content = get_sub_field('content');
		        	$button_text = get_sub_field('button_text');
		        	$button_link = get_sub_field('button_link');
		        	
		        	if( !empty($image) ) {
						$url = $image['url'];
						$alt = $image['alt'];
						$size = 'Box / Video';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];
					};
		        ?>
				
	 			<?php if( $count == 4 || $count == 7 || $count == 10 || $count == 13 || $count == 16 ) { ?>
		 			</div>
		 			<div class="slide">	
		 		<?php } ?>	
		 			
		 			<a class="item<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>" href="<?php echo $button_link; ?>">
		 				<h3><?php echo $heading; ?></h3>
		 				<div class="image">
		 					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
		 				</div>
		 				<div class="button"><?php if( $button_text ) { echo $button_text; } else { echo 'Learn More'; }?></div>
		 				<p><?php echo $content; ?></p>
		 			</a>
	 			
	 			<?php $count++; endwhile; ?>
	 			</div>
		 		<div class="clearFix"></div>
			</div>
 		</div>
 	</div>
 	<!-- empty element for pager links -->
	<!--<div class="slide-tabs pager boxes"></div>-->
 	<a class="slide-left boxes" href="#" onClick="_gaq.push(['_trackEvent', 'Home', 'Featured Nav', 'Prev']);"></a>
	<a class="slide-right boxes" href="#" onClick="_gaq.push(['_trackEvent', 'Home', 'Featured Nav', 'Next']);"></a>
</section>
<?php endif; ?>

<?php if( have_rows('circles') ): $count = 1; ?>
<?php 
	$circles_heading = get_field('circles_heading');
?>
<section class="gray">
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
 			<?php $count++; endwhile; ?>
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

<section>
	<div class="container">
		<h2>Explore our Academic Programs</h2>
		<div class="grid fourths">
			<div class="item">
				<ul>
					<li><a href="/academic-departments/business-administration/mba/accounting-specialization/">Accounting</a></li>   
					<li><a href="/art/">Art</a></li>   
					<li><a href="/academic-departments/physiology-and-health/ms-in-maharishi-ayurveda-and-integrative-medicine/">Ayurveda &amp; Integrative Medicine</a></li>   
					<li><a href="/business/">Business</a></li>   
					<li><a href="/computer-science/">Computer Science</a></li>   
					
				</ul>
			</div>
			<div class="item">
				<ul>
					<li><a href="/academic-departments/english/creative-writing-ba/">Creative Writing</a></li>  
					<li><a href="/academic-departments/education/undergraduate/educational-foundations/">Educational Foundations</a></li>   
					<li><a href="/academic-departments/education/graduate/educational-innovation/">Educational Innovation</a></li>    
					<li><a href="/academic-departments/media-and-communications/overview/fimmaking-and-animation/">Filmmaking</a></li>      
					<li><a href="/academic-departments/media-and-communications/overview/graphic-design/">Graphic Design</a></li>    
					<li><a href="/literature-and-creative-writing">Literature</a></li>    
				</ul>
			</div>
			<div class="item">
				<ul>
					<li><a href="/maharishi-vedic-science/">Maharishi Vedic Science</a></li>  
					<li><a href="/academic-departments/business-administration/mba/management-information-systems/">Management Information Systems</a></li>    
					<li><a href="/mathematics/">Mathematics</a></li>    
					<li><a href="/media-and-communications/">Media &amp; Communications</a></li>    
					<li><a href="/music/">Music</a></li>    
				</ul>
			</div>
			<div class="item fourth">
				<ul>
					<li><a href="/academic-departments/physiology-and-health/undergraduate-programs/pre-integrative-medicine/">Pre-integrative Medicine</a></li> 
					<li><a href="/academic-departments/education/undergraduate/secondary-education/">Secondary Education</a></li>     
					<li><a href="/sustainable-living/">Sustainable Living</a></li> 
					<li><a href="/academic-departments/media-and-communications/overview/web-design/">Web Design</a></li>  
					<li><a href="/academic-departments/">& more...</a></li>   
				</ul>
			</div>

			<div class="clearFix"></div>
		</div>
		<p class="center mobile-margin-top">
			<a class="button" href="#">View all Academic Departments</a>
		</p>
	</div>
</section>

<?php 
	if ( $news->have_posts() ) : $count = 1; 
	$news_heading = get_field('news_heading');
?>
<section class="gray">
 	<div class="container">
 		<h2><?php echo $news_heading; ?></h2>	
 		<div class="grid thirds boxes news">
				
			<?php while ( $news->have_posts() ) : $news->the_post(); ?>
			<?php
				$thetitle = get_the_title();
				$getlength = strlen($thetitle);
				$thelength = 55;

				$myExcerpt = get_the_excerpt();
				$finalExcerpt = strip_tags($myExcerpt);
			?>
			
 			<div class="equalHeight">
	 			<a class="item<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>" href="<?php the_permalink(); ?>">
	 				<h3><?php echo substr($thetitle, 0, $thelength); if ($getlength > $thelength) echo "..."; ?></h3>
	 				<div class="image">
	 					<?php echo get_the_post_thumbnail($page->ID, 'Slide / Blog Featured'); ?>
	 				</div>	
	 				<p><?php echo substr($finalExcerpt, 0,180); ?>...</p>
	 			</a>
	 		</div>
	 		
 			<?php $count++; endwhile; wp_reset_postdata(); ?> 

	 		<div class="clearFix"></div>
	 		<p class="center margin-top">
				<a class="button" href="/whats-happening/mum-blogs/">View all News</a>
			</p>
 		</div>
 	</div>
</section>
<?php endif; ?>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>