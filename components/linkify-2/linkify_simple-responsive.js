/*index*/

jQuery(document).ready(function($) {

	$('.linkify_simple .navmenu').on('click', function(){
		$(this).toggleClass('fired');
		$('.linkify_simple .master').toggleClass('fired');
	})

});

