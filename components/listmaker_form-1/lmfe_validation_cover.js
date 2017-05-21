
jQuery(document).ready(function($) {
	
	$('.lmfe_validation_input').on('keyup', function(e){

		ek = e.keyCode;

		if( ek == 13 || ( ek >=37 && ek <=40 ) ){
			return;
		}

		var inp = $(this);
		var lvi = inp.next('.lmfe_validation_i');
		
		if( inp.val() == '' ){
			lvi.find('i.wrong').css({'display':'inline-block'});
			lvi.find('.the_message').html('');
			lvi.find('.the_message').removeClass('color_checked').addClass('color_wrong');
			inp.attr('downvote', '1');
			return;
		}

		lvi.find('i').css({'display':'none'});
		lvi.find('i.checking').css({'display':'inline-block'});
		lvi.find('.the_message').html('');

		$.ajax({
			url: _URL + "/?do_action=lmfe_validation_func" ,
			type: 'POST',
			data: { 'func' : inp.attr('func') , 'value' : inp.val() , 'req' :  lvi.attr('req') },
		})
		.done(function( html ) {

			lvi.find('i').css({'display':'none'});

			the_state = html.substr(0,2);
			the_message = html.substr(2);

			if( the_state == 'OK' ){
				lvi.find('i.checked').css({'display':'inline-block'});
				lvi.find('.the_message').removeClass('color_wrong').addClass('color_checked');
				inp.removeAttr('downvote');
			
			} else {
				lvi.find('i.wrong').css({'display':'inline-block'});
				lvi.find('.the_message').removeClass('color_checked').addClass('color_wrong');
				inp.attr('downvote', '1');
			}

			lvi.find('.the_message').html( the_message );

		});
		
	});

});

