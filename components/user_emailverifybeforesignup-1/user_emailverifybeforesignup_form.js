
jQuery(document).ready(function($) {
	$('#user_emailverifybeforesignup_form').on('submit', function(e){
		var email_input = $(this).find('input[type="email"]');
		if( email_input.val() == '' ){
			return false;
		}
	})	
});

