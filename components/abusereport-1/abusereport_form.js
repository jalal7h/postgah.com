
jQuery(document).ready(function($) {
	
	$("body").delegate( ".abusereport_form", "submit", function( e ) {
		
		if( $(this).find('textarea').val() == '' ){
			$(this).find('textarea').css({'box-shadow':'rgba(255, 69, 0, 0.42) 0px 0px 90px inset'});
			return false;
		
		} else {
			$(this).find('textarea').css({'box-shadow':''});
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

