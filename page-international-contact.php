<?php
	/*
	Template Name: International Contact Form
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
 			<?php include (TEMPLATEPATH . '/inc/flexible-content.php'); ?> 	
 			
 			<form action="/morph/morph.php" method="post" name="contactForm" class="form">
				<input type="hidden" name="PHORM_NAME" value="CONTACT" />
				<input type="hidden" name="PHORM_CONFIG" value="config_contactus_intl.php" />
				<input type="hidden" name="CUSOURCE" value="<?php echo $id."_".$title_14; ?>" />

				<fieldset>

					<label>*I am a US citizen or Green Card holder</label>
					<p>
						<input type="radio" name="usCitizen" value="US" onclick="jQuery('#resideUS').hide();top.location.href='/about-mum/location/contact-us/';">Yes<br />
						<input type="radio" name="usCitizen" value="Other">No
					
					</p>
					
					<label>*First (given) name</label>
					<input type="text" name="firstName" size="20" maxlength="20" value="" /><!-- Phorm Messages firstName -->
					
					<label>*Last (family) name</label>
					<input type="text" name="lastName" size="20" maxlength="20" value="" /><!-- Phorm Messages lastName -->
					
					<label>*Email address</label>
					<input type="text" name="email" size="30" value="" /><!-- Phorm Messages email -->
					
					<label>*City</label>
					<input name="city" type="text" size="30" maxlength="30" /><!-- Phorm Messages city -->
					
					<label>*Country</label>
					<div class="input">
						<select name="country" id="country">
							<option value="" selected="selected">Select a Country</option>
							<option value="AFG  Afghanistan">Afghanistan</option>
							<option value="ALA  Aland Islands">Aland Islands</option>
							<option value="ALB  Albania">Albania</option>
							<option value="DZA  Algeria">Algeria</option>
							<option value="ASM  American Samoa">American Samoa</option>
							<option value="AND  Andorra">Andorra</option>
							<option value="AGO  Angola">Angola</option>
							<option value="AIA  Anguilla">Anguilla</option>
							<option value="ATG  Antigua and Barbuda">Antigua &amp; Barbuda</option>
							<option value="ARG  Argentina">Argentina</option>
							<option value="ARM  Armenia">Armenia</option>
							<option value="ABW  Aruba">Aruba</option>
							<option value="AUS  Australia">Australia</option>
							<option value="AUT  Austria">Austria</option>
							<option value="AZE  Azerbaijan">Azerbaijan</option>
							<option value="BHS  Bahamas">Bahamas</option>
							<option value="BHR  Bahrain">Bahrain</option>
							<option value="BGD  Bangladesh">Bangladesh</option>
							<option value="BRB  Barbados">Barbados</option>
							<option value="BLR  Belarus">Belarus</option>
							<option value="BEL  Belgium">Belgium</option>
							<option value="BLZ  Belize">Belize</option>
							<option value="BEN  Benin">Benin</option>
							<option value="BMU  Bermuda">Bermuda</option>
							<option value="BTN  Bhutan">Bhutan</option>
							<option value="BOL  Bolivia">Bolivia</option>
							<option value="BIH  Bosnia and Herzegovina">Bosnia &amp; Herzegovina</option>
							<option value="BWA  Botswana">Botswana</option>
							<option value="BRA  Brazil">Brazil</option>
							<option value="VGB  British Virgin Islands">British Virgin Islands</option>
							<option value="BRN  Brunei Darussalam">Brunei Darussalam</option>
							<option value="BGR  Bulgaria">Bulgaria</option>
							<option value="BFA  Burkina Faso">Burkina Faso</option>
							<option value="BDI  Burundi">Burundi</option>
							<option value="KHM  Cambodia">Cambodia</option>
							<option value="CMR  Cameroon">Cameroon</option>
							<option value="CAN  Canada">Canada</option>
							<option value="CPV  Cape Verde">Cape Verde</option>
							<option value="CYM  Cayman Islands">Cayman Islands</option>
							<option value="CAF  Central African Republic">Central African Republic</option>
							<option value="TCD  Chad">Chad</option>
							<option value="GBR  Channel Islands">Channel Islands</option>
							<option value="CHL  Chile">Chile</option>
							<option value="CHN  China">China</option>
							<option value="COL  Colombia">Colombia</option>
							<option value="COM  Comoros">Comoros</option>
							<option value="COG  Congo">Congo</option>
							<option value="COD  Democratic Republic of the Congo">Congo, Dem. Rep. of</option>
							<option value="COK  Cook Islands">Cook Islands</option>
							<option value="CRI  Costa Rica">Costa Rica</option>
							<option value="CIV  Cote d'Ivoire">Cote d'Ivoire</option>
							<option value="HRV  Croatia">Croatia</option>
							<option value="CUB  Cuba">Cuba</option>
							<option value="CYP  Cyprus">Cyprus</option>
							<option value="CZE  Czech Republic">Czech Republic</option>
							<option value="PRK  Democratic People's Republic of Korea">Dem. People's Rep. of Korea</option>
							<option value="COD  Democratic Republic of the Congo">Dem. Rep. of the Congo</option>
							<option value="DNK  Denmark">Denmark</option>
							<option value="DJI  Djibouti">Djibouti</option>
							<option value="DMA  Dominica">Dominica</option>
							<option value="DOM  Dominican Republic">Dominican Republic</option>
							<option value="ECU  Ecuador">Ecuador</option>
							<option value="EGY  Egypt">Egypt</option>
							<option value="SLV  El Salvador">El Salvador</option>
							<option value="GNQ  Equatorial Guinea">Equatorial Guinea</option>
							<option value="ERI  Eritrea">Eritrea</option>
							<option value="EST  Estonia">Estonia</option>
							<option value="ETH  Ethiopia">Ethiopia</option>
							<option value="FRO  Faeroe Islands">Faeroe Islands</option>
							<option value="FLK  Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
							<option value="FJI  Fiji">Fiji</option>
							<option value="FIN  Finland">Finland</option>
							<option value="FRA  France">France</option>
							<option value="GUF  French Guiana">French Guiana</option>
							<option value="PYF  French Polynesia">French Polynesia</option>
							<option value="GAB  Gabon">Gabon</option>
							<option value="GMB  Gambia">Gambia</option>
							<option value="GEO  Georgia">Georgia</option>
							<option value="DEU  Germany">Germany</option>
							<option value="GHA  Ghana">Ghana</option>
							<option value="GIB  Gibraltar">Gibraltar</option>
							<option value="GRC  Greece">Greece</option>
							<option value="GRL  Greenland">Greenland</option>
							<option value="GRD  Grenada">Grenada</option>
							<option value="GLP  Guadeloupe">Guadeloupe</option>
							<option value="GUM  Guam">Guam</option>
							<option value="GTM  Guatemala">Guatemala</option>
							<option value="GBR  Guernsey">Guernsey</option>
							<option value="GIN  Guinea">Guinea</option>
							<option value="GNB  Guinea-Bissau">Guinea-Bissau</option>
							<option value="GUY  Guyana">Guyana</option>
							<option value="HTI  Haiti">Haiti</option>
							<option value="VAT  Holy See">Holy See</option>
							<option value="HND  Honduras">Honduras</option>
							<option value="HKG  Hong Kong">Hong Kong, China</option>
							<option value="HUN  Hungary">Hungary</option>
							<option value="ISL  Iceland">Iceland</option>
							<option value="IND  India">India</option>
							<option value="IDN  Indonesia">Indonesia</option>
							<option value="IRN  Iran, Islamic Republic of">Iran, Islamic Republic of</option>
							<option value="IRQ  Iraq">Iraq</option>
							<option value="IRL  Ireland">Ireland</option>
							<option value="GBR  Isle of Man">Isle of Man</option>
							<option value="ISR  Israel">Israel</option>
							<option value="ITA  Italy">Italy</option>
							<option value="JAM  Jamaica">Jamaica</option>
							<option value="JPN  Japan">Japan</option>
							<option value="GBR  Jersey">Jersey</option>
							<option value="JOR  Jordan">Jordan</option>
							<option value="KAZ  Kazakhstan">Kazakhstan</option>
							<option value="KEN  Kenya">Kenya</option>
							<option value="KIR  Kiribati">Kiribati</option>
							<option value="PRK  Democratic People's Republic of Korea">Korea, Dem. People's Rep.</option>
							<option value="KOR  Republic of Korea">Korea, Republic of </option>
							<option value="KWT  Kuwait">Kuwait</option>
							<option value="KGZ  Kyrgyzstan">Kyrgyzstan</option>
							<option value="LAO  Laos">Laos PDR</option>
							<option value="LVA  Latvia">Latvia</option>
							<option value="LBN  Lebanon">Lebanon</option>
							<option value="LSO  Lesotho">Lesotho</option>
							<option value="LBR  Liberia">Liberia</option>
							<option value="LBY  Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
							<option value="LIE  Liechtenstein">Liechtenstein</option>
							<option value="LTU  Lithuania">Lithuania</option>
							<option value="LUX  Luxembourg">Luxembourg</option>
							<option value="MAC  Macao">Macao, China</option>
							<option value="MKD  Macedonia">Macedonia, Republic of</option>
							<option value="MDG  Madagascar">Madagascar</option>
							<option value="MWI  Malawi">Malawi</option>
							<option value="MYS  Malaysia">Malaysia</option>
							<option value="MDV  Maldives">Maldives</option>
							<option value="MLI  Mali">Mali</option>
							<option value="MLT  Malta">Malta</option>
							<option value="MHL  Marshall Islands">Marshall Islands</option>
							<option value="MTQ  Martinique">Martinique</option>
							<option value="MRT  Mauritania">Mauritania</option>
							<option value="MUS  Mauritius">Mauritius</option>
							<option value="MYT  Mayotte">Mayotte</option>
							<option value="MEX  Mexico">Mexico</option>
							<option value="FSM  Micronesia, Federated States of">Micronesia, Fed. States</option>
							<option value="MDA  Republic of Moldova">Moldova, Republic of</option>
							<option value="MCO  Monaco">Monaco</option>
							<option value="MNG  Mongolia">Mongolia</option>
							<option value="MSR  Montserrat">Montserrat</option>
							<option value="MAR  Morocco">Morocco</option>
							<option value="MOZ  Mozambique">Mozambique</option>
							<option value="MMR  Myanmar">Myanmar</option>
							<option value="NAM  Namibia">Namibia</option>
							<option value="NRU  Nauru">Nauru</option>
							<option value="NPL  Nepal">Nepal</option>
							<option value="NLD  Netherlands">Netherlands</option>
							<option value="ANT  Netherlands Antilles">Netherlands Antilles</option>
							<option value="NCL  New Caledonia">New Caledonia</option>
							<option value="NZL  New Zealand">New Zealand</option>
							<option value="NIC  Nicaragua">Nicaragua</option>
							<option value="NER  Niger">Niger</option>
							<option value="NGA  Nigeria">Nigeria</option>
							<option value="NIU  Niue">Niue</option>
							<option value="NFK  Norfolk Island">Norfolk Island</option>
							<option value="MNP  Northern Mariana Islands">Northern Mariana Islands</option>
							<option value="NOR  Norway">Norway</option>
							<option value="OMN  Oman">Oman</option>
							<option value="PSE  Occupied Palestinian Territory">Palestinian Territory</option>
							<option value="PAK  Pakistan">Pakistan</option>
							<option value="PLW  Palau">Palau</option>
							<option value="PAN  Panama">Panama</option>
							<option value="PNG  Papua New Guinea">Papua New Guinea</option>
							<option value="PRY  Paraguay">Paraguay</option>
							<option value="PER  Peru">Peru</option>
							<option value="PHL  Philippines">Philippines</option>
							<option value="PCN  Pitcairn">Pitcairn</option>
							<option value="POL  Poland">Poland</option>
							<option value="PRT  Portugal">Portugal</option>
							<option value="PRI  Puerto Rico">Puerto Rico</option>
							<option value="QAT  Qatar">Qatar</option>
							<option value="KOR  Republic of Korea">Republic of Korea</option>
							<option value="MDA  Republic of Moldova">Republic of Moldova</option>
							<option value="REU  Reunion">Reunion</option>
							<option value="ROU  Romania">Romania</option>
							<option value="RUS  Russian Federation">Russian Federation</option>
							<option value="RWA  Rwanda">Rwanda</option>
							<option value="SHN  Saint Helena">Saint Helena</option>
							<option value="KNA  Saint Kitts and Nevis">Saint Kitts &amp; Nevis</option>
							<option value="LCA  Saint Lucia">Saint Lucia</option>
							<option value="SPM  Saint Pierre and Miquelon">Saint Pierre &amp; Miquelon</option>
							<option value="VCT  Saint Vincent and the Grenadines">Saint Vincent &amp; Grenadines</option>
							<option value="WSM  Samoa">Samoa</option>
							<option value="SMR  San Marino">San Marino</option>
							<option value="STP  Sao Tome and Principe">Sao Tome &amp; Principe</option>
							<option value="SAU  Saudi Arabia">Saudi Arabia</option>
							<option value="SEN  Senegal">Senegal</option>
							<option value="SCG  Serbia and Montenegro">Serbia &amp; Montenegro</option>
							<option value="SYC  Seychelles">Seychelles</option>
							<option value="SLE  Sierra Leone">Sierra Leone</option>
							<option value="SGP  Singapore">Singapore</option>
							<option value="SVK  Slovakia">Slovakia</option>
							<option value="SVN  Slovenia">Slovenia</option>
							<option value="SLB  Solomon Islands">Solomon Islands</option>
							<option value="SOM  Somalia">Somalia</option>
							<option value="ZAF  South Africa">South Africa</option>
							<option value="ESP  Spain">Spain</option>
							<option value="LKA  Sri Lanka">Sri Lanka</option>
							<option value="SDN  Sudan">Sudan</option>
							<option value="SUR  Suriname">Suriname</option>
							<option value="SJM  Svalbard and Jan Mayen Islands">Svalbard &amp; Jan Mayen</option>
							<option value="SWZ  Swaziland">Swaziland</option>
							<option value="SWE  Sweden">Sweden</option>
							<option value="CHE  Switzerland">Switzerland</option>
							<option value="SYR  Syrian Arab Republic">Syrian Arab Republic</option>
							<option value="TAI  Taiwan">Taiwan, China</option>
							<option value="TJK  Tajikistan">Tajikistan</option>
							<option value="TZA  United Republic of Tanzania">Tanzania, United Rep.</option>
							<option value="THA  Thailand">Thailand</option>
							<option value="TLS  Timor-Leste">Timor-Leste</option>
							<option value="TGO  Togo">Togo</option>
							<option value="TKL  Tokelau">Tokelau</option>
							<option value="TON  Tonga">Tonga</option>
							<option value="TTO  Trinidad and Tobago">Trinidad &amp; Tobago</option>
							<option value="TUN  Tunisia">Tunisia</option>
							<option value="TUR  Turkey">Turkey</option>
							<option value="TKM  Turkmenistan">Turkmenistan</option>
							<option value="TCA  Turks and Caicos Islands">Turks &amp; Caicos Islands</option>
							<option value="TUV  Tuvalu">Tuvalu</option>
							<option value="UGA  Uganda">Uganda</option>
							<option value="UKR  Ukraine">Ukraine</option>
							<option value="ARE  United Arab Emirates">United Arab Emirates</option>
							<option value="GBR  United Kingdom">United Kingdom</option>
							<option value="TZA  United Republic of Tanzania">United Rep. of Tanzania</option>
							<option value="USA  United States">United States</option>
							<option value="VIR  U.S. Virgin Islands">U.S. Virgin Islands</option>
							<option value="URY  Uruguay">Uruguay</option>
							<option value="UZB  Uzbekistan">Uzbekistan</option>
							<option value="VUT  Vanuatu">Vanuatu</option>
							<option value="VEN  Venezuela">Venezuela</option>
							<option value="VNM  Viet Nam">Viet Nam</option>
							<option value="VGB  British Virgin Islands">Virgin Islands, British </option>
							<option value="VIR  U.S. Virgin Islands">Virgin Islands, U.S.</option>
							<option value="WLF  Wallis and Futuna Islands">Wallis &amp; Futuna Islands</option>
							<option value="ESH  Western Sahara">Western Sahara</option>
							<option value="YEM  Yemen">Yemen</option>
							<option value="ZMB  Zambia">Zambia</option>
							<option value="ZWE  Zimbabwe">Zimbabwe</option>
						</select><!-- Phorm Messages country -->
					</div>
						
						
					<label>Phone Number</label>
					<input type="text" name="phone1" size="30" value="" />
						
						
					<label>*How did you <u>first</u> hear about MUM?</label>
					<div class="input">	
						<select id="LearnAbout" name="LearnAbout">
							<option value="" selected="selected">Select one:</option>
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
						</select><!-- Phorm Messages LearnAbout -->
					</div>
					
					<div class="clearFix"></div>
					<label>We welcome your questions or comments (optional)</label>
					<textarea name="comments" cols="50" rows="4"></textarea>
					
					<label>Select your academic program of interest</label>
					<div class="input">
						<select name="major">
							<optgroup label="Bachelors">
								<option value="UNDEC">Undecided</option>
								<option value="ART">Art (BA / BFA)</option>
								<option value="ARTPB">Art (Post Baccalaureate)</option>
								<option value="BUS">Business Administration (BA)</option>
								<option value="CIBS">Certificate in Business Studies</option>
								<option value="CS-B">Computer Science (BS)</option>
								<option value="ECFCP">EcoFarmer One Year Certificate Program</option>
								<option value="EDSE">Educational Innovation: Secondary (BA/MA)</option>
								<option value="IS">Individualized Studies (BA)</option>
								<option value="LIT">Literature (BA)</option>
								<option value="WRI">Literature and Writing (BA)</option>
								<option value="MVS-B">Maharishi Vedic Science (BA)</option>
								<option value="MATH">Mathematics (BS)</option>
								<option value="MC">Media and Communications (BA)</option>
								<option value="PHL">Physiology and Health (BA)</option>
								<option value="PMED">Pre-Integrative Medicine - Physiology and Health (BA)</option>
								<option value="SL">Sustainable Living (BS)</option>
							</optgroup>
							<optgroup label="Masters">
								<option value="MEISS">MA in Educational Innovation: Secondary Education</option>
								<option value="MEIFT">MA in Educational Innovation: Fast Track</option>
								<option value="MEISI">MA in Educational Innovation: School Improvement</option>
								<option value="MEICB">MA in Educational Innovation: Consciousness-Based Educator</option>
								<option value="MFILM">MA in Filmmaking</option>
								<option value="MAVOL">MS in Maharishi Ayur Veda Online</option>
								<option value="MVS-M">MA in Maharishi Vedic Science</option>
								<option value="MVSOL">MA in Maharishi Vedic Science Online</option>
								<option value="MVSI">MA in Maharishi Vedic Science: Intern Program</option>
								<option value="MVSEW">MA in Maharishi Vedic Science: Evening Weekend</option>
								<option value="MBAUS">MBA: Undecided Specialization</option>
								<option value="MBASB">MBA: Sustainable Business Specialization </option>
								<option value="MBBPR">MBA: Business Process Improvement Specialization</option>
								<option value="MBAAF">MBA: Accounting Specialization--Fresh Start</option>
								<option value="MBAAS">MBA: Accounting Specialization--Strong Background</option>
								<option value="MBAEW">MBA: Evening-Weekend</option>
								<option value="MBAI">MBA: Intern Program</option>
								<option value="MBAOL">MBA: Online</option>
								<option value="MBAAP">MBA for Accounting Professionals</option>
								<option value="GCBOL">Graduate Certificate: Business Administration Online</option>
								<option value="GCMIS">Graduate Certificate: MIS (Management Information Systems)</option>
								<option value="PGMVS">Post Graduate Certificate in Maharishi Vedic Science</option>
							</optgroup>
							<optgroup label="PhD">
								<option value="MVS-P">PhD in Maharishi Vedic Science</option>
								<option value="MGT-P">PhD in Management</option>
								<option value="PHL-P">PhD in Physiology - Special Research Program</option>
							</optgroup>
						</select>
					</div>
					<!--<p>(To select more than one, use your keyboard's Control key. For Mac, use the Apple or Command key.)</p>-->
					
					<p>
						<input name="UEMLOPTIN" type="checkbox" value="Y" checked="checked" /> Yes, I'd like to receive MUM email updates.
					</p>
					<p class="margin-bottom-none"><input class="submit button" type="submit" name="Submit" value="SUBMIT" onclick='try{__adroll.record_user({"adroll_segments": "contact_us"})} catch(err) {}' /></p>
				</fieldset>
				
			</form>
			
			<script type="text/javascript">
			function qs() {
				var qsParm = new Array();
				if (window.top.location.search.substring(1)) {
					var query = window.top.location.search.substring(1);
					query = query.replace(/&amp;/g, "&");
					query = query.replace(/\+/g, " ");
					var parms = query.split('&');
					for (var i=0; i<parms.length; i++) {
						var pos = parms[i].indexOf('=');
						if (pos > 0) {
							var key = parms[i].substring(0,pos);
							var val = parms[i].substring(pos+1);
							qsParm[key] = val;
						}
					}
				}
				//id="usCitizenOther" name="usCitizen"
				//document.contactForm.usCitizen[2].checked=true;
				document.getElementById('usCitizenOther').checked=true;
				document.contactForm.email.value = 'email';
				//document.form.fund_name.value = qsParm['fund_name'];
				//document.form.fund_descrip.value = qsParm['fund_descrip'];
				//document.getElementsByTagName("h1")[0].innerHTML = qsParm['fund_name'];
				return true;
			}
			qs();
			
			function checkIntlNonres() {
				var qsParm = qs();
				//alert(qsParm['IntlNonres']);
				if (qsParm['IntlNonres'] == 'yes') {
					jQuery('#resideUS').show();
					document.getElementById('usCitizenOther').checked=true;
					document.getElementsByName('ResideUS')[1].checked=true;
				}
				else {
					jQuery('#resideUS').hide();
					document.getElementById('usCitizenOther').checked=false;
					document.getElementsByName('ResideUS')[1].checked=false;
				}
			}
			//jQuery(document).ready( checkIntlNonres() );
			
			// For reload, eg displaying validation errors on the form
			if ( jQuery('#usCitizenOther').attr("checked") ) {jQuery('#resideUS').show();}
			</script>			 			
 		</article>
 	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>