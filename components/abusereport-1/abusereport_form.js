
jQuery(document).ready(function($) {
	
	$("body").delegate( ".abusereport_form", "submit", function( e ) {
		
		if( $(this).find('textarea').val() == '' ){
			return false;
		
		} else {
			return true;
		}
		
	});
	
});

