jQuery(document).ready(function($){
	$('img').each(function() {
	    if(!$(this).attr('alt')) $(this).attr('alt', ' ');
	});
});