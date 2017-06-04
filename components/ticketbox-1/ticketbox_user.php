<?

# jalal7h@gmail.com
# 2016/12/04
# 1.1

# get `ticketbox_user` record word this `ticketbox_id` and `user_id`

function ticketbox_user( $ticketbox_id, $user_id=null ){

	if(! $user_id ){
		
		if( is_admin() and admin_logged() ){
			 $user_id = admin_logged();
		
		} else if( is_userpanel() and user_logged() ){
			$user_id = user_logged();
		
		} else {
			ed();
		}

	}

	if(! $rs = dbq(" SELECT * FROM `ticketbox_user` WHERE `user_id`='$user_id' AND `ticketbox_id`='$ticketbox_id' LIMIT 1 ") ){
		e();

	} else if(! dbn($rs) ){
		dg();

	} else if(! $rw = dbf($rs) ){
		e();

	} else if(! $rs_f = dbq(" SELECT * FROM `ticketbox_user` WHERE `user_id`!='$user_id' AND `ticketbox_id`='$ticketbox_id' LIMIT 1 ") ){
		e();

	} else if(! dbn($rs_f) ){
		dg();

	} else if(! $rw_f = dbf($rs_f) ){
		dg();

	} else {
		$rw['foreign'] = $rw_f['user_id'];
		return $rw;
	}

	return false;

}










