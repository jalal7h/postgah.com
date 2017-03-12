
function time_enclock( s ){
	m = Math.floor( s / 60 )
	s = s % 60
	if( s < 10 ){
		s = '0' + s
	}
	return m + ':' + s
}

function time_declock( t ){
	t = t.split(':')
	m = parseInt( t[0] )
	s = parseInt( t[1] )
	s+= m * 60
	return s
}


jQuery(document).ready(function($) {
	


	//
	// get the code, and wait for submission
	if( $('a.userloginverify_sms_resend').length ){

		cell = $('#userloginverify_sms input[name="username"]').val();

		$.ajax({
			url: _URL,
			data: { 'do_action' : 'userloginverify_sms_send', 'cell' : cell },
		})
		.done(function( remainedTime ) {
			
			$('a.userloginverify_sms_resend').hide()
			if( remainedTime == 0 ){
				$('a.userloginverify_sms_resend.active').show()
			} else {
				remainedTime = time_enclock( remainedTime )
				$('a.userloginverify_sms_resend.waiting span.counter').html( remainedTime )
				$('a.userloginverify_sms_resend.waiting').show()
			}
		})
	
	}



	// count down
	if( $('a.userloginverify_sms_resend.waiting span.counter').length ){
		setInterval( function(){
			
			t = $('a.userloginverify_sms_resend.waiting span.counter')
			th = t.html();
			th = time_declock( th )
						
			if( th == 0 ){
				$('a.userloginverify_sms_resend').hide()
				$('a.userloginverify_sms_resend.active').show()
				return
			}

			th--

			th = time_enclock( th )
			t.html( th )

		}, 1000 );
	}



	// resend sms
	$('.userloginverify_sms_resend').on('click', function(e){

		if( $(this).hasClass('active') ){

			$('a.userloginverify_sms_resend').hide()
			$('a.userloginverify_sms_resend.sending').show()

			cell = $('#userloginverify_sms input[name="username"]').val()

			$.ajax({
				url: _URL,
				data: { 'do_action' : 'userloginverify_sms_send', 'cell' : cell },
			})
			.done(function( remainedTime ) {

				$('a.userloginverify_sms_resend').hide()
				if( remainedTime == 0 ){
					$('a.userloginverify_sms_resend.active').show()
				} else {
					remainedTime = time_enclock( remainedTime )
					$('a.userloginverify_sms_resend.waiting span.counter').html( remainedTime )
					$('a.userloginverify_sms_resend.waiting').show()
				}

			})

		}
		
		e.preventDefault()
		return false

	})



	//
	// sms form submit
	$('form#userloginverify_sms').on('submit', function(e){

		cell = $('#userloginverify_sms input[name="username"]').val()
		code = $('#userloginverify_sms input[name="code"]').val()

		$.ajax({
			url: _URL,
			data: { 'do_action' : 'userloginverify_sms_verify', 'cell' : cell, 'code' : code },
		
		}).done(function( html ) {
			
			the_status = html.substr(0,2)
			the_link = html.substr(2)

			if( the_status != 'OK' ){
				cl('something wrong')
				cl( html )

			} else {
				cl( 'URL ' + the_link )
				location.href = the_link
			}

		})


		e.preventDefault()
		return false

	})



});

