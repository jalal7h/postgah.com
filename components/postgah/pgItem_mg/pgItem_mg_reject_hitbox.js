
jQuery(document).ready(function($) {
	
	$("body").delegate( ".pgItem_mg_reject_hitbox", "submit", function( e ) {
		
		if( $(this).find('textarea').val() == '' ){
			return false;
		
		} else {
			location.href = '';
			return true;
		}
		
	});
	
});

