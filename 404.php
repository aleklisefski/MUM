<?php
	get_header();
	$template_url = get_bloginfo('template_url');
	
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

<section id="page-header" class="tan">
 	<div class="container">	
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<aside>
			<?php include (TEMPLATEPATH . '/inc/subnav.php'); ?>
		</aside>
		<article>
			<h1>404 Error - with a side order of ice cream</h1>
			<div id="breadcrumbs">
				<a class="home" href="<?php echo home_url(); ?>">Home</a>|<a class="post post-page" href="#" title="404">404 Error</a>
			</div>
		</article>
 	</div>
</section>

<section class="body landing application">
 	<div class="container">	
 		<aside>
 			<p>&nbsp;</p>
			<div class="clearFix"></div>
 		</aside>
 		<article>
			<div class="block side right" style="padding-bottom: 0; margin-bottom: 0">
				<img style="display: block; margin: 0;" src="/wp-content/themes/MUM/media/404-ice-cream.jpg" alt="ice cream with your 404" />
			</div>
 			<h2 class="margin-top-none">Whoops! We got you lost somehow.</h2>
 			<p><strong>The page you are trying to view no longer exists, or may have been moved.</strong> Please try one of the following to find what you are looking for:</p>
			<ul>
				<li>The main navigation above or to the left.</li>
				<li>The search tool in the upper-right.</li>
				<li>The complete site map below.</li>
			</ul>
				
		</article>
 		<article class="full">
 		<hr style="margin-top: 0" />
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
			
			<div class="clearFix"></div>	
		</article>
 	</div>
</section>

<?php get_footer(); ?>