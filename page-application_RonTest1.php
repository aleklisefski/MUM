<?php
	/*
	Template Name: Application Form - Ron Test 1
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
			<a id="startForm"></a>
			<?php the_content(''); ?>
			<?php include (TEMPLATEPATH . '/inc/flexible-content.php'); ?>
<!-- ******************** TEST RON TODO ******************** -->
<style type="text/css">
/* *************
Wrap the select element in a div with a fixed width (say 150 pixels) and overflow hidden.
Give the select element a width of about 20 pixels greater than the enclosing div.
The result is that the default drop-down arrow of the select element will be chopped off, and you can place any background image you want on the right-hand-side of the div.
************* */
/* c5e9f5:light blue, fbf8f1:tan, 59ae35:greenish, f1a416:orangish */
.styled {
	width: 450px;
	height: 34px;
	overflow: hidden;
	background-image: url("../media/icons_contact_sprite.png");
}
.styled select {
	background: #fff;
	color:#666;
	width: 470px;
	padding: 5px;
	font-size: 16px;
	border: 1px solid #fbf8f1;
	height: 34px;
	-webkit-appearance: none;
	font-family: MuseoSans,arial,sans-serif;
	font-size: 14px;
}
.styled select option {
	padding-top: 5px;
	padding-bottom: 5px;
	padding-left: 15px;
	/*line-height: 26px;*/
}
</style>
<!-- ******************** START OF APPLICATION FORM ******************** -->
<form action="https://dev.mum.edu/admissions/apply-online/online-application-form/application-fee-payment-form/" method="post" name="applic" id="applic" onsubmit="return finalSubmitAjax();">
<input type="hidden" name="appcacheid" value="" />
<input type="hidden" name="application_id" />
<input type="hidden" name="date_submit" />
<input type="hidden" name="status" value="i" />
<input type="hidden" name="ShortMajor" value="ERROR" />
<input type="hidden" name="UPERMUSRES" value="" />
<input type="hidden" name="UUSINTL" value="" />
<input type="hidden" name="procterm" value="" /><!-- procterm and procyear are set by setYT() -->
<input type="hidden" name="procyear" value="" />
<input type="hidden" name="enterstat" value="" />
<input type="hidden" name="birthdate" />
<input type="hidden" name="tmsidhi_date" />
<input type="hidden" name="add_gender_info" value="" />
<!-- ******************** TABS ******************** -->
<div id="tabs">
<div id="tabs_only" class="green">
<ul class="tabs">
	<li><a href="#tabs-1">1. Name / Contact</a></li>
	<li><a href="#tabs-2">2. Address</a></li>
	<li><a href="#tabs-3">3. Enrollment Info</a></li>
	<li><a href="#tabs-4">4. Personal Info</a></li>
	<li class="view-all"><a href="#tabs-5">Show All</a></li>
</ul>
</div><!-- id="tabs" -->
<!-- Without all the tab content placed within the same div as the tabs, it raises "Uncaught Error: jQuery UI Tabs: Mismatching fragment identifier." tabs-5 blank div is not required and does not get rid of the error. -->
<!-- #################### BEGIN TAB 1 #################### -->
<div id="tabs-1" class="tab_content">
<!-- ******************** SECTION HEADING ******************** -->
<h3>Name, Contact Information & Citizenship</h3>
<p>
<span class="required">* indicates required</span>
<strong>U.S. students</strong> - please use the name from your social security card.<br>
<strong>International students</strong> - please use the name as it appears on your passport.
</p>
<!-- ******************** NAME ******************** -->
<fieldset>
<label>* First (Given) Name </label>
	<input type="text" name="firstname" size="30" maxlength="30" />
	<label>Middle Name <span>(if any)</span></label>
	<input type="text" name="middlename" size="30" maxlength="30" />
	<label>* Last (Family) Name</label>
	<input type="text" name="lastname" size="30" maxlength="30" />
	<label>Former or Maiden Name <span>(if any)</span></label>
	<input type="text" name="formername" size="30" maxlength="35" />
</fieldset>

<!-- ******************** CONTACT INFORMATION ******************** -->
<h3>Contact Information</h3>
<fieldset>
	<label>* Email Address<br><span>(enter only one)</span></label>
	<p><strong>Please use an email that is not shared with someone else.</strong></p>
	<input name="email" type="text" size="40" maxlength="75" /><p><em>I voluntarily provide my email address for the purpose of correspondence and electronic information transactions with the University, including information about financial aid.</em></p>
	<div class="clearFix"></div>
	<p><strong>* Please enter at least one phone number</strong>, including area code. Include country code for international phones.</p>

	<label>Daytime Telephone</label>
	<input name="phone_day" type="text" size="25" maxlength="25" />
	<label>Evening Telephone</label>
	<input name="phone_evening" type="text" size="25" maxlength="25" />
	<label>Cell Phone </label>
	<input name="cellphone" type="text" size="25" maxlength="25" />
</fieldset>

<!-- ******************** CITIZENSHIP ******************** -->
<h3>Citizenship</h3>
<fieldset>
<label>* Country of Citizenship</label>
<p class="radio">
<label><input name="citizenship" type="radio" value="U" onclick="makeCitizen('U', this); return true;" />USA citizen</label><br>
<label><input name="citizenship" type="radio" value="P" onclick="makeCitizen('P', this); return true;" />U.S. Permanent Resident (Green Card holder)</label><br>
<label><input name="citizenship" type="radio" value="I" onclick="makeCitizen('I', this); return true;" />International (citizen of any country except USA or Canada)</label>
</p>
<div id="green" style="display:none;">
<label>INS A#</label>
<input name="green_card" class="size15 inputtextinline" type="text" size="12" maxlength="30" onblur="checkINS();" />
</div>

