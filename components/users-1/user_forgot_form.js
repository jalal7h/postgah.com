
$(document).ready(function(){
	
	$('#user_forgot_form').on('submit', function(){
		
		if( $(this).find('input[name="username"]').val()=='' ){
			$(this).find('input[name="username"]').focus();
			return false;
		
		} else {
			return true;
		}

	});

});

