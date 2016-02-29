<?php
	/*
	Template Name: Application Payment Form
	*/

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

<?php

$_POST["word_has_had"] = 'has';

// This implements a user returning to the application payment page via a link received in email.
//URL:
//https://www.mum.edu/application-payment/?AppID=[application_id][testmode_qs_append]

if ($_GET['AppID']) {

	if (! preg_match("/^[A-Z][A-Z]?\-\d{5}$/", $_GET['AppID']) ) {
		echo <<<ENDOFECHO
		<div class="call-out">
			<!-- TODO TODO at Pair Temporary during development -->
			<p><strong>IMPORTANT: If you used a link containing &quot;dev.mum.edu&quot;, please change it to &quot;www.mum.edu&quot;. The rest of the link should stay the same.</strong></p>
			<p>The Application ID in the link that brought you here, {$_GET['AppID']}, is not a valid Application ID.
			Please use the link that was emailed to you after completing the first page of the online application.
			</p>
			<p>After checking the url, if you think this is an error, feel free to contact us at<br>
			800-369-6480 (from within USA only) or<br>
			1-641-472-1110 (all other calls) or<br>
			Email: <a href="mailto:admissions@mum.edu?subject=AppID%20missing">admissions@mum.edu</a>
			</p>
			<p>This form will not submit properly without a valid Application ID.
			</p>
		</div>
ENDOFECHO;
	} // end of if AppID is not well-formatted
	else { // start else AppID is not well-formatted
		$theAppID = $_GET['AppID'];
		$theRegEx = "^\"$theAppID\"";

		// could first check that the file exists
		$file = "/usr/home/trotaka108/websitesupport/apply/saveddata/application_scriptuse.txt";
		//TODOif ($in{testmode} eq 'test') {$file =~ s/\.txt$/_test.txt/;}
		//"application_id","invoice_num","date_string","firstname","lastname","email","degree_plan","major","enterstat","citizenship_country"
		//"N-80013","80013","09/12/2014","TestRon2","TestPero","z@magnadev.com","M","MEISS","R","ASM"

		$foundit = 0;
		$lines = file($file); // file - Reads entire file into an array
		foreach ($lines as $line) {
			if ( preg_match("/$theRegEx/", $line) ) {
				$foundit = 1;
				$word_has_had = 'had';

				$theFields = preg_split('/\",\"/', $line);

				// Those not used are not assigned
				//$_POST["AppIDExtra"] = 			$theFields[0];
				$_POST["x_invoice_num"] = 		$theFields[1];
				//$_POST["date_from_db"] = 			$theFields[2];
				$_POST["x_firstname"] = 		$theFields[3];
				$_POST["x_lastname"] = 			$theFields[4];
				$_POST["x_email"] = 			$theFields[5];
				$_POST["x_degree_plan"] = 		$theFields[6];
				$_POST["major"] = 				$theFields[7];
				$_POST["enterstat"] = 			$theFields[8];
				$_POST["citizenship_country"] = $theFields[9];

				break;
			}
		}
		if ($foundit) {
			// The last item still has the trailing quote and new line
			$_POST["citizenship_country"] = preg_replace("/\"\n/", "", $_POST["citizenship_country"]);

			$_POST["AppID"] = $_GET['AppID'];
			$_POST["x_application_id"] = $_GET["AppID"];
			$_POST["x_date_submit"] = date("F d, Y"); // March 10, 2001
			$_POST["x_created_on"] =  date("m/d/Y");  // 03/10/2001

			// $25.00 for US, $50.00 for International.
			$citizenshiptag = substr($_GET["AppID"], 0, 1);
			$_POST["x_amount"] = '50.00';
			// AppID can start with U (US), P (Perm Res, Green Card), N (Intl). I don't think it starts with I but not sure.
			if ($citizenshiptag == 'U' || $citizenshiptag == 'P') {
				$_POST["x_amount"] = '25.00';
			}
		}
		else {
			echo <<<ENDOFECHO
			<div class="call-out">
				<p>The Application ID in the link that brought you here, {$_GET["AppID"]}, is no longer available. This is probably because you have already made the payment of your application fee.
				</p>
				<p>If you think this is an error, feel free to contact us at<br>
				800-369-6480 (from within USA only) or<br>
				1-641-472-1110 (all other calls) or<br>
				Email: <a href="mailto:admissions@mum.edu?subject=AppID%20missing">admissions@mum.edu</a>
				</p>
				<p>This form will not submit properly without a valid Application ID.
				</p>
			</div>
ENDOFECHO;
		} // end of else foundit
	} // end of else AppID is not well-formatted
} // if _GET AppID
?>
<form action="https://www.mum.edu/admissions/apply-online/online-application-form/application-fee-payment-result/" method="post" name="apppmt" id="apppmt" class="form" onsubmit="return validFormAppPmt(document.apppmt);">
<input type="hidden" name="incoming_page" value="applypmt" />
<input type="hidden" name="x_test_request" value="False" />
<input type="hidden" name="x_method" value="CC" />
<input type="hidden" name="x_type" value="AUTH_CAPTURE" />
<input type="hidden" name="x_amount" value="<?php echo $_POST["x_amount"]?>" />
<input type="hidden" name="x_email_customer" value="True" />
<input type="hidden" name="x_email_merchant" value="True" />
<input type="hidden" name="x_description" value="MUM Application Submission Fee" />
<input type="hidden" name="x_invoice_num" value="<?php echo $_POST["x_invoice_num"]?>" />
<input type="hidden" name="AppID" value="<?php echo $_POST["AppID"]?>" />
<input type="hidden" name="x_application_id" value="<?php echo $_POST["x_application_id"]?>" />
<input type="hidden" name="x_firstname" value="<?php echo $_POST["x_firstname"]?>" />
<input type="hidden" name="x_lastname" value="<?php echo $_POST["x_lastname"]?>" />
<input type="hidden" name="x_email" value="<?php echo $_POST["x_email"]?>" />
<input type="hidden" name="x_date_submit" value="<?php echo $_POST["x_date_submit"]?>" />
<input type="hidden" name="x_created_on" value="<?php echo $_POST["x_created_on"]?>" />
<input type="hidden" name="x_degree_plan" value="<?php echo $_POST["x_degree_plan"]?>" />
<input type="hidden" name="major" value="<?php echo $_POST["major"]?>" /><!-- used in script for checklist link -->
<input type="hidden" name="enterstat" value="<?php echo $_POST["enterstat"]?>" /><!-- used in script for checklist link -->
<input type="hidden" name="citizenship_country" value="<?php echo $_POST["citizenship_country"]?>" /><!-- used in script for checklist link -->
<input type="hidden" name="cookieengine" value="" />
<input type="hidden" name="cookiekeyword" value="" />
<input type="hidden" name="cookiedate" value="" />

