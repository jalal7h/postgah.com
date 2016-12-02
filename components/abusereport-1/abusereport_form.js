
jQuery(document).ready(function($) {
	
	$("body").delegate( ".abusereport_form", "submit", function( e ) {
		
		if( $(this).find('textarea').val() == '' ){
			$(this).find('textarea').css({'border':'1px solid orangered'});
			return false;
		
		} else {
			$(this).find('textarea').css({'border':''});
		}

		if( $(this).find('select').val() == '' ){
			$(this).find('select').css({'border':'1px solid orangered'});
			return false;
		
		} else {
			$(this).find('select').css({'border':''});
		}

		return true;
		
	});
	
});

