<?

# jalal7h@gmail.com
# 2016/12/04
# 1.0

function ticketbox_setAsNew( $ticketbox_id, $user_id ){

	if(! dbs('ticketbox_user', ['view'=>0], ['ticketbox_id'=>$ticketbox_id,'user_id'=>$user_id] ) ){
		return false;
	
	} else {
		return true;
	}

}
