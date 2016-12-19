<?

# jalal7h@gmail.com
# 2016/12/04
# 1.0

function ticketbox_isReplied( $ticketbox_id ){

	if( is_admin() ){
		 $current_user_id = 1;
	
	} else if( is_userpanel() ){
		$current_user_id = user_logged();
	
	} else {
		ed();
	}

	if(! $rw = table('ticketbox', $ticketbox_id) ){
		e();

	} else if(! $rs = dbq(" SELECT `user_id` FROM `ticketbox_post` WHERE `ticketbox_id`='$ticketbox_id' ORDER BY `date_created` DESC LIMIT 1 ") ){
		e();

	} else if(! dbn($rs) ){
		e();

	} else if(! $last_reply_user_id = dbr($rs,0,0) ){
		e();

	} else if( $last_reply_user_id == $current_user_id ){
		return true;
	}

	return false;

}
