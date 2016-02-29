<?php
	/*
	Template Name: Video Cafe Category Archive
	*/

	get_header();
?>

<?php
	$template_url = get_bloginfo('template_url'); 

	$post = $posts[0]; // Hack. Set $post so that the_date() works. 
	$wp_query->query_vars['posts_per_page'] = 99;
	$wp_query->get_posts();
?>

<section id="page-header" class="tan">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<aside>

			<?php
			
				$videoCats = array(
				  'taxonomy'     => 'video_category',
				  'orderby'      => 'name',
				  'hide_empty'   => 0,
				  'show_count'   => 0,
				  'pad_counts'   => 0,
				  'hierarchical' => 1,
				  'depth'        => 2,
				  'title_li'     => __('')
				);
			?>
			
			<a class="button back" href="/about-mum">About MUM</a>
			<div id="subnav">
				<a id="sub-open" href="#"><span class="icon"></span></a>
				<label><a id="sub-close" class="close" href="#"></a>Video Showcase</label>
				<ul>
					<?php wp_list_categories( $videoCats ); ?> 
				</ul>
			
			</div>

		</aside>
		<article>
			<?php include (TEMPLATEPATH . '/inc/cta.php'); ?>
			<h1>Video Showcase</h1>
			<div id="breadcrumbs">
				<a class="home" href="/">Home</a>|<a href="/about-mum">About MUM</a>|<a href="/about-mum/video-showcase">Video Showcase</a>
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
 			<div class="blog-header category"><strong><?php single_cat_title(); ?></strong></div>
 			<?php if ( $wp_query->have_posts() ) { $count = 1 ?>
 				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
	 			
				<div class="grid thirds boxes video">
				<?php 
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
			        <a class="item video fancybox-media<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>" href="<?php echo $video_url; ?>" onClick="_gaq.push(['_trackEvent', '<?php single_cat_title(); ?>', 'Open Lightbox Video', '<?php echo $description; ?>']);">
		 				<div class="image">
		 					<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
		 					<span class="button green"><span><img src="/wp-content/themes/MUM/media/arrow_play@2x.png" alt="play" width="17" height"24" /></span></span>
		 				</div>
		 				<div class="button">Play <span class="light">(<?php echo $runtime; ?>)</span></div>
		 				<h4><?php the_title(); ?></h4>
		 				<p><?php echo $description; ?></p>
		 			</a>
	        	<?php $count++; wp_reset_postdata(); endwhile; ?>
	     	
	        <?php } else { ?>
	        	<p>This category is empty.</p>
	        <?php } ?>
	        </div>	
 		</article>
 	</div>
</section>

<?php get_footer(); ?>