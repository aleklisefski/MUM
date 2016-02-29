<?php
	/*
	Template Name: Single Post
	*/

	get_header();
?>

<?php
	$template_url = get_bloginfo('template_url');
	$display_heading = get_field('display_heading');
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); 
	$post = $posts[0]; // Hack. Set $post so that the_date() works. 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$wp_query->query_vars["paged"] = $paged;
	$wp_query->query_vars["nopaging"] = 0;
	$wp_query->get_posts();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$featuredImage = get_the_post_thumbnail($page->ID, 'Slide / Blog Featured');
			
	$thetitle = get_the_title();
	$getlength = strlen($thetitle);
	$thelength = 30;
	
	$author = get_the_author();
	$avatar = get_avatar( get_the_author_meta('user_email'), '160', '' );
	$author_URL = get_author_posts_url( get_the_author_meta( 'ID' ) );  
	$author_description = get_the_author_meta('description');
	$twitter = get_the_author_meta('twitter'); 
	$facebook = get_the_author_meta('facebook'); 
	$google = get_the_author_meta('googleplus');
	$linkedin = get_the_author_meta('linkedin');

?>

<section id="page-header" class="tan">
	<?php include (TEMPLATEPATH . '/inc/sharing.php'); ?>
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<aside>
			<?php include (TEMPLATEPATH . '/inc/subnav.php'); ?>
		</aside>
		<article>
			<div class="cta wide">
	 			<div class="image white">
	 				<a href="/whats-happening/mum-blogs/subscribe/"><img src="/wp-content/themes/MUM/media/icon_rss.png" alt="RSS" /></a>
	 			</div>
	 			<h5>Stay up-to-date</h5>
	 			<a href="/whats-happening/mum-blogs/subscribe/">Subscribe via Email</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/feed/">RSS Feed</a>
	 		</div>
			<h1><?php the_title() ?></h1>
			<div id="breadcrumbs">
				<a class="home" href="/">Home</a>|<a href="/whats-happening">What's Happening</a>|<a href="/whats-happening/blogs">Blogs</a>|<a href="<?php the_permalink() ?>"><?php echo substr($thetitle, 0, $thelength); if ($getlength > $thelength) echo "..."; ?></a>
			</div>	
			<div class="post blue">
 				<div class="post-info">
	 				<div class="image">
	 					<?php echo $featuredImage ?>
	 				</div>
 					<ul class="info">
	 					<li class="author">
	 						<div class="icon"></div>
	 						Author
	 						<a href="<?php echo $author_URL; ?>"><?php echo $author ?></a>
	 					</li>
	 					<li class="date">
	 						<div class="icon"></div>
	 						Published On
	 						<span><?php the_time('M j, Y') ?></span>
	 					</li>
	 					<li class="category">
	 						<div class="icon"></div>
	 						<?php
	 							$terms = get_the_term_list( $post->ID, 'category', 'Category', '' );
								//$max_terms = 2;
								//$terms_array = explode( ',', $terms, $max_terms + 1 );
								//array_pop( $terms_array );
								//$terms = implode( '', $terms_array );
								echo $terms;
	 						 ?>
	 					</li>
	 				</ul>
	 				<div class="clearFix"></div>
 				</div>
 			</div>	
 			<div class="tags">
				<?php echo get_the_tag_list('<p>','','</p>');?>
			</div>
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
			<?php include (TEMPLATEPATH . '/inc/sharing-inline.php'); ?>
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
				        	<a class="item box right video fancybox-media" href="<?php echo $video_url; ?>">
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
			
 			<!-- The Content -->
 			<?php the_content(''); ?> 
			
			<?php if( have_rows('content_types') ): ?>
			<?php while ( have_rows('content_types') ) : the_row(); ?>	
			
				<!-- If Full-size Video -->
		 		<?php if( get_row_layout() == 'full-size_video' ): ?>
			 		<?php 
			 			$video = get_sub_field('video_embed_code'); 
			 			$video_heading = get_sub_field('video_heading');
			 		?>
					<?php if( $video_heading ) { ?>
			        	<?php echo $video_heading; ?>
			        <?php } ?>
					<div class="video-frame">
						<?php echo $video; ?>
					</div>
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
				        <a class="item fancybox<?php if( $count % 4 == 1 ) { ?> first<?php } elseif( $count % 4 == 2 ) { ?> second<?php } elseif( $count % 4 == 3 ) { ?> third<?php } elseif( $count % 4 == 0 ) { ?> fourth<?php } ?>" rel="gallery" href="<?php echo $image['url']; ?>">
			 				<div class="image">
			 					<img src="<?php echo $image['sizes']['Photo Gallery Thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" width="220" height="220" />
			 					<div class="icon"></div>
			 				</div>
			 			</a>
			 			<?php $count++; endforeach; ?>
			 			<div class="clearFix"></div>
			 		<?php endif; ?>	
					</div>
				<?php endif; ?>	
			
			<?php endwhile; ?>
			<?php endif; ?>	
			
 			<div class="author-info tan">
 				<?php if( $twitter != null || $facebook != null || $google != null || $linkedin != null ) { ?>
 				<div class="social">
 					<?php if( $twitter != null ) { ?>
 						<li><a href="<?php echo $twitter; ?>" class="icon twitter">Twitter</a></li>
	 				<?php } ?>
					<?php if( $facebook != null ) { ?>
						<li><a href="<?php echo $facebook; ?>" class="icon facebook">Facebook</a></li>
					<?php } ?>
					<?php if( $google != null ) { ?>
						<li><a href="<?php echo $google; ?>?rel=author" class="icon google">Google+</a></li>
					<?php } ?>
					<?php if( $linkedin != null ) { ?>
						<li><a href="<?php echo $linkedin; ?>" class="icon linkedin">LinkedIn</a></li>
					<?php } ?>
 				</div>
 				<?php } ?>
 				<?php echo $avatar ?>
 				<p><strong><?php echo $author; ?></strong> <?php echo $author_description; ?></p>
 				<div class="clearFix"></div>
 			</div>

  		</article>
 	</div>
</section>

<section class="gray related" id="related-posts">
 	<div class="container">	
		<h2>You may also enjoy...</h2>
		<div class="grid fourths boxes">
			<?php get_related_posts_thumbnails(); ?> 
			<div class="clearFix"></div>
		</div>
 	</div>
</section>

<section>
 	<div class="container">	
 		<div id="disqus_thread"></div>
 	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>