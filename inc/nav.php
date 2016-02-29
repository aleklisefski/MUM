<?php 
	$template_url = get_bloginfo('template_url'); 	
?>	

<?php if ( $menus->have_posts() ) : $count = 1; ?>
<nav class="desktop">
	<div class="container">
		<ul>
			<?php while ( $menus->have_posts() ) : $menus->the_post(); 
				$ID = get_field('nav_id');
				$subheading = get_field('subheading');
			?>
			<li class="top <?php if( $count == 5 ) { echo 'last'; } ?>">
				<a href="#<?php echo $ID ?>">
					<?php the_title(); ?>
					<span><?php echo $subheading; ?></span>
				</a>		
			</li> 
			<?php $count++; endwhile; wp_reset_postdata(); ?>
 			<div class="clearFix"></div>
		</ul>
		<div class="clearFix"></div>
	</div>
</nav>

<section id="nav" class="dropDown desktop">
	<?php while ( $menus->have_posts() ) : $menus->the_post(); 
		$ID = get_field('nav_id');
		$subheading = get_field('subheading');
		$column1 = get_field('column_1');
		$column2 = get_field('column_2');
		$column3 = get_field('column_3');
		$column4 = get_field('column_4_nav');
		$cirlce = get_field('column_4_circle');
		$title = get_the_title();
	?>
	<section id="<?php echo $ID ?>" class="gray">
		<div class="heading tan">
			<div class="container">
				<a class="close" href="#"></a>
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
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
 				<?php if( !empty($button_link) ) { ?><a class="button" href="<?php echo $button_link; ?>"><?php if( $button_text ) { echo $button_text; } else { echo 'Learn More'; } ?></a><?php } ?>
 				<?php } ?>
	 			</div>
	 			<?php endwhile; wp_reset_postdata(); endif; ?>
	 			<div class="clearFix"></div>
			</div>
		</div>
	</section>
	<?php endwhile; wp_reset_postdata(); ?>
</section>
<?php endif; ?>