<?php 
	if( is_single() ) { 
		$category = get_the_category($post_id);
		$cat_title = $category[0]->cat_name;
		$cat_ID = $category[0]->cat_ID;
		$form_code = get_field('subscription_form_code', 'category_'. $cat_ID .'');
	} else if( is_page_template('page-department_NEW-download.php') ) {
		$category = get_field('news_category');
		$cat_title = get_cat_name( $category );
		$landing_form_code = get_field('subscription_form_code', 'category_'. $category .'');
	} else {
		$form_code = get_field('subscription_form_code', 'category_'. the_category_ID( $echo ) .'');
		$form_code_department = get_field('subscription_form_code', 'category_'. $cat_id .'');
	}
	
?>

<?php if( is_archive() AND !empty($form_code) ) { ?>
	<div class="blue border-top subscribe" id="subscribe">
		<h4>Subscribe to <?php single_cat_title(); ?></h4>
		<?php echo $form_code; ?>
	</div>
<?php } elseif( is_single() AND !empty($form_code) ) { ?>
	<div class="blue border-top subscribe" id="subscribe">
		<h4>Subscribe to <?php echo $cat_title; ?></h4>
		<?php echo $form_code; ?>
	</div>
<?php } elseif( is_page_template('page-department_NEW-download.php') ) { ?>
	<div class="blue border-top subscribe" id="subscribe">
		<h4>Subscribe to <?php echo $cat_title; ?></h4>
		<?php echo $landing_form_code; ?>
	</div>
<?php } elseif( !empty($form_code_department) ) { ?>
	<div class="blue border-top subscribe" id="subscribe">
		<h4>Subscribe to <?php echo $cat_title; ?></h4>
		<?php echo $form_code_department; ?>
	</div>
<?php } else { ?>
	<div class="blue border-top subscribe" id="subscribe">
		<h4>Subscribe via Email</h4>
		<a class="button" href="/whats-happening/blogs/subscribe/">Sign me up</a>
	</div>
<?php } ?>


