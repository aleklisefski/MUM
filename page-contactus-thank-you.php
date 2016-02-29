<?php
	/*
	Template Name: Contact Confirmation / DVD Request
	*/

	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
	$template_url = get_bloginfo('template_url');
	$display_heading = get_field('display_heading');
	$pre_content = get_field('pre-body_content');
	$pre_style = get_field('pre-body_style');
	$include_form = get_field('include_dvd_request_form');
?>

<section id="page-header" class="tan">
 	<div class="container">
		<?php include (TEMPLATEPATH . '/inc/notice.php'); ?>
		<aside>
			<?php include (TEMPLATEPATH . '/inc/subnav.php'); ?>
		</aside>
		<article>
			<?php include (TEMPLATEPATH . '/inc/cta.php'); ?>
			<h1><?php if( $display_heading != null ) { echo $display_heading; } else { the_title(); }?></h1>
			<?php include (TEMPLATEPATH . '/inc/breadcrumbs.php'); ?>
		</article>
 	</div>
</section>

<section class="body">
 	<div class="container">
 		<aside>
			<p>&nbsp;</p>
			<div class="clearFix"></div>
 		</aside>
 		<article>

 			<?php the_content(''); ?>

<?php include("/usr/www/users/trotaka108/Morph/morph.php"); ?>
<?php if( ($usCitizen == "US" || $country == "CAN  Canada") && $whichform != "cuthankyoudvd" ) { ?>
<!-- Altered the dvd form name and id because the main cu form appears at the bottom of the full html page, as on all other pages. -->
<form action="https://www.mum.edu/thank-you-dvd-request/" method="post" name="contactFormcuthankyoudvd" id="contact-form-cuthankyoudvd" class="form cuformvalidate">
<input type="hidden" name="whichform" value="cuthankyoudvd" />
<input type="hidden" name="PHORM_NAME" value="CONTACT" />
<input type="hidden" name="PHORM_CONFIG" value="config.php" />
<input type="hidden" name="CUSOURCE" value="<?php echo "$CUSOURCE" ?>" />
<input type="hidden" name="mum_formatted_inqnum" value="<?php echo "$mum_formatted_inqnum" ?>" />
<input type="hidden" name="usCitizen" value="<?php echo "$usCitizen" ?>" />
<input type="hidden" name="firstName" value="<?php echo "$firstName" ?>" />
<input type="hidden" name="lastName" value="<?php echo "$lastName" ?>" />
<input type="hidden" name="email" value="<?php echo "$email" ?>" />
<input type="hidden" name="phone1" id="phone1" value="<?php echo "$phone1" ?>" />
<input type="hidden" name="phone2" id="phone2" value="<?php echo "$phone2" ?>" />
<?php if($country == "CAN  Canada") { echo
"<input type=\"hidden\" name=\"city\" value=\"$city\" />
<input type=\"hidden\" name=\"country\" value=\"$country\" />";}
?>
<input type="hidden" name="LearnAbout" value="<?php echo "$LearnAbout" ?>" />
<input type="hidden" name="comments" value="<?php echo "$comments" ?>" />
<input type="hidden" name="UEMLOPTIN" value="<?php echo "$UEMLOPTIN" ?>" />
<input type="hidden" name="UMOVMSTATU" value="<?php echo "$UMOVMSTATU" ?>" />
<input type="hidden" name="REMOTE_ADDR" value="<?php echo "$REMOTE_ADDR" ?>" />
<input type="hidden" name="degree_plan" value="<?php echo "$degree_plan" ?>" />
<input type="hidden" name="major" value="<?php echo "$major" ?>" />

<h4 style="margin: 40px 0 30px 0;">To receive our new DVD and other materials, complete <strong>all</strong> fields below:</h4>
<fieldset>
<label>Street address</label>
<input type="text" name="address1" size="30" maxlength="40" value="" />
<label>City</label>
<?php if($country == "CAN  Canada") { echo "<input type=\"text\" name=\"city_disabled\" size=\"30\" maxlength=\"30\" value=\"$city\" disabled />"; }
else { echo "<input type=\"text\" name=\"city\" size=\"30\" maxlength=\"30\" value=\"\" />"; } ?>
<label>State or Province</label>
<div class="input">
<select name="state" size="1">
<option value="" selected="selected">Select State or Province</option>
<optgroup label="USA states">
<option value="AL">AL Alabama</option>
<option value="AK">AK Alaska</option>
<option value="AZ">AZ Arizona</option>
<option value="AR">AR Arkansas</option>
<option value="CA">CA California</option>
<option value="CO">CO Colorado</option>
<option value="CT">CT Connecticut</option>
<option value="DE">DE Delaware</option>
<option value="DC">DC District of Columbia</option>
<option value="FL">FL Florida</option>
<option value="GA">GA Georgia</option>
<option value="GU">GU Guam</option>
<option value="HI">HI Hawaii</option>
<option value="ID">ID Idaho</option>
<option value="IL">IL Illinois</option>
<option value="IN">IN Indiana</option>
<option value="IA">IA Iowa</option>
<option value="KS">KS Kansas</option>
<option value="KY">KY Kentucky</option>
<option value="LA">LA Louisiana</option>
<option value="ME">ME Maine</option>
<option value="MD">MD Maryland</option>
<option value="MA">MA Massachusetts</option>
<option value="MI">MI Michigan</option>
<option value="MN">MN Minnesota</option>
<option value="MS">MS Mississippi</option>
<option value="MO">MO Missouri</option>
<option value="MT">MT Montana</option>
<option value="NE">NE Nebraska</option>
<option value="NV">NV Nevada</option>
<option value="NH">NH New Hampshire</option>
<option value="NJ">NJ New Jersey</option>
<option value="NM">NM New Mexico</option>
<option value="NY">NY New York</option>
<option value="NC">NC North Carolina</option>
<option value="ND">ND North Dakota</option>
<option value="OH">OH Ohio</option>
<option value="OK">OK Oklahoma</option>
<option value="OR">OR Oregon</option>
<option value="PA">PA Pennsylvania</option>
<option value="PR">PR Puerto Rico</option>
<option value="RI">RI Rhode Island</option>
<option value="SC">SC South Carolina</option>
<option value="SD">SD South Dakota</option>
<option value="TN">TN Tennessee</option>
<option value="TX">TX Texas</option>
<option value="UT">UT Utah</option>
<option value="VT">VT Vermont</option>
<option value="VA">VA Virginia</option>
<option value="VI">VI US Virgin Islands</option>
<option value="WA">WA Washington</option>
<option value="WV">WV West Virginia</option>
<option value="WI">WI Wisconsin</option>
<option value="WY">WY Wyoming</option>
</optgroup>
<optgroup label="Canada">
<option  value="AB">AB - Alberta</option>
<option  value="BC">BC - British Columbia</option>
<option  value="MB">MB - Manitoba</option>
<option  value="NB">NB - New Brunswick</option>
<option  value="NL">NL - Newfoundland and Labrador</option>
<option  value="NS">NS - Nova Scotia</option>
<option  value="NT">NT - Northwest Territories</option>
<option  value="NU">NU - Nunavut</option>
<option  value="ON">ON - Ontario</option>
<option  value="PE">PE - Prince Edward Island</option>
<option  value="QC">QC - Qu&eacute;bec</option>
<option  value="SK">SK - Saskatchewan</option>
<option  value="YT">YT - Yukon</option>
</optgroup>
</select>
</div>
<label>Zip code / Postal code</label>
<input type="text" name="zip" size="10" maxlength="10" value="" />
<label>Country</label>
<?php if($country == "CAN  Canada") { echo "<input type=\"text\" name=\"country_disabled\" size=\"30\" maxlength=\"30\" value=\"$country\" disabled />"; }
else { echo <<<END_OF_PRINT
<div class="input">
<select name = "country">
<option value="">Select a Country</option>
<option value="USA">USA</option>
<option value="CAN">Canada</option>
</select>
</div>
END_OF_PRINT;
} ?>

<div class="notice" id="cudvd_sending_msg" style="display:none;">
	<span>Sending...</span>
</div>
<p><input class="submit" type="submit" name="Submit" id="cudvd_submit" value="Get Your Free DVD" /></p>

</fieldset>
</form>
<script type='text/javascript'>
jQuery('#cudvd_submit').on('click', function(){
	if( jQuery('#contact-form-cuthankyoudvd').valid() ) {
		jQuery('#cudvd_sending_msg').show();
	}
	else {
		jQuery('#cudvd_sending_msg').hide();
		return false;
	}
});
</script>

<?php } ?>
 		</article>
 	</div>
</section>
<!-- a -->

<?php endwhile; endif; wp_reset_query(); ?>
<!-- b -->

<?php get_footer(); ?>
<!-- c -->
