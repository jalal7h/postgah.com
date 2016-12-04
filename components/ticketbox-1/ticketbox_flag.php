<?

function ticketbox_flag(){

	$ticketboxUser_id = ticketbox_user( $_REQUEST['id'] )['id'];
	listmaker_flag( 'ticketbox_user', null, $ticketboxUser_id );

}

