
jQuery(document).ready(function($) {
	
	$('.pgItem_user_list a[name="RejectMessage"]').on('click', function(e){
		RejectMessage = $(this).attr('href');
		hitbox( RejectMessage, 700, 'auto')
		e.preventDefault();
	});

});

