<?

# jalal7h@gmail.com
# 2016/11/30
# 1.0

function ticketbox_setAsViewed( $ticketbox_id, $user_id=false ){

	if(! $user_id ){
		if(! $user_id = admin_logged() ){
			if(! $user_id = user_logged() ){
				ed();
			}
		}
	} 

	return dbq(" UPDATE `ticketbox_user` SET `view`='1' WHERE `ticketbox_id`='$ticketbox_id' AND `user_id`='$user_id' LIMIT 1 ");

}
