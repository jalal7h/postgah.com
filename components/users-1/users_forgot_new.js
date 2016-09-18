
jQuery(document).ready(function($) {
	$('#users_forgot_new').on('submit', function(){

		if( $("#password1").val().trim() == '' ){
			$("#users_forgot_new .d03").html("لطفا کلمه عبور مناسب وارد کنید.");
		
		} else if( $("#password1").val() != $("#password2").val() ){
			$("#users_forgot_new .d03").html("کلمه عبور مطابقت ندارد!");
		
		} else {
			return true;
		}

		return false;

	});
});

