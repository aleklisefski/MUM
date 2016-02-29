// How validation works for tabs.
// Partial save only requires a few entries up top. Partial saves beyond that, nothing else is required.
// It is only the final save where everything gets validated. And the final save button is not showing until tab 4.
// Therefore, when there is a validation error, show all tabs.

var submitcount=0; // gets incremented in validForm
var msgtmp='';

var doShowAll = function() {
	"use strict";
	jQuery("#tabs").tabs( "option", "active", 4 );
};

// Two reasons for creating this: 1.Show all for validation errors. 2.Save space. F==false
function retF(msg,field,tabnum) {
	"use strict";
	alert(msg);
	// 11/23/2015 Instead of showing all, show the tab where the validation error appears.
	//doShowAll();
	jQuery("#tabs").tabs( "option", "active", tabnum );
	field.focus();
	field.scrollIntoView();
	return false;
}

// This is how we implement presentation of multiple validation messages in one chunk rather than one by one
// v: validation. o: object
// o.m: the total validation message. o.e: the element that will take the focus.
// m: the validation message for THIS validation check. e: the element passed in by THIS validation check
function v(o,m,e) {
	if (o.m === "") {o.e = e;}
	o.m += m+"\n";
}

// Check that a radio button is selected
function checkRadio(radioSet) {
	"use strict";
	//alert(radioSet.length);
	var isChecked = false;
	for (var i=0 ; i<radioSet.length && isChecked===false ; i++) {
		isChecked = radioSet[i].checked;
	}
	return isChecked;
}

function checkIsDate(el,prelude) {
	"use strict";
	// m becomes either true or an error message text like "Please enter a valid month"
	var m = isDate(el.value);
	if (m === true) {return true;}
	return prelude+": "+m;
}

// f is the form as a DOM element
function validateNameEtc(f,boolDoingFinalSave) {
	"use strict";
	var o = {m:"",e:null};
	if (f.firstname.value === "") {
		v(o,"Please enter your First (Given) Name.",f.firstname);
	}
	if (f.lastname.value === "") {
		v(o,"Please enter your Last (Family) Name.",f.lastname);
	}
	
	if (f.email.value === "") {
		v(o,"Please enter an e-mail address.",f.email);
	}
	else {
		var emailvalue = f.email.value;
		var emailHasAt = emailvalue.indexOf("@");
		var emailHasPeriod = emailvalue.indexOf(".");
		if((emailHasAt === -1) || (emailHasPeriod === -1)) {
			v(o,"Email address is invalid.",f.email);
		}
		if (!emailContainsOnlyValidCharacters(f.email.value)) {
			v(o,"Email address has at least one invalid character.\n     These are invalid email characters (including spaces):\n     " + invalids,f.email);
		}
		if (emailvalue.search( /^[a-zA-Z]+([_\.-]?[a-zA-Z0-9]+)*@[a-zA-Z0-9]+([\.-]?[a-zA-Z0-9]+)*(\.[a-zA-Z]{2,6})+$/) === -1) {
			v(o,"Email address in not in valid format.",f.email);
		}
	}
	
	if ((f.phone_day.value === "") && (f.phone_evening.value === "") && (f.cellphone.value === "")) {
		v(o,"Please enter at least one phone number, day, evening or cellphone.",f.phone_day);
	}
	//if (!(checkRadio(f.citizenship))) 
	if (f.citizenship.selectedIndex === 0) {
		//v(o,"Please select your Citizenship.",f.citizenship[0]);
		v(o,"Please select your Citizenship.",f.citizenship);
	}
	//if (f.citizenship[1].checked && boolDoingFinalSave) 
	if (f.citizenship.selectedIndex === 2 && boolDoingFinalSave) {
		if (f.green_card.value === "") {
			v(o,"Please enter your INS A# from your Green Card.",f.green_card);
		}
	}
	
	// start international
	f.status.value = "F before international check " + submitcount;

	//if (f.citizenship[2].checked) 
	if (f.citizenship.selectedIndex === 3) {
		if (f.citizenship_country.selectedIndex === 0) {
			v(o,"Please select your Country of Citizenship.",document.getElementById("citizenship_country_shadow"));
		}
		if (f.country_birth.selectedIndex === 0) {
			v(o,"Please select your Country of Birth.",document.getElementById("country_birth_shadow"));
		}
		if (!checkRadio(f.visa)) {
			v(o,"Please select whether you have a U.S. Visa.",f.visa[0]);
		}
	}
	if (f.visa[0].checked) {
		if (f.visa_type.selectedIndex === 0) {
			v(o,"Please select your Visa Type.",document.getElementById("visa_type_shadow"));
		}
		if (f.visa_expire.value === "") {
			v(o,"Please enter your Visa expiration date.",f.visa_expire);
		}
		msgtmp = checkIsDate(f.visa_expire, "Visa Expiration Date");
		if (msgtmp !== true) {v(o,msgtmp,f.visa_expire);}
	}
	// end international
	
	if (o.m !== "") {return retF(o.m,o.e,0);}
	return true;
}

