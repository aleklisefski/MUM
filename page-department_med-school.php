<?php
	/*
	Template Name: Department Landing - Select Interest w/download pop-up
	*/

	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$template_url = get_bloginfo('template_url');
	$display_heading = get_field('display_heading');
	$optional_h1_heading_for_seo = get_field('optional_h1_heading_for_seo');
	$include_breadcrumbs = get_field('include_breadcrumbs');
	
	// MailChimp subscribe form
	$form_heading = get_field('form_heading');
	$subscription_form_code = get_field('subscription_form_code');
	$download_image = get_field('download_image');
	$download_description = get_field('download_description');
	$download_button_text = get_field('download_button_text');
	
	if( !empty($image) ) {
		$url = $image['url'];
		$alt = $image['alt'];
		$size = 'Box / Video';
		$thumb = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];
	};
	
	// Background Video / Image
	$webm_video_file = get_field('webm_video_file');
	$mp4_video_file = get_field('mp4_video_file');
	$still_image = get_field('still_image');
	$video_heading = get_field('title_overlay');
	
	// Video Text Oveylay
	$video_title_overlay_1 = get_field('video_title_overlay_1');
	$video_title_overlay_2 = get_field('video_title_overlay_2');
	
	// Content Under Video
	$intro_photo = get_field('intro_photo');
	$intro_content = get_field('intro_content');
	
	if( !empty($intro_photo) ) {
		$intro_url = $intro_photo['url'];
		$intro_alt = $intro_photo['alt'];
		$intro_size = 'Video Large';
		$intro_thumb = $intro_photo['sizes'][ $size ];
		$intro_width = $intro_photo['sizes'][ $size . '-width' ];
		$intro_height = $intro_photo['sizes'][ $size . '-height' ];
	};
?>

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
				<img src="<?php echo $still_image; ?>" />
			<?php } ?>
            <div class="video-overlay">
	            <?php if( !empty($video_title_overlay_1) ) { ?>
	            	<h2><?php echo $video_title_overlay_1; ?></h2>
	            <?php } ?>
	            <?php if( !empty($video_title_overlay_2) ) { ?>
	            	<h1><?php echo $video_title_overlay_2; ?></h1>
	            <?php } ?>
            </div>
            
            <div class="slide-info download blue">
                <div class="heading blue border-top">
                  <h4><?php echo $form_heading; ?></h4>
					<?php if(get_field('interest_select_options')): ?>
						<form>
							<a class="button goURL not-mobile" href="#">Sign Up</a>
							<div class="select">
								<select id="interest_options">
									<?php while(has_sub_field('interest_select_options')): ?>
									<?php  
										$select_option_label = get_sub_field('select_option_label');
										$select_option_ID = get_sub_field('select_option_ID');
									?>
									<option value="<?php echo $select_option_ID; ?>"><?php echo $select_option_label; ?></option>
					 				<?php endwhile; ?>
					 			</select>
							</div>
							<a class="button fancybox-content desktop" href="#"><?php if( $download_button_text ) { echo $download_button_text; } else { echo 'Get Started'; } ?></a>
						</form>
					<?php endif; ?>
                  
                  <a class="button fancybox-content mobile" href=""><?php if( $download_button_text ) { echo $download_button_text; } else { echo 'Get Started'; } ?></a>
                </div>
                <div class="clearFix"></div>
            </div>
        </div>
	</div>
	<div class="gradiant"></div>
</section>
<?php endif; ?>

<script>
//////////////////// ##### ////////////////////
//////////////////// ##### ////////////////////
//////////////////// ##### ////////////////////
//
// ADD SCRIPT TO READ OPTION VALUE AND POP UP CONTENT WITH THAT ID - on "get started" button click
//
//////////////////// ##### ////////////////////
//////////////////// ##### ////////////////////
//////////////////// ##### ////////////////////
</script>

<?php $section_count = 1; ?>
<?php if( have_rows('landing_intro_content') ): $count = 1; ?>
	<?php while( have_rows('landing_intro_content') ) : the_row(); ?>
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
	<section class="landing_intro<?php if( $section_count % 2 != 0 ) { ?> gray<?php } ?>">
	 	<div class="container">	
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
	<?php $count++; $section_count++; endwhile; ?>
<?php endif; ?>

