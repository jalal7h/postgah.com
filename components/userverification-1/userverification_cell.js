
jQuery(document).ready(function($) {
	


	//
	// get the code, and wait for submission
	if( $('a.userverification_cell_resend').length ){

		cell = $('#userverification_cell input[name="username"]').val();

		$.ajax({
			url: _URL,
			data: { 'do_action' : 'userverification_cell_send', 'cell' : cell },
		})
		.done(function( remainedTime ) {
			cl( remainedTime );
			$('a.userverification_cell_resend').hide();
			
			if( remainedTime == 0 ){
				$('a.userverification_cell_resend.active').show();
			
			} else {
				remainedTime = time_enclock( remainedTime );
				$('a.userverification_cell_resend.waiting span.counter').html( remainedTime );
				$('a.userverification_cell_resend.waiting').show();
			}

		})
	
	}



	// count down
	if( $('a.userverification_cell_resend.waiting span.counter').length ){
		setInterval( function(){
			
			t = $('a.userverification_cell_resend.waiting span.counter');
			th = t.html();
			th = time_declock( th );
						
			if( th == 0 ){
				$('a.userverification_cell_resend').hide();
				$('a.userverification_cell_resend.active').show();
				return;
			}

			th--;

			th = time_enclock( th );
			t.html( th );

		}, 1000 );
	}



	// resend sms
	$('.userverification_cell_resend').on('click', function(e){

		if( $(this).hasClass('active') ){

			$('a.userverification_cell_resend').hide();
			$('a.userverification_cell_resend.sending').show();

			cell = $('#userverification_cell input[name="username"]').val();

			$.ajax({
				url: _URL,
				data: { 'do_action' : 'userverification_cell_send', 'cell' : cell },
			})
			.done(function( remainedTime ) {

				$('a.userverification_cell_resend').hide();
				if( remainedTime == 0 ){
					$('a.userverification_cell_resend.active').show();
				} else {
					remainedTime = time_enclock( remainedTime );
					$('a.userverification_cell_resend.waiting span.counter').html( remainedTime );
					$('a.userverification_cell_resend.waiting').show();
				}

			});

		}
		
		e.preventDefault();
		return false;

	})


	//
	// key press
	$('form#userverification_cell input[type=text]').on('keyup', function(e){
		f = $('form#userverification_cell');
		t = $(this);
		if( t.val().length == t.attr('maxlength') ){
			f.find('input[type=submit]').attr('disabled',false);
		} else {
			f.find('input[type=submit]').attr('disabled',true);
		}
	});


	//
	// sms form submit
	$('form#userverification_cell').on('submit', function(e){

		cell = $('#userverification_cell input[name="username"]').val();
		code = $('#userverification_cell input[name="code"]').val();
		verify_back = $('#userverification_cell input[name="verify_back"]').val();

		$.ajax({
			url: _URL,
			data: { 'do_action' : 'userverification_cell_verify', 'cell' : cell, 'code' : code },
		
		}).done(function( the_status ) {
			
			if( the_status != 'OK' ){
				alert( the_status );

			} else {
				location.href = verify_back;
			}

		});


		e.preventDefault();
		return false;

	})



});

