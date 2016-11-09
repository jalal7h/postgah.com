
jQuery(document).ready(function($) {
	
	$('.pgItem_user_list .RejectMessage').on('click', function(e){
		RejectMessage = $(this).attr('rel');
		hitbox( RejectMessage, 700, 'auto')
		e.preventDefault();
	});

});

