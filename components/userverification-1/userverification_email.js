
jQuery(document).ready(function($) {
	
	//
	// submit
	$('form#userverification_email').on('submit', function(e){
		location.href = location.href + '/' + $(this).find('input[type=text]').val();
		e.preventDefault();
		return false;
	});


	//
	// key press
	$('form#userverification_email input[type=text]').on('keyup', function(e){
		f = $('form#userverification_email');
		t = $(this);
		if( t.val().length == t.attr('maxlength') ){
			f.find('input[type=submit]').attr('disabled',false);
		} else {
			f.find('input[type=submit]').attr('disabled',true);
		}
	});


});

