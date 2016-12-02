
jQuery(document).ready(function($) {
	
	// save new post
	$('.ticketbox_mg_view_form').on('submit', function(e){

		ticketbox_id = $(this).find('input[name="ticketbox_id"]').val();

		ta = $(this).find('textarea');
		sb = $(this).find('input[type="submit"]');
		pt = $(this).find('.prompt');

		the_text = ta.val().trim();

		if(the_text == '' ){
			e.preventDefault();
			return false;
		}

		ta.attr('disabled',true);
		sb.addClass('gray');
		sb.attr('disabled',true);


		$.ajax({
			url: "./?do_action=ticketbox_mg_view_save&ticketbox_id="+ticketbox_id ,
			method: "POST",
			data: { 'text' : the_text },
			dataType: "html"
		
		}).done(function( html ) {

			new_post_stat = html.substr(0,2);
			new_post_content = html.substr(2);

			if( new_post_stat == "OK" ){
				ta.attr( 'disabled', false );
				ta.val('');
				sb.removeClass('gray');
				sb.attr( 'disabled', false );
				pt.css( 'opacity', '0.0' );
				$('.ticketbox_mg_view .post_list').prepend( new_post_content );
				$('.ticketbox_mg_view .post_list .post:first-child').css({'opacity':'0.0'});
				$('.ticketbox_mg_view .post_list .post:first-child').animate({'opacity':'1.0'}, 400);

			} else {
				ta.attr( 'disabled', false );
				sb.removeClass('gray');
				sb.attr( 'disabled', false );
				pt.css( 'opacity', '1.0' );
			}

		});

		e.preventDefault();
	});

});

