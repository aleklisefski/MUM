<?php
	/*
	Template Name: Test Department ISM
	*/

	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$template_url = get_bloginfo('template_url');
	$display_heading = get_field('display_heading');
	$optional_h1_heading_for_seo = get_field('optional_h1_heading_for_seo');
?>
<section id="page-header" class="tan border-bottom-tan">
    <div class="heading tan">
      <div class="container">
        <?php include (TEMPLATEPATH . '/inc/cta.php'); ?>
        
		<h1 class="small"><?php the_title() ?></h1>
		<h2 class="large"><?php echo $display_heading; ?></h2>
      </div>
    </div>
</section>

<?php if( have_rows('slides') ): ?>
<section id="hero" class="tan border-bottom-tan">
	<div class="slider">
		<?php while( have_rows('slides') ) : the_row(); ?>
        <?php 
            $image = get_sub_field('image');
            $heading = get_sub_field('heading');
            $content = get_sub_field('content');
            $link = get_sub_field('link');
            
            if( !empty($image) ) {
                $url = $image['url'];
                $alt = $image['alt'];
                $size = 'Home Slideshow';
                $thumb = $image['sizes'][ $size ];
                $width = $image['sizes'][ $size . '-width' ];
                $height = $image['sizes'][ $size . '-height' ];
            };
        ?>
        <div class="slide">
            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
            <div class="slide-info tan brochure-form">
                <div class="heading blue border-top" style=" padding-right: 70px;">
                  <h4>GET YOUR </h4>
                  <h3>Free Brochure </h3>
                </div>
                <form action="">
                    <input type="text" class="clearDefault" value="First Name" name="firstName"> <br />
                    <input type="text" class="clearDefault" value="Email Address" name="email"><br />
                    <div class="blue" style="background: none; margin-top: 10px;">
                    	<input type="submit" value="Download now" class="button"/>
                    </div> 
                </form>
            </div>
        </div>
        <?php endwhile; ?>
        <!--<div class="slide"> <img width="900" height="322" alt="" src="https://www.mum.edu/wp-content/uploads/2015/01/test-slider-img.jpg">
          <div class="slide-info tan" style="display: block; right: 10%; opacity: 100; top: 100px; bottom: auto; width: auto; ">
          </div>
        </div>-->
	</div>
</section>
<?php endif; ?>

<section id="page-header" class="tan">
 	<div class="container" style="padding: 50px;">	
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
 		<aside style="opacity: 0;">
 			<?php include (TEMPLATEPATH . '/inc/sidebar.php'); ?>
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
	<?php $count++; end while; ?>
<?php endif; ?>

<?php if( have_rows('featured_content_boxes') ): $count = 1; 
	$featured_heading = get_field('featured_heading');
?>
<section class="featured">
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
<?php endif; ?>


<?php if( have_rows('circles') ): $count = 1; ?>
<?php 
	$circles_heading = get_field('circles_heading');
?>
<section class="<?php if( !have_rows('featured_content_boxes') ) { ?>gray<?php } ?> gray">
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
<?php endif; ?>

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
<section class="<?php if( (!have_rows('featured_content_boxes') && !have_rows('circles')) OR (have_rows('featured_content_boxes') && have_rows('circles')) ) { ?> <?php } ?>">
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
<?php endif; ?>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>