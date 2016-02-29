var da = document.applic;
var testmode = false;

/* ================ DOCUMENT.READY ================ */
// LATER Other elements could receive this treatment. Or none. Just for reloads?
jQuery(document).ready(function () {
	"use strict";
	
	// for MBAAP and other alerts
	// used below in onMajorChangeSetEntryDates
	// This is up top because if it appears below the qsParm code, using that type of link causes the popup to appear on load, without content.
	jQuery("#MBAAP_dialog").dialog({ autoOpen: false });
	jQuery("#Intern_dialog").dialog({ autoOpen: false });
	
	// First, set values when populating.
	
	// Set these before populating the form. Otherwise changes won't be heard.
	doListeners();
	
	// This is for links that contain plan/major, like https://www.mum.edu/application/?plan=M&maj=XYZ
	var qsParm = qs();
	if (qsParm.plan) {
		switch(qsParm.plan) {
			case 'U': da.degree_plan.selectedIndex = 1; break;
			case 'M': da.degree_plan.selectedIndex = 2; break;
			case 'P': da.degree_plan.selectedIndex = 3; break;
		}
		onDegreeChange(qsParm.plan);
	}
	if (qsParm.maj) {
		elNameSetSelectedIndexByValue(da.major, qsParm.maj);
		onMajorChangeSetEntryDates();
	}
	
	// Returning via a link from a partially saved application
	if (typeof cacheddata !== "undefined") {
		if (cacheddata.appcacheid) {
			doPopulate();
		}
		else {
			alert("Problem with the form. Please contact webmaster@mum.edu with this message: Populate failed because of no appcacheid");
		}
	}

	// Second, restyle the select menus, so they are styled AND the selected values appear.
	jQuery.each(jQuery('#applic select'), function () {
		jQuery(this).selectmenu({
			width: jQuery(this).parent().width()
		}).selectmenu("widget").addClass("app");
	});

	// Third, activate the tabs. Third because restyling select menus while they are in hidden tabs does not style them. Or, they have a dimension of 0, which amounts to no styling.
	jQuery("#tabs").tabs({
		activate: function (event, ui) {
			if (ui.newPanel.selector === "#tabs-5") { // Show All
				jQuery("div[id^='tabs-']").attr('style', "display:block;");
			}
			else {
				jQuery("div[id^='tabs-']").attr('style', "display:none;");
				jQuery(ui.newPanel.selector).attr('style', "display:block;");
			}
			var active_tab = jQuery('#tabs').tabs('option', 'active');
			displayOfButtons(active_tab);
		}
	});
	var active_tab = jQuery('#tabs').tabs('option', 'active');
	displayOfButtons(active_tab);
	
	// Fourth, register some utility actions
	
	// make partial save not jump to top of page
	jQuery("#saveAndContinueLater").click(function() {
		return false;
	});
	
	if (location.search.indexOf('testmode=test') > -1) {
		testmode = true;
		da.action = da.action + '?testmode=test';
		alert("You are in testmode.\nWhen submitted, this form will call " + da.action);
	}
	
}); // document on ready
/* ================ END DOCUMENT.READY ================ */

