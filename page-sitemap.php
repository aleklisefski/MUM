<?php
	/*
	Template Name: SiteMap
	*/

	get_header();
	
	$exclude = array(
		'posts_per_page'   => 999,
		'post_type' => array( 'post','page'),
		'meta_key' => 'exclude_from_sitemap',
	  	'meta_compare' => '==',
	  	'meta_value' => 'Yes'
	); 
	$excludePages = get_posts($exclude);
	if ($excludePages) {
		$excludeIDs = array();
		foreach ($excludePages as $page) {
			$excludeIDs[]= $page->ID;
		};
	}	
	$excluded = implode(",", $excludeIDs);
	
	$sitemap = array (
		'depth'        => 3,
		'echo'         => 1,
		'exclude'      => $excluded,
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'sort_column'  => 'menu_order, post_title',
		'title_li'     => __('')
	);
	
	$blog = array(
		'orderby'                  => 'name',
		'order'                    => 'ASC',
		'hide_empty'               => 1,
		'hierarchical'             => 1,
		'exclude'                  => '45,26,6,21,1',
	); 
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<section id="page-header" class="tan">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<article class="full">
			<?php include (TEMPLATEPATH . '/inc/cta.php'); ?>
			<h1><?php if( $display_heading != null ) { echo $display_heading; } else { the_title(); }?></h1>
			<?php include (TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
		</article>
 	</div>
</section>

<section class="body portal">
 	<div class="container">	
 		<article class="full">
			<!-- The Content -->
 			<?php the_content(''); ?> 
 			
 			<div class="col half">
 				<div class="sitemap">
 					<?php wp_list_pages( $sitemap ); ?> 
 				</div>
 			</div>
 			<div class="col half last">
 				<div class="sitemap">
 					<ul>
 						<li><a href="/whats-happening/blog">Blog</a>
		 					<ul>
		 					<?php
				            $cats = get_categories( $blog );
				 
			                foreach ($cats as $cat) {
			                    $cat_id = $cat->term_id;
			                    $cat_link = get_category_link( $cat_id );
			                    
		                    	echo "<li><a href='".$cat_link."'>".$cat->name."</a>";
			                    
			                    query_posts("cat=$cat_id&posts_per_page=25");
			 					echo "<ul>";
			                    if (have_posts()) : while (have_posts()) : the_post(); ?>
			 
			                        <li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
			 
			                    <?php endwhile; endif; wp_reset_query(); echo "</li>" ?>
			                <?php echo "</ul>"; } ?>
			                </ul>
		                </li>
	                </ul>
 				</div>
 			</div>
 			
  		</article>
 	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>