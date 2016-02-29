<?php
	/*
	Template Name: Application Payment Result
	*/

// Added by Ron 9/16/2015 to prevent someone coming to the payment result page by some way other than making a payment.
// Besides other problems, it skews the google analytics count of application payments.
// The payment page uses javascript validation. This is added to prevent users coming to this page directly.
if (
$_POST["x_amount"]      == '' ||
$_POST["x_application_id"] == '' ||
$_POST["x_description"] == '' ||
$_POST["x_invoice_num"] == '' ||
$_POST["x_date_submit"] == '' ||
$_POST["x_First_Name"]  == '' ||
$_POST["x_Last_Name"]   == '' ||
$_POST["x_address"]     == '' ||
$_POST["x_zip"]         == ''
) {
	// Redirect and exit
	header("location: https://www.mum.edu/payment_result_invalid_onload");
	exit();
}

	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$template_url = get_bloginfo('template_url');
	$display_heading = get_field('display_heading');
	$pre_content = get_field('pre-body_content');
	$pre_style = get_field('pre-body_style');
?>

<section id="page-header" class="tan">
 	<div class="container">
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<article class="full">
			<?php include (TEMPLATEPATH . '/inc/cta.php'); ?>
			<h1><?php if( $display_heading != null ) { echo $display_heading; } else { the_title(); }?></h1>
			<?php include (TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
		</article>
 	</div>
</section>

<section class="body">
 	<div class="container">
 		<article class="full">

 			<?php the_content(''); ?>
 			<?php include (TEMPLATEPATH . '/inc/flexible-content.php'); ?>
			
 			<?php $_POST["checklist_message"] = preg_replace("/\%22/", "", $_POST["checklist_message"]); ?>
			<div class="call-out simple">
				<h4>Thank you for submitting the $<?php echo $_POST["x_amount"]?> application fee for Application ID #: <?php echo $_POST["x_application_id"]?>.</h4>
				<p>You will need this Application ID number to complete the application process. The receipt of your payment is below.</p>
			</div>
			<p>Your admissions counselor will contact you soon regarding official transcripts and the steps needed to complete the application process.</p>
			<?php echo $_POST["checklist_message"]?>
			<p>If you have any questions, please feel free to contact us.</p>
			<div class="grid half">
				<div class="item">
					<h4>Phone</h4>
					800-369-6480 (from within USA only) or <br>
					1-641-472-1110 (all other calls)
				</div>
				<div class="item second">
					<h4>Email</h4>
					<a href="mailto:admissions@mum.edu?subject=Application%20Fee">admissions@mum.edu</a>
				</div>
				<div class="clearFix"></div>
			</div>
			
			<h2 class="border-top">Receipt for Payment</h2>
			<p>Received From:<br />
			<?php echo $_POST["x_First_Name"]?> <?php echo $_POST["x_Last_Name"]?><br />
			<?php echo $_POST["x_address"]?><br />
			<?php echo $_POST["x_zip"]?><br />
			</p>
			<p>Description: <?php echo $_POST["x_description"]?><br />
			Amount: $<?php echo $_POST["x_amount"]?><br />
			Invoice #: <?php echo $_POST["x_invoice_num"]?><br />
			Payment Method: Credit Card <br />
			Transaction Date: <?php echo $_POST["x_date_submit"]?></p>

 		</article>
 	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>