function doListeners() {
	document.getElementById('phone1plus').onclick = function() {
		makeVisible('phone2');
		makeInvisible('phone3');
		makeInvisible('phone1plus');
	}
	document.getElementById('phone2minus').onclick = function() {
		makeInvisible('phone2');
		makeInvisible('phone3');
		makeVisible('phone1plus');
		makeVisible('phone2plus');
	}
	document.getElementById('phone2plus').onclick = function() {
		makeVisible('phone2');
		makeVisible('phone3');
		makeInvisible('phone2plus');
	}
	document.getElementById('phone3minus').onclick = function() {
		makeVisible('phone2');
		makeVisible('phone2plus');
		makeInvisible('phone3');
	}

	da.citizenship.onchange = function() {
		makeCitizen(sval(da.citizenship));
	}
	
	document.getElementById('cma_addr1plus').onclick = function() {
		makeVisible('cma_addr2');
		makeInvisible('cma_addr1plus');
	}
	document.getElementById('cma_addr2minus').onclick = function() {
		makeInvisible('cma_addr2');
		makeVisible('cma_addr1plus');
	}

	da.mail_country.onchange = function() {
		var country_val = sval(da.mail_country);
		if (country_val === "") {
			makeInvisible('cma_stateprovuscan');
			makeInvisible('cma_stateprovnotuscan');
		}
		else if (country_val === "USA" || country_val === "CAN") {
			makeVisible('cma_stateprovuscan');
			makeInvisible('cma_stateprovnotuscan');
			restyleOneSelectMenuInApp(da.mail_state);
		}
		else {
			makeInvisible('cma_stateprovuscan');
			makeVisible('cma_stateprovnotuscan');
		}
	}
	
	document.getElementById('perm_addr1plus').onclick = function() {
		makeVisible('perm_addr2');
		makeInvisible('perm_addr1plus');
	}
	document.getElementById('perm_addr2minus').onclick = function() {
		makeInvisible('perm_addr2');
		makeVisible('perm_addr1plus');
	}

	da.perm_country.onchange = function() {
		var country_val = sval(da.perm_country);
		if (country_val === "") {
			makeInvisible('perm_stateprovuscan');
			makeInvisible('perm_stateprovnotuscan');
		}
		else if (country_val === "USA" || country_val === "CAN") {
			makeVisible('perm_stateprovuscan');
			makeInvisible('perm_stateprovnotuscan');
			restyleOneSelectMenuInApp(da.perm_state);
		}
		else {
			makeInvisible('perm_stateprovuscan');
			makeVisible('perm_stateprovnotuscan');
		}
	}

	da.degree_plan.onchange = function() {
		var val = sval(da.degree_plan);
		if (val === "B") {val = "U";}
		onDegreeChange(val);
	}

	da.major.onchange = function() {
		onMajorChangeSetEntryDates();
	}

	da.entry_type.onchange = function() {
		entryType(sval(da.entry_type));
	}
}

function displayOfButtons(active_tab_number) {
	"use strict";
	jQuery("#partial_save_button").show();

	if (active_tab_number === 0 || active_tab_number > 3) {
		jQuery("#go_to_previous_button").hide();
		jQuery("#AppExceptions").show();
		// Show it only on tab one or show all, when the degree program is unknown or Masters, not after a partial save, and not after repopulating a partial application.
		var deg = sval(da.degree_plan);
		var hascacheddata = false;
		if (typeof cacheddata !== "undefined" && cacheddata.appcacheid) {hascacheddata = true;}
		if (deg === "B" || deg === "P" || hascacheddata) {
			jQuery("#AppExceptions").hide();
		}
		restyleOneSelectMenuInApp(da.citizenship)
	}
	else {
		jQuery("#go_to_previous_button").show();
		jQuery("#AppExceptions").hide();
	}
	
	if (active_tab_number > 2) {
		jQuery("#continue_to_next_button").hide();
			jQuery("#submit_button").show();
	}
	else {
		jQuery("#continue_to_next_button").show();
			jQuery("#submit_button").hide();
	}
	
	
	// When citizenship, on tab 0, changes and MBAAP causes a change to major list, on tab 2, the restyle has no effect. So do it again here. Also restyle a couple more.
	if (active_tab_number === 2 || active_tab_number > 3) {
		restyleOneSelectMenuInApp(da.degree_plan);
		restyleOneSelectMenuInApp(da.major);
		restyleOneSelectMenuInApp(da.entry_type);
	}
}

function gotoNextSection() {
	"use strict";
	var active_tab_number = jQuery('#tabs').tabs('option', 'active');
	_gaq.push(['_trackEvent', 'Application', 'Next', active_tab_number]);
	// The button is also hidden on the last page and showAll, so this is redundant.
	// LATER To future proof this, don't use an arbitrary number
	if (active_tab_number < 3) {
		jQuery('#tabs').tabs('option', 'active', active_tab_number+1);
	}
}

function gotoPreviousSection() {
	"use strict";
	var active_tab_number = jQuery('#tabs').tabs('option', 'active');
	_gaq.push(['_trackEvent', 'Application', 'Previous', active_tab_number]);
	// The button is also hidden on the first page and showAll, so this is redundant.
	if (active_tab_number === 0 || active_tab_number > 3) {}
	else {jQuery('#tabs').tabs('option', 'active', active_tab_number-1);}
}

