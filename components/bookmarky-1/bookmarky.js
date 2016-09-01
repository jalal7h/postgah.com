
jQuery(document).ready(function($) {
	$('.bookmarky_button').on('click', function(e){
		$(this).toggleClass('added');
		e.preventDefault();
	});
});

