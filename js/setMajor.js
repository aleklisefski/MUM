// Set choices for major based on degree_plan radio button.
// Called from onDegreeChange() function, either at onload or when radio buttons are selected
// Also called from makeCitizen in application.js, when it is a Masters Degree
// This function is called by both contact-form and application. That is why it has been broken out of application.js

// For the arrival form. At SG it is a gravity form. Otherwise it is hosted at Pair. Now added to the form html
//if ( document.getElementById('gform_24') ) {
//	var fm = document.getElementById('gform_24');
//	jQuery('#choice_1_0').on('click', function(){setMajor('U', fm)});
//	jQuery('#choice_1_1').on('click', function(){setMajor('M', fm)});
//	jQuery('#choice_1_2').on('click', function(){setMajor('P', fm)});
//}

function setMajor(prog, objForm) {
	if (objForm === undefined) {objForm = document.applic;}
	
	var mjp = undefined;
	if ( objForm === document.getElementById('gform_24') ) {
		mjp = objForm.input_16;
	}
	else {
		mjp = objForm.major;
	}
	
	// clear the select options before populating them. Important when clicking different Major radio buttons.
	mjp.options.length = 0;
	//Option(text,value)
	mjp.options[0] = new Option('** Select One **','NONE');
	
	var idx = 1;
	switch(prog) {
	case 'U':
		mjp.options[1] = new Option('Undecided','UNDEC');
		mjp.options[2] = new Option('Art (BA / BFA)','ART');
		mjp.options[3] = new Option('Art (Post Baccalaureate)', 'ARTPB');
		mjp.options[4] = new Option('Business Administration (BA)','BUS');
		mjp.options[5] = new Option('Certificate in Business Studies','CIBS');
		mjp.options[6] = new Option('Computer Science (BS)','CS-B');
		mjp.options[7] = new Option('Educational Innovation: Secondary (BA/MA)','EDSE');
		mjp.options[8] = new Option('Individualized Major (BA)','IM');
		mjp.options[9] = new Option('Literature (BA)','LIT');
		mjp.options[10] = new Option('Literature and Writing (BA)','WRI');
		mjp.options[11] = new Option('Maharishi Vedic Science (BA)','MVS-B');
		mjp.options[12] = new Option('Mathematics (BS)','MATH');
		mjp.options[13] = new Option('Media and Communications (BA)','MC');
		mjp.options[14] = new Option('Maharishi AyurVeda Wellness Consultant - Physiology and Health (BS)','PHL');
		mjp.options[15] = new Option('Pre-Integrative Medicine - Physiology and Health (BS)','PMED');
		mjp.options[16] = new Option('Sustainable Living (BA)','SL');
	break;
	case 'M':
		// Offer MBAAP and certain others as an option only to international students,
		// or when coming in from the MBAAP assessment page link: https://www.mum.edu/application/?plan=M&maj=MBAAP
		// Display all on the arrival form
		// This code is also used for contact us on every page.
		// Beware: contact us is also on the application page, so this wont work: if ( typeof document.contactForm !== "undefined"
		// When citizenship changes on the application form, makeCitizen implements this logic:
			// if (Masters) setMajor('M'); And get then reset the major. Otherwise no major will be selected after resetting.
		// See also displayOfButtons, which reformats major list

		var isIntl = fIsIntl(objForm);
		var isArvlForm = false;
		// arrivalform is on the Pair server. 
		if ( (objForm === document.arrivalform) || (objForm === document.getElementById('gform_24')) ) {
			isArvlForm = true;
		}
		mjp.options[idx++] = new Option('MA in Filmmaking - Web Series Track', 'MFLMW');
		//mjp.options[idx++] = new Option('MA in Filmmaking - Film Track (February entry only)', 'MFLMF');
		mjp.options[idx++] = new Option('MD/MS in Maharishi AyurVeda and Integrative Medicine', 'MAVIM');
		mjp.options[idx++] = new Option('MS in Maharishi AyurVeda Online', 'MAVOL');
		mjp.options[idx++] = new Option('MA in Maharishi Vedic Science','MVS-M');
		mjp.options[idx++] = new Option('MA in Maharishi Vedic Science Online','MVSOL');
		if ( isIntl || location.search.indexOf('MVSI') > -1 || isArvlForm ) {
			mjp.options[idx++] = new Option('MA in Maharishi Vedic Science: Intern Program','MVSI');
		}
		mjp.options[idx++] = new Option('MA in Maharishi Vedic Science: Evening Weekend','MVSEW');
		mjp.options[idx++] = new Option('MA in Sustainable Living','MASL');
		mjp.options[idx++] = new Option('MBA: Undecided Specialization','MBAUS');
		mjp.options[idx++] = new Option('MBA: Sustainable Business Specialization','MBASB');
		mjp.options[idx++] = new Option('MBA: Business Process Improvement Specialization','MBBPR');
		mjp.options[idx++] = new Option('MBA: Accounting Specialization--Fresh Start','MBAAF');
		mjp.options[idx++] = new Option('MBA: Accounting Specialization--Strong Background','MBAAS');
		// When applicant is international, do not display MBA Evening Weekend MBAEW
		if ( !isIntl || location.search.indexOf('MBAEW') > -1 || isArvlForm ) {
			mjp.options[idx++] = new Option('MBA: Evening-Weekend','MBAEW');
		}
		if ( isIntl || location.search.indexOf('MBAI') > -1 || isArvlForm ) {
			mjp.options[idx++] = new Option('MBA: Intern Program','MBAI');
		}
		mjp.options[idx++] = new Option('MBA: Online','MBAOL');
		if ( isIntl || location.search.indexOf('MBAAP') > -1 || isArvlForm ) {
			mjp.options[idx++] = new Option('MBA for Accounting Professionals','MBAAP');
		}
		mjp.options[idx++] = new Option('Graduate Certificate: Business Administration Online', 'GCBOL');
		//mjp.options[idx++] = new Option('Graduate Certificate: MIS (Management Information Systems)','GCMIS');
		if ( isIntl || location.search.indexOf('PGMVI') > -1 || isArvlForm ) {
			mjp.options[idx++] = new Option('Post Graduate Certificate in Maharishi Vedic Science: Intern Program','PGMVI');
		}
		mjp.options[idx++] = new Option('Post Graduate Certificate in Maharishi Vedic Science: Evening/Weekend (IAA)','PGMVE');
		mjp.options[idx++] = new Option('Post Graduate Certificate in Lean Higher Education Administration', 'PGCLH');
	break;
	case 'P':
		mjp.options[1] = new Option('PhD in Maharishi Vedic Science','MVS-P');
		mjp.options[2] = new Option('PhD in Management','MGT-P');
		mjp.options[3] = new Option('PhD in Physiology - Special Research Program','PHL-P');
	break;
	// A default in case prog is blank is not needed, because options were blanked out up top
	}
	if (document.getElementById('applic') !== null) {
		restyleOneSelectMenuInApp(document.applic.major);
	}
	else if ( objForm === document.arrivalform ) {
		// Do nothing. selectStyling() is not at the arrival form
	}
	else {
		selectStyling(); // Intended for contact us form. LATER perhaps make it call on just specific select menus
	}
	return true;
}

function fIsIntl(objForm) {
	var citIsIntl = false;
	if (objForm === document.applic) {
		var elCit = document.applic.citizenship;
		if (elCit.nodeName !== undefined && elCit.nodeName.toLowerCase() === "select") {
			if (elCit.selectedIndex === 3) {citIsIntl = true;}
		}
		else { // radio element in the current/old version of the application. TODO Simplify this when the transition is made.
			if (elCit[2].checked) {citIsIntl = true;}
		}
	}

	if ( ( objForm === document.contactForm && document.contactForm.whichform.value === 'cuintl' )
		 || 
		 ( objForm === document.applic && citIsIntl )
	   ) {
		return true;
	}
	else {
		return false;
	}
}

/*
function fIsIntl(objForm) {
	//if (objForm === document.applic) {
	//	document.getElementById("rontestdebug").innerHTML = objForm.citizenship.nodeName.toLowerCase() + ", " + objForm.citizenship[1].nodeName.toLowerCase();
	//}
	if ( ( objForm === document.contactForm && document.contactForm.whichform.value === 'cuintl' )
		 || 
		 ( objForm === document.applic && document.applic.citizenship[2].checked )
	   ) {
		return true;
	}
	else {
		return false;
	}
}
*/