<div id="intl_info" style="display:none;">
<label>* Country or Region of Citizenship</label>
<div class="input styled">
<select name="citizenship_country" id="citizenship_country">
<option value="" selected="selected">Select a Country or Region</option>
<option value="AFG">Afghanistan</option>
<option value="ALA">Aland Islands</option>
<option value="ALB">Albania</option>
<option value="DZA">Algeria</option>
<option value="ASM">American Samoa</option>
<option value="AND">Andorra</option>
<option value="AGO">Angola</option>
<option value="AIA">Anguilla</option>
<option value="ATG">Antigua &amp; Barbuda</option>
<option value="ARG">Argentina</option>
<option value="ARM">Armenia</option>
<option value="ABW">Aruba</option>
<option value="AUS">Australia</option>
<option value="AUT">Austria</option>
<option value="AZE">Azerbaijan</option>
<option value="BHS">Bahamas</option>
<option value="BHR">Bahrain</option>
<option value="BGD">Bangladesh</option>
<option value="BRB">Barbados</option>
<option value="BLR">Belarus</option>
<option value="BEL">Belgium</option>
<option value="BLZ">Belize</option>
<option value="BEN">Benin</option>
<option value="BMU">Bermuda</option>
<option value="BTN">Bhutan</option>
<option value="BOL">Bolivia</option>
<option value="BIH">Bosnia &amp; Herzegovina</option>
<option value="BWA">Botswana</option>
<option value="BRA">Brazil</option>
<option value="VGB">British Virgin Islands</option>
<option value="BRN">Brunei Darussalam</option>
<option value="BGR">Bulgaria</option>
<option value="BFA">Burkina Faso</option>
<option value="BDI">Burundi</option>
<option value="KHM">Cambodia</option>
<option value="CMR">Cameroon</option>
<option value="CAN">Canada</option>
<option value="CPV">Cape Verde</option>
<option value="CYM">Cayman Islands</option>
<option value="CAF">Central African Republic</option>
<option value="TCD">Chad</option>
<option value="GBR">Channel Islands</option>
<option value="CHL">Chile</option>
<option value="CHN">China</option>
<option value="COL">Colombia</option>
<option value="COM">Comoros</option>
<option value="COG">Congo</option>
<option value="COD">Congo, Dem. Rep. of</option>
<option value="COK">Cook Islands</option>
<option value="CRI">Costa Rica</option>
<option value="CIV">Cote d'Ivoire</option>
<option value="HRV">Croatia</option>
<option value="CUB">Cuba</option>
<option value="CYP">Cyprus</option>
<option value="CZE">Czech Republic</option>
<option value="PRK">Dem. People's Rep. of Korea</option>
<option value="COD">Dem. Rep. of the Congo</option>
<option value="DNK">Denmark</option>
<option value="DJI">Djibouti</option>
<option value="DMA">Dominica</option>
<option value="DOM">Dominican Republic</option>
<option value="ECU">Ecuador</option>
<option value="EGY">Egypt</option>
<option value="SLV">El Salvador</option>
<option value="GNQ">Equatorial Guinea</option>
<option value="ERI">Eritrea</option>
<option value="EST">Estonia</option>
<option value="ETH">Ethiopia</option>
<option value="FRO">Faeroe Islands</option>
<option value="FLK">Falkland Islands (Malvinas)</option>
<option value="FJI">Fiji</option>
<option value="FIN">Finland</option>
<option value="FRA">France</option>
<option value="GUF">French Guiana</option>
<option value="PYF">French Polynesia</option>
<option value="GAB">Gabon</option>
<option value="GMB">Gambia</option>
<option value="GEO">Georgia</option>
<option value="DEU">Germany</option>
<option value="GHA">Ghana</option>
<option value="GIB">Gibraltar</option>
<option value="GRC">Greece</option>
<option value="GRL">Greenland</option>
<option value="GRD">Grenada</option>
<option value="GLP">Guadeloupe</option>
<option value="GUM">Guam</option>
<option value="GTM">Guatemala</option>
<option value="GBR">Guernsey</option>
<option value="GIN">Guinea</option>
<option value="GNB">Guinea-Bissau</option>
<option value="GUY">Guyana</option>
<option value="HTI">Haiti</option>
<option value="VAT">Holy See</option>
<option value="HND">Honduras</option>
<option value="HKG">Hong Kong, China</option>
<option value="HUN">Hungary</option>
<option value="ISL">Iceland</option>
<option value="IND">India</option>
<option value="IDN">Indonesia</option>
<option value="IRN">Iran, Islamic Republic of</option>
<option value="IRQ">Iraq</option>
<option value="IRL">Ireland</option>
<option value="GBR">Isle of Man</option>
<option value="ISR">Israel</option>
<option value="ITA">Italy</option>
<option value="JAM">Jamaica</option>
<option value="JPN">Japan</option>
<option value="GBR">Jersey</option>
<option value="JOR">Jordan</option>
<option value="KAZ">Kazakhstan</option>
<option value="KEN">Kenya</option>
<option value="KIR">Kiribati</option>
<option value="PRK">Korea, Dem. People's Rep.</option>
<option value="KOR">Korea, Republic of </option>
<option value="KWT">Kuwait</option>
<option value="KGZ">Kyrgyzstan</option>
<option value="LAO">Laos PDR</option>
<option value="LVA">Latvia</option>
<option value="LBN">Lebanon</option>
<option value="LSO">Lesotho</option>
<option value="LBR">Liberia</option>
<option value="LBY">Libyan Arab Jamahiriya</option>
<option value="LIE">Liechtenstein</option>
<option value="LTU">Lithuania</option>
<option value="LUX">Luxembourg</option>
<option value="MAC">Macao, China</option>
<option value="MKD">Macedonia, Republic of</option>
<option value="MDG">Madagascar</option>
<option value="MWI">Malawi</option>
<option value="MYS">Malaysia</option>
<option value="MDV">Maldives</option>
<option value="MLI">Mali</option>
<option value="MLT">Malta</option>
<option value="MHL">Marshall Islands</option>
<option value="MTQ">Martinique</option>
<option value="MRT">Mauritania</option>
<option value="MUS">Mauritius</option>
<option value="MYT">Mayotte</option>
<option value="MEX">Mexico</option>
<option value="FSM">Micronesia, Fed. States</option>
<option value="MDA">Moldova, Republic of</option>
<option value="MCO">Monaco</option>
<option value="MNG">Mongolia</option>
<option value="MSR">Montserrat</option>
<option value="MAR">Morocco</option>
<option value="MOZ">Mozambique</option>
<option value="MMR">Myanmar</option>
<option value="NAM">Namibia</option>
<option value="NRU">Nauru</option>
<option value="NPL">Nepal</option>
<option value="NLD">Netherlands</option>
<option value="ANT">Netherlands Antilles</option>
<option value="NCL">New Caledonia</option>
<option value="NZL">New Zealand</option>
<option value="NIC">Nicaragua</option>
<option value="NER">Niger</option>
<option value="NGA">Nigeria</option>
<option value="NIU">Niue</option>
<option value="NFK">Norfolk Island</option>
<option value="MNP">Northern Mariana Islands</option>
<option value="NOR">Norway</option>
<option value="OMN">Oman</option>
<option value="PSE">Palestinian Territory</option>
<option value="PAK">Pakistan</option>
<option value="PLW">Palau</option>
<option value="PAN">Panama</option>
<option value="PNG">Papua New Guinea</option>
<option value="PRY">Paraguay</option>
<option value="PER">Peru</option>
<option value="PHL">Philippines</option>
<option value="PCN">Pitcairn</option>
<option value="POL">Poland</option>
<option value="PRT">Portugal</option>
<option value="PRI">Puerto Rico</option>
<option value="QAT">Qatar</option>
<option value="KOR">Republic of Korea</option>
<option value="MDA">Republic of Moldova</option>
<option value="REU">Reunion</option>
<option value="ROU">Romania</option>
<option value="RUS">Russian Federation</option>
<option value="RWA">Rwanda</option>
<option value="SHN">Saint Helena</option>
<option value="KNA">Saint Kitts &amp; Nevis</option>
<option value="LCA">Saint Lucia</option>
<option value="SPM">Saint Pierre &amp; Miquelon</option>
<option value="VCT">Saint Vincent &amp; Grenadines</option>
<option value="WSM">Samoa</option>
<option value="SMR">San Marino</option>
<option value="STP">Sao Tome &amp; Principe</option>
<option value="SAU">Saudi Arabia</option>
<option value="SEN">Senegal</option>
<option value="SCG">Serbia &amp; Montenegro</option>
<option value="SYC">Seychelles</option>
<option value="SLE">Sierra Leone</option>
<option value="SGP">Singapore</option>
<option value="SVK">Slovakia</option>
<option value="SVN">Slovenia</option>
<option value="SLB">Solomon Islands</option>
<option value="SOM">Somalia</option>
<option value="ZAF">South Africa</option>
<option value="ESP">Spain</option>
<option value="LKA">Sri Lanka</option>
<option value="SDN">Sudan</option>
<option value="SUR">Suriname</option>
<option value="SJM">Svalbard &amp; Jan Mayen</option>
<option value="SWZ">Swaziland</option>
<option value="SWE">Sweden</option>
<option value="CHE">Switzerland</option>
<option value="SYR">Syrian Arab Republic</option>
<option value="TAI">Taiwan, China</option>
<option value="TJK">Tajikistan</option>
<option value="TZA">Tanzania, United Rep.</option>
<option value="THA">Thailand</option>
<option value="TLS">Timor-Leste</option>
<option value="TGO">Togo</option>
<option value="TKL">Tokelau</option>
<option value="TON">Tonga</option>
<option value="TTO">Trinidad &amp; Tobago</option>
<option value="TUN">Tunisia</option>
<option value="TUR">Turkey</option>
<option value="TKM">Turkmenistan</option>
<option value="TCA">Turks &amp; Caicos Islands</option>
<option value="TUV">Tuvalu</option>
<option value="UGA">Uganda</option>
<option value="UKR">Ukraine</option>
<option value="ARE">United Arab Emirates</option>
<option value="GBR">United Kingdom</option>
<option value="TZA">United Rep. of Tanzania</option>
<option value="VIR">U.S. Virgin Islands</option>
<option value="URY">Uruguay</option>
<option value="UZB">Uzbekistan</option>
<option value="VUT">Vanuatu</option>
<option value="VEN">Venezuela</option>
<option value="VNM">Viet Nam</option>
<option value="VGB">Virgin Islands, British </option>
<option value="VIR">Virgin Islands, U.S.</option>
<option value="WLF">Wallis &amp; Futuna Islands</option>
<option value="ESH">Western Sahara</option>
<option value="YEM">Yemen</option>
<option value="ZMB">Zambia</option>
<option value="ZWE">Zimbabwe</option>
</select>
</div>

