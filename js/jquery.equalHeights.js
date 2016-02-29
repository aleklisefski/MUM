 Skip to content

    Explore
    Features
    Enterprise
    Blog

    188
    99

public filamentgroup/jQuery-Equal-Heights

jQuery-Equal-Heights / jQuery.equalHeights.js
Bryan Powell bryanp on Jan 5, 2012
Fix conditions that determine whether or not to use pxToEm

2 contributors
Maggie Wachs Bryan Powell
file 47 lines (45 sloc) 2.228 kb
1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26 27 28 29 30 31 32 33 34 35 36 37 38 39 40 41 42 43 44 45 46 47 	

/*--------------------------------------------------------------------
* JQuery Plugin: "EqualHeights" & "EqualWidths"
* by: Scott Jehl, Todd Parker, Maggie Costello Wachs (http://www.filamentgroup.com)
*
* Copyright (c) 2007 Filament Group
* Licensed under GPL (http://www.opensource.org/licenses/gpl-license.php)
*
* Description: Compares the heights or widths of the top-level children of a provided element
and sets their min-height to the tallest height (or width to widest width). Sets in em units
by default if pxToEm() method is available.
* Dependencies: jQuery library, pxToEm method (article: http://www.filamentgroup.com/lab/retaining_scalable_interfaces_with_pixel_to_em_conversion/)
* Usage Example: $(element).equalHeights();
Optional: to set min-height in px, pass a true argument: $(element).equalHeights(true);
* Version: 2.0, 07.24.2008
* Changelog:
* 08.02.2007 initial Version 1.0
* 07.24.2008 v 2.0 - added support for widths
--------------------------------------------------------------------*/

$.fn.equalHeights = function(px) {
$(this).each(function(){
var currentTallest = 0;
$(this).children().each(function(i){
if ($(this).height() > currentTallest) { currentTallest = $(this).height(); }
});
    if (!px && Number.prototype.pxToEm) currentTallest = currentTallest.pxToEm(); //use ems unless px is specified
// for ie6, set height since min-height isn't supported
if ($.browser.msie && $.browser.version == 6.0) { $(this).children().css({'height': currentTallest}); }
$(this).children().css({'min-height': currentTallest});
});
return this;
};

// just in case you need it...
$.fn.equalWidths = function(px) {
$(this).each(function(){
var currentWidest = 0;
$(this).children().each(function(i){
if($(this).width() > currentWidest) { currentWidest = $(this).width(); }
});
if(!px && Number.prototype.pxToEm) currentWidest = currentWidest.pxToEm(); //use ems unless px is specified
// for ie6, set width since min-width isn't supported
if ($.browser.msie && $.browser.version == 6.0) { $(this).children().css({'width': currentWidest}); }
$(this).children().css({'min-width': currentWidest});
});
return this;
};

    Status
    API
    Training
    Shop
    Blog
    About

    © 2014 GitHub, Inc.
    Terms
    Privacy
    Security
    Contact