function validateAddresses(f) {
	"use strict";
	var o = {m:"",e:null};
	if (f.mail_address_1.value === "") {
		v(o,"Current Mailing Address: Please enter a current address (Address 1).",f.mail_address_1);
	}
	if (f.mail_city.value === "") {
		v(o,"Current Mailing Address: Please enter a current City.",f.mail_city);
	}
	if ( f.mail_state.selectedIndex === 0 && f.mail_state_other.value === "" ) {
		v(o,"Current Mailing Address: Please select a State, Province, or Region.",document.getElementById("mail_state_shadow"));
	}
	if (f.mail_zipcode.value === "") {
		v(o,"Current Mailing Address: Please enter your Zip or Postal Code. Enter \"none\" if you do not have a postal code.",f.mail_zipcode);
	}
	if (f.mail_country.selectedIndex === 0) {
		v(o,"Current Mailing Address: Please select a Country.",document.getElementById("mail_country_shadow"));
	}

	if (f.mail_date.value !== "") {
		msgtmp = checkIsDate(f.mail_date, "Current mailing address is valid until");
		if (msgtmp !== true) {
			v(o,msgtmp,f.mail_date);
		}
	}
	if (!checkRadio(f.address_same)) {
		v(o,"Please select whether your current address and permanent address are the same.",f.address_same[0]);
	}
	
	// Permanent address
	if (f.address_same[1].checked) {
		if (f.perm_address_1.value === "") {
			v(o,"Permanent Residence: Please enter an address (Address 1).",f.perm_address_1);
		}
		if (f.perm_city.value === "") {
			v(o,"Permanent Residence: Please enter a City.",f.perm_city);
		}
		if ( f.perm_state.selectedIndex === 0 && f.perm_state_other.value === "" ) {
			v(o,"Permanent Residence: Please select a State, Province, or Region.",document.getElementById("perm_state_shadow"));
		}
		if (f.perm_zipcode.value === "") {
			v(o,"Permanent Residence: Please enter your Zip or Postal Code. Enter \"none\" if you do not have a postal code.",f.perm_zipcode);
		}
		if (f.perm_country.selectedIndex === 0) {
			v(o,"Permanent Residence: Please select a Country.",document.getElementById("perm_country_shadow"));
		}
	}
	if (o.m !== "") {return retF(o.m,o.e,1);}
	return true;
}