<div class="clearFix"></div>
<label>* Country or Region of Birth</label>
<div class="input">
<select name="country_birth">
<option value="" selected="selected">Select a Country or Region</option>
<option value="AFG">Afghanistan</option>
<option value="ALA">Aland Islands</option>
<option value="ALB">Albania</option>
<option value="DZA">Algeria</option>
<option value="ASM">American Samoa</option>
<option value="AND">Andorra</option>
<option value="AGO">Angola</option>
<option value="AIA">Anguilla</option>
<option value="ATG">Antigua &amp; Barbuda</option>
<option value="ARG">Argentina</option>
<option value="ARM">Armenia</option>
<option value="ABW">Aruba</option>
<option value="AUS">Australia</option>
<option value="AUT">Austria</option>
<option value="AZE">Azerbaijan</option>
<option value="BHS">Bahamas</option>
<option value="BHR">Bahrain</option>
<option value="BGD">Bangladesh</option>
<option value="BRB">Barbados</option>
<option value="BLR">Belarus</option>
<option value="BEL">Belgium</option>
<option value="BLZ">Belize</option>
<option value="BEN">Benin</option>
<option value="BMU">Bermuda</option>
<option value="BTN">Bhutan</option>
<option value="BOL">Bolivia</option>
<option value="BIH">Bosnia &amp; Herzegovina</option>
<option value="BWA">Botswana</option>
<option value="BRA">Brazil</option>
<option value="VGB">British Virgin Islands</option>
<option value="BRN">Brunei Darussalam</option>
<option value="BGR">Bulgaria</option>
<option value="BFA">Burkina Faso</option>
<option value="BDI">Burundi</option>
<option value="KHM">Cambodia</option>
<option value="CMR">Cameroon</option>
<option value="CAN">Canada</option>
<option value="CPV">Cape Verde</option>
<option value="CYM">Cayman Islands</option>
<option value="CAF">Central African Republic</option>
<option value="TCD">Chad</option>
<option value="GBR">Channel Islands</option>
<option value="CHL">Chile</option>
<option value="CHN">China</option>
<option value="COL">Colombia</option>
<option value="COM">Comoros</option>
<option value="COG">Congo</option>
<option value="COD">Congo, Dem. Rep. of</option>
<option value="COK">Cook Islands</option>
<option value="CRI">Costa Rica</option>
<option value="CIV">Cote d'Ivoire</option>
<option value="HRV">Croatia</option>
<option value="CUB">Cuba</option>
<option value="CYP">Cyprus</option>
<option value="CZE">Czech Republic</option>
<option value="PRK">Dem. People's Rep. of Korea</option>
<option value="COD">Dem. Rep. of the Congo</option>
<option value="DNK">Denmark</option>
<option value="DJI">Djibouti</option>
<option value="DMA">Dominica</option>
<option value="DOM">Dominican Republic</option>
<option value="ECU">Ecuador</option>
<option value="EGY">Egypt</option>
<option value="SLV">El Salvador</option>
<option value="GNQ">Equatorial Guinea</option>
<option value="ERI">Eritrea</option>
<option value="EST">Estonia</option>
<option value="ETH">Ethiopia</option>
<option value="FRO">Faeroe Islands</option>
<option value="FLK">Falkland Islands (Malvinas)</option>
<option value="FJI">Fiji</option>
<option value="FIN">Finland</option>
<option value="FRA">France</option>
<option value="GUF">French Guiana</option>
<option value="PYF">French Polynesia</option>
<option value="GAB">Gabon</option>
<option value="GMB">Gambia</option>
<option value="GEO">Georgia</option>
<option value="DEU">Germany</option>
<option value="GHA">Ghana</option>
<option value="GIB">Gibraltar</option>
<option value="GRC">Greece</option>
<option value="GRL">Greenland</option>
<option value="GRD">Grenada</option>
<option value="GLP">Guadeloupe</option>
<option value="GUM">Guam</option>
<option value="GTM">Guatemala</option>
<option value="GBR">Guernsey</option>
<option value="GIN">Guinea</option>
<option value="GNB">Guinea-Bissau</option>
<option value="GUY">Guyana</option>
<option value="HTI">Haiti</option>
<option value="VAT">Holy See</option>
<option value="HND">Honduras</option>
<option value="HKG">Hong Kong, China</option>
<option value="HUN">Hungary</option>
<option value="ISL">Iceland</option>
<option value="IND">India</option>
<option value="IDN">Indonesia</option>
<option value="IRN">Iran, Islamic Republic of</option>
<option value="IRQ">Iraq</option>
<option value="IRL">Ireland</option>
<option value="GBR">Isle of Man</option>
<option value="ISR">Israel</option>
<option value="ITA">Italy</option>
<option value="JAM">Jamaica</option>
<option value="JPN">Japan</option>
<option value="GBR">Jersey</option>
<option value="JOR">Jordan</option>
<option value="KAZ">Kazakhstan</option>
<option value="KEN">Kenya</option>
<option value="KIR">Kiribati</option>
<option value="PRK">Korea, Dem. People's Rep.</option>
<option value="KOR">Korea, Republic of </option>
<option value="KWT">Kuwait</option>
<option value="KGZ">Kyrgyzstan</option>
<option value="LAO">Laos PDR</option>
<option value="LVA">Latvia</option>
<option value="LBN">Lebanon</option>
<option value="LSO">Lesotho</option>
<option value="LBR">Liberia</option>
<option value="LBY">Libyan Arab Jamahiriya</option>
<option value="LIE">Liechtenstein</option>
<option value="LTU">Lithuania</option>
<option value="LUX">Luxembourg</option>
<option value="MAC">Macao, China</option>
<option value="MKD">Macedonia, Republic of</option>
<option value="MDG">Madagascar</option>
<option value="MWI">Malawi</option>
<option value="MYS">Malaysia</option>
<option value="MDV">Maldives</option>
<option value="MLI">Mali</option>
<option value="MLT">Malta</option>
<option value="MHL">Marshall Islands</option>
<option value="MTQ">Martinique</option>
<option value="MRT">Mauritania</option>
<option value="MUS">Mauritius</option>
<option value="MYT">Mayotte</option>
<option value="MEX">Mexico</option>
<option value="FSM">Micronesia, Fed. States</option>
<option value="MDA">Moldova, Republic of</option>
<option value="MCO">Monaco</option>
<option value="MNG">Mongolia</option>
<option value="MSR">Montserrat</option>
<option value="MAR">Morocco</option>
<option value="MOZ">Mozambique</option>
<option value="MMR">Myanmar</option>
<option value="NAM">Namibia</option>
<option value="NRU">Nauru</option>
<option value="NPL">Nepal</option>
<option value="NLD">Netherlands</option>
<option value="ANT">Netherlands Antilles</option>
<option value="NCL">New Caledonia</option>
<option value="NZL">New Zealand</option>
<option value="NIC">Nicaragua</option>
<option value="NER">Niger</option>
<option value="NGA">Nigeria</option>
<option value="NIU">Niue</option>
<option value="NFK">Norfolk Island</option>
<option value="MNP">Northern Mariana Islands</option>
<option value="NOR">Norway</option>
<option value="OMN">Oman</option>
<option value="PSE">Palestinian Territory</option>
<option value="PAK">Pakistan</option>
<option value="PLW">Palau</option>
<option value="PAN">Panama</option>
<option value="PNG">Papua New Guinea</option>
<option value="PRY">Paraguay</option>
<option value="PER">Peru</option>
<option value="PHL">Philippines</option>
<option value="PCN">Pitcairn</option>
<option value="POL">Poland</option>
<option value="PRT">Portugal</option>
<option value="PRI">Puerto Rico</option>
<option value="QAT">Qatar</option>
<option value="KOR">Republic of Korea</option>
<option value="MDA">Republic of Moldova</option>
<option value="REU">Reunion</option>
<option value="ROU">Romania</option>
<option value="RUS">Russian Federation</option>
<option value="RWA">Rwanda</option>
<option value="SHN">Saint Helena</option>
<option value="KNA">Saint Kitts &amp; Nevis</option>
<option value="LCA">Saint Lucia</option>
<option value="SPM">Saint Pierre &amp; Miquelon</option>
<option value="VCT">Saint Vincent &amp; Grenadines</option>
<option value="WSM">Samoa</option>
<option value="SMR">San Marino</option>
<option value="STP">Sao Tome &amp; Principe</option>
<option value="SAU">Saudi Arabia</option>
<option value="SEN">Senegal</option>
<option value="SCG">Serbia &amp; Montenegro</option>
<option value="SYC">Seychelles</option>
<option value="SLE">Sierra Leone</option>
<option value="SGP">Singapore</option>
<option value="SVK">Slovakia</option>
<option value="SVN">Slovenia</option>
<option value="SLB">Solomon Islands</option>
<option value="SOM">Somalia</option>
<option value="ZAF">South Africa</option>
<option value="ESP">Spain</option>
<option value="LKA">Sri Lanka</option>
<option value="SDN">Sudan</option>
<option value="SUR">Suriname</option>
<option value="SJM">Svalbard &amp; Jan Mayen</option>
<option value="SWZ">Swaziland</option>
<option value="SWE">Sweden</option>
<option value="CHE">Switzerland</option>
<option value="SYR">Syrian Arab Republic</option>
<option value="TAI">Taiwan, China</option>
<option value="TJK">Tajikistan</option>
<option value="TZA">Tanzania, United Rep.</option>
<option value="THA">Thailand</option>
<option value="TLS">Timor-Leste</option>
<option value="TGO">Togo</option>
<option value="TKL">Tokelau</option>
<option value="TON">Tonga</option>
<option value="TTO">Trinidad &amp; Tobago</option>
<option value="TUN">Tunisia</option>
<option value="TUR">Turkey</option>
<option value="TKM">Turkmenistan</option>
<option value="TCA">Turks &amp; Caicos Islands</option>
<option value="TUV">Tuvalu</option>
<option value="UGA">Uganda</option>
<option value="UKR">Ukraine</option>
<option value="ARE">United Arab Emirates</option>
<option value="GBR">United Kingdom</option>
<option value="TZA">United Rep. of Tanzania</option>
<option value="VIR">U.S. Virgin Islands</option>
<option value="URY">Uruguay</option>
<option value="UZB">Uzbekistan</option>
<option value="VUT">Vanuatu</option>
<option value="VEN">Venezuela</option>
<option value="VNM">Viet Nam</option>
<option value="VGB">Virgin Islands, British </option>
<option value="VIR">Virgin Islands, U.S.</option>
<option value="WLF">Wallis &amp; Futuna Islands</option>
<option value="ESH">Western Sahara</option>
<option value="YEM">Yemen</option>
<option value="ZMB">Zambia</option>
<option value="ZWE">Zimbabwe</option>
	</select>
</div>

<div class="clearFix"></div>
<label>* Do you currently have a U.S. Visa?</label>
<p class="radio">
	<label><input name="visa" type="radio" value="Y" onclick="makeVisible('visadiv');restyleOneSelectMenuInApp(da.visa_type);return true;" />Yes</label><br>
	<label><input name="visa" type="radio" value="N" onclick="makeInvisible('visadiv'); return true;" />No</label>
</p>

<div id="visadiv" style="display:none;">
<label>* Visa type</label>
<div class="input">
<select name="visa_type">
<option value="" selected="selected">Select Visa Type</option>
<option value="F-1">F-1</option>
<option value="F-2">F-2</option>
<option value="H1B">H-1B</option>
<option value="H-4">H-4</option>
<option value="J-1">J-1</option>
<option value="J-2">J-2</option>
<option value="B-1">B-1</option>
<option value="B-2">B-2</option>
<option value="M-1">M-1</option>
<option value="M-2">M-2</option>
<option value="L-1">L-1</option>
<option value="L-2">L-2</option>
<option value="otr">Other</option>
</select>
</div>
<div class="clearFix"></div>
<label>* Visa expiration date<br><span>(mm/dd/yyyy)</span></label>
<input name="visa_expire" type="text" class="size10 inputtextinline" size="10" maxlength="10" />
</div><!-- id="visadiv" -->
</div><!-- id="intl_info" end of International citizenship section -->
<div class="clearFix"></div>
</fieldset>
</div><!-- end Tab 1 -->
<!-- #################### BEGIN TAB 2 #################### -->
<div id="tabs-2" class="tab_content">
<!-- ******************** CURRENT MAILING ADDRESS ******************** -->
<h3>Current Mailing Address <span>(where you receive mail)</span></h3>
<fieldset>

<label>* Street Address 1</label>
<input name="mail_address_1" type="text" size="35" maxlength="40" />

<label>Street Address 2</label>
<input name="mail_address_2" type="text" size="35" maxlength="40" />

<label>Street Address 3</label>
<input name="mail_address_3" type="text" size="35" maxlength="40" />

<label>* City</label>
<input name="mail_city" type="text" size="30" maxlength="30" />

<label>* State/Province<br><span>(USA or Canada)</span></label>
<div class="input styled">
<select name="mail_state">
<option value="" selected="selected">Select State or Province</option>
<optgroup label="USA">
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
</div><!-- class="input" -->

<div class="clearFix"></div>
<label>* State/Province/Region<br><span>(NOT U.S. or Canada)</span></label>
<input name="mail_state_other" type="text" class="size20 inputtextinline" size="20" maxlength="20" />
<div class="clearFix"></div>

<label>* Zip or Postal Code </label>
<input name="mail_zipcode" type="text" class="size10" size="10" maxlength="10" />