<!-- These are for the payment page that follows submission. Populated by js. -->
<input type="hidden" name="checklist_message" value="" />
<input type="hidden" name="testmode_phrase" value="" />

<div class="call-out">
	<p>Your Application ID is <strong><?php echo $_POST["AppID"]?></strong>. You will need this Application ID number to complete the application process. A confirmation email (which includes your Application ID number) <?php echo $word_has_had?> been sent to <strong><?php echo $_POST["x_email"]?></strong></p>
</div>

<p><strong>IMPORTANT:</strong> The Admissions Office will start processing your application after the <strong>$<?php echo $_POST["x_amount"]?></strong> application fee is paid. Please complete the payment form below.</p>
<p>If you cannot pay by credit card, please <a href="/admissions/admissions-forms/alt-method-of-paying-app-fee/">see this page</a></p>

<h2 class="border-top">$<?php echo $_POST["x_amount"]?> Application Fee</h2>
<img class="trustlogo" src="/images/secure_site.gif" />
<h3>Credit Card Information</h3>
<fieldset>

	<label>Card Type</label>
	<a id="x_card_shadow"></a>
	<div class="input">
		<select name="x_card">
			<option value="" selected="selected">-- select --</option>
			<option value="Visa">Visa</option>
			<option value="MasterCard">MasterCard</option>
			<option value="Discover">Discover</option>
		</select>
	</div>

	<label>Card Number<br><span>(no spaces)</span></label>
	<input name="x_Card_Num" size="20" maxlength="16" type="text">
	<div class="clearFix"></div>

	<label>Expiration Date<br><span>(mmyy)</span></label>
	<input name="x_Exp_Date" size="4" maxlength="4" type="text">

	<label>Security Code<br><span>(Three-digit number on back of credit card)</span></label>
	<input name="x_card_code" size="4" maxlength="4" type="text">
	<div class="clearFix"></div>

	<label>First Name (on card)</label>
	<input name="x_First_Name" size="25" value="" type="text">

	<label>Last Name (on card)</label>
	<input name="x_Last_Name" size="25" value="" type="text">

	<label>Billing Street Address</label>
	<input name="x_address" size="25" value="" type="text">

	<label>Billing Zip or Postal Code</label>
	<input name="x_zip" size="10" value="" type="text">
	<div class="clearFix"></div>

	<div class="notice apppmtmessage_saving" style="display:none">
	Processing your payment...
	</div>

	<p class="margin-bottom-none">
	<input type="submit" name="apppmtsubmit" class="button submit positive width-100" value="Click only ONCE to Submit">
	</p>
</fieldset>
</form>
<script src="https://www.mum.edu/js/apppmt.js" type="text/javascript"></script>

 		</article>
 	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>