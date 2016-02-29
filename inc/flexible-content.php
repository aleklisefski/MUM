<?php if( have_rows('content_types') ): ?>
	<?php while ( have_rows('content_types') ) : the_row(); ?>	
			
		<!-- 2 Column Text -->
		<?php if( get_row_layout() == '2_column_text' ): ?>
			<?php if( have_rows('items') ): $count = 1; ?>
			<?php while( have_rows('items') ) : the_row(); $i++; ?>
 			<?php 
	        	$heading = get_sub_field('heading');
	        	$col_image = get_sub_field('image');
	        	$content = get_sub_field('content');
	        	$button_link = get_sub_field('button_link');
	        	$button_text = get_sub_field('button_text');
	        	
	        	if( !empty($col_image) ) {
					$url = $col_image['url'];
					$alt = $col_image['alt'];
					$size = '2 Col Box';
					$thumb = $col_image['sizes'][ $size ];
					$width = $col_image['sizes'][ $size . '-width' ];
					$height = $col_image['sizes'][ $size . '-height' ];
				};
	        ?>
			<div class="col half border-top<?php if( $count % 2 == 1 ) { ?> first<?php } elseif( $count % 2 == 0 ) { ?> last<?php } ?>" href="<?php echo $link; ?>">
	 			<?php if( $heading ) { ?>
	 				<h3><?php echo $heading; ?></h3>
	 			<?php } ?>
				<?php if( $col_image ) { ?>
					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
				<?php } ?>
	 			<?php echo $content; ?>
	 			<?php if( $button_link ) { ?>
	        		<p><a class="button" href="<?php echo $button_link; ?>"><?php if( $button_text ) { echo $button_text; } else { echo 'Learn More'; }?></a></p>
	        	<?php } ?>
 			</div>
			<?php $count++; endwhile; ?>
		<div class="clearFix"></div>
		<?php endif; ?>			 		
		<?php endif; ?>	
		
		<!-- 2 Column Boxes -->
		<?php if( get_row_layout() == '2_column_boxes' ): ?>
			<?php if( have_rows('items') ): $count = 1; ?>
			<div class="grid half boxes">
			<?php while( have_rows('items') ) : the_row(); ?>
 			<?php 
	        	$heading = get_sub_field('heading');
	        	$box_image = get_sub_field('image');
	        	$content = get_sub_field('content');
	        	$link = get_sub_field('link');
	        	$button_text = get_sub_field('button_text');
	        	
	        	if( !empty($box_image) ) {
					$url = $box_image['url'];
					$alt = $box_image['alt'];
					$size = '2 Col Box';
					$thumb = $box_image['sizes'][ $size ];
					$width = $box_image['sizes'][ $size . '-width' ];
					$height = $box_image['sizes'][ $size . '-height' ];
				};
	        ?>
			<a class="item<?php if( $count % 2 == 1 ) { ?> first<?php } elseif( $count % 2 == 0 ) { ?> second<?php } ?>" href="<?php echo $link; ?>">
 				<h3><?php echo $heading; ?></h3>
 				<div class="image">
 					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
 				</div>
 				<div class="button"><?php if( $button_text ) { echo $button_text; } else { echo 'Learn More'; }?></div>
 				<?php echo $content; ?>
 			</a>
			<?php $count++; endwhile; ?>
			<div class="clearFix"></div>
		</div>	
		<?php endif; ?>		 		
		<?php endif; ?>	
		
				 		
		<!-- Box Grid -->
		<?php if( get_row_layout() == 'box_grid' ): ?>
			<?php if( have_rows('items') ): $count = 1; ?>
			<div class="grid thirds boxes">
			<?php while( have_rows('items') ) : the_row(); ?>
 			<?php 
	        	$heading = get_sub_field('heading');
	        	$grid_image = get_sub_field('image');
	        	$content = get_sub_field('content');
	        	$link = get_sub_field('link');
	        	$button_text = get_sub_field('button_text');
	        	
	        	if( !empty($grid_image) ) {
					$url = $grid_image['url'];
					$alt = $grid_image['alt'];
					$size = 'Box / Video';
					$thumb = $grid_image['sizes'][ $size ];
					$width = $grid_image['sizes'][ $size . '-width' ];
					$height = $grid_image['sizes'][ $size . '-height' ];
				};
	        ?>
			<a class="item<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>" href="<?php echo $link; ?>">
 				<h3><?php echo $heading; ?></h3>
 				<div class="image">
 					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
 				</div>
 				<div class="button"><?php if( $button_text ) { echo $button_text; } else { echo 'Learn More'; }?></div>
 				<?php echo $content; ?>
 			</a>
			<?php $count++; endwhile; ?>
			<div class="clearFix"></div>
		</div>	
		<?php endif; ?>		 		
		<?php endif; ?>	
						 		
		
		<!-- If FAQ -->
		<?php if( get_row_layout() == 'expanding_faqs' ): ?>
		<?php 
        	$faq_heading = get_sub_field('faq_heading');
        	$compressed = get_sub_field('compressed');
        ?>
        <?php if( $faq_heading ) { ?>
        	<?php echo $faq_heading; ?>
        <?php } ?>
			<?php if( have_rows('faq') ): $i = 0; ?>
			<div class="faqs">
			<?php while( have_rows('faq') ) : the_row(); $i++; ?>
			<?php 
	        	$question = get_sub_field('question');
	        	$answer = get_sub_field('answer');
	        ?>
		
		 		<div class="faq<?php if( $compressed == "Yes" ) { echo ' compressed'; } ?>">
					<h4><a href="#" onClick="_gaq.push(['_trackEvent', '<?php the_title(); ?>', 'Expand FAQ', '<?php echo $question; ?>']);"><?php echo $question; ?></a></h4>
					<div class="answer">
						<?php echo $answer; ?>
					</div>
				</div> 
			<?php endwhile; ?>
			</div>
		<?php endif; ?>			 		
		<?php endif; ?>	
		
		<!-- If Call-out -->
		<?php if( get_row_layout() == 'call-out' ): ?>
			<?php 
	        $content = get_sub_field('content');
	    ?>
	 	
	 	<div class="call-out">
				<?php echo $content; ?>
			</div>

		<?php endif; ?>
		
		<!-- If List w/Image -->
		<?php if( get_row_layout() == 'list' ): ?>
		<?php $list_heading = get_sub_field('list_heading'); ?>
		<?php if( $list_heading ) { ?>
	       <?php echo $list_heading; ?>
	<?php } ?>
			<?php if( have_rows('list_items') ): $i = 0; ?>
			<?php while( have_rows('list_items') ) : the_row(); $i++; ?>
 			<?php 
	        	$heading = get_sub_field('heading');
	        	$image = get_sub_field('image');
	        	$content = get_sub_field('content');
	        	$button_text = get_sub_field('button_text');
	        	$button_link = get_sub_field('button_link');
	        	
	        	if( !empty($image) ) {
					$url = $image['url'];
					$alt = $image['alt'];
					$size = 'List Image';
					$thumb = $image['sizes'][ $size ];
					$width = $image['sizes'][ $size . '-width' ];
					$height = $image['sizes'][ $size . '-height' ];
				};
	        ?>
	        <div class="item list">   	
	        	<?php if( $button_link ) { ?>
	        	<a class="image" href="<?php echo $button_link; ?>">
	        	<?php } else { ?>
	        	<div class="image">
	        	<?php }  ?>	
	        		
	        		<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
	        	
	        	<?php if( $button_link ) { ?>
	        	</a>
	        	<?php } else { ?>
	        	</div>
	        	<?php }  ?>
	        	<div class="content">
		        	<?php if( $heading ) { ?>
		        	<h3><?php echo $heading; ?></h3>
		        	<?php } ?>
	        		<?php echo $content; ?>
	        		<?php if( $button_link ) { ?>
	        		<p><a class="button" href="<?php echo $button_link; ?>"><?php if( $button_text ) { echo $button_text; } else { echo 'Learn More'; }?></a></p>
	        		<?php } ?>
	        	</div>
			</div>
			<?php endwhile; wp_reset_postdata(); ?>
		<?php endif; ?>			 		
		<?php endif; ?>	
		
		<!-- If Video List -->
		<?php if( get_row_layout() == 'video_list' ): ?>
		<?php 
        	$videos_heading = get_sub_field('videos_heading');
			if( $videos_heading ) { 	
        		echo $videos_heading; 
        	} 
        ?>
		<?php $videos = get_sub_field('choose_videos');?>
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
		        <hr />
	 			<a class="item box left video fancybox-media" href="<?php echo $video_url; ?>" onClick="_gaq.push(['_trackEvent', '<?php the_title(); ?>', 'Open Lightbox Video', '<?php echo $description; ?>']);">
	 				<div class="image">
	 					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
	 					<span class="button green"><span><img src="/wp-content/themes/MUM/media/arrow_play@2x.png" alt="" /></span></span>
	 				</div>
	 				<div class="button">Play <span class="light">(<?php echo $runtime; ?>)</span></div>
	 			</a>
	 			<h3 class="margin-top"><?php the_title(); ?></h3>
	 			<p><?php echo $description; ?></p>
			<?php endforeach; wp_reset_postdata(); ?>
			<div class="clearFix"></div>
		<?php endif; ?>	
	<?php endif; ?>	
	
		<!-- If Faculty -->
	<?php if( get_row_layout() == 'faculty_members' ): ?>
	<?php 
    	$faculty_heading = get_sub_field('faculty_heading');
		if( $faculty_heading ) { 
    		echo $faculty_heading; 
		} 
	?>
	<?php 
		$facutly_members = get_sub_field('choose_faculty_members');
	 
		if( $facutly_members ): $count = 1;?>
		    <div class="grid thirds circles">
		    <?php foreach( $facutly_members as $post): // variable must be called $post (IMPORTANT) ?>
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
		        <div class="item<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 2 ) { ?> second<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>">
	 				<div class="image">
	 					<img class="border" src="<?php echo $url ?>" alt="<?php the_title(); ?>" width="200" height="200" />
	 					<label>
	 						<img src="/wp-content/themes/MUM/media/bg_label-circle.png" alt="" />
	 						<span><?php the_title(); ?></span>
	 					</label>
	 				</div>
	 				
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
	 					<a class="button" href="<?php the_permalink(); ?>">View Profile</a>
	 				</p>
	 				<?php } ?>
	 			</div>
		    <?php $count++; endforeach; ?>
	    	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	    	</div>
		<?php endif; ?>
	<?php endif; ?>	

		
	<!-- If Photo Gallery -->
	<?php if( get_row_layout() == 'photo_gallery' ): $count = 1 ?>
		<?php 
        $gallery_heading = get_sub_field('gallery_heading');
    ?>
        <?php if( $gallery_heading ) { ?>
        	<?php echo $gallery_heading; ?>
        <?php } ?>
		<div class="grid fourths boxes photos">
			<?php $photos = get_sub_field('photos'); ?>
			<?php if( $photos ): ?>
			<?php foreach( $photos as $image ): ?>
	        <a class="item fancybox<?php if( $count % 4 == 1 ) { ?> first<?php } elseif( $count % 4 == 2 ) { ?> second<?php } elseif( $count % 4 == 3 ) { ?> third<?php } elseif( $count % 4 == 0 ) { ?> fourth<?php } ?>" rel="gallery" href="<?php echo $image['url']; ?>" onClick="_gaq.push(['_trackEvent', '<?php the_title(); ?>', 'View Gallery Photo', '<?php echo $image['url']; ?>']);">
 				<div class="image">
 					<img src="<?php echo $image['sizes']['Photo Gallery Thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" width="220" height="220" />
 					<div class="icon"></div>
 				</div>
 			</a>
 			<?php $count++; endforeach; wp_reset_postdata(); ?>
 			<div class="clearFix"></div>
 		<?php endif; ?>	
		</div>
	<?php endif; ?>	
	
	<!-- If Basic Text -->
	<?php if( get_row_layout() == 'text' ): ?>
		<?php $content = get_sub_field('content'); ?>
		<?php echo $content; ?>
	<?php endif; ?>
	
	<!-- If Table -->
	<?php if( get_row_layout() == 'table' ): ?>
		<?php 
    	$table_heading = get_sub_field('table_heading');
    	$table = get_sub_field('choose_table');
    ?>
    <?php if( $table_heading ) { ?>
    	<?php echo $table_heading; ?>
    <?php } ?>
    
	<?php echo $table ?>

	<?php endif; ?>

			 		
<?php endwhile; ?>
<?php endif; ?>		
