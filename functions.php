<?php

####################################################################
### Enqueue jQuery
####################################################################

function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
    wp_enqueue_script( 'jquery' );
}    

add_action('wp_enqueue_scripts', 'my_scripts_method');


####################################################################
### Stop WP from guessing at URLs instead of 404
####################################################################

#add_filter('redirect_canonical', 'no_redirect_on_404');
#function no_redirect_on_404($redirect_url)
#{
#    if (is_404()) {
#        return false;
#    }
#    return $redirect_url;
#}

####################################################################
### Change Default Search URL
####################################################################

function fb_change_search_url_rewrite() {
	if ( is_search() && ! empty( $_GET['s'] ) ) {
		wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
		exit();
	}	
}
add_action( 'template_redirect', 'fb_change_search_url_rewrite' );

####################################################################
### Displays Thumbnails
####################################################################

if(function_exists('add_theme_support')){
	add_theme_support( 'post-thumbnails', array( 'post', 'page', 'tribe_events' ) );

	/* Home Slideshow */
	add_image_size('Home Slideshow', 1200, 550, TRUE);
	
	/* Home Grid */
	add_image_size('Home Grid', 400, 280, TRUE);
	
	/* Slide / Blog Featured */
	add_image_size('Slide / Blog Featured', 650, 350, TRUE);
	
	/* Large Video / Landing Image */
	add_image_size('Video Large', 410, 270, TRUE);
	
	/* Boxes / Video Cafe */
	add_image_size('Box / Video', 300, 175, TRUE);
	
	/* 2 Col Box */
	add_image_size('2 Col Box', 450, 263, TRUE);
	
	/* Circle/Headshot */
	add_image_size('Circle / Headshot', 300, 300, TRUE);
	
	/* Alumni/Faculty Thumbnail */
	add_image_size('Alumni/Faculty Thumbnail', 200, 200, TRUE);
	
	/* Photo Gallery Thumbnail */
	add_image_size('Photo Gallery Thumbnail', 220, 220, TRUE);
	
	/* CTA small circle*/
	add_image_size('CTA small circle', 60, 60, TRUE);
	
	/* CTA large*/
	add_image_size('CTA large', 80, 80, TRUE);
	
	/* Sidebar Box */
	add_image_size('Sidebar Box', 280);
	
	/* List Image */
	add_image_size('List Image', 300);
	
	/* Standard Thumbnail */
	update_option('thumbnail_size', 200, 200, TRUE);
	
	/* RSS Feed */
	add_image_size('Blog RSS Feed', 350);
	
}


####################################################################
### Add "parent" class to subnav top level
####################################################################

function add_parent_class( $css_class, $page, $depth, $args )
{
    if ( ! empty( $args['has_children'] ) )
        $css_class[] = 'parent';
    return $css_class;
}
add_filter( 'page_css_class', 'add_parent_class', 10, 4 );

####################################################################
### Add Styles menu to WYSIWYG editor
####################################################################

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	/**
	 * Add in a core button that's disabled by default
	 */
	$buttons[] = 'superscript';
	$buttons[] = 'subscript';
	
	array_unshift( $buttons, 'styleselect' );

	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');


// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'H2 border-top',  
			'block' => 'h2',  
			'classes' => 'border-top',
			'wrapper' => false,
			
		),
		array(  
			'title' => 'H3 border-top',  
			'block' => 'h3',  
			'classes' => 'border-top',
			'wrapper' => false,
			
		) 
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  

function my_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );



####################################################################
### Add Blog author contact methods
####################################################################

function my_new_contactmethods( $contactmethods ) {
// Add Twitter
$contactmethods['twitter'] = 'Twitter';
$contactmethods['facebook'] = 'Facebook';
$contactmethods['linkedin'] = 'LinkedIn';

return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);


####################################################################
// Gravity Forms scroll to error on page reload
####################################################################

add_filter( 'gform_confirmation_anchor', '__return_true' );


####################################################################
### Stop stripping html attributes
####################################################################

    /** 
     * Add to extended_valid_elements for TinyMCE 
     * 
     * @param $init assoc. array of TinyMCE options 
     * @return $init the changed assoc. array 
     */  
    function change_mce_options( $init ) {  
     //code that adds additional attributes to the pre tag  
     $ext = 'pre[id|name|class|style]';  
      
     //if extended_valid_elements alreay exists, add to it  
     //otherwise, set the extended_valid_elements to $ext  
     if ( isset( $init['extended_valid_elements'] ) ) {  
      $init['extended_valid_elements'] .= ',' . $ext;  
     } else {  
      $init['extended_valid_elements'] = $ext;  
     }  
      
     //important: return $init!  
     return $init;  
    }  
    add_filter('tiny_mce_before_init', 'change_mce_options');  


/******************************************************************************
* @Author: Boutros AbiChedid
* @Date:   June 20, 2011
* @Websites: http://bacsoftwareconsulting.com/ ; http://blueoliveonline.com/
* @Description: Preserves HTML formating to the automatically generated Excerpt.
* Also Code modifies the default excerpt_length and excerpt_more filters.
* @Tested: Up to WordPress version 3.1.3
*******************************************************************************/
function custom_wp_trim_excerpt($text) {
$raw_excerpt = $text;
if ( '' == $text ) {
    //Retrieve the post content.
    $text = get_the_content('');
 
    //Delete all shortcode tags from the content.
    $text = strip_shortcodes( $text );
 
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
     
    $allowed_tags = '<p>,<br>,<a>,<h2>,<h3>,<h4>,<ul>,<li>'; /*** MODIFY THIS. Add the allowed HTML tags separated by a comma.***/
    $text = strip_tags($text, $allowed_tags);
     
    $excerpt_word_count = 90; /*** MODIFY THIS. change the excerpt word count to any integer you like.***/
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
     
    $excerpt_end = '[...]'; /*** MODIFY THIS. change the excerpt endind to something else.***/
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
     
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
}
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');


function truncate($string, $max = 100, $replacement = '')
{
    if (strlen($string) <= $max)
    {
        return $string;
    }
    $leave = $max - strlen ($replacement);
    return substr_replace($string, $replacement, $leave);
}

function trunc_excerpt(){
	$excerpt = get_the_content();
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$the_str = substr($excerpt, 0, 20);
	return $the_str;
}

if ( function_exists('register_sidebar') )
    register_sidebar();

// Get URL of first image in a post
function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];
	
	// no image found display default image instead
	if(empty($first_img)){
	$first_img = "http://kapost.com/images/default.jpg";
}
return $first_img;
}
    
/*
Plugin Name: Better wpautop 
Plugin URI: http://www.simonbattersby.com/blog/plugin-to-stop-wordpress-adding-br-tags/
Description: Amend the wpautop filter to stop wordpress doing its own thing
Version: 1.0
Author: Simon Battersby
Author URI: http://www.simonbattersby.com
*/

function better_wpautop($pee){
return wpautop($pee,$br=1);
}

remove_filter('the_content','wpautop');
add_filter('the_content','better_wpautop');

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function disqus_embed($disqus_shortname) {
    global $post;
    wp_enqueue_script('disqus_embed','http://'.$disqus_shortname.'.disqus.com/embed.js');
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = "'.$disqus_shortname.'";
        var disqus_title = "'.$post->post_title.'";
        var disqus_url = "'.get_permalink($post->ID).'";
        var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
    </script>';
}

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


?>