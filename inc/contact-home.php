<section class="green contact">
 	<div class="container">
 		<h3>Have Questions?</h3>
 		<div class="anchor contact" name="#form-middle">
 			<span class="icon contact"></span>
 			<h4>Contact Us</h4>
 		</div>
 		<a class="anchor" href="/about-mum/location/contact-us/">
 			<span class="icon phone"></span>
 			<h4>Call Today</h4>
 		</a>
 	</div>
</section>

<!-- Contact Form -->
<section class="blue contactForm" id="form-middle">
	<div class="container blue border-top">
		<a class="close" href="#"></a>
		<div class="grid thirds">
			<script src="https://www.mum.edu/html/js/application.js"></script>
			<form action="/Morph/morph.php" method="post" name="contactForm" id="contact-form-middle">
				<input type="hidden" name="PHORM_NAME" value="CONTACT" />
				<input type="hidden" name="PHORM_CONFIG" value="config.php" />
				<input type="hidden" name="ContactType" value="Prospective" />
				<input type="hidden" name="CUSOURCE" value="<?php echo $id_5."_".$title_14; ?>" />

				<input type="hidden" name="stateProgram" id="stateProgram" value="" />
				<input type="hidden" name="stateUEMLOPTIN" id="stateUEMLOPTIN" value="" />

				<div class="full">
					<div class="citizen">
						<p class="required">* required fields</p>
						I am a US citizen or Green Card holder *
						<span class="clearMobile">
							<input type="radio" name="usCitizen" value="US"><span>Yes</span>
							<input type="radio" name="usCitizen" value="Other" onclick="top.location.href='http://www.mum.edu/admissions/international-students/contact-us-intl/'"><span>No</span>
						</span>
						<div class="clearFix"></div>
					</div>
				</div>
				<div class="item">
					<input type="text" name="firstName" value="First (Given) Name *" class="clearDefault" />
					<input type="text" name="lastName" value="Last (Family) Name *" class="clearDefault" />
					<input type="text" name="email" value="Email Address *" class="clearDefault" />
					<input type="text" name="phone1" id="phone" value="Phone Number *" class="clearDefault" />
					<input type="text" name="phone2" id="cell" value="Cell Number" class="clearDefault" />
				</div>
				<div class="item">
					<label>Degree</label>
					<select name="degree_plan" onchange="funcPopulateMajorListFromDegreePlan(this, 'contact-form-middle');">
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
					Sign me up for MUM email updates<input name="UEMLOPTIN" type="checkbox" value="Y" checked="checked">
				</div>
				<div class="clearFix"></div>
				<a class="button green submit"><span>Send Message</span></a>
			</form>
		</div>
	</div>
</section>
<!-- END Contact Form -->