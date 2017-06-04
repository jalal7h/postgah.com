
jQuery(document).ready(function($) {
	
	$('.tallfooter_nl form').on('submit', function(e){

		email = $(this).find('input[type="email"]').val();
		prompt = $('.tallfooter_nl .prompt');

		$.ajax({
			url: _URL,
			data: { 'do_action': 'tallfooter_nl_save', 'email': email },
		})
		.done(function( html ) {
			prompt.html( html );
			prompt.css({'opacity':'1'});
			setTimeout(function(){
				prompt.css({'opacity':'0'});
			},2000);
		});
		
		e.preventDefault();
		return false;

	});

});

