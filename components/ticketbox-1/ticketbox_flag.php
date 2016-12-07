<?

# jalal7h@gmail.com
# 2016/12/07
# 1.0

function ticketbox_flag(){

	$ticketboxUser_id = ticketbox_user( $_REQUEST['id'] )['id'];
	listmaker_flag( 'ticketbox_user', null, $ticketboxUser_id );

}