<label>* Country or Region</label>
<div class="input">
<select name="mail_country">
<option value="" selected="selected">Select a Country or Region</option>
<option value="USA">United States</option>
<option value="CAN">Canada</option>
<option value="AFG">Afghanistan</option>
<option value="ALA">Aland Islands</option>
<option value="ALB">Albania</option>
<option value="DZA">Algeria</option>
<option value="ASM">American Samoa</option>
<option value="AND">Andorra</option>
<option value="AGO">Angola</option>
<option value="AIA">Anguilla</option>
<option value="ATG">Antigua &amp; Barbuda</option>
<option value="ARG">Argentina</option>
<option value="ARM">Armenia</option>
<option value="ABW">Aruba</option>
<option value="AUS">Australia</option>
<option value="AUT">Austria</option>
<option value="AZE">Azerbaijan</option>
<option value="BHS">Bahamas</option>
<option value="BHR">Bahrain</option>
<option value="BGD">Bangladesh</option>
<option value="BRB">Barbados</option>
<option value="BLR">Belarus</option>
<option value="BEL">Belgium</option>
<option value="BLZ">Belize</option>
<option value="BEN">Benin</option>
<option value="BMU">Bermuda</option>
<option value="BTN">Bhutan</option>
<option value="BOL">Bolivia</option>
<option value="BIH">Bosnia &amp; Herzegovina</option>
<option value="BWA">Botswana</option>
<option value="BRA">Brazil</option>
<option value="VGB">British Virgin Islands</option>
<option value="BRN">Brunei Darussalam</option>
<option value="BGR">Bulgaria</option>
<option value="BFA">Burkina Faso</option>
<option value="BDI">Burundi</option>
<option value="KHM">Cambodia</option>
<option value="CMR">Cameroon</option>
<option value="CAN">Canada</option>
<option value="CPV">Cape Verde</option>
<option value="CYM">Cayman Islands</option>
<option value="CAF">Central African Republic</option>
<option value="TCD">Chad</option>
<option value="GBR">Channel Islands</option>
<option value="CHL">Chile</option>
<option value="CHN">China</option>
<option value="COL">Colombia</option>
<option value="COM">Comoros</option>
<option value="COG">Congo</option>
<option value="COD">Congo, Dem. Rep. of</option>
<option value="COK">Cook Islands</option>
<option value="CRI">Costa Rica</option>
<option value="CIV">Cote d'Ivoire</option>
<option value="HRV">Croatia</option>
<option value="CUB">Cuba</option>
<option value="CYP">Cyprus</option>
<option value="CZE">Czech Republic</option>
<option value="PRK">Dem. People's Rep. of Korea</option>
<option value="COD">Dem. Rep. of the Congo</option>
<option value="DNK">Denmark</option>
<option value="DJI">Djibouti</option>
<option value="DMA">Dominica</option>
<option value="DOM">Dominican Republic</option>
<option value="ECU">Ecuador</option>
<option value="EGY">Egypt</option>
<option value="SLV">El Salvador</option>
<option value="GNQ">Equatorial Guinea</option>
<option value="ERI">Eritrea</option>
<option value="EST">Estonia</option>
<option value="ETH">Ethiopia</option>
<option value="FRO">Faeroe Islands</option>
<option value="FLK">Falkland Islands (Malvinas)</option>
<option value="FJI">Fiji</option>
<option value="FIN">Finland</option>
<option value="FRA">France</option>
<option value="GUF">French Guiana</option>
<option value="PYF">French Polynesia</option>
<option value="GAB">Gabon</option>
<option value="GMB">Gambia</option>
<option value="GEO">Georgia</option>
<option value="DEU">Germany</option>
<option value="GHA">Ghana</option>
<option value="GIB">Gibraltar</option>
<option value="GRC">Greece</option>
<option value="GRL">Greenland</option>
<option value="GRD">Grenada</option>
<option value="GLP">Guadeloupe</option>
<option value="GUM">Guam</option>
<option value="GTM">Guatemala</option>
<option value="GBR">Guernsey</option>
<option value="GIN">Guinea</option>
<option value="GNB">Guinea-Bissau</option>
<option value="GUY">Guyana</option>
<option value="HTI">Haiti</option>
<option value="VAT">Holy See</option>
<option value="HND">Honduras</option>
<option value="HKG">Hong Kong, China</option>
<option value="HUN">Hungary</option>
<option value="ISL">Iceland</option>
<option value="IND">India</option>
<option value="IDN">Indonesia</option>
<option value="IRN">Iran, Islamic Republic of</option>
<option value="IRQ">Iraq</option>
<option value="IRL">Ireland</option>
<option value="GBR">Isle of Man</option>
<option value="ISR">Israel</option>
<option value="ITA">Italy</option>
<option value="JAM">Jamaica</option>
<option value="JPN">Japan</option>
<option value="GBR">Jersey</option>
<option value="JOR">Jordan</option>
<option value="KAZ">Kazakhstan</option>
<option value="KEN">Kenya</option>
<option value="KIR">Kiribati</option>
<option value="PRK">Korea, Dem. People's Rep.</option>
<option value="KOR">Korea, Republic of </option>
<option value="KWT">Kuwait</option>
<option value="KGZ">Kyrgyzstan</option>
<option value="LAO">Laos PDR</option>
<option value="LVA">Latvia</option>
<option value="LBN">Lebanon</option>
<option value="LSO">Lesotho</option>
<option value="LBR">Liberia</option>
<option value="LBY">Libyan Arab Jamahiriya</option>
<option value="LIE">Liechtenstein</option>
<option value="LTU">Lithuania</option>
<option value="LUX">Luxembourg</option>
<option value="MAC">Macao, China</option>
<option value="MKD">Macedonia, Republic of</option>
<option value="MDG">Madagascar</option>
<option value="MWI">Malawi</option>
<option value="MYS">Malaysia</option>
<option value="MDV">Maldives</option>
<option value="MLI">Mali</option>
<option value="MLT">Malta</option>
<option value="MHL">Marshall Islands</option>
<option value="MTQ">Martinique</option>
<option value="MRT">Mauritania</option>
<option value="MUS">Mauritius</option>
<option value="MYT">Mayotte</option>
<option value="MEX">Mexico</option>
<option value="FSM">Micronesia, Fed. States</option>
<option value="MDA">Moldova, Republic of</option>
<option value="MCO">Monaco</option>
<option value="MNG">Mongolia</option>
<option value="MSR">Montserrat</option>
<option value="MAR">Morocco</option>
<option value="MOZ">Mozambique</option>
<option value="MMR">Myanmar</option>
<option value="NAM">Namibia</option>
<option value="NRU">Nauru</option>
<option value="NPL">Nepal</option>
<option value="NLD">Netherlands</option>
<option value="ANT">Netherlands Antilles</option>
<option value="NCL">New Caledonia</option>
<option value="NZL">New Zealand</option>
<option value="NIC">Nicaragua</option>
<option value="NER">Niger</option>
<option value="NGA">Nigeria</option>
<option value="NIU">Niue</option>
<option value="NFK">Norfolk Island</option>
<option value="MNP">Northern Mariana Islands</option>
<option value="NOR">Norway</option>
<option value="OMN">Oman</option>
<option value="PSE">Palestinian Territory</option>
<option value="PAK">Pakistan</option>
<option value="PLW">Palau</option>
<option value="PAN">Panama</option>
<option value="PNG">Papua New Guinea</option>
<option value="PRY">Paraguay</option>
<option value="PER">Peru</option>
<option value="PHL">Philippines</option>
<option value="PCN">Pitcairn</option>
<option value="POL">Poland</option>
<option value="PRT">Portugal</option>
<option value="PRI">Puerto Rico</option>
<option value="QAT">Qatar</option>
<option value="KOR">Republic of Korea</option>
<option value="MDA">Republic of Moldova</option>
<option value="REU">Reunion</option>
<option value="ROU">Romania</option>
<option value="RUS">Russian Federation</option>
<option value="RWA">Rwanda</option>
<option value="SHN">Saint Helena</option>
<option value="KNA">Saint Kitts &amp; Nevis</option>
<option value="LCA">Saint Lucia</option>
<option value="SPM">Saint Pierre &amp; Miquelon</option>
<option value="VCT">Saint Vincent &amp; Grenadines</option>
<option value="WSM">Samoa</option>
<option value="SMR">San Marino</option>
<option value="STP">Sao Tome &amp; Principe</option>
<option value="SAU">Saudi Arabia</option>
<option value="SEN">Senegal</option>
<option value="SCG">Serbia &amp; Montenegro</option>
<option value="SYC">Seychelles</option>
<option value="SLE">Sierra Leone</option>
<option value="SGP">Singapore</option>
<option value="SVK">Slovakia</option>
<option value="SVN">Slovenia</option>
<option value="SLB">Solomon Islands</option>
<option value="SOM">Somalia</option>
<option value="ZAF">South Africa</option>
<option value="ESP">Spain</option>
<option value="LKA">Sri Lanka</option>
<option value="SDN">Sudan</option>
<option value="SUR">Suriname</option>
<option value="SJM">Svalbard &amp; Jan Mayen</option>
<option value="SWZ">Swaziland</option>
<option value="SWE">Sweden</option>
<option value="CHE">Switzerland</option>
<option value="SYR">Syrian Arab Republic</option>
<option value="TAI">Taiwan, China</option>
<option value="TJK">Tajikistan</option>
<option value="TZA">Tanzania, United Rep.</option>
<option value="THA">Thailand</option>
<option value="TLS">Timor-Leste</option>
<option value="TGO">Togo</option>
<option value="TKL">Tokelau</option>
<option value="TON">Tonga</option>
<option value="TTO">Trinidad &amp; Tobago</option>
<option value="TUN">Tunisia</option>
<option value="TUR">Turkey</option>
<option value="TKM">Turkmenistan</option>
<option value="TCA">Turks &amp; Caicos Islands</option>
<option value="TUV">Tuvalu</option>
<option value="UGA">Uganda</option>
<option value="UKR">Ukraine</option>
<option value="ARE">United Arab Emirates</option>
<option value="GBR">United Kingdom</option>
<option value="TZA">United Rep. of Tanzania</option>
<option value="VIR">U.S. Virgin Islands</option>
<option value="URY">Uruguay</option>
<option value="UZB">Uzbekistan</option>
<option value="VUT">Vanuatu</option>
<option value="VEN">Venezuela</option>
<option value="VNM">Viet Nam</option>
<option value="VGB">Virgin Islands, British </option>
<option value="VIR">Virgin Islands, U.S.</option>
<option value="WLF">Wallis &amp; Futuna Islands</option>
<option value="ESH">Western Sahara</option>
<option value="YEM">Yemen</option>
<option value="ZMB">Zambia</option>
<option value="ZWE">Zimbabwe</option>
</select>
</div>
</fieldset>
<!-- ******************** ADDITIONAL ADDRESS INFORMATION ******************** -->
<h3>Additional Address Information</h3>
<fieldset>
	<label><u>Current</u> mailing address is valid until: </label>
	<input name="mail_date" type="text" class="size10 inputtextinline" size="10" maxlength="10" />
	<p>(mm/dd/yyyy)</p>
	<div class="clearFix"></div>
	<label>* Is your current mailing address the same as your permanent residence address?</label>
	<p class="radio">
		<label><input name="address_same" type="radio" value="Y" onclick="doPermAddress('Y');" />Yes</label><br>
		<label><input name="address_same" type="radio" value="N" onclick="doPermAddress('N');" />No</label>
	</p>
