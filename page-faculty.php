<?php
	/*
	Template Name: Faculty / Alumni List
	*/

	get_header();
	$template_url = get_bloginfo('template_url');
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

<section class="body">
 	<div class="container">	
 		<aside>
			<p>&nbsp;</p>
			<div class="clearFix"></div>
 		</aside>
 		<article>
			<!-- The Content -->
 			<?php the_content(''); ?> 
 			
 			<?php
				$display_heading = get_field('display_heading');
				
				$children = new WP_Query(array(
				    'post_type'      => 'page',
				    'posts_per_page' => -1,
				    'post_parent'    => $post->ID,
				    'order'          => 'ASC',
				    'orderby'        => 'menu_order'
					)
				);
			?>
 			
 			<?php if ( $children->have_posts() ) : $count = 1; ?>
 				<div class="grid fourths boxes">
				<?php while ( $children->have_posts() ) : $children->the_post(); ?>
				<?php
					$theTitle = get_the_title();
					$getTitleLength = strlen($theTitle);
					$maxTitleLength = 30;
					
					$theExcerpt = get_the_content();
					$getExcerptLength = strlen($theExcerpt);
					$maxExcerptLength = 120;
					
					$featuredImage = get_the_post_thumbnail($page->ID, 'Alumni/Faculty Thumbnail');
				?>
			
			        <a class="item<?php if( $count % 4 == 1 ) { ?> first<?php } elseif( $count % 4 == 2 ) { ?> second<?php } elseif( $count % 4 == 3 ) { ?> third<?php } elseif( $count % 4 == 0 ) { ?> fourth<?php } ?>" href="<?php the_permalink(); ?>">
		 				<div class="image">
		 					<?php if( $featuredImage ) { echo $featuredImage; } else { ?><img src="/wp-content/themes/MUM/media/faculty_placeholder.jpg" alt="<?php echo $theTitle; ?>"  width="200" height="200" /><?php } ?>
		 				</div>
		 				<div class="button"><?php echo $theTitle ?></div>
		 				<?php if( have_rows('title_position_degree') ): 
		 					$rows = get_field('title_position_degree' ); // get all the rows
							$first_row = $rows[0]; // get the first row
							$first_title = $first_row['title' ]; // get the sub field value 
						?>
							<p><?php echo $first_title ?></p>
						<?php endif; ?>	
		 				
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