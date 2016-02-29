<?php 
	$preset = get_field('sidebar_presets');
	$same_as_parent_page = get_field('same_as_parent_page');
	
	if($same_as_parent_page == 'Yes') { 
		$parent = $post->post_parent; 
	} else {
		$parent = $post->ID; 
	}

	if( $preset ) { 
        $post = $preset;
		$parent = $post->ID; 
		setup_postdata( $post ); 
		include (TEMPLATEPATH . '/inc/sidebar-content.php'); 
		wp_reset_postdata();
	} else {
		include (TEMPLATEPATH . '/inc/sidebar-content.php'); 
	} 
?>	