</fieldset>
<!-- ******************** PERMANENT MAILING ADDRESS ******************** -->
<!-- make Permanent Residence invisible unless neeeded, i.e. if not the same as current address. -->
<div id="PermResAddr" style="display:none;">
<h3>Permanent Residence <span>(if different than Current Mailing Address)</span></h3>
<fieldset>

	<label>* Street Address 1</label>
	<input name="perm_address_1" type="text" size="35" maxlength="40" />

	<label>Street Address 2</label>
	<input name="perm_address_2" type="text" size="35" maxlength="40" />

	<label>Street Address 3</label>
	<input name="perm_address_3" type="text" size="35" maxlength="40" />

	<label>* City</label>
	<input name="perm_city" type="text" size="30" maxlength="30" />

	<label>* State/Province/Region<br><span>(USA or Canada)</span></label>
	<div class="input">
<select name="perm_state">
<option value="" selected="selected">Select State or Province</option>
<optgroup label="USA">
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

	<div class="clearFix"></div>
	<label>* State/Province/Region<br><span>(NOT U.S. or Canada)</span></label>
	<input name="perm_state_other" type="text" class="size20 inputtextinline" size="20" maxlength="20" />

	<div class="clearFix"></div>
	<label>Zip or Postal Code<br><span>* Required for USA and Canada</span></label>
	<input name="perm_zipcode" type="text" class="size10 inputtextinline" size="10" maxlength="10" />

	<div class="clearFix"></div>
	<label>* Country or Region</label>
	<div class="input">
<select name="perm_country">
<option value="" selected="selected">Select a Country or Region</option>
<option value="USA">United States</option>
<option value="CAN">Canada</option>
<option value="AFG">Afghanistan</option>
<option value="ALA">Aland Islands</option>
<option value="ALB">Albania</option>
<option value="DZA">Algeria</option>
<option value="ASM">American Samoa</option>
<option value="AND">Andorra</option>
<option value="AGO">Angola</option>
<option value="AIA">Anguilla</option>
<option value="ATG">Antigua &amp; Barbuda</option>
<option value="ARG">Argentina</option>
<option value="ARM">Armenia</option>
<option value="ABW">Aruba</option>
<option value="AUS">Australia</option>
<option value="AUT">Austria</option>
<option value="AZE">Azerbaijan</option>
<option value="BHS">Bahamas</option>
<option value="BHR">Bahrain</option>
<option value="BGD">Bangladesh</option>
<option value="BRB">Barbados</option>
<option value="BLR">Belarus</option>
<option value="BEL">Belgium</option>
<option value="BLZ">Belize</option>
<option value="BEN">Benin</option>
<option value="BMU">Bermuda</option>
<option value="BTN">Bhutan</option>
<option value="BOL">Bolivia</option>
<option value="BIH">Bosnia &amp; Herzegovina</option>
<option value="BWA">Botswana</option>
<option value="BRA">Brazil</option>
<option value="VGB">British Virgin Islands</option>
<option value="BRN">Brunei Darussalam</option>
<option value="BGR">Bulgaria</option>
<option value="BFA">Burkina Faso</option>
<option value="BDI">Burundi</option>
<option value="KHM">Cambodia</option>
<option value="CMR">Cameroon</option>
<option value="CAN">Canada</option>
<option value="CPV">Cape Verde</option>
<option value="CYM">Cayman Islands</option>
<option value="CAF">Central African Republic</option>
<option value="TCD">Chad</option>
<option value="GBR">Channel Islands</option>
<option value="CHL">Chile</option>
<option value="CHN">China</option>
<option value="COL">Colombia</option>
<option value="COM">Comoros</option>
<option value="COG">Congo</option>
<option value="COD">Congo, Dem. Rep. of</option>
<option value="COK">Cook Islands</option>
<option value="CRI">Costa Rica</option>
<option value="CIV">Cote d'Ivoire</option>
<option value="HRV">Croatia</option>
<option value="CUB">Cuba</option>
<option value="CYP">Cyprus</option>
<option value="CZE">Czech Republic</option>
<option value="PRK">Dem. People's Rep. of Korea</option>
<option value="COD">Dem. Rep. of the Congo</option>
<option value="DNK">Denmark</option>
<option value="DJI">Djibouti</option>
<option value="DMA">Dominica</option>
<option value="DOM">Dominican Republic</option>
<option value="ECU">Ecuador</option>
<option value="EGY">Egypt</option>
<option value="SLV">El Salvador</option>
<option value="GNQ">Equatorial Guinea</option>
<option value="ERI">Eritrea</option>
<option value="EST">Estonia</option>
<option value="ETH">Ethiopia</option>
<option value="FRO">Faeroe Islands</option>
<option value="FLK">Falkland Islands (Malvinas)</option>
<option value="FJI">Fiji</option>
<option value="FIN">Finland</option>
<option value="FRA">France</option>
<option value="GUF">French Guiana</option>
<option value="PYF">French Polynesia</option>
<option value="GAB">Gabon</option>
<option value="GMB">Gambia</option>
<option value="GEO">Georgia</option>
<option value="DEU">Germany</option>
<option value="GHA">Ghana</option>
<option value="GIB">Gibraltar</option>
<option value="GRC">Greece</option>
<option value="GRL">Greenland</option>
<option value="GRD">Grenada</option>
<option value="GLP">Guadeloupe</option>
<option value="GUM">Guam</option>
<option value="GTM">Guatemala</option>
<option value="GBR">Guernsey</option>
<option value="GIN">Guinea</option>
<option value="GNB">Guinea-Bissau</option>
<option value="GUY">Guyana</option>
<option value="HTI">Haiti</option>
<option value="VAT">Holy See</option>
<option value="HND">Honduras</option>
<option value="HKG">Hong Kong, China</option>
<option value="HUN">Hungary</option>
<option value="ISL">Iceland</option>
<option value="IND">India</option>
<option value="IDN">Indonesia</option>
<option value="IRN">Iran, Islamic Republic of</option>
<option value="IRQ">Iraq</option>
<option value="IRL">Ireland</option>
<option value="GBR">Isle of Man</option>
<option value="ISR">Israel</option>
<option value="ITA">Italy</option>
<option value="JAM">Jamaica</option>
<option value="JPN">Japan</option>
<option value="GBR">Jersey</option>
<option value="JOR">Jordan</option>
<option value="KAZ">Kazakhstan</option>
<option value="KEN">Kenya</option>
<option value="KIR">Kiribati</option>
<option value="PRK">Korea, Dem. People's Rep.</option>
<option value="KOR">Korea, Republic of </option>
<option value="KWT">Kuwait</option>
<option value="KGZ">Kyrgyzstan</option>
<option value="LAO">Laos PDR</option>
<option value="LVA">Latvia</option>
<option value="LBN">Lebanon</option>
<option value="LSO">Lesotho</option>
<option value="LBR">Liberia</option>
<option value="LBY">Libyan Arab Jamahiriya</option>
<option value="LIE">Liechtenstein</option>
<option value="LTU">Lithuania</option>
<option value="LUX">Luxembourg</option>
<option value="MAC">Macao, China</option>
<option value="MKD">Macedonia, Republic of</option>
<option value="MDG">Madagascar</option>
<option value="MWI">Malawi</option>
<option value="MYS">Malaysia</option>
<option value="MDV">Maldives</option>
<option value="MLI">Mali</option>
<option value="MLT">Malta</option>
<option value="MHL">Marshall Islands</option>
<option value="MTQ">Martinique</option>
<option value="MRT">Mauritania</option>
<option value="MUS">Mauritius</option>
<option value="MYT">Mayotte</option>
<option value="MEX">Mexico</option>
<option value="FSM">Micronesia, Fed. States</option>
<option value="MDA">Moldova, Republic of</option>
<option value="MCO">Monaco</option>
<option value="MNG">Mongolia</option>
<option value="MSR">Montserrat</option>
<option value="MAR">Morocco</option>
<option value="MOZ">Mozambique</option>
<option value="MMR">Myanmar</option>
<option value="NAM">Namibia</option>
<option value="NRU">Nauru</option>
<option value="NPL">Nepal</option>
<option value="NLD">Netherlands</option>
<option value="ANT">Netherlands Antilles</option>
<option value="NCL">New Caledonia</option>
<option value="NZL">New Zealand</option>
<option value="NIC">Nicaragua</option>
<option value="NER">Niger</option>
<option value="NGA">Nigeria</option>
<option value="NIU">Niue</option>
<option value="NFK">Norfolk Island</option>
<option value="MNP">Northern Mariana Islands</option>
<option value="NOR">Norway</option>
<option value="OMN">Oman</option>
<option value="PSE">Palestinian Territory</option>
<option value="PAK">Pakistan</option>
<option value="PLW">Palau</option>
<option value="PAN">Panama</option>
<option value="PNG">Papua New Guinea</option>
<option value="PRY">Paraguay</option>
<option value="PER">Peru</option>
<option value="PHL">Philippines</option>
<option value="PCN">Pitcairn</option>
<option value="POL">Poland</option>
<option value="PRT">Portugal</option>
<option value="PRI">Puerto Rico</option>
<option value="QAT">Qatar</option>
<option value="KOR">Republic of Korea</option>
<option value="MDA">Republic of Moldova</option>
<option value="REU">Reunion</option>
<option value="ROU">Romania</option>
<option value="RUS">Russian Federation</option>
<option value="RWA">Rwanda</option>
<option value="SHN">Saint Helena</option>
<option value="KNA">Saint Kitts &amp; Nevis</option>
<option value="LCA">Saint Lucia</option>
<option value="SPM">Saint Pierre &amp; Miquelon</option>
<option value="VCT">Saint Vincent &amp; Grenadines</option>
<option value="WSM">Samoa</option>
<option value="SMR">San Marino</option>
<option value="STP">Sao Tome &amp; Principe</option>
<option value="SAU">Saudi Arabia</option>
<option value="SEN">Senegal</option>
<option value="SCG">Serbia &amp; Montenegro</option>
<option value="SYC">Seychelles</option>
<option value="SLE">Sierra Leone</option>
<option value="SGP">Singapore</option>
<option value="SVK">Slovakia</option>
<option value="SVN">Slovenia</option>
<option value="SLB">Solomon Islands</option>
<option value="SOM">Somalia</option>
<option value="ZAF">South Africa</option>
<option value="ESP">Spain</option>
<option value="LKA">Sri Lanka</option>
<option value="SDN">Sudan</option>
<option value="SUR">Suriname</option>
<option value="SJM">Svalbard &amp; Jan Mayen</option>
<option value="SWZ">Swaziland</option>
<option value="SWE">Sweden</option>
<option value="CHE">Switzerland</option>
<option value="SYR">Syrian Arab Republic</option>
<option value="TAI">Taiwan, China</option>
<option value="TJK">Tajikistan</option>
<option value="TZA">Tanzania, United Rep.</option>
<option value="THA">Thailand</option>
<option value="TLS">Timor-Leste</option>
<option value="TGO">Togo</option>
<option value="TKL">Tokelau</option>
<option value="TON">Tonga</option>
<option value="TTO">Trinidad &amp; Tobago</option>
<option value="TUN">Tunisia</option>
<option value="TUR">Turkey</option>
<option value="TKM">Turkmenistan</option>
<option value="TCA">Turks &amp; Caicos Islands</option>
<option value="TUV">Tuvalu</option>
<option value="UGA">Uganda</option>
<option value="UKR">Ukraine</option>
<option value="ARE">United Arab Emirates</option>
<option value="GBR">United Kingdom</option>
<option value="TZA">United Rep. of Tanzania</option>
<option value="VIR">U.S. Virgin Islands</option>
<option value="URY">Uruguay</option>
<option value="UZB">Uzbekistan</option>
<option value="VUT">Vanuatu</option>
<option value="VEN">Venezuela</option>
<option value="VNM">Viet Nam</option>
<option value="VGB">Virgin Islands, British </option>
<option value="VIR">Virgin Islands, U.S.</option>
<option value="WLF">Wallis &amp; Futuna Islands</option>
<option value="ESH">Western Sahara</option>
<option value="YEM">Yemen</option>
<option value="ZMB">Zambia</option>
<option value="ZWE">Zimbabwe</option>
</select>
	</div>
	</fieldset>