function validateEnrollmentAndEd(f) {
	"use strict";
	var o = {m:"",e:null};
	// Enrollment Information
	
	var dpi = f.degree_plan.selectedIndex;
	//if (!checkRadio(f.degree_plan)) 
	if (dpi === 0) {
		v(o,"Please select your degree plan -- Bachelor, Master, or PhD.",f.degree_plan);
	}
	if (f.major.selectedIndex === 0) {
		v(o,"Please select a major.",document.getElementById("major_shadow"));
	}
	if (f.enroll_when.selectedIndex === 0) {
		v(o,"Please select when you plan to enroll.",document.getElementById("enroll_when_shadow"));
	}
	
	if (f.entry_type.selectedIndex === 0) {
		v(o,"Please select your Enrollment Type",document.getElementById("entry_type_shadow"));
	}
	if ( (f.entry_type.selectedIndex === 1) && (dpi === 2 || dpi === 3) ) {
		v(o,"You cannot apply for a graduate degree without an undergraduate degree. Please select appropriate enrollment type and/or degree plan.",f.degree_plan);
	}
	if (f.learn_about.selectedIndex === 0) {
		v(o,"Please select how you first heard about Maharishi University.",document.getElementById("learn_about_shadow"));
	}
	
	// Educational Background
	if (!(f.entry_type.selectedIndex === 1) && !checkRadio(f.have_degree)) {
		v(o,"Please select whether you have a degree from a college or university.",f.have_degree[0]);
	}
	if (!checkRadio(f.hs_type)) {
		v(o,"Please select Diploma, Home School, GED, or Other.",f.hs_type[0]);
	}
	if (f.hs_name.value === "") {
		var hsMsg = "";
			 if (f.hs_type[0].checked) {hsMsg = "Please enter Name of High School.";}
		else if (f.hs_type[1].checked) {hsMsg = "Please enter Home School affiliation.";}
		else if (f.hs_type[2].checked) {hsMsg = "Please enter GED location (state).";}
		else if (f.hs_type[3].checked) {hsMsg = "Please enter location or other information about your Other high school equivalent.";}
		v(o,hsMsg,f.hs_name);
	}
	if (f.hs_year.value === "") {
		var dateMsg = "";
			 if (f.hs_type[0].checked) {dateMsg = "Please enter Graduation Year of High School diploma.";}
		else if (f.hs_type[1].checked) {dateMsg = "Please enter Graduation Year of Home School certificate.";}
		else if (f.hs_type[2].checked) {dateMsg = "Please enter Graduation Year of GED exam.";}
		else if (f.hs_type[3].checked) {dateMsg = "Please enter Graduation Year of Other high school equivalent.";}
		v(o,dateMsg,f.hs_year);
	}
	else {
		if (f.hs_year.value.length !== 4) {
			v(o,"Graduation Year of High School or equivalent must be a 4-digit year.",f.hs_year);
		}
		if (isNaN(f.hs_year.value)) {
			v(o,"Graduation Year of High School or equivalent must be a 4-digit year, numbers only.",f.hs_year);
		}
	}

	if (!f.entry_type.selectedIndex === 1) {
		if (f.school_1.value === "") {
			v(o,"Please enter the name(s) of educational institution(s) you have attended since high school.",f.school_1);
		}
	}
	//if ((f.degree_plan[1].checked) || (f.degree_plan[2].checked)) 
	if (dpi === 2 || dpi === 3) {
		if (!checkRadio(f.exam)) {
			v(o,"Please select whether you have taken the GMAT or GRE.",f.exam[0]);
		}
	}
	if (!checkRadio(f.fin_aid)) {
		v(o,"Please select whether you wish to apply for Financial Aid.",f.fin_aid[0]);
	}
	var ci = f.citizenship.selectedIndex;
	//if ((f.citizenship[0].checked) || (f.citizenship[1].checked)) 
	if (ci === 1 || ci === 2) {
		if (!checkRadio(f.file_fafsa)) {
			v(o,"Please select whether you intend to file a FAFSA.",f.file_fafsa[0]);
		}
	}
	if (!checkRadio(f.acdmprob)) {
		v(o,"Please select whether you have ever been on academic probation, suspension, or dismissal.",f.acdmprob[0]);
	}
	if (f.acdmprob[0].checked) {
		if (f.probation_detail.value === "") {
			v(o,"Please explain your academic probation, suspension or dismissal.",f.probation_detail);
		}
	}
	if (f.probation_detail.value.length > 1000) {
		v(o,"Please limit the description of your academic probation, suspension or dismissal to 1,000 characters or less.",f.probation_detail);
	}
	f.status.value = "Q9 in Educational " + submitcount;
	if (o.m !== "") {return retF(o.m,o.e,2);}
	return true;
}

