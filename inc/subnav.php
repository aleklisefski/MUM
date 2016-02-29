<?php
	$display_heading = get_field('display_heading');
	$include_vw_graphic = get_field('include_visitors_weekend_sidebar_graphic');
	$children = get_pages('child_of='.$post->ID);
	$childCount = count($children);
	$parent = array_reverse(get_post_ancestors($post->ID));
	$parentCount = count($parent);
	$display_blogletter_signup = get_field('display_blogletter_signup');

	if ( is_search() || is_404() || is_page( array('Contact Form Confirmation','Contact Form Confirmation - International',14075,14077,14080) ) || is_page_template( 'page-thank-you.php' ) ) { 
		$top_parent_name = 'Home';
		$top_parent_link = home_url();	
	} elseif ( tribe_is_month() || tribe_is_upcoming() || tribe_is_event() || is_singular( 'tribe_events') ) { 
		$top_parent_name = "Home";
		$top_parent_link = home_url();
		$second_parent = get_post(4132);
		$second_parent_id = 4132;
		$second_parent_name = $second_parent->post_title;
		$second_parent_link = get_permalink($second_parent);
	} elseif ( $parentCount > 1 ) { 
		$top_parent = get_page($parent[0]);
		$top_parent_id = $parent[0];
		$top_parent_name = $top_parent->post_title;
		$top_parent_link = get_permalink($top_parent);	
		$second_parent = get_page($parent[1]);
		$second_parent_id = $parent[1];
		$second_parent_name = $second_parent->post_title;
		$second_parent_link = get_permalink($second_parent);
	} elseif ( $parentCount > 0 ) { 
		$top_parent = get_page($parent[0]);
		$top_parent_id = $parent[0];
		$top_parent_name = $top_parent->post_title;
		$top_parent_link = get_permalink($top_parent);
		if ( $parentCount > 0 && $childCount != 0 ) { 
			$second_parent = get_post($post);
			$second_parent_id = get_the_ID();
			$second_parent_name = $second_parent->post_title;
			$second_parent_link = get_permalink($second_parent);	
		} else {
			$second_parent = $top_parent;
			$second_parent_id = $top_parent_id;
			$second_parent_name = $top_parent_name;
			$second_parent_link = get_permalink($second_parent);	
		};
	} else {		
		$top_parent_name = 'Home';
		$top_parent_link = home_url();
		$second_parent = get_post($post);
		$second_parent_id = get_the_ID();
		$second_parent_name = $second_parent->post_title;	
		$second_parent_link = get_permalink($second_parent);
	};
	
	$exclude = array(
		'posts_per_page'   => 999,
		'post_type' => 'page',
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
	
	$home = array(
		'authors'      => '',
		'child_of'     => 0,
		'date_format'  => get_option('date_format'),
		'depth'        => 2,
		'echo'         => 1,
		'exclude'      => $excluded,
		'include'      => '',
		'link_after'   => '',
		'link_before'  => '',
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'show_date'    => '',
		'sort_column'  => 'menu_order, post_title',
		'title_li'     => __(''), 
		'walker'       => ''
	);
	
	$children = array(
		'authors'      => '',
		'child_of'     => $second_parent_id,
		'date_format'  => get_option('date_format'),
		'depth'        => 2,
		'echo'         => 1,
		'exclude'      => $excluded,
		'include'      => '',
		'link_after'   => '',
		'link_before'  => '',
		'post_type'    => 'page',
		'post_status'  => 'publish',
		'show_date'    => '',
		'sort_column'  => 'menu_order, post_title',
		'title_li'     => __(''), 
		'walker'       => ''
	);
	
	
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
	
	$categories = array(
	  'taxonomy'     => 'category',
	  'orderby'      => 'name',
	  'exclude'   	 => array(1,45),
	  'hide_empty'   => 0,
	  'show_count'   => 0,
	  'pad_counts'   => 0,
	  'hierarchical' => 1,
	  'depth'        => 2,
	  'title_li'     => __('')
	);
?>
<?php if ( is_search() || is_404() || is_page( array('Contact Form Confirmation','Contact Form Confirmation - International',14075,14077,14080) ) ) {  ?> 
	<a class="button back" href="<?php home_url(); ?>">Home</a>
<div id="subnav">
	<a id="sub-open" href="#"><span class="icon"></span></a>
	
	<label><a id="sub-close" class="close" href="#"></a><a href="<?php home_url(); ?>">MUM.edu</a></label>
	<ul>
		<?php wp_list_pages( $home ); ?> 
	</ul>
</div>
<?php } // if Video Cafe
elseif ( is_page('video-cafe') || is_post_type_archive('videos') ) { ?> 
<a class="button back" href="/about-mum">About MUM</a>
<div id="subnav">
	<a id="sub-open" href="#"><span class="icon"></span></a>
	
	<label><a id="sub-close" class="close" href="#"></a><a href="<?php echo $second_parent_link; ?>">Video Showcase</a></label>
	<ul>
		<?php wp_list_categories( $videoCats ); ?> 
	</ul>
</div>
<?php } // if Blog
elseif ( is_page(3673) || is_archive() || is_singular( 'post') || is_page_template( 'page-blog-subscribe.php' ) ) { ?> 
<a class="button back" href="/whats-happening">What's Happening</a>
<div id="subnav">
	<a id="sub-open" href="#"><span class="icon"></span></a>
	<label><a id="sub-close" class="close" href="#"></a>Blog Categories</label>
	<ul>
		<?php wp_list_categories( $categories ); ?> 
		<li><a href="/whats-happening/mum-blogs/subscribe/">Subscribe</a></li>
	</ul>
	<?php if( !is_page_template('page-blog-subscribe.php') ) { ?><?php include (TEMPLATEPATH . '/inc/subscribe.php'); ?><?php } ?>
</div>
<?php } // Anything else
else { ?> 
<a class="button back" href="<?php echo $top_parent_link; ?>"><?php echo $top_parent_name; ?></a>
<div id="subnav">
	<a id="sub-open" href="#"><span class="icon"></span></a>
	<label><a id="sub-close" class="close" href="#"></a><a href="<?php echo $second_parent_link; ?>"><?php echo $second_parent_name; ?></a></label>
	<ul>
		<?php wp_list_pages( $children ); ?> 
	</ul>
	<?php if( is_page_template('page-news.php') ) { include (TEMPLATEPATH . '/inc/subscribe.php'); } ?>
	<?php if( is_page_template('page-department_NEW-download.php') AND $display_blogletter_signup == "Yes" ) { include (TEMPLATEPATH . '/inc/subscribe.php'); } ?>
	
	<?php if( $include_vw_graphic == "Yes" && !is_page_template( 'page-department.php' ) ) { ?>
		<div class="visitors-weekend blue border-bottom">
			<img src="<?php echo $template_url; ?>/media/visitors-weekend-sidebar.jpg" alt="happy students" />
			<div>
				<h3>Experience MUM</h3>
				<p>Join our visitors weekend and open up a new world of possibilities</p>
				<a class="button green" href="/admissions/visitors-weekends/"><span>Visit<br>Us</span></a>
			</div>
		</div>
	<?php } ?>
</div>
<?php } ?> 