</div><!-- PermResAddr -->
</div><!-- end Tab 2 -->
<!-- #################### BEGIN TAB 3 #################### -->
<div id="tabs-3" class="tab_content">
<!-- ******************** ENROLLMENT INFORMATION ******************** -->
<h3>Enrollment Information</h3>
<fieldset>

<label>* Which degree are you applying for?</label>
<p class="radio">
	<label><input name="degree_plan" type="radio" value="B" onclick="onDegreeChange('U')" />Bachelor's or Post Baccalaureate</label><br>
	<label><input name="degree_plan" type="radio" value="M" onclick="onDegreeChange('M')" />Master's or Graduate Certificate</label><br>
	<label><input name="degree_plan" type="radio" value="P" onclick="onDegreeChange('P')" />PhD</label>
</p>

<div id="majorlist">
	<label>* What is your intended major or graduate program?</label>
	<div class="input">
<select name="major" onchange="onMajorChangeSetEntryDates()" id="selectMajor">
<option value="UNDEC" selected="selected">Undecided</option>
</select>
	</div>
	<p class="margin-bottom"><strong>Note:</strong> This does not commit you to any major.</p>
</div>

<div class="clearFix"></div>
<label>* When do you plan to enroll?</label>
<!-- enroll_when gets populated by onMajorChangeSetEntryDates() when major is selected -->
<div class="input">
	<select name="enroll_when" onchange="setYT();">
		<option value="" selected="selected">-- select --</option>
	</select>
</div>

<div class="clearFix"></div>
<label>* Select your enrollment type</label>
<p class="radio">
	<span id="never">
	<label><input name="entry_type" type="radio" value="N" onclick="entryType('N');" />I've never been enrolled in a college or university before.</label><br>
	</span>
	<label><input name="entry_type" type="radio" value="T" onclick="entryType('T');" />I've been enrolled at another college or university, but never attended MUM.</label><br>
	<label><input name="entry_type_helper" type="radio" value="Re-admit" onclick="entryTypeHelper();" />I previously enrolled at MUM.</label><br>
	<label><input name="entry_type" type="radio" value="C" onclick="entryType('C');" />I'm currently enrolled at MUM, Fairfield.</label><br>
	<label><input name="entry_type" type="radio" value="C1" onclick="entryType('C1');" />I'm currently enrolled at MUM, Beijing.</label>
</p>
<div class="in30" id="readmit" style="display:none;">
	<p class="above-input">I will continue my studies in the same degree program I was enrolled in before:</p>
	<p class="radio">
		<label><input name="entry_type" type="radio" value="R" onclick="entryType('R');" />Yes &nbsp;&nbsp;</label>
		<label><input name="entry_type" type="radio" value="R1" onclick="entryType('R1');" />No</label>
	</p>
</div>

<div class="clearFix"></div>
<label>* How did you <u>first</u> hear about MUM?</label>
<div class="input">
<select name="learn_about" size="1">
<option value="" selected="selected">-- select --</option>
<option value="Friend or family">Friend or family</option>
<option value="Web search - Google, etc.">Web search &mdash; Google, etc.</option>
<option value="Transcendental Meditation center">Transcendental Meditation center</option>
<option value="College Fair">College Fair</option>
<option value="MUM student">MUM student</option>
<option value="Link on another website">Link on another website</option>
<option value="Email from MUM">Email from MUM</option>
<option value="Online ad">Online ad</option>
<option value="Facebook">Facebook</option>
<option value="College professor / advisor">College professor / advisor</option>
<option value="YouTube">YouTube</option>
<option value="MUM brochure">MUM brochure</option>
<option value="Newspaper or magazine article">Newspaper or magazine article</option>
<option value="Online news media">Online news media</option>
<option value="High school teacher / counselor">High school teacher / counselor</option>
<option value="TV or radio">TV or radio</option>
<option value="NaturalHealers.com">NaturalHealers.com</option>
<option value="Zinch.com">Zinch.com</option>
<option value="Twitter">Twitter</option>
<option value="Other">Other</option>
</select>
</div>

<!-- Only appears when citizenship is International and entry type is first or second (never attended MUM). -->
<p id="agentid" style="display:none;">If you learned about this program from one of our authorized agents, you will receive a tuition reduction of US $100. To receive the tuition reduction, contact the agent for the applicable code and enter it here:<br><br>
<input name="AgentCode" id="AgentCode" type="text" size="10" maxlength="10" /></p>
</fieldset>

<!-- ******************** EDUCATIONAL BACKGROUND ******************** -->
<h3>Educational Background</h3>
<fieldset>
<div id="degree">
<label class="labelfullwidth">* Do you have a degree from a college or university?</label>
<p class="radio">
	<label><input name="have_degree" type="radio" value="Y" onclick="makeVisible('higher');" />Yes</label><br>
	<label><input name="have_degree" type="radio" value="N" onclick="makeInvisible('higher');" />No</label>
</p>
</div><!-- id="degree" -->
<label>High School Information:</label>
<p class="above-input">Please check what you have received, or expect to receive:</p>
<p class="radio">
	<label><input name="hs_type" type="radio" value="DIPL" onclick="makeHS('dip')" />Diploma</label><br>
	<label><input name="hs_type" type="radio" value="HOME" onclick="makeHS('hom')" />Home school</label><br>
	<label><input name="hs_type" type="radio" value="GED" onclick="makeHS('ged')" />GED</label><br>
	<label><input name="hs_type" type="radio" value="OTH" onclick="makeHS('oth')" />Other</label><br>
</p>

<label id="hsn">Name of high school</label>
<label id="aff" style="display:none;">Home school affiliation</label>
<label id="loc" style="display:none;">GED location (state)</label>
<label id="oth" style="display:none;">Other</label>
<input name="hs_name" type="text" class="size20 inputtextinline" size="20" maxlength="20" />

<label>Graduation Year</label>
<p class="above-input">Enter the year you received, or expect to receive, diploma, certificate, GED or other.</p>
<p><input name="hs_year" type="text" class="size4 inputtextinline" size="4" maxlength="4" /></p>
</fieldset>

<div id="higher">
<h3>Educational Institutions Attended After High School</h3>
<p>Please list the most recent first.</p>
<fieldset>
<div class="grid thirds">
	<div class="item first">
		<label>Name of Institution</label>
		<input name="school_1" type="text" size="20" maxlength="35" />
	</div>
	<div class="item">
		<label>Degree Received</label>
		<input name="school_1_degree" type="text" size="20" maxlength="20" />
	</div>
	<div class="item third">
		<label>Year Awarded</label>
		<input name="school_1_year" type="text" size="4" maxlength="4" />
	</div>
	<div class="item first">
		<label>Name of Institution</label>
		<input name="school_2" type="text" size="20" maxlength="35" />
	</div>
	<div class="item">
		<label>Degree Received</label>
		<input name="school_2_degree" type="text" size="20" maxlength="20" />
	</div>
	<div class="item third">
		<label>Year Awarded</label>
		<input name="school_2_year" type="text" size="4" maxlength="4" />
	</div>
	<div id="moreSchools3" style="display:none;">
		<div class="item first">
			<label>Name of Institution</label>
			<input name="school_3" type="text" size="20" maxlength="35" />
		</div>
		<div class="item">
			<label>Degree Received</label>
			<input name="school_3_degree" type="text" size="20" maxlength="20" />
		</div>
		<div class="item third">
			<label>Year Awarded</label>
			<input name="school_3_year" type="text" size="4" maxlength="4" />
		</div>
	</div>
	<div id="moreSchools4" style="display:none;">
		<div class="item first">
			<label>Name of Institution</label>
			<input name="school_4" type="text" size="20" maxlength="35" />
		</div>
		<div class="item">
			<label>Degree Received</label>
			<input name="school_4_degree" type="text" size="20" maxlength="20" />
		</div>
		<div class="item third">
			<label>Year Awarded</label>
			<input name="school_4_year" type="text" size="4" maxlength="4" />
		</div>
	</div>
	<div id="moreSchools5" style="display:none;">
		<div class="item first">
			<label>Name of Institution</label>
			<input name="school_5" type="text" size="20" maxlength="35" />
		</div>
		<div class="item">
			<label>Degree Received</label>
			<input name="school_5_degree" type="text" size="20" maxlength="20" />
		</div>
		<div class="item third">
			<label>Year Awarded</label>
			<input name="school_5_year" type="text" size="4" maxlength="4" />
		</div>
	</div>
	<div class="clearFix"></div>
	<p class="radio" style="margin-left:0;">
		<label><input name="showSchools" type="checkbox" value="Yes" onclick="makeMore();" />Include more schools</label>
	</p>