function validatePersonalInfo(f) {
	"use strict";
	var o = {m:"",e:null};
	if (f.birth_month.selectedIndex === 0) {
		v(o,"Please select your Birth Month.",document.getElementById("birth_month_shadow"));
	}
	if (f.birth_day.selectedIndex === 0) {
		v(o,'Please select your Birth Day.',document.getElementById("birth_day_shadow"));
	}
	if (f.birth_year.value === "") {
		v(o,"Please enter a 4-digit Birth Year.",f.birth_year);
	}
	var m = f.birth_month.selectedIndex;
	var d = f.birth_day.selectedIndex;
	f.birthdate.value = f.birth_month[m].value + "/" + f.birth_day[d].value + "/" + f.birth_year.value;
	//alert("Birthdate info: m: "+m+", d: "+d+", month: "+f.birth_month[m].value+", day: "+f.birth_day[d].value+", year: "+f.birth_year.value+", birthdate: "+f.birthdate.value);
	msgtmp = checkIsDate(f.birthdate, "Birthdate day, month, and year");
	if (msgtmp !== true) {v(o,msgtmp,f.birth_year);}
	
	if (!checkRadio(f.gender)) {
		v(o,'Please select your gender.',f.gender[0]);
	}
	if (f.marital_status.selectedIndex === 0) {
		v(o,'Please select your Marital Status.',document.getElementById("marital_status_shadow"));
	}
	
	// Taken from code in old application.js file. This used to be validated live, not upon submission.
	var ci = f.citizenship.selectedIndex;
	//if ((f.citizenship[0].checked) || (f.citizenship[1].checked)) 
	if (ci === 1 || ci === 2) {
		var ssnval = f.ssn.value;
		if (ssnval === "") {
			v(o,"Please enter your Social Security Number.",f.ssn);
		}
		var matchArr = ssnval.match(/^(\d{3})-?\d{2}-?\d{4}$/);
		var numDashes = ssnval.split('-').length - 1;
		if (matchArr === null || numDashes === 1) {
			v(o,"Invalid Social Security Number: Must be 9 digits or in the form NNN-NN-NNNN.",f.ssn);
		}
		else if (parseInt(matchArr[1],10) === 0) {
			v(o,"Invalid Social Security Number: cannot start with 000.",f.ssn);
		}
		var RE_SSN = /^(\d{3})[\- ]?(\d{2})[\- ]?(\d{4})$/;
		if (RE_SSN.test(ssnval)) {
			var cleanedSsn = ssnval.replace(RE_SSN, "$1-$2-$3");
			f.ssn.value = cleanedSsn;
		} else {
			v(o,"Invalid Social Security Number: cleaned format is wrong.",f.ssn);
		}
	}
	
	if (f.career.value.length > 1000) {
		v(o,"Please limit the description of your Career Plans to 1,000 characters or less.",f.career);
	}
	//if ((f.interests.value === "") && (f.degree_plan[0].checked)) 
	if (f.interests.value === "" && f.degree_plan.selectedIndex === 1) {
		v(o,"Please enter your Interests, Hobbies, Awards, Special experiences.",f.interests);
	}
	if (f.interests.value.length > 1000) {
		v(o,"Please limit the description of your Interests, Hobbies, Awards to 1,000 characters or less.",f.interests);
	}
	//if (!checkRadio(f.drugs)) {
	//	v(o,'Please select whether you use non-perscription drugs.',f.drugs[0]);
	//}
	if (!checkRadio(f.crime)) {
		v(o,'Please select whether you have been convicted of a criminal offense.',f.crime[0]);
	}
	if (f.crime[0].checked) {
		if (f.crime_details.value === "") {
			v(o,'Please enter details and dates of any criminal conviction.',f.crime_details);
		}
	}
	if (f.crime_details.value.length > 1500) {
		v(o,"Please limit the description of your Crime Details to 1,500 characters or less.",f.crime_details);
	}
	if (o.m !== "") {return retF(o.m,o.e,3);}
	return true;
}