function qs() {
	"use strict";
	var qsParm = [];
	if (window.location.search.substring(1)) {
		var query = window.location.search.substring(1);
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
	return qsParm;
}

function restyleOneSelectMenuInApp(objSelectMenu) {
	"use strict";
	jQuery(objSelectMenu).selectmenu({width: jQuery(objSelectMenu).parent().width()}).selectmenu("widget").addClass("app");
}

// utility for getting value of a select object
function sval(a) {return a[a.selectedIndex].value;}

// Pages fetched with POST are never cached, so the cache and ifModified options in jQuery.ajaxSetup() have no effect on these requests.
// except in IE8 when a POST is made to a URL that has already been requested by a GET.
jQuery.ajaxSetup ({
	cache: false
});

function finalSubmitAjax() {
	"use strict";
	var theDataToSend = jQuery('#applic').serialize();
	if (testmode) {theDataToSend += '&testmode=test';}
	jQuery('.appcachemessage_saving').hide();
	jQuery('.appcachemessage').hide();
	jQuery('.appmessage_saving').show();
	// NOTE: asynch: false is usually not recommended. Deemed appropriate for this.
	jQuery.ajax({
		async: false,
		type: "POST",
		url: '/cgi-bin/apply_ajax.cgi',
		dataType: 'json',
		data: theDataToSend,
		success: function(responseValues, textStatus, xhr) {
			// Receive json from ajax script. Add values to hidden fields for passing along to payment page.
			// After this ajax submission, the real submission to the form action takes place, using these values
			da.x_amount.value = responseValues.x_amount;
			da.x_invoice_num.value = responseValues.x_invoice_num;
			da.AppID.value = responseValues.AppID;
			da.x_application_id.value = responseValues.x_application_id;
			da.x_firstname.value = responseValues.x_firstname;
			da.x_lastname.value = responseValues.x_lastname;
			da.x_email.value = responseValues.x_email;
			da.x_date_submit.value = responseValues.x_date_submit;
			da.x_created_on.value = responseValues.x_created_on;
			da.x_degree_plan.value = responseValues.x_degree_plan;
			da.testmode_phrase.value = responseValues.testmode_phrase;
			_gaq.push(['_trackEvent', 'Application', 'Submit', 'Success']);
			return true;
		},
		error: function(xhr, textStatus, errorThrown) {
			var msgError = "textStatus: "+textStatus+"\n\nerrorThrown: "+errorThrown+"\n\nresponseText: "+xhr.responseText;
			alert("There was an error in saving the full application. Please try again, or send an email to webmaster@mum.edu with this message:\n\n"+msgError);
			jQuery('.appmessage_saving').hide();
			_gaq.push(['_trackEvent', 'Application', 'Submit', 'Error']);
			return false;
		}
	});
	// Since we set async to false, code here does get called AFTER the ajax submission.
}

function doappcacheajax() {
// called from inline js in the form html
	"use strict";
	if( validForm(da, {savingState:'appcache'}) ) {
		var active_tab_number = jQuery('#tabs').tabs('option', 'active');
		var theDataToSend = jQuery('#applic').serialize();
		if (testmode) {theDataToSend += '&testmode=test';}
		jQuery('.appcachemessage').hide();
		jQuery('.appmessage_saving').hide();
		jQuery('.appcachemessage_saving').show();
		jQuery.ajax({
			type: "POST",
			url: '/cgi-bin/appcachesaving_ajax.cgi',
			dataType: 'json',
			data: theDataToSend,
			success: function(responseValues, textStatus, xhr) {
				// Receive json from ajax script. Add values to hidden fields for passing along to payment page.
				da.appcacheid.value = responseValues.appcacheid;
				//da.appcacheid.value = html; // hidden field in application.html
				//if (testmode) {html += '&testmode=test';}
				//jQuery('.appcachemessage_sid').text(html); // no longer displaying the url
				jQuery('.appcachemessage_saving').hide();
				jQuery('.appcachemessage').show();
				_gaq.push(['_trackEvent', 'Application', 'PartialSave', 'Success from '+active_tab_number]);
			},
			error: function(xhr, textStatus, errorThrown) {
				var msgError = "textStatus: "+textStatus+"\n\nerrorThrown: "+errorThrown+"\n\nresponseText: "+xhr.responseText;
				alert("There was an error while saving the partial application. Please try again, or send an email to webmaster@mum.edu with this message:\n\n"+msgError);
				jQuery('.appcachemessage_saving').hide();
				_gaq.push(['_trackEvent', 'Application', 'PartialSave', 'Error from '+active_tab_number]);
			}
		});
		// We do not try to show the next tab after partial save, because the user might want to stay on the same tab
	} // end of if validForm
	// No else is needed for validForm, because upon error, a popup reports it and submission stops.
}

// Not used currently. See previous version for future use
//function CheckVetFeeWaiver() 

function elNameSetSelectedIndexByValue(thisel, val) {
	"use strict";
	for (var i = 0; i < thisel.length; i++) {
		if (thisel.options[i].value == val) {
			thisel.selectedIndex = i;
			break;
		}
	}
}

function do_click(elname) {
	"use strict";
	var els = document.getElementsByName(elname);
	for (var i = 0; i < els.length; i++) {
		if (els[i].checked) {
			els[i].click();
			break;
		}
	}
}

function makeVisible(id) {
	"use strict";
	var item = document.getElementById(id);
	if (item === null) {alert("Error, Making Visible, null item: " + id);return;}
	if (item.style.display) {item.style.display = '';}
}

function makeInvisible(id) {
	"use strict";
	var item = document.getElementById(id);
	if (item === null) {alert("Error, Making Invisible, null item: " + id);return;}
	item.style.display = 'none';
}

function checkAgentIdDisplay() {
	if ( (da.citizenship.selectedIndex === 3) && (da.entry_type.selectedIndex === 1 || da.entry_type.selectedIndex === 2) ) {
		makeVisible('agentid');
	}
	else {makeInvisible('agentid');}
}

function checkFinancialAidDisplay() {
	var i = da.citizenship.selectedIndex;
	if ( (i === 1 || i === 2) && (da.degree_plan.selectedIndex === 1) ) {
		makeVisible('finaidu');
	}
	else {makeInvisible('finaidu');}
}

function makeCitizen(id) {
	"use strict";
	
	checkFinancialAidDisplay();
	checkAgentIdDisplay();
	
	// Display of majors is affected by citizenship. makeCitizen is called when citizenship changes.
	// So far, only Masters has majors that are available depending on US/Intl citizenship
	var mj = '';
	if (da.degree_plan.selectedIndex === 2) {
		// get currently selected major so we can restore it, if it still exists after changing citizenship
		// do this check in case the major has not been populated
		//if (typeof da.major[da.major.selectedIndex] !== 'undefined') // This does not work in IE 11
		if (da.major[da.major.selectedIndex]) {
			mj = da.major[da.major.selectedIndex].value;
		}
		setMajor('M');
		// reset currently selected major, if it exists
		elNameSetSelectedIndexByValue(da.major, mj);
	}
	
	switch(id) {
	case 'U':
		makeInvisible('green');
		makeVisible('ssn');
		makeInvisible('intl_info');
		makeVisible('file_fafsa_tr');
		makeInvisible('intlfee2');
		da.UUSINTL.value = "U";
		da.UPERMUSRES.value = "";
	break;
	case 'P':
		makeVisible('green');
		makeVisible('ssn');
		makeInvisible('intl_info');
		makeVisible('file_fafsa_tr');
		makeInvisible('intlfee2');
		da.UUSINTL.value = "U";
		da.UPERMUSRES.value = "Y";
	break;
	case 'I':
		makeInvisible('green');
		makeInvisible('ssn');
		makeVisible('intl_info');
			restyleOneSelectMenuInApp(da.citizenship_country);		
			restyleOneSelectMenuInApp(da.country_birth);		
		makeInvisible('file_fafsa_tr');
		makeVisible('intlfee2');
		da.UUSINTL.value = "I";
		da.UPERMUSRES.value = "";
	break;
	// blank option is needed now that it is a select box
	// These amount to the defaults on load
	case '':
		makeInvisible('green');
		makeInvisible('ssn');
		makeInvisible('intl_info');
		makeInvisible('file_fafsa_tr');
		makeInvisible('intlfee2');
		da.UUSINTL.value = "";
		da.UPERMUSRES.value = "";
	break;
	}
}

function doPermAddress(yn) {
	"use strict";
	if (yn === 'Y') {
		makeInvisible('PermResAddr');
		// If current address is the same as permanent address, just leave permanent address fields blank
	}
	else if (yn === 'N') {
		makeVisible('PermResAddr');
		if (da.perm_address_2) {
			jQuery("#perm_addr2").show();
			jQuery("#perm_addr1plus").hide();
		}
		if (da.perm_country.selectedIndex === 1 || da.perm_country.selectedIndex === 2) { // USA or CAN
			jQuery("#perm_stateprovuscan").show();
			jQuery("#perm_stateprovnotuscan").hide();
		}

		restyleOneSelectMenuInApp(da.perm_state);
		restyleOneSelectMenuInApp(da.perm_country);
	}
}

function onDegreeChange(prog) {
	"use strict";
	checkFinancialAidDisplay();
	makeEtype("");
	blankTheEnrollWhenOptions();
	// LATER is this the only place U is used for degree? In the form it is B. Incoming links:?plan=U Check cgi scripts.
	if (prog === 'U') {
		makeInvisible('grad');
		makeVisible('undergrad');
		makeInvisible('gre');
		//makeVisible('never');
		document.getElementById('majorlist_label').innerHTML = "Intended major";
		makeVisible('majorlist');
		makeInvisible('enrollmentdate');
	}
	else if (prog === 'M' || prog === 'P') {
		makeVisible('grad');
		makeInvisible('undergrad');
		makeVisible('gre');
		//makeInvisible('never');
		checkTypePlan();
		document.getElementById('majorlist_label').innerHTML = "Intended graduate program";
		makeVisible('majorlist');
		makeInvisible('enrollmentdate');
	}
	else if (prog === '') {
		makeInvisible('grad');
		makeVisible('undergrad');
		makeInvisible('gre');
		//makeVisible('never');
		makeInvisible('majorlist');
		makeInvisible('enrollmentdate');
	}
	
	// Run setMajor in every instance, AFTER showing the dropdown.
	// setMajor is fine when prog is blank, because it first sets the options length to 0, then sets the default option.
	// setMajor is in its own .js file because it is also used by contact us and the arrival form
	setMajor(prog);
	
	return true;
}

function onMajorChangeSetEntryDates() {
	"use strict";
	var now = new Date();
	var daate = now.getDate(); // the day of the month number, eg the 26 in August 26
	var mn = now.getMonth(); // 0 based
	var yr = now.getFullYear();
	
	// Show alerts for some majors when they get selected
	//var mj = da.major[da.major.selectedIndex].value;
	var mj = '';
	if (da.major !== "undefined") {mj = da.major[da.major.selectedIndex].value;}
	// alert cannot display html
	if (mj === 'MBAAP') {
		jQuery("#MBAAP_dialog_activator").click();
	}
	else if (mj === 'MVSI' || mj === 'MVSEW' || mj === 'MBAI' || mj === 'PGMVI' || mj === 'PGCLH' || mj === 'PGMVE') {
		jQuery("#Intern_dialog_activator").click();
	}

	da.ShortMajor.value = mj.split("-")[0]; // used in goldmine import template
	
	if (mj === 'NONE') {makeInvisible('enrollmentdate');}
	else {makeVisible('enrollmentdate');}
	
	var ew = da.enroll_when;
		
	blankTheEnrollWhenOptions();
	var aryFallOnly = ['MEISS','MEIFT','MEISI','MEICB','MASL','MVS-M','MVS-P','MAVOL'];
	var arySpringOnly = [];
	
	// Option(text,value)
	if (aryFallOnly.indexOf(mj) > -1) {
		if ( (mn < 7) || (mn == 7 && daate < 16) ) {
			ew.options[1] = new Option("August "+yr,"F "+yr);
			ew.options[2] = new Option("August "+(yr+1),"F "+(yr+1));
		}
		else {
			ew.options[1] = new Option("August "+(yr+1),"F "+(yr+1));
			ew.options[2] = new Option("August "+(yr+2),"F "+(yr+2));
		}
	}
	else if (arySpringOnly.indexOf(mj) > -1) {
		if (mn === 0 && daate < 16) {
			ew.options[1] = new Option("February "+yr, "S "+yr);
			ew.options[2] = new Option("February "+(yr+1),"S "+(yr+1));
		}
		else {
			ew.options[1] = new Option("February "+(yr+1),"S "+(yr+1));
			ew.options[2] = new Option("February "+(yr+2),"S "+(yr+2));
		}
	}
	else if (mj === 'MFLMW') {
		ew.options[1] = new Option('February 2016','S 2016'); // TODO This is set manually.
	}
	else if (mj === 'MGT-P') {
		ew.options[1] = new Option('August 2016','F 2016'); // TODO This is set manually. Every 3 years.
	}
	else {
		if (mn === 0 && daate < 16) {
			ew.options[1] = new Option("February "+yr, "S "+yr);
			ew.options[2] = new Option("August "+yr, "F "+yr);
			ew.options[3] = new Option("February "+(yr+1),"S "+(yr+1));
		}
		else if ( (mn < 7) || (mn === 7 && daate < 16) ) {
			ew.options[1] = new Option("August "+yr, "F "+yr);
			ew.options[2] = new Option("February "+(yr+1),"S "+(yr+1));
			ew.options[3] = new Option("August "+(yr+1),"F "+(yr+1));
		}	
		else {
			ew.options[1] = new Option("February "+(yr+1),"S "+(yr+1));
			ew.options[2] = new Option("August "+(yr+1),"F "+(yr+1));
			ew.options[3] = new Option("February "+(yr+2),"S "+(yr+2));
		}
	}
	// Without this the change does not display
	restyleOneSelectMenuInApp(da.enroll_when);
	return true;
}

// Reset enroll_when options when switching between Bach/M/U. Otherwise the previous starting dates hang on.
function blankTheEnrollWhenOptions() {
	"use strict";
	var ew = da.enroll_when;
	ew.options[1] = null;
	ew.options[2] = null;
	ew.options[3] = null;
}

// Only appears in application form: <select name="enroll_when" onchange="setYT();">
function setYT() {
	"use strict";
	var ew = da.enroll_when;
	var sp = ew[ew.selectedIndex].value;
	da.procterm.value = sp.charAt(0);
	da.procyear.value = sp.substr(2,4);
}

// On the form the question is called Enrollment Type, not entryType as is used here and in the field names
// N:Never T:Transfer R:Re-admit R1:Re-admit C:Continuing C1:Continuing
// N: I've never been enrolled in a college or university before.
// T: I've been enrolled at another college or university, but never attended MUM. Transfer.
// I will continue my studies in the same degree program I was enrolled in before:
// R: Yes
// R1: No
// C: I'm currently enrolled at MUM, Fairfield.
// C1: I'm currently enrolled at MUM, Beijing.
function entryType(param) {
	"use strict";
	if (param === 'N') {
		makeInvisible('degree');
		makeInvisible('higher');
		checkTypePlan();
	}
	else {
		makeVisible('degree');
		makeVisible('higher');
	}
	checkAgentIdDisplay();
	makeEtype(param);
}

// Etype means Entry Type
// entry_type.2 param is 'T' as in entryType('T'). Here it changes to 'N' for enterstat.
// LATER Check if the backoffice actually uses it this way.
function makeEtype(param) {
	"use strict";
	var i = da.degree_plan.selectedIndex;
	if ( (i === 2 || i === 3) && (da.entry_type.selectedIndex === 2) ) {da.enterstat.value = 'N';}
	else if (param !== "") {da.enterstat.value = param;}
}

function checkTypePlan() {
	"use strict";
	var i = da.degree_plan.selectedIndex;
	if ( (i === 2 || i === 3) && (da.entry_type.selectedIndex === 1) ) {
		alert("Please check the Degree Plan and Enrollment Type you have selected in the Enrollment Information section.\n\nYou cannot apply for a graduate degree without a Bachelor degree.");
		da.entry_type.focus();
		return false;
	}
	return true;
}

function makeHS(param) {
	"use strict";
	makeInvisible('hsn');
	makeInvisible('aff');
	makeInvisible('loc');
	makeInvisible('oth');
	switch(param) {
		case 'dip': makeVisible('hsn');	break;
		case 'hom':	makeVisible('aff');	break;
		case 'ged':	makeVisible('loc');	break;
		case 'oth':	makeVisible('oth');	break;
	}
}

// LATER Refine this. Put all three into one div
function makeMore() {
	"use strict";
	if (da.showSchools.checked) {
		makeVisible("moreSchools3");
		makeVisible("moreSchools4");
		makeVisible("moreSchools5");
	}
	else {
		makeInvisible("moreSchools3");
		makeInvisible("moreSchools4");
		makeInvisible("moreSchools5");
	}
}

function msaeHelper(param) {
	"use strict";
	if (param === 'Yes') {da.msae[0].checked = false;makeVisible('msaeinfo');}
	else if (param === 'No') {da.msaey.checked = false;makeInvisible('msaeinfo');}
}

// =============== DOPOPULATE =================
// IMPORTANT: AT THE END OF THIS FUNCTION, cacheddata GETS BLANKED OUT
var doPopulate = function() {
"use strict";

jQuery(da).populate(cacheddata);

da.appcacheid.value = cacheddata.appcacheid;

// unfold the phone numbers as appropriate
if (cacheddata.phone_evening) {
	jQuery("#phone2").show();
	jQuery("#phone3").show();
}
else if (cacheddata.phone_day) {
	jQuery("#phone2").show();
	jQuery("#phone3").hide();
}
else {
	jQuery("#phone2").hide();
	jQuery("#phone3").hide();
}

jQuery(da.citizenship).change();
// Could see if this triggers a change: da.citizenship.selectedIndex = 1
//if (cacheddata.citizenship !== '') {
//	elNameSetSelectedIndexByValue(da.citizenship, cacheddata.citizenship);
//}
do_click('visa');

if (cacheddata.mail_address_2) {
	jQuery("#cma_addr2").show();
}
if (cacheddata.mail_country && (cacheddata.mail_country === "USA" || cacheddata.mail_country === "CAN") ) {
	jQuery("#cma_stateprovuscan").show();
}
do_click('address_same');
if (cacheddata.address_same && cacheddata.address_same === "N") {
	if (cacheddata.perm_address_2) {
		jQuery("#perm_addr2").show();
	}
	if (cacheddata.perm_country && (cacheddata.perm_country === "USA" || cacheddata.perm_country === "CAN") ) {
		jQuery("#perm_stateprovuscan").show();
	}
}

// ---- Start degree, major, and enroll-when
//do_click('degree_plan'); // calls onDegreeChange, which calls setMajor
jQuery(da.degree_plan).change();

// The populate function, when run first, has no options in major to choose
// degree_plan click populates the major options
// Now make the selection
if (cacheddata.major !== '') {
	elNameSetSelectedIndexByValue(da.major, cacheddata.major);
}

// When the major changes, it calls onMajorChangeSetEntryDates(), which changes the enroll_when options
jQuery(da.major).change();

// major Change has populated enroll_when. Now make the selection.
if (cacheddata.enroll_when) {
	elNameSetSelectedIndexByValue(da.enroll_when, cacheddata.enroll_when);
}
// onchange calls setYT()
jQuery(da.enroll_when).change();

// Restyle them so the newly selected value appears
restyleOneSelectMenuInApp(da.major);
restyleOneSelectMenuInApp(da.enroll_when);
// ---- End degree, major, and enroll-when

do_click('entry_type');

do_click('have_degree');
do_click('hs_type');

// This is the only checkbox on the form.
// Why do it like this? Because if the checkbox is checked, then we call do_click on it, the click unchecks it, and then calls makeMore, which sees that it is unchecked and therefore hides the extra school fields. Similar problem if it starts off unchecked. So call makeMore from here. We don't need to set checked = true, because it is already set to it. do_click reverses it.
if (cacheddata.showSchools == 'Yes') {
	makeMore();
}

do_click('acdmprob');

//do_click('drugs');
do_click('crime');
do_click('tm');
do_click('sidha');
do_click('msaey');
if (cacheddata.msae == 'U') {da.msae[0].checked = true;}
do_click('msae');
//do_click('techniques');

// At the end, blank out cacheddata and remove it from the DOM, to avoid it influencing future partial saves and populating
cacheddata = {};
jQuery("#cacheddata_json_scripttag").detach();

}; // end doPopulate