</div><!--  class="grid thirds" -->
</fieldset>
</div><!-- id="higher" -->

<h3>Other</h3>
<fieldset>
<div id="gre" style="display:none;">
	<label>* Have you taken the GMAT or GRE?</label>
	<p class="above-input">Note: In many cases, the GMAT or GRE is not required.</p>
	<p class="radio">
		<label><input name="exam" type="radio" value="NONE" />None</label><br>
		<label><input name="exam" type="radio" value="GMAT" />GMAT</label><br>
		<label><input name="exam" type="radio" value="GRE" />GRE</label>
	</p>
</div><!-- id="gre" -->

<label>* Do you wish to apply for financial aid?</label>
<p class="radio">
	<label><input name="fin_aid" type="radio" value="Y" />Yes</label><br>
	<label><input name="fin_aid" type="radio" value="N" />No</label>
</p>
<p id="finaidu" style="display:none;">Note: More than 95% of our students receive financial aid. The award for U.S. students often covers 90-100% of tuition and fees.</p>

<div class="clearFix"></div>
<div id="file_fafsa_tr" style="display:none;">
	<label>Do you intend to file a FAFSA</label>
	<p class="above-input">The Free Application for Federal Student Aid (FAFSA) is needed to apply for grants, scholarships, or student loans. <strong>(required field for US and Perm. Res.)</strong></p>
	<p class="radio">
		<label><input name="file_fafsa" type="radio" value="Y" />Yes</label><br>
		<label><input name="file_fafsa" type="radio" value="N" />No</label>
	</p>
</div>

<div class="clearFix"></div>
<label>* Behavioral Misconduct?</label>
<p class="above-input">Have you ever been found responsible for behavioral misconduct in any school you have attended that resulted in probation, suspension, or dismissal from the institution?</p>
<p class="radio">
	<label><input name="acdmprob" type="radio" value="Y" onclick="makeVisible('acpro', this); return true;" />Yes</label><br>
	<label><input name="acdmprob" type="radio" value="N" onclick="makeInvisible('acpro', this); return true;" />No</label>
</p>

<div id="acpro" class="q" style="display: none;">
	<label>If yes, please explain here:</label>
	<textarea name="probation_detail" cols="50" rows="3"></textarea>
</div>
</fieldset>

</div><!-- end Tab 3 -->
<!-- #################### BEGIN TAB 4 #################### -->
<div id="tabs-4" class="tab_content">
<!-- ******************** PERSONAL INFORMATION ******************** -->
<h3>Personal Information</h3>
<fieldset>
	<label>* Birth Month</label>
	<div class="input">
<select name="birth_month">
<option selected="selected">-- select --</option>
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
	</div>
	<label>* Birth Day</label>
	<div class="input">
<select name="birth_day">
<option selected="selected">-- select --</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
	</div>
	<label>* Birth Year</label>
	<input name="birth_year" type="text" class="size4 inputtextinline clearDefault" size="4" maxlength="4" onblur="testYear('birth_year')" />

	<label>* Gender</label>
	<p class="radio">
		<label><input name="gender" type="radio" value="M" />Male</label><br>
		<label><input name="gender" type="radio" value="F" />Female</label><br>
		<a href="" id="genderqlink" class="qanchor" onclick="jQuery('#genderqmsgdiv').toggle();return false;">Question?</a>
	</p>
	<div id="genderqmsgdiv" class="qrtblock" style="display:none;">
		<p class="margin-bottom"><strong>How should I answer the gender question?</strong><br>
		Federal guidelines mandate that we collect data on the legal sex of all applicants. Please report the sex currently listed on your birth certificate.<!-- If you wish to provide details regarding your sex or gender identity, you are welcome to fill out a supplemental form.<br><br>Before doing so, please go to the top of this form, then click the button labelled "Save My Application Data so I can return later to complete it". Then return here to complete <a href="#genderForm" class="fancybox">this supplemental form</a>.-->
		</p>
	</div>

	<label>* Marital status</label>
	<div class="input">
		<select name="marital_status">
			<option selected="selected">-- select --</option>
			<option value="S">Single</option>
			<option value="SP">Single Parent</option>
			<option value="M">Married</option>
			<option value="D">Divorced</option>
		</select>
	</div>

	<div id="ssn" style="display:none;">
		<label> Social Security Number</label>
		<p class="above-input">*required for financial aid for USA citizens</p>
		<input name="ssn" type="text" class="size15" size="11" maxlength="11" value="" onblur="SSNValidation(this.form.ssn.value);" />
	</div>

	<div class="clearFix"></div>
	<label>If you have career plans, please describe them</label>
	<textarea name="career" cols="50" rows="5"></textarea>

	<div id="undergrad">
		<label>* Your interests, hobbies, awards, special experiences</label>
	</div>
	<div id="grad" style="display:none;">
		<label>Academic or Professional Qualifications</label>
		<p class="above-input">List any academic or professional qualifications in your field of study, including any past work experience, honors, fellowships, publications, etc.</p>
	</div>
	<textarea name="interests" cols="50" rows="5"></textarea>

	<label>* Do you use recreational drugs?</label>
	<p class="radio">
		<label><input name="drugs" type="radio" value="Y" onclick="makeVisible('drug', this); return true;" />Yes</label><br>
		<label><input name="drugs" type="radio" value="N" onclick="makeInvisible('drug', this); return true;" />No</label>
	</p>
	<div id="drug" class="qrtblock" style="display: none;">
		<p class="margin-bottom">Alcohol and drug use have been found to be counterproductive to enhanced neurophysiological functioning produced by the Transcendental Meditation technique, so the University has a <a href="/student_conduct/alcohol_drug.html" class="qanchor">stringent policy</a> on the use of alcohol and recreational drugs. Students must be free of recreational drugs for six months before enrolling.</p>
	</div>

	<label>* Have you ever been convicted of a criminal offense?</label>
	<p class="radio">
		<label><input name="crime" type="radio" value="Y" onclick="makeVisible('divcrime_details'); return true;" />Yes</label><br>
		<label><input name="crime" type="radio" value="N" onclick="makeInvisible('divcrime_details'); return true;" />No</label>
	</p>
	<div id="divcrime_details" class="qrtblock" style="display: none;">
		<label>If yes, provide details and dates</label>
		<textarea name="crime_details" cols="50" rows="2"></textarea>
	</div>

</fieldset>

<!-- ******************** TM INFORMATION ******************** -->
<h3>Transcendental Meditation (TM) Course</h3>
<fieldset>
	<div id="tmc">
		<label>* TM Course</label>
		<p class="radio">
			<label><input name="tm" type="radio" value="N" onclick="makeInvisible('tminfo', this); return true;" />I have <strong>not learned</strong> the Transcendental Meditation<sup>&reg;</sup> (TM) technique.</label><br>
			<label><input name="tm" type="radio" value="Y" onclick="makeTMinfo('tminfo', this); return true;" />I have <strong>already learned</strong> the TM technique from a certified TM instructor.</label>
		</p>

		<div id="tminfo" style="display:none;">
			<label>* Date of instruction <span>(mm/dd/yyyy)</span></label>
			<input name="tm_date" type="text" class="size10 inputtextinline" size="10" maxlength="10" />

			<div class="clearFix"></div>
			<label>* Instructor&#8217;s name</label>
			<input name="tm_instructor" type="text" size="20" maxlength="40" />

			<label>* Location (city &amp; state)</label>
			<input name="tm_location" type="text" size="20" maxlength="40" />

			<label>* Have you completed the TM-Sidhi course?</label>
			<p class="radio">
				<label><input name="sidha" type="radio" value="No" onclick="makeInvisible('sidhas');" />No</label><br>
				<label><input name="sidha" type="radio" value="Yes" onclick="makeVisible('sidhas');restyleOneSelectMenuInApp(document.applic.tms_month);" />Yes</label>
			</p>

			<div class="clearFix"></div>
			<div id="sidhas" style="display:none;">
				<label>* Course completion date:</label>
				<div class="input">
					<select name="tms_month">
						<option selected="selected">** Month **</option>
						<option value="01">January</option>
						<option value="02">February</option>
						<option value="03">March</option>
						<option value="04">April</option>
						<option value="05">May</option>
						<option value="06">June</option>
						<option value="07">July</option>
						<option value="08">August</option>
						<option value="09">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
				</div>
				<div class="clearFix"></div>
				<label>Year <span>(yyyy)</span></label>
				<input name="tms_year" type="text" class="size4 inputtextinline" size="4" maxlength="4" onblur="testTMSdate(this);" />
				<label>* Course location:</label>
				<input name="tmsidhi_loc" type="text" size="30" maxlength="30" />
			</div><!-- id="sidhas" -->

			<label>* Have you ever attended a Maharishi school, in Fairfield or elsewhere?</label>
			<p class="radio">
				<label><input name="msaey" type="radio" value="Y" onclick="msaeHelper('Yes');" />Yes</label><br>
				<label><input name="msae" type="radio" value="U" onclick="msaeHelper('No');" />No</label>
			</p>

			<div id="msaeinfo" style="display:none;">
				<p class="radio">
					<label><input name="msae" type="radio" value="N" />I graduated, or will graduate this Spring.</label><br>
					<label><input name="msae" type="radio" value="P" />I graduated previously, before this Spring.</label><br>
					<label><input name="msae" type="radio" value="A" />I attended, but did not graduate.</label>
				</p>
			</div>
		</div><!-- id="tminfo" -->

		<label>* Do you currently practice any other meditation or self-development techniques?</label>
		<p class="radio">
			<label><input name="techniques" type="radio" value="N" onclick="makeInvisible('tech', this); return true;" />No</label><br>
			<label><input name="techniques" type="radio" value="Y" onclick="makeVisible('tech', this); return true;" />Yes</label>
		</p>
		<div class="clearFix"></div>
		<div id="tech" style="display:none;">
			<label>If yes, please describe</label>
			<textarea name="other_techniques" cols="50" rows="4"></textarea>
		</div>
	</div><!-- id="tmc" -->

