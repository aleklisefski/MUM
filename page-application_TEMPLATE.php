<?php
	/*
	Template Name: Application Form TEMPLATE
	*/

	get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

<section class="body portal application">
 	<div class="container">	
 		<aside>
			<p>&nbsp;</p>
			<div class="clearFix"></div>
 		</aside>
 		<article>
			<!-- The Content -->
 			<?php the_content(''); ?>
 			<?php include (TEMPLATEPATH . '/inc/flexible-content.php'); ?>  

			<form id="application" class="form">
				
				<div class="ui-tabs ui-widget ui-widget-content ui-corner-all green" id="tabs">
					<ul role="tablist" class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
						<li aria-selected="false" aria-labelledby="ui-id-5" aria-controls="tabs-5" tabindex="-1" role="tab" class="ui-state-default ui-corner-top view-all"><a id="ui-id-5" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#tabs-5">Show All</a></li>
						<li aria-selected="true" aria-labelledby="ui-id-1" aria-controls="tabs-1" tabindex="0" role="tab" class="ui-state-default ui-corner-top ui-tabs-active ui-state-active"><a id="ui-id-1" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#tabs-1">1. Name / Contact</a></li>
						<li aria-selected="false" aria-labelledby="ui-id-2" aria-controls="tabs-2" tabindex="-1" role="tab" class="ui-state-default ui-corner-top"><a id="ui-id-2" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#tabs-2">2. Address</a></li>
						<li aria-selected="false" aria-labelledby="ui-id-3" aria-controls="tabs-3" tabindex="-1" role="tab" class="ui-state-default ui-corner-top"><a id="ui-id-3" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#tabs-3">3. Enrollment Info</a></li>
						<li aria-selected="false" aria-labelledby="ui-id-4" aria-controls="tabs-4" tabindex="-1" role="tab" class="ui-state-default ui-corner-top"><a id="ui-id-4" tabindex="-1" role="presentation" class="ui-tabs-anchor" href="#tabs-4">4. Personal Info</a></li>
						
					</ul>
				</div>
						
				<h3>Name, Contact Information & Citizenship</h3>
				<p>
					<span class="required">* indicates required</span>
					<strong>U.S. students</strong> - please use the name from your social security card.<br />
					<strong>International students</strong> - please use the name as it appears on your passport.
				</p>
				<fieldset>
					<label>* First (Given) Name</label>
					<input type="text" />
					<label>Middle Name <span>(if any)</span></label>
					<input type="text" />
					<label>* Last (Family) Name</label>
					<input type="text" />
					<label>Former or Maiden Name</label>
					<input type="text" />
					<label>* Email Address<br /><span>(enter only one)</span></label>
					<input type="text" />
					<p>Please use an email that is not shared with someone else. 
