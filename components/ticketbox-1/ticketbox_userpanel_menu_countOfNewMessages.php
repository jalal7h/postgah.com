<?



$GLOBALS['do_action'][] = 'ticketbox_userpanel_menu_countOfNewMessages';

function ticketbox_userpanel_menu_countOfNewMessages(){

	if(! $user_id = user_logged() ){
		e();

	} else if(! $rs = dbq(" SELECT COUNT(*) FROM `ticketbox` INNER JOIN `ticketbox_user` on `ticketbox`.`id` = `ticketbox_user`.`ticketbox_id` WHERE `ticketbox`.`hide`='0' AND `user_id`='$user_id' AND `ticketbox_user`.`view`='0' AND `ticketbox_user`.`flag`='0' ") ){
		e( dbe() );
	
	} else {
		echo dbr( $rs, 0, 0 );
	}

}