function validateTMInfo(f) {
	"use strict";
	var o = {m:"",e:null};
	if ((f.entry_type.selectedIndex === 1) || (f.entry_type.selectedIndex === 2)) {
		if (!checkRadio(f.tm)) {
			v(o,'Please select whether you have not learned or have already learned the Transcendental Meditation technique.',f.tm[0]);
		}
	}
	if (f.tm[1].checked) {
		if (f.tm_date.value === "") {
			v(o,'Please enter your date of instruction in the Transcendental Meditation technique.',f.tm_date);
		}

		msgtmp = checkIsDate(f.tm_date, "Date of TM Instruction");
		if (msgtmp !== true) {v(o,msgtmp,f.tm_date);}

		if (f.tm_instructor.value === "") {
			v(o,'Please enter the name of your instructor of the Transcendental Meditation technique.',f.tm_instructor);
		}

		if (f.tm_location.value === "") {
			v(o,'Please enter the location (city & state) of your instruction in the Transcendental Meditation technique.',f.tm_location);
		}
	
		// start check sidhis
		if (!checkRadio(f.sidha)) {
			v(o,"Please select whether you have been instructed in the TM-Sidhi program.",f.sidha[0]);
		}
		if (f.sidha[1].checked) {
			if (f.tms_month.selectedIndex === 0) {
				v(o,'Please select TM-Sidhi course Month.',document.getElementById("tms_month_shadow"));
			}
			if (f.tms_year.value === "") {
				v(o,'Please enter TM-Sidhi course Year.',f.tms_year);
			}

			f.tmsidhi_date.value = f.tms_month[f.tms_month.selectedIndex].value + "/01/" + f.tms_year.value;
			msgtmp = checkIsDate(f.tmsidhi_date, "Date of TM-Sidhi Instruction");
			if (msgtmp !== true) {v(o,msgtmp,f.tms_year);}

			if (f.tmsidhi_loc.value === "") {
				v(o,"Please enter location of TM-Sidhi course.",f.tmsidhi_loc);
			}
		}
		// end check sidhis
		
		if ( (!f.msaey.checked) && (!f.msae[0].checked) ) {
			v(o,"Please select whether you have ever attended a Maharishi School, in Fairfield or elsewhere.",f.msaey);
		}
		if ( (f.msaey.checked) && (!(f.msae[1].checked || f.msae[2].checked || f.msae[3].checked)) ) {
			v(o,"Please select whether you have graduated from a Maharishi school, in Fairfield or elsewhere.",f.msae[1]);
		}
	}
	// end of if f.tm[1].checked
	
	//if (!checkRadio(f.techniques)) {
	//	v(o,'Please select whether you currently practice any other meditation or self-development techniques.',f.techniques[0]);
	//}
	//if (f.techniques[1].checked) {
	//	if (f.other_techniques.value === "") {
	//		v(o,"Please describe any other meditation or self-development techniques you currently practice.",f.other_techniques);
	//	}
	//}
	//if (f.other_techniques.value.length > 1500) {
	//	v(o,"Please limit the description of any other meditation or self-development techniques you currently practice to 1,000 characters or less.",f.other_techniques);
	//}
	if (o.m !== "") {return retF(o.m,o.e,3);}
	return true;
}

function validateFERPAandAgreemt(f) {
	"use strict";
	var o = {m:"",e:null};
	if (!checkRadio(f.FERPA)) {
		v(o,"Please select whether you waive your rights of access and review to your application evaluation and personal recommendations.",f.FERPA[0]);
	}
	//if (f.citizenship[2].checked) 
	if (f.citizenship.selectedIndex === 3) {
		if (!checkRadio(f.intl_appfee_method)) {
			v(o,"Please select method of payment for application fee.",f.intl_appfee_method[0]);
		}
	}
	if (!checkRadio(f.agree_info)) {
		v(o,'Please select whether all the information you have submitted is truthful and accurate to the best of your knowledge.',f.agree_info[0]);
	}
	if (f.full_name.value === "") {
		v(o,"Please enter your electronic signature -- your full name.",f.full_name);
	}
	f.status.value = "ZZ after Agreement " + submitcount;
	if (o.m !== "") {return retF(o.m,o.e,3);}
	return true;
}

// set invalid characters for email
var invalids = "!# $%^*([{}])~,'<>/?;:\\|`\""; //& maybe
function emailContainsOnlyValidCharacters(txt) {
	"use strict";
	for(var i=0; i<invalids.length; i++) {
		if(txt.indexOf(invalids.charAt(i)) >= 0 ) {
			return false;
		}
	}
	return true;
}

// LATER streamline this
function stripPhone(ph) {
	"use strict";
	while (ph.substring(0,1) == "0") {
		ph = ph.substring(1,ph.length);
	}
	ph = ph.replace(/  /g,' ');
	ph = ph.replace(/\(/g,'');
	ph = ph.replace(/\)/g,' ');
	ph = ph.replace(/\-/g,'');
	ph = ph.replace(/\+/g,'');
	ph = ph.replace(/\./g,'');
	ph = ph.replace(/  /g,' ');
	return ph;
}

