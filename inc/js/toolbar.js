function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}
function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}
function eraseCookie(name) {
	createCookie(name,"",-1);
}

/**
 * Close toolbar when user scrolls
 **/
jQuery(window).scroll(function(e) {
	if( !jQuery("#acp_toolbarWrap").hasClass('close-toolbar'))
		jQuery("#acp_toolbarWrap").toggleClass("close-toolbar"); 
}); 


jQuery(document).ready(function($){
	
	/**
	 * Keyboard navigation
	 **/
	$("#acp-keyboard").click(function() {
		$("a, button").not("#acp_toolbarWrap button, #acp_toolbarWrap a").first().focus();
		$("#acp_toolbarWrap").addClass("close-toolbar");
	});
	/**
	 * font sizer
	 **/
	
	var customtags = jQuery('#acp-fontsizer').attr('data-size-tags');
	var customjump = parseInt($('#acp-fontsizer').attr('data-size-jump'));
	
	//increase
	
	$("#acp-fontsizer button.big-letter").click(function() {
		$( customtags ).each(function () {
			var fontsize;
			fontsize = parseInt($(this).css('font-size'));
			$(this).css({ 'font-size': (fontsize + customjump) + 'px' });
     	});
     	$(".acp-font-reset").removeClass('acp-hide');
 	});
 	
 	// decrease
 	
 	$("#acp-fontsizer button.small-letter").click(function () {
 		$( customtags ).each(function () {
 			var fontsize;
 			fontsize = parseInt($(this).css('font-size'));
 			$(this).css({ 'font-size': (fontsize - customjump) + 'px' });
     	});
     	$(".acp-font-reset").removeClass('acp-hide');
	});
	
	// reset to default
	
	$(".acp-font-reset").click(function() {
 		$( customtags ).each(function () {
 			var fontsize;
 			fontsize = parseInt($(this).css('font-size'));
 			$(this).attr("style","");
 				
     	});
     	// hide reset button after pressing
     	$(".acp-font-reset").addClass('acp-hide');
	});
		
	$(".acp_hide_toolbar").click(function(event){
		$("#acp_toolbarWrap").toggleClass("close-toolbar");
		if($("#acp_toolbarWrap").hasClass('close-toolbar')){
			$("#acp_toolbarWrap a, #acp_toolbarWrap button, #acp_toolbarWrap h3").attr('tabindex', '-1');
		}
		else {
			$("#acp_toolbarWrap a, #acp_toolbarWrap button, #acp_toolbarWrap h3").attr('tabindex', '0');
		}
		
	});
	
	/**
	 * contrast
	 **/
	
	var acp_dark = readCookie('acp_dark');
	var acp_bright = readCookie('acp_bright');
	var acp_grayscale = readCookie('acp_grayscale');
	
	$( '.acp-dark-btn' ).click( function () {
		eraseCookie('acp_bright');
		eraseCookie('acp_grayscale');
		createCookie('acp_dark','dark',1);
		
	 	$( 'body' )
	 		.removeClass( 'acp-bright' )
	 		.removeClass( 'acp-grayscale' )
	 		.addClass( 'acp-dark' );
	 	
	 	$( '.acp-contrast-reset' ).removeClass( 'acp-hide' );
	});
		
	$( '.acp-bright-btn' ).click( function () {
		eraseCookie( 'acp_dark' );
		eraseCookie( 'acp_grayscale' );
		createCookie('acp_bright','bright',1);
		
		$( 'body' )
			.removeClass( 'acp-dark' )
			.removeClass( 'acp-grayscale' )
			.addClass( 'acp-bright' );
			
		$( '.acp-contrast-reset' ).removeClass( 'acp-hide' );
	});
	
	$( '.acp-grayscale' ).click( function () {
		eraseCookie( 'acp_dark' );
		eraseCookie( 'acp_bright' );
		createCookie('acp_grayscale','grayscale',1);
		
		$( 'body' )
			.removeClass( 'acp-dark' )
			.removeClass( 'acp-bright' )
			.addClass("acp-grayscale");
			
		$('.acp-contrast-reset').removeClass('acp-hide');
		
	});
	
	$( '.acp-contrast-reset' ).click( function () {
		eraseCookie( 'acp_dark' );
		eraseCookie( 'acp_bright' );
		eraseCookie( 'acp_grayscale' );
		
		$(this).addClass( 'acp-hide' );
		
		$( 'body' )
			.removeClass( 'acp-dark' )
			.removeClass( 'acp-bright' )
			.removeClass( 'acp-grayscale' );
	});
	
	if ( acp_dark ) {
		$( 'body' )
			.removeClass( 'acp-bright' )
			.removeClass( 'acp-grayscale' )
			.addClass( 'acp-dark' );
			
		$( '.acp-contrast-reset' ).removeClass( 'acp-hide' );
	}
	
	if( acp_bright ) {
		$( 'body' )
			.removeClass( 'acp-dark' )
			.removeClass( 'acp-grayscale' )
			.addClass( 'acp-bright' );
			
		$( '.acp-contrast-reset' ).removeClass( 'acp-hide' );
	}
	
	if( acp_grayscale ) {
		$( 'body' )
			.removeClass( 'acp-dark' )
			.removeClass( 'acp-bright' )
			.addClass( 'acp-grayscale' );
			
		$( '.acp-contrast-reset' ).removeClass( 'acp-hide' );
	}
	
	/**
	 * Links
	 **/
	 
	// add underline
	
	var underlines = $('#acp_toolbar').attr('data-underlines');
	if( underlines == 1 ) {
		$("a").css('text-decoration', 'underline');
	}
	
	// toggle underline
	
	$(".acp-toggle-underline").toggle(function () {
	    $('a').css('text-decoration', 'underline');
	}, function() {
		$('a').css('text-decoration', 'none');
	});
	
	$("#acp_toolbarWrap").show(2000);
});