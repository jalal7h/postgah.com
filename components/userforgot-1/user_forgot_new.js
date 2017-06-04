
jQuery(document).ready(function($) {
	$('#user_forgot_new').on('submit', function(e){

		p = $("#user_forgot_new .prompt")

		if( $("#password1").val().trim().length < 8 ){
			p.html( p.attr('lang_more_than_8_char') );			
			cl( p.attr('lang_more_than_8_char')  );
		} else if( $("#password1").val() != $("#password2").val() ){
			p.html( p.attr('lang_does_not_match') );
		
		} else {
			return true;
		}

		e.preventDefault()
		return false;

	});
});