By submitting this application form, you voluntarily provide your email address for the purpose of correspondence and electronic information transactions with the University, including information about financial aid.</p>

					<label>* Citizenship</label>
					<p>
						<input type="radio" name="citizenship" value="USA">USA citizen<br />
						<input type="radio" name="citizenship" value="Canada">Canadian citizen<br />
						<input type="radio" name="citizenship" value="Resident">U.S. Permanent Resident (Green Card holder)<br />
						<input type="radio" name="citizenship" value="International">International (citizen of any country except USA or Canada)
					</p> 
				</fieldset>
				
				<p><strong>Please enter at least one phone number, including area code.</strong> Include country code for international phones.</p>
				<fieldset>
					<label>Daytime Phone</label>
					<input type="text" />
					<label>Evening Phone</label>
					<input type="text" />
					<label>Cell Phone</label>
					<input type="text" />
				</fieldset>
				
				<h3>Current Mailing Address <span>(where you receive mail)</span></h3>
				<fieldset>
					<label>* Street Address 1</label>
					<input type="text" />
					<label>Street Address 2</label>
					<input type="text" />
					<label>Street Address 3</label>
					<input type="text" />
					<label>City</label>
					<input type="text" />
					<label>* State/Province/Region</label>
					<div class="input">
						<select name="mail_state" class="app">
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
								<option value="RI">RI Rhode Island</option>
								<option value="SC">SC South Carolina</option>
								<option value="SD">SD South Dakota</option>
								<option value="TN">TN Tennessee</option>
								<option value="TX">TX Texas</option>
								<option value="UT">UT Utah</option>
								<option value="VT">VT Vermont</option>
								<option value="VA">VA Virginia</option>
								<option value="WA">WA Washington</option>
								<option value="WV">WV West Virginia</option>
								<option value="WI">WI Wisconsin</option>
								<option value="WY">WY Wyoming</option>
							</optgroup>
							<optgroup label="Canada">
								<option value="AB">AB Alberta</option>
								<option value="BC">BC British Columbia</option>
								<option value="MB">MB Manitoba</option>
								<option value="NB">NB New Brunswick</option>
								<option value="NL">NL Newfoundland and Labrador</option>
								<option value="NS">NS Nova Scotia</option>
								<option value="NT">NT Northwest Territories</option>
								<option value="NU">NU Nunavut</option>
								<option value="ON">ON Ontario</option>
								<option value="PE">PE Prince Edward Island</option>
								<option value="QC">QC Quebec</option>
								<option value="SK">SK Saskatchewan</option>
								<option value="YT">YT Yukon</option>
							</optgroup>
						</select>
					</div>
					
					<label>* Zip or Postal Code</label>
					<input type="text" />
					<label>* Country or Region</label>
					<div class="input">
						<select name="mail_country" class="app">
							<option value="" selected="selected">Select a Country or Region</option>
							<option value="USA  United States">United States</option>
							<option value="CAN  Canada">Canada</option>
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
							<!--<option value="CAN  Canada">Canada</option> -->
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
							<!--<option value="USA  United States">United States</option> -->
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
						</select>
					</div>
					
				</fieldset>
				
				<h3>Additional Address Information</h3>
				<fieldset>
					<label>Current mailing address is valid until</label>
					<input type="text" class="hasDatepicker" />
					<div class="clearFix"></div><!-- this is needed after content where label is taller then input fields -->
					<label>* Is your current mailing address the same as your permanent residence address?</label>
					<p>
						<input type="radio" name="addressValid" value="Yes">Yes<br />
						<input type="radio" name="addressValid" value="No">No<br />
					</p> 
					<div class="clearFix"></div><!-- this is needed after content where label is taller then input fields -->
					<label>Sample Short Textarea</label>
					<textarea rows="3"></textarea>
					<label>Sample Tall Textarea</label>
					<textarea rows="12"></textarea>
				</fieldset>
				
				<h3>High School Information</h3>
				<fieldset>
					<label>Please select what you have received, or expect to receive</label>
					<p>
						<input type="radio">Diploma <br />
						<input type="radio">Home school <br />
						<input type="radio">GED <br />
						<input type="radio">Other
					</p> 

					<label>Name of School</label>
					<input type="text" />
					<label>Year received, or expect to receive, diploma, certificate, GED or other</label>
					<input type="text" />
				</fieldset>
				
				<h3>Educational Institutions Attended After High School</h3>
				<p>Please list the most recent first.</p>
				<fieldset>
					<div class="grid thirds">
						<div class="item first">
							<label>Name of Institution</label>
							<input type="text" />
						</div>
						<div class="item">
							<label>Degree Received</label>
							<input type="text" />
						</div>
						<div class="item third">
							<label>Year Awarded</label>
							<input type="text" />
						</div>
						<div class="item first">
							<label>Name of Institution</label>
							<input type="text" />
						</div>
						<div class="item">
							<label>Degree Received</label>
							<input type="text" />
						</div>
						<div class="item third">
							<label>Year Awarded</label>
							<input type="text" />
						</div>
						<div class="clearFix"></div>
					</div>
					<input type="checkbox">Include more schools
				</fieldset>
			
				<div class="call-out">
					<p><strong>You may fill in part of the form, then return later to complete it.</strong> After you click the "Save and Continue Later" button, you will receive an email with a special link that allows you to return later and continue. Please complete at least the first section: Name, Contact Information & Citizenship.</p>
					<p>
						<a class="button" href="#">Save and Continue later</a><span class="or">OR</span>
						<a class="button" href="#">Continue to next section</a>
					</p>
				</div>
			</form>

 			
  		</article>
 	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>