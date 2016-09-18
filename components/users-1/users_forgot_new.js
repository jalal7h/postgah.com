
jQuery(document).ready(function($) {
	$('#users_forgot_new').on('submit', function(){

		if( $("#password1").val().trim() == '' ){
			$("#users_forgot_new .prompt").html("لطفا کلمه عبور مناسب وارد کنید.");
		
		} else if( $("#password1").val().trim().length < 8 ){
			$("#users_forgot_new .prompt").html("کلمه عبور شما باید بیش از ۸ کارکتر داشته باشد.");			

		} else if( $("#password1").val() != $("#password2").val() ){
			$("#users_forgot_new .prompt").html("کلمه عبور مطابقت ندارد!");
		
		} else {
			return true;
		}

		return false;

	});
});