<section id="page-header" class="tan">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<aside>
			<?php include (TEMPLATEPATH . '/inc/subnav.php'); ?>
		</aside>
		<article>
			<h1><?php the_title(); ?></h1>
			<?php include (TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
		</article>
 	</div>
</section>

<section class="body">
 	<div class="container">	
 		<aside style="opacity: 0;">
 			&nbsp;
 		</aside>
 		<article>
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
			
 			<!-- The Content -->
 			<?php the_content(''); ?> 
		
			<!-- Box Grid -->
 			<?php if( have_rows('box_grid') ): $count = 1; ?>
 			<div class="grid thirds boxes">
				<div class="slide">
					<?php while( have_rows('box_grid') ) : the_row(); ?>
		 			<?php 
			        	$heading = get_sub_field('heading');
			        	$image = get_sub_field('image');
			        	$content = get_sub_field('content');
			        	$link = get_sub_field('button_link');
			        	$button_text = get_sub_field('button_text');
			        	
			        	if( !empty($image) ) {
							$url = $image['url'];
							$alt = $image['alt'];
							$size = 'Box / Video';
							$thumb = $image['sizes'][ $size ];
							$width = $image['sizes'][ $size . '-width' ];
							$height = $image['sizes'][ $size . '-height' ];
						};
			        ?>
			        <?php if( $count == 4 || $count == 7 || $count == 10 ) { ?>
			 			</div>
			 			<div class="slide">	
			 		<?php } ?>	
					<a class="item<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>" href="<?php echo $link; ?>">
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
			<?php endif; ?>		 		
 			
 			<?php if( have_rows('content_types') ): ?>
			<?php while ( have_rows('content_types') ) : the_row(); ?>	
						
		 		<!-- 2 Column Text -->
		 		<?php if( get_row_layout() == '2_column_text' ): ?>
		 			<?php if( have_rows('items') ): $count = 1; ?>
						<?php while( have_rows('items') ) : the_row(); $i++; ?>
			 			<?php 
				        	$heading = get_sub_field('heading');
				        	$image = get_sub_field('image');
				        	$content = get_sub_field('content');
				        	$button_link = get_sub_field('button_link');
				        	$button_text = get_sub_field('button_text');
				        	
				        	if( !empty($image) ) {
								$url = $image['url'];
								$alt = $image['alt'];
								$size = '2 Col Box';
								$thumb = $image['sizes'][ $size ];
								$width = $image['sizes'][ $size . '-width' ];
								$height = $image['sizes'][ $size . '-height' ];
							};
				        ?>
						<div class="col half border-top<?php if( $count % 2 == 1 ) { ?> first<?php } elseif( $count % 2 == 0 ) { ?> last<?php } ?>" href="<?php echo $link; ?>">
				 			<?php if( $heading ) { ?>
				 				<h3><?php echo $heading; ?></h3>
				 			<?php } ?>
							<?php if( $thumb ) { ?>
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
				        	$image = get_sub_field('image');
				        	$content = get_sub_field('content');
				        	$link = get_sub_field('link');
				        	$button_text = get_sub_field('button_text');
				        	
				        	if( !empty($image) ) {
								$url = $image['url'];
								$alt = $image['alt'];
								$size = '2 Col Box';
								$thumb = $image['sizes'][ $size ];
								$width = $image['sizes'][ $size . '-width' ];
								$height = $image['sizes'][ $size . '-height' ];
							};
				        ?>
						<a class="item<?php if( $count % 4 == 1 ) { ?> first<?php } elseif( $count % 4 == 2 ) { ?> second<?php } ?>" href="<?php echo $link; ?>">
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
			        ?>
			        <?php if( $faq_heading ) { ?>
			        	<?php echo $faq_heading; ?>
			        <?php } ?>
		 			<?php if( have_rows('faq') ): $i = 0; ?>
						<?php while( have_rows('faq') ) : the_row(); $i++; ?>
						<?php 
				        	$question = get_sub_field('question');
				        	$answer = get_sub_field('answer');
				        ?>
		 		
					 		<div class="faq">
								<h4><a href="#" onClick="_gaq.push(['_trackEvent', '<?php the_title(); ?>', 'Expand FAQ', '<?php echo $question; ?>']);"><?php echo $question; ?></a></h4>
								<div class="answer">
									<?php echo $answer; ?>
								</div>
							</div> 
						<?php endwhile; ?>
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
			        ?>
			        <?php if( $videos_heading ) { ?>
			        	<?php echo $videos_heading; ?>
			        <?php } ?>
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
 		</article>
 	</div>
</section>

<?php $section_count = 1; ?>
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
	<section<?php if( $section_count % 2 != 0 ) { ?> class="gray"<?php } ?>>
	 	<div class="container">	
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
	<?php $count++; $section_count++; endwhile; ?>
<?php endif; ?>

<?php if( have_rows('featured_content_boxes') ): $count = 1; 
	$featured_heading = get_field('featured_heading');
?>
<section class="featured<?php if( $section_count % 2 != 0 ) { ?> gray<?php } ?>">
 	<div class="container">	
 		<?php if( $featured_heading ) { ?>
 			<h2><?php echo $featured_heading; ?></h2>
 		<?php } ?>	
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
				data-cycle-pager=".slide-tabs.boxes"
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
 	<?php if( $count > 4 ) { ?>
 	<a class="slide-left boxes" href="#" onClick="_gaq.push(['_trackEvent', '<?php the_title(); ?>', 'Featured Nav', 'Prev']);"></a>
	<a class="slide-right boxes" href="#" onClick="_gaq.push(['_trackEvent', '<?php the_title(); ?>', 'Featured Nav', 'Next']);"></a>
	<?php } ?>
</section>
<?php $section_count++; endif; ?>


<?php if( have_rows('circles') ): $count = 1; ?>
<?php 
	$circles_heading = get_field('circles_heading');
?>
<section <?php if( $section_count % 2 != 0 ) { ?> class="gray"<?php } ?>>
 	<div class="container">	
 		<?php if( $circles_heading ) { ?>
 			<h2><?php echo $circles_heading; ?></h2>
 		<?php } ?>	
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
<?php $section_count++; endif; ?>

<?php
	$category = get_field('news_category');
	$news = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => 6,
		'cat' => $category
		)
	);
