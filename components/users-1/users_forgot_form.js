
$(document).ready(function(){
	$('#users_forgot_form').on('submit', function(){
		if( $(this).find('input[name="username"]').val()=='' ){
			console.log('empty content');
			$(this).find('input[name="username"]').focus();
			return false;
		} else {
			return true;
		}
	});
});

