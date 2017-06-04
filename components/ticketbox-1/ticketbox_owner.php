<?

# jalal7h@gmail.com
# 2016/12/04
# 1.0

function ticketbox_owner( $ticketbox_id ){

	if(! $rs = dbq(" SELECT `user_id` FROM `ticketbox_post` WHERE `ticketbox_id`='$ticketbox_id' ORDER BY `date_created` ASC LIMIT 1 ") ){
		e();

	} else if( $first_reply_user_id = dbr( $rs, 0, 0 ) ){
		return $first_reply_user_id;
	}

	return false;

}