?>

<?php 
	if ( !empty($category) && $news->have_posts() ) : $count = 1; 
	$news_heading = get_field('news_heading');
?>
<section<?php if( $section_count % 2 != 0 ) { ?> class="gray"<?php } ?>>
 	<div class="container">
 		<h2><?php echo $news_heading; ?></h2>	
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
				
				<?php while ( $news->have_posts() ) : $news->the_post(); ?>
				<?php
					$thetitle = get_the_title();
					$getlength = strlen($thetitle);
					$thelength = 55;

					$myExcerpt = get_the_excerpt();
					$finalExcerpt = strip_tags($myExcerpt);
				?>
				
				<?php if( $count == 4 || $count == 7 || $count == 10 ) { ?>
		 			</div>
		 			<div class="slide">	
		 		<?php } ?>	
		 			<a class="item<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>" href="<?php the_permalink(); ?>">
		 				<h3><?php echo substr($thetitle, 0, $thelength); if ($getlength > $thelength) echo "..."; ?></h3>
		 				<div class="image">
		 					<?php echo get_the_post_thumbnail($page->ID, 'Slide / Blog Featured'); ?>
		 				</div>	
		 				<p><?php echo substr($finalExcerpt, 0,180); ?>...</p>
		 				<p><span class="button">Read More</span></p>
		 			</a>
	 			<?php $count++; endwhile; wp_reset_postdata(); ?> 
	 				
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
<?php $section_count++; endif; ?>

<!-- ##### HIDDEN - Download pop-up ##### -->
<?php if(get_field('interest_select_options')): ?>
	<?php while(has_sub_field('interest_select_options')): ?>
		<?php
			$select_option_ID = get_sub_field('select_option_ID');
			$download_popup_heading = get_sub_field('download_popup_heading');
			$download_popup_subheading = get_sub_field('download_popup_subheading');
			$download_popup_content = get_sub_field('download_popup_content');
		?>
		
		<div id="<?php echo $select_option_ID; ?>" class="download_popup hidden">
			<h2><?php echo $download_popup_heading; ?></h2>
			<h4><?php echo $download_popup_subheading; ?></h4>
			<?php echo $download_popup_content; ?>
			
			<!-- Begin MailChimp Signup Form -->
			<div id="mc_embed_signup">
				<form action="//mum.us8.list-manage.com/subscribe/post?u=22fad1e3d15e93d858349d4a6&amp;id=382e0ddc97" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<input type="hidden" id="mce-MMERGE4" name="MMERGE4" value="<?php echo $TrafficSource; ?>" />
			    	<input type="hidden" id="mce-MMERGE5" name="MMERGE5" value="<?php echo $type; ?>" />
			    	<input type="hidden" id="mce-MMERGE6" name="MMERGE6" value="<?php echo $Keyword; ?>" />
					<div id="mc_embed_signup_scroll">
		
						<div class="mc-field-group">
							<input type="text" value="First Name *" name="FNAME" class="required clearDefault" id="mce-FNAME">
						</div>
						<div class="mc-field-group">
							<input type="email" value="Email Address *" name="EMAIL" class="required email clearDefault" id="mce-EMAIL">
						</div>
						<div class="mc-field-group">
						    <input type="text" value="Phone Number *" name="MMERGE3" class="required phone clearDefault" id="mce-MMERGE3">
						</div>	
						<div class="mc-field-group input-group">
						    <p>Do you have an undergraduate degree?</p>
						    <ul>
						    	<li><input type="radio" value="Yes" name="MMERGE11" id="mce-MMERGE11-0"><label for="mce-MMERGE11-0">Yes</label></li>
								<li><input type="radio" value="No" name="MMERGE11" id="mce-MMERGE11-1"><label for="mce-MMERGE11-1">No</label></li>
							</ul>
						</div>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div style="position: absolute; left: -5000px;"><input type="text" name="b_22fad1e3d15e93d858349d4a6_382e0ddc97" tabindex="-1" value=""></div>
						<div class="clear"><input type="submit" value="Download Now!" name="subscribe" id="mc-embedded-subscribe" class="button" onclick="fbq('track', 'DLMA info packet submit');"></div>
					</div>
				</form>
			</div>
			<!--End mc_embed_signup-->
		</div>
	<?php endwhile; ?>
<?php endif; ?>



<?php endwhile; endif; wp_reset_query(); ?>

<?php include (TEMPLATEPATH . '/footer-test.php'); ?>