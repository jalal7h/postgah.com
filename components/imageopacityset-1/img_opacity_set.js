
/*index*/

jQuery(document).ready(function($) {
	
	$('img').each(function(i){
		$(this).one('inview', function(){
			$(this).css({ 'opacity' : '1.0' });
		});
	});

});