</fieldset>

<!-- ******************** FAMILY EDUCATION RIGHTS AND PRIVACY ACT ******************** -->
<h3>Family Education Rights and Privacy Act</h3>
<fieldset>
	<label>* Family Education Rights and Privacy Act</label>
	<p class="above-input">The Family Education Rights and Privacy Act (USA) permits the University to request, but not require, that you waive your rights of access and review of your application evaluation and personal recommendations. <strong>Please select one.</strong></p>
	<p class="radio">
		<label><input name="FERPA" type="radio" value="Access_Waived" /><strong>Yes</strong>, I waive my rights of access and review to my application evaluation and personal recommendations.</label><br>&nbsp;<br>
		<label><input name="FERPA" type="radio" value="Access_Not_Waived" /><strong>No</strong>, I do not waive my rights of access and review to my application evaluation and personal recommendations.</label>
	</p>

</fieldset>

<!-- ******************** AGREEMENT ******************** -->
<h3>Agreement</h3>
<fieldset>
	<div id="intlfee2" style="display:none;">
		<label>* Payment<br><span>(select one)</span></label>
		<p class="radio">
			<label><input name="intl_appfee_method" type="radio" value="CC" />I will pay the $50 application fee by credit card on the payment form that opens after submitting my application.</label><br>
			<label><input name="intl_appfee_method" type="radio" value="alt" />I will pay the $50 application fee through <a href="http://www.mum.edu/apply/fee.html" class="qanchor" target="_blank">alternate payment arrangements</a> after submitting my form. I understand that the Admissions Office will not start processing my application until after the $50 fee is paid.</label>
		</p>
	</div>

	<label>* Truthful and Accurate</label>
	<p class="above-input">All the information I have submitted on this form is truthful and accurate to the best of my knowledge.</p>
	<p class="radio">
		<label><input name="agree_info" type="radio" value="Y" />Yes</label><br>
		<label><input name="agree_info" type="radio" value="N" />No</label>
	</p>

	<p class="above-input">Electronically sign this form by entering your full name below</p>
	<label>* Your full name</label>
	<input name="full_name" type="text" class="inputtextinline" size="40" maxlength="60" />
</fieldset>

<!-- ******************** END OF TAB 4 ******************** -->
</div><!-- end Tab 4 -->
<!-- ******************** TAB 5 SHOW ALL ******************** -->
<div id="tabs-5"></div>
<!-- ******************** END OF TABBED CONTENT ******************** -->
</div><!-- id="tabs" -->
<!-- ******************** PARTIAL SAVE, PREVIOUS AND NEXT ******************** -->
<div class="call-out">
<!-- PARTIAL SAVE BUTTON -->
<div id="partial_save_button">
	<p><strong>You may fill in part of the form, then return later to complete it.</strong> After you click the "Save and Continue Later" button, you will receive an email with a special link that allows you to return later and continue. Please complete at least the sections: Name, Contact Information, Citizenship, and Current Mailing Address.</p>
	<div class="notice appcachemessage_saving" style="display:none">
	Saving your incomplete application...
	</div>
	<div class="notice appcachemessage" style="display:none">
	Your incomplete application has been saved. You may now continue filling in the application.<br>Or if you wish, you may return later to complete it by using this special URL:<br>https://dev.mum.edu/admissions/apply-online/undergraduate-application-form/?acsid=<span class="appcachemessage_sid"></span><br>This URL has also been emailed to you.
	</div>
	<p>
	<a id="saveAndContinueLater" class="button width-100" href="#" onclick="doappcacheajax();">Save and Continue Later</a>
	</p>
	<hr />
</div><!-- id="partial_save_button" -->

<!-- PREVIOUS AND NEXT BUTTONS -->
<div class="grid half">
	<div class="item">
		<p><a id="go_to_previous_button" class="button" href="#startForm" onclick="gotoPreviousSection();">Back to previous section</a></p>
	</div>
	<div class="item second">
		<p><a id="continue_to_next_button" class="button" href="#startForm" onclick="gotoNextSection();">Continue to next section</a></p>
	</div>
	<div class="clearFix"></div>
</div>

</div><!-- class="call-out" -->
<!-- ******************** SUBMIT ******************** -->
<div class="call-out" id="submit_button">
	<p><strong>After you submit this form, a form will appear for the application fee (Visa / MasterCard)</strong>. Payment must be received before we can process your application. If you cannot pay by credit card, see <a href="http://www.mum.edu/apply/fee.html" class="qanchor" target="_blank">alternate payment arrangements</a>. Once you pay, you'll get a short checklist of documents needed to complete the application process.</p>
	<p><strong>Questions?</strong> Call us at 800-369-6480 (US) or 641-472-1110, or email <a href="mailto:admissions@mum.edu" class="qanchor">admissions@mum.edu</a>.</p>

	<p><a class="button submit positive width-100" href="#" onclick="document.getElementById('applic').submit();">Submit My Application &mdash; Do Not Double-Click</a></p>
</div><!-- class="call-out" -->
<!-- ******************** END OF FORM ******************** -->
</form>
<!-- ******************** START OF SUBMISSION CONFIRMATION FORM ******************** -->
<div style="display:none;"><!-- called by js during submission to display the confirmation popup -->
<a href="#submitConfirm" class="fancybox" id="submitConfirmAnchor"></a>
</div>

<div id="submitConfirm" style="display: none">
<div class="padding">

<h3>TESTING BY RON</h3>
<h3>Thank you for submitting your application</h3>
<p>Your Application ID is <strong>[%x_application_id%]</strong>. You will need this Application ID number to complete the application process.</p>
<p>A confirmation email which includes your Application ID number has been sent to [%x_email%].</p>
<p><strong>IMPORTANT:</strong> The Admissions Office will start processing your application after the $[%x_amount%] application fee is paid. Please go to the payment form now by clicking this button.</p>
<p>If you cannot pay by credit card, please see <a href="http://mum.edu/RelId/625032/ISvars/default/Alternate_Method_of_Paying_the_Application_Fee.htm">this page</a></p>

<form action="https://dev.mum.edu/admissions/apply-online/online-application-form/application-fee-payment-form/" method="post" name="submitConfirmForm" id="submitConfirmForm">
<input type="hidden" name="x_amount" value="" />
<input type="hidden" name="x_invoice_num" value="" />
<input type="hidden" name="AppID" value="" />
<input type="hidden" name="x_application_id" value="" />
<input type="hidden" name="x_firstname" value="" />
<input type="hidden" name="x_lastname" value="" />
<input type="hidden" name="x_email" value="" />
<input type="hidden" name="x_date_submit" value="" />
<input type="hidden" name="x_created_on" value="" />
<input type="hidden" name="x_degree_plan" value="" />
<input type="hidden" name="major" value="" />
<input type="hidden" name="enterstat" value="" />
<input type="hidden" name="citizenship_country" value="" />

<input type="submit" value="Go to Payment Page" />
</form>

<form action="https://dev.mum.edu/admissions/apply-online/online-application-form/application-fee-payment-form/" method="post" name="submitConfirmForm2" id="submitConfirmForm2">
<input type="submit" value="Do Not Go to Payment Page" />
</form>

</div><!-- class="padding" -->
</div><!-- id="submitConfirm" -->
<!-- ******************** START OF GENDER SUPPLEMENTAL FORM ******************** -->
<div id="genderForm" style="display: none">
<div class="padding">
<form action="/cgi-bin/GenderEssay.cgi" method="post" name="GenderEssay" id="GenderEssay">
	<input type="hidden" name="fullbirthdate" />
	<input type="hidden" name="firstname" />
	<input type="hidden" name="middlename" />
	<input type="hidden" name="lastname" />
	<input type="hidden" name="email" />

	<h3>Optional Information Regarding Gender Identity</h3>
	<fieldset>
		<label>Use this optional form to provide additional information that you feel is important to the student admissions department regarding your sex or gender identity.</label>
		<textarea name="question_1" cols="50" rows="8"></textarea>
	</fieldset>

	<div style="width: 50%; float: left;">
		<p><strong>Name:</strong> <span id="spanfirstname"></span> <span id="spanmiddlename"></span> <span id="spanlastname"></span></p>
	</div>

	<div style="width: 50%; float: left;">
		<p><strong>Email Address:</strong> <span id="spanemail"></span></p>
	</div>

	<div class="clearFix"></div>
	<div class="notice GenderEssaymessage_saving" style="display: none">Processing your essay. Please wait.</div>
	<div class="notice GenderEssaymessage" style="display: none">We have received your essay. You may now close this popup form.</div>

	<p><a class="button" onclick="doGenderAjax();">Submit</a></p>
	<p>You will receive a confirmation email shortly after submitting this form.</p>

</form>
</div>
</div>
<!-- ******************** JAVASCRIPT ******************** -->
<script src="/js/setMajor.js" type="text/javascript"></script>
<script src="/js/applicationrontest1.js" type="text/javascript"></script><!-- TODO -->
<script src="/js/basic_validation.js" type="text/javascript"></script>
<script src="/js/validate_app.js" type="text/javascript"></script>
<?php
echo "\n<!-- Start appcache -->\n";
if ($_GET['acsid']) {
	//echo "\n<!-- appcache sid: " . $_GET['acsid'] . " -->\n";
	$filecontents = file_get_contents("/usr/home/trotaka108/websitesupport/appcache/cachedapplications/" . $_GET['acsid']);
	if ( strlen($filecontents) > 0 ) {
		echo <<<EOP
<script type="text/javascript" id="cacheddata_json_scripttag">
$filecontents
</script>
<script src="/js/jquery.populate.js" type="text/javascript"></script>
<script src="/js/appcache_populate.js" type="text/javascript"></script>

EOP;
	}
	unset($filecontents);
}
?>

		</article>
	</div>
</section>

<?php endwhile; endif; wp_reset_query(); ?>

<?php get_footer(); ?>