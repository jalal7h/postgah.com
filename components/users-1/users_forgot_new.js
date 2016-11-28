
jQuery(document).ready(function($) {
	$('#users_forgot_new').on('submit', function(){

		if( $("#password1").val().trim() == '' ){
			$("#users_forgot_new .prompt").html( $(this).attr('lang_empty_password') );
		
		} else if( $("#password1").val().trim().length < 8 ){
			$("#users_forgot_new .prompt").html( $(this).attr('lang_more_than_8_char') );			

		} else if( $("#password1").val() != $("#password2").val() ){
			$("#users_forgot_new .prompt").html( $(this).attr('lang_does_not_match') );
		
		} else {
			return true;
		}

		return false;

	});
});

