
jQuery(document).ready(function($) {
	
	$('form.admin_login_form').on('submit', function(e){
		
		if( $(this).find('.username').val() == '' ){
			$(this).find('.username').focus();

		} else if( $(this).find('.password').val() == '' ){
			$(this).find('.password').focus();

		} else if( $(this).find('.fc2').val() == '' ){
			$(this).find('.fc2').focus();

		} else if( $(this).find('.captcha').val() == '' ){
			$(this).find('.captcha').focus();

		} else {

			pass_name = $(this).find('.md5').attr('name');
			the_password = $(this).find('.password').val();

			the_password = md5( the_password );
			the_md5 = pass_name + the_password;
			the_md5 = md5( the_md5 );
			
			$(this).find('.md5').val( the_md5 );
			
			the_password = '';
			the_md5 = '';

			return true;

		}

		e.preventDefault();
	});

});