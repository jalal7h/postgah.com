
jQuery(document).ready(function($) {
	
	function ticketbox_mg_widget_waitingTickets_load( wtList ) {
		$.ajax({
			url: _URL + '/?do_action=ticketbox_mg_widget_waitingTickets_ajax',
		})
		.done(function( html ) {
			wtList.html( html );
		});
	}

	wtList = $('.admin_widgets .widget.ticketbox_mg_widget_waitingTickets .list');

	if( wtList.length ){
		setInterval( function(){
			ticketbox_mg_widget_waitingTickets_load( wtList );
		}, 5000 );
	}

	ticketbox_mg_widget_waitingTickets_load( wtList );

});

