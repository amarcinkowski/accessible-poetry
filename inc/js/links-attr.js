jQuery(document).ready(function($){
	$('a[title]').each(function() {
	    var $t = $(this);
	    $t.attr('aria-label', $t.attr('title')).removeAttr('title');
	});
});