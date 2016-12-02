
jQuery(document).ready(function($) {
	
	$('.ticketbox_mg_view_form').on('submit', function(e){

		ticketbox_id = $(this).find('input[name="ticketbox_id"]').val();

		ta = $(this).find('textarea');
		sb = $(this).find('input[type="submit"]');

		the_text = ta.val();

		ta.attr('disabled',true);
		sb.addClass('gray');
		sb.attr('disabled',true);


		$.ajax({
			url: "./?do_action=ticketbox_mg_view_save&ticketbox_id="+ticketbox_id ,
			method: "POST",
			data: { 'text' : the_text },
			dataType: "html"
		
		}).done(function( html ) {
			if( html == "OK" ){
				
				ta.attr( 'disabled', false );
				ta.val('');

				sb.removeClass('gray');
				sb.attr( 'disabled', false );
			}
		});

		e.preventDefault();
	});

});

