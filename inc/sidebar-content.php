<?php if ( have_rows('sidebar_types', $parent) ) { ?>	
<?php while ( have_rows('sidebar_types', $parent) ) : the_row(); ?>					 		
	
	<!-- If CTA -->
	<?php if( get_row_layout() == 'cta' ): ?>
		<?php 
			$cta = get_sub_field('include_cta_box');
			if( $cta == 'Yes' ) {
		?>
		<div class="box green">
		<label>Get Started</label>
		<ul class="icons">
			<li><span class="icon phone"></span><a href="/contact-us/">(800) 369-6480</a></li>
			<li class="contact"><span class="icon email"></span><a href="#emailScroll" onClick="_gaq.push(['_trackEvent', 'Contact', 'Open Form', 'Sidebar Link']);">Contact Us</a></li>
			<li><span class="icon visit"></span><a href="/admissions/visitors-weekends/">Visit Us</a></li>
			<li><span class="icon apply"></span><a href="/admissions/apply-online">Apply Online</a></li>
		</ul>
	</div>	
	<?php } ?>
				 		
	<?php endif; ?>	
	<!-- If Nav -->
	<?php if( get_row_layout() == 'nav' ): ?>
		<?php 
    	$nav_heading = get_sub_field('nav_heading');
    ?>
		<?php if( have_rows('nav_items') ): $i = 0; ?>
		<div class="box green">
			<label class="bold"><?php echo $nav_heading; ?></label>
			<ul>
			<?php while( have_rows('nav_items') ) : the_row(); $i++; ?>
			<?php 
	        	$link_text = get_sub_field('link_text');
	        	$link_url = get_sub_field('link_url');
	        	$event_tracking_code = get_sub_field('event_tracking_code');
	        ?>
							 			
				<li><a href="<?php echo $link_url; ?>" <?php if( !empty($event_tracking_code) ) { echo $event_tracking_code; } ?>><?php echo $link_text; ?></a></li>
			
			 	<?php endwhile ?>
			</ul>
		</div>
		<?php endif; ?>
	<?php endif; ?>	
	
	<!-- If Boxes -->
	<?php if( get_row_layout() == 'boxes' ): ?>
		<?php if( have_rows('box') ): $i = 0; ?>
		<?php while( have_rows('box') ) : the_row(); $i++; ?>
		<?php 
        	$image = get_sub_field('image');
        	$heading = get_sub_field('heading');
        	$text = get_sub_field('text');
        	$button_text = get_sub_field('button_text');
        	$link = get_sub_field('link');
        	
        	if( !empty($image) ) {
				$url = $image['url'];
				$alt = $image['alt'];
				$size = 'Sidebar Box';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
			};
        ?>
        
        <a class="item box" href="<?php echo $link ?>">
				<h3><?php echo $heading ?></h3>
				<div class="image">
					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
				</div>
				<div class="button"><?php if( $button_text ) { echo $button_text; } else { echo 'Learn More'; }?></div>
				<p><?php echo $text ?></p>
			</a>
		 	<?php endwhile ?>
		<?php endif; ?>
	<?php endif; ?>	
	
	<!-- If Testimonials -->
	<?php if( get_row_layout() == 'testimonials' ): ?>
		<?php $testimonials = get_sub_field('choose_testimonials');?>
	<?php if( $testimonials ): ?>
        <?php foreach( $testimonials as $post): // variable must be called $post (IMPORTANT) ?>
        <?php 
        	setup_postdata($post); 
        	$image = get_field('headshot_image');
        	$link_text = get_field('link_text');
        	$link_url = get_field('link_url');
        	
        	if( !empty($image) ) {
				$url = $image['url'];
				$alt = $image['alt'];
				$size = 'Circle / Headshot';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
			};
        ?>
			<div class="item circle testimonial">
				<div class="image">
					<img class="border" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
					<label>
						<img src="/wp-content/themes/MUM/media/bg_label-circle.png" alt="" />
						<span><?php the_title(); ?></span>
					</label>
				</div>
				<p><span class="quote">"</span><?php echo substr(get_the_content(), 0,1000); ?>"</p>
			<?php if( $link_text ) { ?>
				<p class="read-more">
				<?php if( $link_url ) { ?>
					<a href="<?php echo $link_url ?>"><?php if( $link_text ) { echo $link_text; } else { echo 'Read More'; }?></a>
				<?php } else { ?>
					<?php echo $link_text; }?>
				<?php } ?>
				</p>
			</div> 
			<?php endforeach; wp_reset_postdata(); ?>
		<?php endif; ?>
	<?php endif; ?>	


	<!-- If Faculty -->
	<?php if( get_row_layout() == 'faculty' ): ?>

	<?php 
		$facutly = get_sub_field('choose_faculty_profile');
	 
		if( $facutly ): ?>
		    <?php foreach( $facutly as $post): // variable must be called $post (IMPORTANT) ?>
		        <?php 
		        	setup_postdata($post); 
					$email = get_field('email');
					$phone = get_field('phone');
					$cell = get_field('cell');
					$fax = get_field('fax');
					$location = get_field('location');
					$hours = get_field('hours');
					$website = get_field('website');
					
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'Circle / Headshot');
					$url = $thumb[0];
		        ?>
		        <div class="item circle">
	 				<div class="image">
	 					<img class="border" src="<?php echo $url ?>" alt="<?php the_title(); ?>" width="300" height="300" />
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
	 				<p>
	 					<a class="button width-100" href="<?php the_permalink(); ?>">View Profile</a>
	 				</p>
	 				<?php } ?>
	 			</div>
		    <?php endforeach; ?>
	    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>
	<?php endif; ?>	

