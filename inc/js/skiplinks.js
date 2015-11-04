jQuery( document ).ready(function($) {
	$(".skiplinks").click(function(event){
		var skipTo="#"+this.href.split('#')[1];
		$(skipTo).attr('tabindex', -1).on('blur focusout', function () {
			$(this).removeAttr('tabindex');
		}).focus();
	});
});
