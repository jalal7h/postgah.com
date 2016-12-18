
jQuery(document).ready(function($) {
	
	$('.pgItem_display_text .print_button').on('click', function(){
		window.print();
	});


	// ticket to client
	ticket_item_id = $('.pgItem_display_text .text_footer').attr('item_id');
	if( ticket_item_id.length ){
		$.ajax({
			url: "./?do_action=pgItem_display_ticketboxLinkMaker&item_id="+ticket_item_id,

		}).done(function( html ) {
			$('.pgItem_display_text .text_footer').append( html );
		});
	}
	

});
