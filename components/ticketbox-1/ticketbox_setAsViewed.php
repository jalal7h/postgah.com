<?

# jalal7h@gmail.com
# 2016/12/04
# 1.0

function ticketbox_setAsViewed( $ticketbox_id, $user_id=false ){

	if(! $user_id ){
		
		if( is_admin() and admin_logged() ){
			 $user_id = 1;
		
		} else if( is_userpanel() and user_logged() ){
			$user_id = user_logged();
		
		} else {
			ed();
		}

	}

	if(! dbs('ticketbox_user', ['view'=>1], ['ticketbox_id'=>$ticketbox_id,'user_id'=>$user_id] ) ){
		return false;
	
	} else {
		return true;
	}

}
