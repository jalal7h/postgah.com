
jQuery(document).ready(function($) {
	
	$('#admin_changepassword').on('click', function(e){
		hitbox( _URL+'/?do_action=admin_changepassword' , 600, 486 );
		e.preventDefault();
	});

	$('form.admin_changepassword').on('submit', function(e){
		$(this).find('input[type="submit"]').css({'background-color':'#aaa'})
	});

});