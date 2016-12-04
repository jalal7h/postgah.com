<?

# jalal7h@gmail.com
# 2016/12/04
# 1.0

function ticketbox_isReplied( $ticketbox_id ){

	if( is_admin() and admin_logged() ){
		 $current_user_id = 1;
	
	} else if( is_userpanel() and user_logged() ){
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

	} else if(! $user_id = dbr($rs,0,0) ){
		e();

	#
	# age man admin hastam, va akharin pasokh az 1 bud, ya man budam ya yeki az modiran
	} else if( is_admin() and $user_id == 1 ){
		return true;

	#
	# age akharin pasokh az man bud
	} else if( $user_id == $current_user_id ) {
		return true;
	}

	return false;

}
