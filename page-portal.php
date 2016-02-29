<?php
	/*
	Template Name: Portal
	*/

	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$template_url = get_bloginfo('template_url');
	$display_heading = get_field('display_heading');
	$select_nav = get_field('select_nav');
?>

<section id="page-header" class="tan">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<aside>
			<?php include (TEMPLATEPATH . '/inc/subnav.php'); ?>
		</aside>
		<article>
			<?php include (TEMPLATEPATH . '/inc/cta.php'); ?>
			<h1><?php if( $display_heading != null ) { echo $display_heading; } else { the_title(); }?></h1>
			<?php include (TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
		</article>
 	</div>
</section>

<section class="body portal">
 	<div class="container">	
 		<aside>
			<p>&nbsp;</p>
			<div class="clearFix"></div>
 		</aside>
 		<article>
			<!-- The Content -->
 			<?php the_content(''); ?> 
 			
 			<?php
				$template_url = get_bloginfo('template_url');
				$display_heading = get_field('display_heading');
				
				$children = new WP_Query(array(
				    'post_type'      => 'page',
				    'posts_per_page' => -1,
				    'post_parent'    => $post->ID,
				    'order'          => 'ASC',
				    'orderby'        => 'menu_order',
				    'meta_key' => 'exclude_from_sitemap',
				  	'meta_compare' => '!=',
				  	'meta_value' => 'Yes'
					)
				);
			?>
 			
 			<?php if ( $children->have_posts() ) : $count = 1; ?>
 				<div class="grid thirds boxes">
				<?php while ( $children->have_posts() ) : $children->the_post(); ?>
				<?php
					$theTitle = get_the_title();
					$getTitleLength = strlen($theTitle);
					$maxTitleLength = 24;
					
					$theExcerpt = get_the_content();
					$getExcerptLength = strlen($theExcerpt);
					$maxExcerptLength = 120;
					
					$featuredImage = get_the_post_thumbnail($page->ID, 'Box / Video');
				?>
			
			        <a class="item<?php if( $count % 3 == 1 ) { ?> first<?php } elseif( $count % 3 == 0 ) { ?> third<?php } ?>" href="<?php the_permalink(); ?>">
		 				<div class="image">
		 					<?php echo $featuredImage ?>
		 				</div>
		 				<div class="button"><?php echo substr($theTitle, 0, $maxTitleLength); if ($getTitleLength > $maxTitleLength) echo "..."; ?></div>
		 			</a>

			    <?php $count++; endwhile; ?>
			    <div class="clearFix"></div>
			    </div>
			<?php endif; wp_reset_query(); ?>
 		</article>
 	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>