<?php 
	$template_url = get_bloginfo('template_url'); 
	
	$menus = new WP_Query(array(
		'post_type' => 'menus',
		'posts_per_page' => 5,
		'orderby' => 'menu_order',
		'order' => 'ASC'
		)
	);	
?>	


<section class="header mobile">
	<div class="container">
		<a id="nav-open" href="#"><span class="icon"></span><span class="not-mobile">Navigation</span></a>
		<a id="nav-close" href="#"><span class="icon"></span><span class="not-mobile">Close</span></a>
		<a href="<?php echo home_url(); ?>">
			<span class="logo mobile"></span>
			<span class="name"><strong>Maharishi University</strong>of Management</span>
		</a>
	</div>
</section>

<?php if ( $menus->have_posts() ) : ?>
<section id="nav" class="tan dropDown mobile">
	<div class="container">
		<ul>
			<?php while ( $menus->have_posts() ) : $menus->the_post(); 
				$ID = get_field('nav_id');
				$subheading = get_field('subheading');
				$subheading = preg_replace("#<br>#", "", $subheading);
				$column1 = get_field('column_1');
				$column2 = get_field('column_2');
				$column3 = get_field('column_3');
				$column4 = get_field('column_4_nav');
				$cirlce = get_field('column_4_circle');
				$title = get_the_title();
			?>
			<li>
				<a href="#mobile-<?php echo $post->ID ?>" class="top">
					<?php the_title(); ?>
					<span><?php echo $subheading; ?></span>
				</a>	
				<ul class="blue border-left" id="mobile-<?php echo $post->ID ?>">
					<span class="arrow"></span>
					<a class="close" href="#"></a>
					<?php if ( $column1 ) { ?>
						<?php wp_nav_menu( array('menu' => $column1, 'depth' => 1, 'items_wrap' => '%3$s' ) ); ?>
					<?php } ?>
					
					<?php if ( $column2 ) { ?>
						<?php wp_nav_menu( array('menu' => $column2, 'depth' => 1, 'items_wrap' => '%3$s' ) ); ?>
					<?php } ?>
					
					<?php if ( $column3 ) { ?>
						<?php wp_nav_menu( array('menu' => $column3, 'depth' => 1, 'items_wrap' => '%3$s' ) ); ?>
					<?php } ?>
					
					<?php if ( $column4 && empty($circle) ) { ?>
						<?php wp_nav_menu( array('menu' => $column4, 'depth' => 1, 'items_wrap' => '%3$s' ) ); ?>
					<?php } ?>
				</ul>
				<div class="clearFix"></div>
			</li> 
			<?php endwhile; wp_reset_postdata(); ?>  
			
			<li class="last">
				<a href="#mobile-5928" class="top">Current Students & More<span>Current Students, MUM Online, etc.</span></a>	
				<ul class="blue border-left" id="mobile-5928">
					<span class="arrow"></span>
					<a class="close" href="#"></a>
					<li><a href="http://portals.mum.edu/RelId/606502/ISvars/default/Current_Students.htm">Current Students</a></li>
					<li><a href="https://www.mum.edu/mum-online">MUM Online</a></li>
					<li><a href="http://portals.mum.edu/RelId/606499/ISvars/default/Campus_Services.htm">Campus Services</a></li>
					<li><a href="http://portals.mum.edu/default.aspx?relid=640312">Faculty & Staff</a></li>
					<li><a href="http://portals.mum.edu/RelId/606508/ISvars/default/Alumni.htm">Alumni</a></li>
					<li><a href="http://portals.mum.edu/RelId/606511/ISvars/default/Trustees.htm">Trustees</a></li>
					<li><a href="http://portals.mum.edu/RelId/606517/ISvars/default/Giving.htm">Giving</a></li>
					<li class="last"><a href="http://portals.mum.edu/default.aspx?relid=692170">MyMUM - Login</a></li>	
				</ul>
				<div class="clearFix"></div>
			</li>       
		</ul>
	</div>
</section>
<?php endif; ?>