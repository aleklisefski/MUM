jQuery(function ($) {
	// Validate Contact Form
	jQuery.validator.addMethod("notEqual", function(value, element, param) {
		return this.optional(element) || value !== param;
	}, "This field is required");
	jQuery.validator.addMethod("oneOfTwoPhones", function(value, element) {
		// return true if an element is valid
		// phone is not required on intl cu form. Since phone2 doesn't appear on intl cu form, it returns true. Good.
		if ( ($("#phone1").val() == 'Phone Number *') && ($("#phone2").val() == 'Cell Number') ) {return false;}
		else {return true;}
	}, "Phone or Cell number is required");	
	
	// $international_required is created by php outside page-thank-you.php. At first is false, but is made true on intl cu page.
	
	//jQuery validate doesn't work like most jQuery plugins and won't operate on the matched set, but rather only on the first element. So to validate multiple forms, call each form individually through each().
	// And... couldn't get it to work with each(), so split it into two big sections, with some code duplication.
	           
	$('#contact-form').validate({
		//debug: true,
		ignore: [], // IMPORTANT: ignore: [] is needed for validation of jQueryUI selectMenu items to work properly
		rules: {
			usCitizen: "required",
			firstName: {
				required: true,
				notEqual: "First (Given) Name *"
			},
			lastName: {
				required: true,
				notEqual: "Last (Family) Name *"
			},
			phone1: {
				oneOfTwoPhones: ""
			},
			email: {
				//required: function(element) {alert("hello in email");return true;},
				required: true,
				email: true,
				notEqual: "Email Address *"
			},
			LearnAbout: {
				//required: function(element) {console.log('***** In validation.js LearnAbout');alert("hello in LearnAbout");return true;},
				required: true
			},
			city: {
				required: $international_required,
				notEqual: "City *"
			}, 
			country: {
				required: $international_required
			}
		},
		messages: {
			usCitizen: "Required →",
			firstName: "First (given) name required",
			lastName: "Last (family) name required",
			phone1: {
				required: "Phone or Cell number is required"
			},
			email: {
				required: "Email address is required",
				email: "Your email address must be in the format name@domain.com"
			},
			LearnAbout: "This question is required",
			city: "City is required",
			country: "Country is required"
		}
	});
	
	$('#contact-form-cuthankyoudvd').validate({
		ignore: [], // IMPORTANT: ignore: [] is needed for validation of selectMenu items to work properly
		rules: {
			usCitizen: "required",
			firstName: {
				required: true,
				notEqual: "First (Given) Name *"
			},
			lastName: {
				required: true,
				notEqual: "Last (Family) Name *"
			},
			phone1: {
				oneOfTwoPhones: ""
			},
			email: {
				required: true,
				email: true,
				notEqual: "Email Address *"
			},
			LearnAbout: "required",
			city: "required",
			country: "required",
			address1: "required",
			state: "required",
			zip: "required"
		},
		messages: {
			usCitizen: "Required →",
			firstName: "First (given) name required",
			lastName: "Last (family) name required",
			phone1: {
				required: "Phone or Cell number is required"
			},
			email: {
				required: "Email address is required",
				email: "Your email address must be in the format name@domain.com"
			},
			LearnAbout: "This question is required",
			city: "City is required",
			country: "Country is required"
		}
	});


});
