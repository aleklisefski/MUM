jQuery(function ($) {
		
	// clear search default text on focus
	$(".clearDefault").focus(function() {
		if( this.value == this.defaultValue ) {
			this.value = "";
		}
	}).blur(function() {
		if( !this.value.length ) {
			this.value = this.defaultValue;
		}
	});
	
	// Submit forms with links
	$(".submit").click(function(){	
		$(this).closest("form").submit();
		return false;	
	});
	$('form input').keypress(function(e){
		var c = e.which ? e.which : e.keyCode;
		if(c == 13){
		    $(this).closest('form').submit();
		} 
	});
	
	// Home page slides
	$( '#hero .slider' ).on( 'cycle-before', function(e, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag ) {
   	 	$('#hero .slider.desktop-only .slide .slide-info').stop().animate({
			opacity: 0,
			right: '0'
		}, 250
		); 
	});
	$( '#hero .slider' ).on( 'cycle-after', function(e, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag ) {
   	 	$('#hero .slider.desktop-only .slide .slide-info').stop().fadeOut(0).animate({
			opacity: 100,
			right: '10%'
		}, 500
		).fadeIn(250);
	});
	
	// All Sliders
	$( '.grid.thirds .slider' ).on( 'cycle-before', function(e, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag ) {
   	 	$('.grid.thirds .slider .slide').stop().show();
   	 	equalHeight();
	});
	$( '.grid.thirds .slider' ).on( 'cycle-after', function(e, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag ) {
   	 	equalHeight();
	});
	
	
   // Full-width Dropdown
   $("#nav").hide(); 
   $("nav.desktop li").not(".current").click(function() {
   		var dropDownId = $(this).find("a").attr('href');
   		var inactive = $("#nav.desktop section").not(dropDownId);
   		var thisLink = $(this);
		$(".popUp").slideUp(150);
		$(inactive).fadeOut(0);
		$(dropDownId).fadeIn(250);
		$("#nav.desktop").slideDown(250);
		$(dropDownId).fadeIn(250, function() {
			$("nav li").removeClass("current");
			$(thisLink).addClass("current");
		});
		return false;
   });
   
   $("nav li.current a").click(function() {
   		var dropDownId = $(this).attr('href');
   		$(dropDownId).fadeIn(0);
		return false;
   });
   
   $(".dropDown .close").click(function() {
   		$("#nav.desktop").slideUp(250, function() {
			$("nav.desktop li").removeClass("current");
		});
		return false;
   });
   
	// Mobile Nav //
	$("#nav.mobile").hide();
	$("#nav.mobile li ul").hide();
   	$("#nav-open").click(function() {
   		$(".popUp").slideUp(150);
		$("#nav.mobile").slideDown(300);
		$(this).hide();
		$("#nav-close").show();
		return false;
	});
	$("#nav.mobile li > a.top").click(function() {
   		var dropDown = $(this).parent().find("ul");
   		var dropDownId = $(this).attr('href');
   		var inactive = $("#nav.mobile li ul").not(dropDownId)
   		var thisLink = $(this).parent();
		$(".popUp").slideUp(150);
		$("#nav.mobile ul li").removeClass("current");
		$(inactive).slideUp(200);
		$(dropDown).slideDown(200);
		$(thisLink).addClass("current");
		return false;
   });
   
   
   $("#nav.mobile li ul .close").click(function() {
   		var dropDown = $(this).parent();
   		$(dropDown).slideUp(200);
		$("#nav.mobile ul li").removeClass("current");
		return false;
   });
   
   $("#nav-close").click(function() {
   		$(".popUp").slideUp(150);
   		closeMobileNav();
		return false;
   });
   
   closeMobileNav = function() {
		$("#nav.mobile ul li").removeClass("current");
   		$("#nav.mobile li ul").fadeOut(100);
   		$("#nav.mobile").slideUp(500);
   		$("#nav-open").show();
   		$("#nav-close").hide();
   };
   
   
   // Top Nav PopUps
   $("header .topNav div.anchor").click(function() {
   		var current = $(this).find(".popUp");
   		$(current).addClass("current");
   		var notCurrent = $(".popUp").not(current);
   		$(notCurrent).slideUp(150);
   		$(current).slideDown(150);
   });
      $(".popUp .close").click(function() {
   		var current = $(this).closest(".popUp");
   		$(current).slideUp(150);
   		return false;
   });

	// Subnav //
	
	// add "parent" class to top level categories
	
	$('li.cat-item:has(ul.children)').addClass('parent');
	var parent = $("#subnav li.parent a").not('#subnav li.parent li a');
	
	$(parent).unbind('click').click(function(){
		var activeSub = $(this).parent().find("ul");
    	$(activeSub).slideToggle(200, function(){
	    	getTopOffset();
		});
    	if ($(this).parent().hasClass( "open" )) {
   			$(this).parent().removeClass('open');
   		} else {
   			$(this).parent().addClass('open');
   		};
    	return false;
	});
	
	
	openActiveParent = function() {
		var activeParent = $("#subnav li.current_page_parent, #subnav li.current-cat-parent, #subnav li.cat-item.parent");
		var activeSub = $(activeParent).find("ul");
		$(activeParent).addClass('open');
		$(activeSub).slideDown(200, function(){
	    	getTopOffset();
		});
	};
	
	// Mobile Subnav
	$("#sub-open").click(function() {
		$("aside").animate({left:"0"}, 250);
		$(this).hide();
		$("#sub-close").show();
		return false;
	});
	
	closeSubNav = function() {
		var navWidth = $("#page-header aside").width() + 5;
		$("aside").animate({left:-navWidth}, 250, function() {
			$("#sub-open").show();
			$("#sub-open").css({right:"0"});
			$("#sub-open").animate({right:"-55"});
			$("#sub-close").hide();
		});
		$("#subnav li ul").slideUp(200);
		$("#subnav li.parent").removeClass('open');
	};
	
	$("#sub-close").click(function() {
		closeSubNav();
		return false;
	});
	
	// On window resize
    $(window).resize(function() {
		widthResize();
		equalHeight();
		sharePosition();
    });
    
    // Show / Hide nav based on screen width
    widthResize = function() {
		var screen_width = window.innerWidth;
		if (screen_width > 1023) { 
			closeMobileNav();
			$("aside").animate({left:"0"}, 100);
			$("#hero .slider").addClass("desktop-only");
			// Do not allow some links to be clicked - only on desktop
			$('a[title="noAnchor"]').click(false);
    	} else {
    		$("#nav.desktop").hide();
    		//closeMobileNav();
    		$("aside").animate({left:"-325"}, 100);
    		$("#sub-open").show();
			$("#sub-open").animate({right:"-55"});
			$('a[title="noAnchor"]').click(true);
    	};
    	
		sharePosition();
		getTopOffset();
    }
    
          
    // position social sharing
	sharePosition = function() {	
		$window = window.innerWidth;
		if( $window < 1300 ) {
			$('#sharing').hide();
			$('#sharing-inline').show();
		} else {
			$('#sharing-inline').hide();
			$('#sharing').show();	
		}
   	};
    
    // Style Select Menu Drop-downs
    selectStyling = function() {
		$.each($('.contactForm select'), function () {
        	$(this).selectmenu({ 
        		width : $(this).parent().width(),
	        	change: function() {
	            	$("#contact-form").validate().element(this);
	        	}
        	}).selectmenu( "widget" ).addClass( "con" );
    	});
    	
    	$.each($('.visitors-weekend-dates select'), function () {
        	$(this).selectmenu({ 
        		width : $(this).parent().width()
        	}).selectmenu( "widget" ).addClass( "vw" );
    	});
    	
    	$.each($('.slide-info.download.blue select'), function () {
        	$(this).selectmenu({ 
        		width : $(this).parent().width()
        	}).selectmenu( "widget" ).addClass( "interest" );
    	});
    	
		$.each($('#contact-form-cuthankyoudvd select'), function () {
        	$(this).selectmenu({ 
        		width : $(this).parent().width(),
        		change: function() {
	            	$("#contact-form-cuthankyoudvd").validate().element(this);
	        	}
        	}).selectmenu( "widget" ).addClass( "app" );
    	});
    	
    	$.each($('.form select'), function () {
        	$(this).selectmenu({ 
        		width : $(this).parent().width()
        	}).selectmenu( "widget" ).addClass( "app" );
    	});
    	
    	$.each($('.gform_wrapper select'), function () {
        	$(this).selectmenu({ 
        		width : $(this).parent().width()
        	}).selectmenu( "widget" ).addClass( "app" );
    	});
    	
    }
    
   // Show/Hide Contact Form
   $(".contact .anchor.contact").unbind('click').click(function(){
   		var button = $(this);
   		if (button.hasClass( "current" )) {
   			$(button).removeClass('current');
   			closeContact();
   		} else {
   			$(button).addClass('current');
   			openContact();
   		};
   		return false;
	});
   
	
	$('header .contact li.first a, .box.green .icons li.contact a, .green.contact a.contact').click(function() {
		openContact();
		return false;
	});
   
	openContact = function() {
		$(".contact .anchor.contact").addClass('current');
   		$("#form-footer").slideDown(250, function() {
   			selectStyling();
   		});
   	};
   
	closeContact = function() {
   		$(".contactForm").slideUp(250);
   		$(".contact .anchor.contact").removeClass('current');
	};
   
	$(".contactForm .close").click(function() {
   		closeContact();
   		return false;
	});
   
   
   	// Smooth Scroll to contact form
   	$('header .contact, .box.green .icons li.contact, .green#contact-home').localScroll({ 
   		target: $(window), 
  		axis: 'y',
  		offset: 0,
   		duration: 1000,
   		easing: 'easeOutQuad',
   		hash: false
	});
  
	
	getTopOffset = function() {
    	share_offset = 0;
		bottom_offset = $('footer').offset().top -750;
		related_offset = 0;
		subscribe_offset = 0;
		subscribe_width = 0;
    	
		if ($("#sharing").is('*')) {
  			share_offset = $('#sharing').offset().top -40;
		};
		
		if ($("#subscribe").is('*')) {
  			subscribe_offset = $('#subscribe').offset().top -40;
  			subscribe_width = $('#subscribe').width();
  			if ($("#related-posts").is('*')) {
  				related_offset = $('#related-posts').offset().top -400;
  			} else {
  				related_offset = bottom_offset;
  			};
  			
		};  	
    };
    
    // scroll smoothly back to top of App when next/prev buttons clicked
	$('.call-out .grid.half .item').localScroll({ 
		target: $(window), 
		axis: 'y',
		offset: 30,
		duration: 500,
		easing: 'easeOutQuad',
		hash: false
	});
	
	// Make things sticky when scrolled
	$(window).scroll(function() {
		var screen_width = window.innerWidth;
		var scroll_top = $(window).scrollTop();
      
		// Fixed Social Sharing;
	      
		if (scroll_top > share_offset) {
			$('#sharing').addClass('fixed');
		} else {
			$('#sharing').removeClass('fixed');
		};
	      
		//screen width stuff here
		
		if (screen_width > 1300) {

			if (scroll_top > subscribe_offset) {
				$('#subscribe').addClass('fixed');
	        	$('#subscribe').animate({width : subscribe_width}, 0);
	      	} else {
	       		$('#subscribe').removeClass('fixed');
	      	};
      
      		if (scroll_top > bottom_offset) {
        		$('#sharing').fadeOut(250);
      		} else {
      			if (screen_width > 1300) {
      				$('#sharing').fadeIn(250);
      			};
       		};
       	
       		if (scroll_top > related_offset) {
        		$('#subscribe').fadeOut(250);
      		} else {
      			$('#subscribe').animate({width : subscribe_width}, 0);
				$('#subscribe').fadeIn(250);
       		};
      	};

    });	
    
   	// make all boxes the same height
   	equalHeight = function() {
		//var maxHeight = -1;
		
		$('.equalHeight').each(function() {
			$item = $(this).find('.item');
			$heading = $item.find('h3');
			$heading.matchHeight();
		});
		
		$('.slide').each(function() {
			$item = $(this).find('.item');
			$heading = $item.find('h3');
			$heading.matchHeight();
		});
		
		
		//$('.slide').each(function(i) {
		//	$boxHeadings = $(this).find('.item .h3');
		//	maxHeight(i) = maxHeight > $boxHeadings.height() ? maxHeight : $boxHeadings.height();
		//});
		
		//$('.slide').each(function() {
		//	$boxHeadings.height(maxHeight);
		//});
	};
    
    // FAQs
    $('.faq h4 a').click(function() {
    	$parent = $(this).closest('.faq');
    	$inactiveAnswer = $('.faq').not($parent).find('.answer');
    	$inactiveLink = $('.faq').not($parent).find('h4 a');
    	
    	$inactiveAnswer.slideUp(250);
    	$inactiveLink.removeClass('open');
    	$content = $parent.find('.answer')
    	$content.slideToggle(250);
    	$(this).toggleClass('open');
    	return false;
    });
    
    // Disable Event Venue and Organizer Links 
    $('.fn.org a').click(false);
    
    
    // Department Download / Subscribe Box
    $('.download .description a.button').click(function() {
    	$parent = $('.download .description')
    	$form = $('.download .form');
		$parent.hide();
		$form.fadeIn(200);
    	return false;
    });
    

	/*
		Fancybox -- Videos
	*/
	
	$('.fancybox-media').fancybox({
		openEffect : 'elastic',
		openSpeed  : 150,
		closeEffect : 'elastic',
		closeSpeed  : 150,
		closeClick : false,
		width		: 853,
		height		: 480,
        helpers : {
			media : {}
		}
 	}); 
 	
 	/*
		Fancybox -- Photos
	*/
	
	$('.fancybox').fancybox({
		openEffect : 'elastic',
		openSpeed  : 150,
		closeEffect : 'elastic',
		closeSpeed  : 150,
		closeClick : true,
		maxWidth	: 800,
		maxHeight	: 800
 	}); 
 	
 	/*
		Fancybox -- Photos
	*/
	
	$('.fancybox-content').fancybox({
		openEffect : 'elastic',
		openSpeed  : 150,
		closeEffect : 'elastic',
		closeSpeed  : 150,
		closeClick : false,
		maxWidth	: 800,
		maxHeight	: 800
 	}); 
 	
    
	/*
		Bevan Home Grid
	*/ 
	// hide all to start   
	$('#home-4-col .description').hide();
	
	 // Open first FAQ on page load
	$first = $('#home-4-col a.item').first();
	$content = $('#home-4-col .description').first();
	$content.slideToggle(200);
	$first.addClass('active');
	
	
	$('#home-4-col a.item').click(function() {
    	var id = $(this).attr('href');

		$('#home-4-col .description').not('#' + id).slideUp(200);
		$('#home-4-col #' + id).slideDown(200);
		$('#home-4-col a.item').not(this).removeClass('active');
		$(this).addClass('active');
    	return false;
    });
	
	
	// Remove chrome autocomplete styling
	$('input[autocomplete]').removeAttr('autocomplete');
	$("input").attr('autocomplete','off');
	
	// Remove top margin on first H2 on page
	//$("article h2:first-of-type").addClass("margin-top-none");
	
 	
 	// On page load
    
    getTopOffset();
	widthResize();
	equalHeight();
	selectStyling();
	sharePosition();
	openActiveParent();
	$( ".citizen" ).buttonset();
	
	// remove empty paragraphs within post content
	$('article p').each(function() {
	    var $this = $(this);
	    if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
	        $this.remove();
	});

		
});