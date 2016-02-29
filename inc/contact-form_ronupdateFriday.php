<?php
if ($_GET["cusource_of_redirect"] != "") {
	// eg 84_Visitors Weeke
	$ary = explode("_", $_GET["cusource_of_redirect"]);
	$id_5 = $ary[0];
	$title_14 = $ary[1];
}
else {
	$id = get_queried_object_id();
	$id_5 = substr($id,0,5);
	$full_title = get_the_title($post->ID);
	$tags = array(">");
	$title = str_replace($tags, "", $full_title);
	$title_14 = substr($title,0,14);
}

$open_contact_form = get_field('open_contact_form',$id);

$this_is_intl_cu_form = false;
if( is_page(3373) ) {
	$this_is_intl_cu_form = true;
}

// Refers to THE contact us page, not the form that appears on every page.
// That is, https://dev.mum.edu/about-mum/location-and-contact/contact-us/
$this_is_cu_page = false;
if( is_page(70) ) {
    $this_is_cu_page = true;
}

if( $open_contact_form == "Yes" ) {
	echo "<script>jQuery(function ($) { openContact(); });</script>";
}
?>
<form action="https://dev.mum.edu/thank-you/" method="post" name="contactForm" id="contact-form" class="cuformvalidate">
	<?php if ($this_is_intl_cu_form) {
		echo '<input type="hidden" name="whichform" value="cuintl" />';
	}
	else {
		echo '<input type="hidden" name="whichform" value="cumain" />';
	}?>
	<input type="hidden" name="PHORM_NAME" value="CONTACT" />
	<input type="hidden" name="PHORM_CONFIG" value="config.php" />
	<input type="hidden" name="CUSOURCE" value="<?php echo $id_5."_".$title_14; ?>" />
	<div class="full">
		<div class="citizen">
			<p class="required">* required fields</p>
			<span class="float-left">I am a US citizen or Green Card holder *</span>
			<span class="clearMobile">
<!-- $international_required starts false, but is made true on intl cu page, in php. -->
<input type="radio" name="usCitizen" value="US" id="US" onclick="if($international_required){$('#cuintl_redirecting_msg').text('&nbsp;&nbsp;Redirecting...');top.location.href='http://dev.mum.edu/about-mum/location/contact-us/?cusource_of_redirect=' + document.contactForm.CUSOURCE.value;}else{$('#cuintl_redirecting_msg').text('');}"><label for="US">Yes</label>
<input type="radio" name="usCitizen" value="Other" id="Other" onclick="
if(!$international_required){$('#cuintl_redirecting_msg').text('&nbsp;&nbsp;Redirecting...');top.location.href='http://dev.mum.edu/admissions/international-students/contact-us-intl/?cusource_of_redirect=' + document.contactForm.CUSOURCE.value;}else{$('#cuintl_redirecting_msg').text('');}"<?php if ($this_is_intl_cu_form) {echo ' checked';} ?>><label for="Other">No</label><span id="cuintl_redirecting_msg"></span>
			</span>
			<div class="clearFix"></div>
		</div>
		<div class="clearFix"></div>
	</div>
	<div class="clearFix"></div>
	<div class="item">
		<input type="text" name="firstName" value="First (Given) Name *" class="clearDefault" />
		<input type="text" name="lastName" value="Last (Family) Name *" class="clearDefault" />
		<input type="text" name="email" value="Email Address *" class="clearDefault" />
		<input type="text" name="phone1" id="phone1" value="Phone Number<?php if( !$this_is_intl_cu_form ) {echo " *";} ?>" class="clearDefault phone-group" />
		<?php if( !$this_is_intl_cu_form ) { ?>
		<input type="text" name="phone2" id="phone2" value="Cell Number" class="clearDefault phone-group" />
		<?php } ?>
		<?php if( $this_is_intl_cu_form ) { ?>
		<input name="city" type="text" value="City *" class="clearDefault" />
		<?php } ?>

	</div>
	<div class="item">
		<?php if( $this_is_intl_cu_form ) {include (TEMPLATEPATH . '/inc/contact-intl-fields.php');} ?>
		<label>Degree</label>
		<select name="degree_plan" onchange="funcPopulateMajorListFromDegreePlan(this, 'contact-form');">
			<option value="">-- select one --</option>
			<option value="B">Bachelor's or Post Baccalaureate</option>
			<option value="M">Master's or Graduate Certificate</option>
			<option value="P">PhD</option>
		</select>
		<label>Program</label>
		<select name="major">
			<option value="">---</option>
		</select>
		<label>How did you <u>first</u> hear about MUM? *</label>
		<select id="LearnAbout" name="LearnAbout" size="1">
			<option value="" selected="selected">-- select one --</option>
			<option value="MUM student">MUM student</option>
			<option value="Friend or family">Friend or family</option>
			<option value="Web search - Google, etc.">Web search - Google, etc.</option>
			<option value="Online ad">Online ad</option>
			<option value="Link on another website">Link on another website</option>
			<option value="Facebook">Facebook</option>
			<option value="Twitter">Twitter</option>
			<option value="YouTube">YouTube</option>
			<option value="NaturalHealers.com">NaturalHealers.com</option>
			<option value="Zinch.com">Zinch.com</option>
			<option value="Online news media">Online news media</option>
			<option value="Newspaper or magazine article">Newspaper or magazine article</option>
			<option value="TV or radio">TV or radio</option>
			<option value="High school teacher / counselor">High school teacher / counselor</option>
			<option value="College professor / advisor">College professor / advisor</option>
			<option value="Email from MUM">Email from MUM</option>
			<option value="MUM brochure">MUM brochure</option>
			<option value="Transcendental Meditation center">Transcendental Meditation center</option>
			<option value="College Fair">College Fair</option>
			<option value="Other">Other</option>
		</select>
	</div>
	<div class="item third">
		<label>Questions / Comments</label>
		<textarea name="comments"></textarea>
		<div class="citizen">
		<label for="cuUEMLOPTIN">Opt-In</label><input name="UEMLOPTIN" id="cuUEMLOPTIN" type="checkbox" value="Y" checked="checked">
		<p for="opt-in">to recieve MUM email updates</p>
		</div>
	</div>
	<div class="clearFix"></div>

<div class="notice" id="cu_sending_msg" style="display:none;">
	<span>Sending...</span>
</div>
<a class="button green submit" id="cu_submit_anchor"><span>Send Message</span></a>

</form>
<script src="/js/setMajor.js" type="text/javascript"></script>
<script type='text/javascript'>
<?php if ($this_is_cu_page) {echo "if(location.search.indexOf('cusource_of_redirect') > -1){document.getElementById('US').checked=true;}";} ?>

$('#cu_submit_anchor').on('click', function(){
	if( $('#contact-form').valid() ) {
		$('#cu_sending_msg').show();
	}
	else {
		$('#cu_sending_msg').hide();
		return false;
	}
});

// choices for major are based on degree_plan
var funcPopulateMajorListFromDegreePlan = function(objDegreePlan, formid) {
	var prog = objDegreePlan.options[objDegreePlan.selectedIndex].value;
	if (prog == 'B') {prog = 'U';}
	setMajor(prog, document.getElementById(formid));

    selectStyling();
}
</script>
