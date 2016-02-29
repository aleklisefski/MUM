<?php
	/*
	Template Name: Search Results
	*/

	get_header();
	
	$template_url = get_bloginfo('template_url');

	$post = $posts[0]; // Hack. Set $post so that the_date() works.
	wp_reset_query(); 
	wp_reset_postdata();
	
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
	 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$wp_query->query_vars["paged"] = $paged;
	$wp_query->query_vars["nopaging"] = 0;
	$wp_query->query_vars["posts_per_page"] = 99;
	$wp_query->query_vars["post_type"] = array( 'post','page');
	$wp_query->query_vars["exclude"] = $excluded;
	$wp_query->get_posts();
?>

<section id="page-header" class="tan">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<article class="full">
			<?php include (TEMPLATEPATH . '/inc/cta.php'); ?>
			<h1>Search Results</h1>
			<?php include (TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
		</article>
 	</div>
</section>

<?php if (have_posts()) { ?>

<section class="body portal">
 	<div class="container">	
 		<article class="full">
 			<div class="blog-header search"><span class="page"><?php if( is_paged() ) { echo 'Page '.$paged.''; } ?></span>You searched for <strong><?php the_search_query(); ?></strong></div>
			<?php while (have_posts()) : the_post();
				$myExcerpt = strip_tags(get_the_excerpt());
			?>
				<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
				<?php echo substr($myExcerpt, 0,350); ?>...
				<hr/>
			<?php endwhile; ?>

			
 		</article>
 	</div>
</section>

<?php } else { ?>

<section class="body portal">
 	<div class="container">	
 		<article class="full">
 			<h2 class="center">Nothing Found</h2>
 			<div class="notice">Your search for "<?php the_search_query(); ?>" did not match any pages or posts on this site. Please try another search term.</div>
 		</article>
 	</div>
</section>

<?php } ?>

<?php get_footer(); ?>