<?

# jalal7h@gmail.com
# 2016/11/30
# 1.0

function ticketbox_isReplied( $ticketbox_id ){

	if(! $current_user_id = admin_logged() ){
		$current_user_id = user_logged();
	}

	if(! $rw = table('ticketbox', $ticketbox_id) ){
		e();

	} else if(! $rs = dbq(" SELECT `user_id` FROM `ticketbox_post` WHERE `ticketbox_id`='$ticketbox_id' ORDER BY `date_created` DESC LIMIT 1 ") ){
		e();

	} else if(! dbn($rs) ){
		e();

	} else if(! $user_id = dbr($rs,0,0) ){
		e();

	} else if( $user_id == $current_user_id ) {
		return true;
	}

	return false;

}
