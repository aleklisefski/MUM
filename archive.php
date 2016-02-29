<?php
	get_header();
?>

<?php
	$template_url = get_bloginfo('template_url');
	$display_heading = get_field('display_heading');
?>

<section id="page-header" class="tan">
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
	 			<a href="/whats-happening/mum-blogs/subscribe/">Subscribe via Email</a><?php if( is_category() ) { ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo $_SERVER["REQUEST_URI"] ?>feed/">RSS Feed</a><?php } ?>
	 		</div>
			<h1>MUM Blogs</h1>
			<div id="breadcrumbs">
				<a class="home" href="/">Home</a>|<a href="/whats-happening">What's Happening</a>|<a href="/whats-happening/blogs">Blogs</a>
			</div>	
		</article>
 	</div>
</section>

<?php
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); 

	$post = $posts[0]; // Hack. Set $post so that the_date() works. 
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$wp_query->query_vars["paged"] = $paged;
	$wp_query->query_vars["nopaging"] = 0;
	$wp_query->get_posts();
?>

<section class="body">
 	<div class="container">	
 		<aside>
			<p>&nbsp;</p>
			<div class="clearFix"></div>
 		</aside>
 		<article>
 			<?php if (have_posts() ) { ?>
 		
	 			<?php /* If this is a category archive */ if (is_category()) { ?>
					<div class="blog-header category"><span class="page"><?php if( is_paged() ) { echo 'Page '.$paged.''; } ?></span><strong><?php single_cat_title(); ?></strong></div>
				<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
					<div class="blog-header tag"><span class="page"><?php if( is_paged() ) { echo 'Page '.$paged.''; } ?></span><strong><?php single_tag_title(); ?></strong></div>
				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
					<div class="blog-header author"><span class="page"><?php if( is_paged() ) { echo 'Page '.$paged.''; } ?></span><strong><?php echo $curauth->display_name; ?></strong></div>
				<?php } ?>
 			
 			
			<?php while (have_posts()) : the_post(); ?>
			<?php
				$video = get_field('video_embed_code');
				$author = get_the_author();
				$author_URL = get_author_posts_url( get_the_author_meta( 'ID' ) ); 
				$featuredImage = get_the_post_thumbnail($page->ID, 'Slide / Blog Featured');
				
				$myExcerpt = get_the_excerpt();
				$finalExcerpt = preg_replace('/<h([1-6])(.*?)<\/h([1-6])>/si', '<p class="heading-$1"$2</p>', $myExcerpt);
			?>
			
			<div class="post">
 				<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
 				<div class="post-info tan">
	 				<div class="image">
	 					<?php echo $featuredImage ?>
	 					<?php if( have_rows('content_types') ): ?>
						<?php while ( have_rows('content_types') ) : the_row(); ?>	
							<!-- If Video -->
		 					<?php if( get_row_layout() == 'full-size_video' || get_row_layout() == 'video_pop-up' ): ?>
	 							<a class="button green" href="<?php the_permalink() ?>"><span>Video Post</span></a>
							<?php endif; ?>			
						<?php endwhile; ?>
						<?php endif; ?>	
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
 				<?php echo $finalExcerpt; ?>
 				<p class="margin-top-20"><a class="button" href="<?php the_permalink() ?>">Continue Reading</a></p>
 			</div>
		
			<?php wp_reset_postdata(); endwhile; ?>	
			
			<div class="pagination tan">
 				<?php wp_pagenavi(); ?>
 				<div class="clearFix"></div>
 			</div>	
 			
 			<?php } else { ?>
	
 			<h2>Oops!</h2> 
 			<p>This category is empty.</p>
			 		
	 		<?php } ?> 	
		
 		</article>
 	</div>
</section>

<?php get_footer(); ?>