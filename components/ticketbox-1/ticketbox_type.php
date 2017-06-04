<?

# jalal7h@gmail.com
# 2016/12/19
# 1.0

function ticketbox_type( $rw_tb ){

	$ticketbox_id = $rw_tb['ticketbox_id'];

	if(! $me = user_logged() ){
		ed();
	}
	
	$foreign = ticketbox_user( $ticketbox_id, $me )['foreign'];

	if( ticketbox_owner($ticketbox_id) == $me ){
		$its_mine = true;
	}

	if( (ticketbox_client_to_client === 'private') and $rw_tb['table_name'] and $rw_tb['table_id'] ){
		$its_a = "question";
	
	} else if( (ticketbox_client_to_client === 'public') and !is_adminUser($me) and !is_adminUser($foreign) ){ 
		$its_a = "client_to_client";
		
	} else {
		$its_a = "ticket";
	}


	switch( $its_a ){
		
		case 'question':
			if( $its_mine ){
				return __('سوال من از فروشنده');
			} else {
				return __('سوال خریدار از من');
			}

		case 'client_to_client':
			$foreign_name = table('user', $foreign, 'name');
			if( $its_mine ){
				return __('سوال من از %%', [$foreign_name] );
			} else {
				return __('سوال %% از من', [$foreign_name] );
			}

		case 'ticket':
			if( $its_mine ){
				return __('پشتیبانی');
			} else {
				return __('سیستمی');				
			}
			break;

	}
	
}
