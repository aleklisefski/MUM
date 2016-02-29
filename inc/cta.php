<?php  
	$cta = get_field('cta');
	
	if ( is_tax( 'video_category' ) ) { 
		$cta = get_field('cta', 1418);
	};
?>	
<?php if( $cta ) { ?>
<?php foreach( $cta as $post_object): ?>
	<?php 
		$cta_image = get_field('image', $post_object->ID);
		$link_text = get_field('link_text', $post_object->ID);
		$link_url = get_field('link_url', $post_object->ID);
		$title = get_the_title($post_object->ID);
		
		if( !empty($cta_image) ) {
			$url = $cta_image['url'];
			$alt = $cta_image['alt'];
			$size = 'CTA small circle';
			$thumb60 = $cta_image['sizes'][ $size ];
			$width = $cta_image['sizes'][ $size . '-width' ];
			$height = $cta_image['sizes'][ $size . '-height' ];
		};
	?>
	<div class="cta">
		<div class="image">
			<a href="<?php echo $link_url; ?>"><img src="<?php echo $thumb60; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" /></a>
		</div>
		<h5><?php echo $title; ?></h5>
		<a href="<?php echo $link_url; ?>"><?php echo $link_text; ?></a>
	</div>
<?php endforeach; wp_reset_postdata(); ?>
<?php } ?>