/* -------------- START validForm -------------- */
var validForm = function (f, options) {
"use strict";

f.status.value = "A1 "; // These statements are for troubleshooting
submitcount = submitcount + 1; // Multiple submits for invalid submissions and partial saves

// Validate a few elements required before caching the application data (partial save)
if (options.savingState == 'appcache') {
	// Second parameter is boolDoingFinalSave
	if (!validateNameEtc(f,false)) {return false;}
	return true;
} // end of options..=='saving'. function validForm continues from here

f.status.value = "A2 " + submitcount;

//tabnum = 0;
// Second parameter is boolDoingFinalSave
if (!validateNameEtc(f,true)) {return false;}
//tabnum = 1;
if (!validateAddresses(f)) {return false;}
//tabnum = 2;
if (!validateEnrollmentAndEd(f)) {return false;}
//tabnum = 3;
if (!validatePersonalInfo(f)) {return false;}
if (!validateTMInfo(f)) {return false;}
if (!validateFERPAandAgreemt(f)) {return false;}

// Odd that this is done in the validation code. But it is good to clean it before submission.
f.phone_day.value = stripPhone(f.phone_day.value);
f.phone_evening.value = stripPhone(f.phone_evening.value);
f.cellphone.value = stripPhone(f.cellphone.value);

f.status.value = "c " + submitcount;

if (options.savingState == 'submission') {
	return finalSubmitAjax();
}
alert("End of validForm without a proper action.");
return false;
}; // end of function validForm
/* -------------- END validForm -------------- */

/* -------------- BELOW HERE USED TO BE IN BASIC_VALIDATION.JS -------------------- */
/* * * start DHTML date validation script. 
Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)  */
// Declaring valid date character, minimum year and maximum year
var dtCh= "/";
var minYear=1900;
var maxYear=2099;
function isInteger(s){
	"use strict";
	var i;
	for (i = 0; i < s.length; i++){   
		// Check that current character is number.
		var c = s.charAt(i);
		if (((c < "0") || (c > "9"))) return false;
	}
	// All characters are numbers.
	return true;
}
function stripCharsInBag(s, bag){
	"use strict";
	var i;
	var returnString = "";
	// Search through string's characters one by one.
	// If character is not in bag, append to returnString.
	for (i = 0; i < s.length; i++){   
		var c = s.charAt(i);
		if (bag.indexOf(c) === -1) returnString += c;
	}
	return returnString;
}
function daysInFebruary (year){
	"use strict";
	// February has 29 days in any year evenly divisible by four,
    // EXCEPT for centurial years which are not also divisible by 400.
    return year % 4 === 0 && (year % 100 !== 0 || year % 400 === 0) ? 29 : 28;
}
function DaysArray(n) {
	"use strict";
	var ary = [];
	for (var i = 1; i <= n; i++) {
		ary[i] = 31;
		if (i===4 || i===6 || i===9 || i===11) {ary[i] = 30;}
		if (i===2) {ary[i] = 29;}
	} 
	return ary;
}
function isDate(dtStr){
	"use strict";
	var daysInMonth = DaysArray(12);
	var pos1=dtStr.indexOf(dtCh);
	var pos2=dtStr.indexOf(dtCh,pos1+1);
	var strMonth=dtStr.substring(0,pos1);
	var strDay=dtStr.substring(pos1+1,pos2);
	var strYear=dtStr.substring(pos2+1);
	var strYr=strYear;
	if (strDay.charAt(0)==="0" && strDay.length>1) strDay=strDay.substring(1);
	if (strMonth.charAt(0)==="0" && strMonth.length>1) strMonth=strMonth.substring(1);
	for (var i = 1; i <= 3; i++) {
		if (strYr.charAt(0)==="0" && strYr.length>1) strYr=strYr.substring(1);
	}
	var month=parseInt(strMonth,10);
	var day=parseInt(strDay,10);
	var year=parseInt(strYr,10);
	if (pos1===-1 || pos2===-1){
		return("The date format should be : mm/dd/yyyy");
	}
	if (strMonth.length<1 || month<1 || month>12){
		return("Please enter a valid month");
	}
	//alert(dtStr);
	if (strDay.length<1 || day<1 || day>31 || (month==2 && day>daysInFebruary(year)) || day > daysInMonth[month]){
		return("Please enter a valid day");
	}
	if (strYear.length !== 4 || year===0 || year<minYear || year>maxYear){
		return("Please enter a valid 4 digit year between "+minYear+" and "+maxYear);
	}
	if (dtStr.indexOf(dtCh,pos2+1)!==-1 || isInteger(stripCharsInBag(dtStr, dtCh))===false){
		return("Please enter a valid date");
	}
return true;
}
/* **** end DHTML date validation script. **** */