<!-- If Circles -->
	<?php if( get_row_layout() == 'circles' ): ?>
		<?php if( have_rows('circle') ): $i = 0; ?>
		<?php while( have_rows('circle') ) : the_row(); $i++; ?>
		<?php 
        	$image = get_sub_field('image');
        	$label = get_sub_field('label');
        	$text = get_sub_field('text');
        	$link_text = get_sub_field('link_text');
        	$link_url = get_sub_field('link_url');
        	
        	if( !empty($image) ) {
				$url = $image['url'];
				$alt = $image['alt'];
				$size = 'Circle / Headshot';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
			};
        ?>
 		<div class="item circle">
				<div class="image">
					<img class="border" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
					<label>
						<img src="/wp-content/themes/MUM/media/bg_label-circle.png" alt="" />
						<span><?php echo $label ?></span>
					</label>
				</div>
				<p><?php echo $text ?></p>
				<?php if( $link_url ) { ?>
					<a class="button" href="<?php echo $link_url ?>"><?php if( $link_text ) { echo $link_text; } else { echo 'Learn More'; }?></a>
				<?php } ?>
			</div>
		 	<?php endwhile ?>
		<?php endif; ?>	
	<?php endif; ?>	
	
	<!-- If VW graphic -->
	<?php if( get_row_layout() == 'vw_graphic' ): ?>
	<?php 
    	$include_vw_graphic = get_sub_field('include_vw_graphic');
    	if( $include_vw_graphic == "Yes" ) {
    ?>
		<div class="visitors-weekend blue border-bottom">
			<img src="<?php echo $template_url; ?>/media/visitors-weekend-sidebar.jpg" alt="happy students" />
			<div>
				<h3>Experience MUM</h3>
				<p>Join our visitors weekend and open up a new world of possibilities</p>
				<a class="button green" href="/admissions/visitors-weekends/"><span>Visit<br>Us</span></a>
			</div>
		</div>
		<?php } ?>	
	<?php endif; ?>	

<?php endwhile; ?>

<?php } else { ?>
	<?php if( $parent != "2490" ) { ?><p>&nbsp;</p><?php } ?>
	<div class="clearFix"></div>
<?php } ?>
