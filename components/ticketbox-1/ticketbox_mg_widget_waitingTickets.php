<?

# jalal7h@gmail.com
# 2016/12/21
# 1.0

add_adminwidget([ 
	'func'	=> 'ticketbox_mg_widget_waitingTickets',
	'grid'	=> 6,
	'cover'	=> true,
	'prio'	=> 2,
]);

function ticketbox_mg_widget_waitingTickets(){
	
	#
	# access control
	if( is_component('useraccess') and (! useraccess(admin_logged(), 'ticketbox_mg') ) ){
		return;
	}

	echo template_engine( 'ticketbox_mg_widget_waitingTickets' );

}


