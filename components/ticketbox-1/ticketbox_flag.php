<?

# jalal7h@gmail.com
# 2016/12/07
# 1.0

function ticketbox_flag(){
	
	if(! $id = intval($_REQUEST['id']) ){
		e();

	} else if(! $rw_tu = ticketbox_user( $id ) ){
		e();

	} else {

		$ticketboxUser_id = $rw_tu['id'];

		if( is_admin() ){
			if(! listmaker_flag( 'ticketbox_user', null, $ticketboxUser_id ) ){
				e();
			}
		
		} else if(! $user_id = user_logged() ){
			ed();

		} else if( $rw_tu['user_id'] != $user_id ){
			ed();

		} else if( $rw_tu['flag'] == 1 ){
			// e();

		} else if(! listmaker_flag( 'ticketbox_user', null, $ticketboxUser_id ) ){
			e();
		
		} else {
			return true;
		}

	}

	return false;

}

