<?php
	/*
	Template Name: Top-Level Nav
	*/

	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$template_url = get_bloginfo('template_url');
	$display_heading = get_field('display_heading');
	$menu = get_field('select_nav_item');
?>

<section class="menu gray">
	<div class="heading tan">
		<div class="container">
			<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
			<h1><?php if( $display_heading != null ) { echo $display_heading; } else { the_title(); }?></h1>
		</div>
	</div>
	<?php if ( $menu ) :

		$post = $menu;
		setup_postdata( $post ); 
		 
		$ID = get_field('nav_id');
		$subheading = get_field('subheading');
		$column1 = get_field('column_1');
		$column2 = get_field('column_2');
		$column3 = get_field('column_3');
		$column4 = get_field('column_4_nav');
		$cirlce = get_field('column_4_circle');
		$title = get_the_title();
	?>
	<div class="container">
		<div class="grid fourths">
		
			<?php if ( $column1 ) { ?>
			<div class="item">
				<ul>
					<?php wp_nav_menu( array('menu' => $column1, 'depth' => 0, 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</div>
			<?php } ?>
			
			<?php if ( $column2 ) { ?>
			<div class="item">
				<ul>
					<?php wp_nav_menu( array('menu' => $column2, 'depth' => 0, 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</div>
			<?php } ?>
			
			<?php if ( $column3 ) { ?>
			<div class="item">
				<ul>
					<?php wp_nav_menu( array('menu' => $column3, 'depth' => 0, 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</div>
			<?php } ?>
			
			<?php if ( $column4 && empty($circle) ) { ?>
			<div class="item fourth">
				<ul>
					<?php wp_nav_menu( array('menu' => $column4, 'depth' => 0, 'items_wrap' => '%3$s' ) ); ?>
				</ul>
			</div>
			<?php } ?>
			
			<?php if ( empty($column4) && have_rows('column_4_circle') ) : while( have_rows('column_4_circle') ) : the_row(); ?>
			<?php 
	        	$image = get_sub_field('image');
	        	$heading = get_sub_field('title');
	        	$text = get_sub_field('text');
	        	$button_text = get_sub_field('button_text');
	        	$button_link = get_sub_field('button_link');
	        	
	        	if( !empty($image) ) {
					$url = $image['url'];
					$alt = $image['alt'];
					$size = 'Circle / Headshot';
					$thumb = $image['sizes'][ $size ];
					$width = $image['sizes'][ $size . '-width' ];
					$height = $image['sizes'][ $size . '-height' ];
				};
	        ?>
 			<?php if( $heading ) { ?>
 			<div class="item fourth circle">
 				<div class="image">
						<img class="border" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
 					<label>
 						<img src="<?php echo $template_url; ?>/media/bg_label-circle.png" alt="" />
 						<span><?php echo $heading; ?></span>
 					</label>
 				</div>
				<p><?php echo $text; ?></p>
				<a class="button" href="<?php echo $button_link; ?>"><?php if( $button_text ) { echo $button_text; } else { echo 'Learn More'; } ?></a>
				<?php } ?>
 			</div>
 			<?php endwhile; wp_reset_postdata(); endif; ?>
 			<div class="clearFix"></div>
		</div>
	</div>
	<?php wp_reset_postdata(); endif; ?>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>