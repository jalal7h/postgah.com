<?

# jalal7h@gmail.com
# 2016/12/14
# 1.0

function ticketbox_user_saveNew(){

	# take care of `cat` - secure it
	$_REQUEST['cat'] = intval($_REQUEST['cat']);

	# vaziat e user_id
	if( ticketbox_client_to_client
		and ( $_REQUEST['user_id'] = intval($_REQUEST['user_id']) )
		and !is_master($_REQUEST['user_id'])
	){
		switch (ticketbox_client_to_client) {
			case 'public': $tctc_public = true; break; // ejaze ersal be user, "azad hast"
			case 'private': $tctc_private = ticketbox_private_token_check(); break; // "limit hast"
		}
	}

	if( !$tctc_public and !$tctc_private ) {
		$tctc_off = true;
		$_REQUEST['user_id'] = 1; // "ejaze nist"
	}
	
	# if no body logged in, and wants to send some ticket, kill him
	if(! $loggedUser_id = user_logged() ){
		ed();
	
	# if the user does not exists kill him
	} else if(! $rw_loggedUser = table('user', $loggedUser_id) ){
		ed();

	# if no subject selected for ticket, just kill him
	} else if(! $_REQUEST['name'] = trim($_REQUEST['name']) ){
		e();

	# if no content entred for ticket, just kill him.
	} else if(! $_REQUEST['text'] = trim($_REQUEST['text']) ){
		e();

	# just insert the ticket into main table
	} else if(! $ticketbox_id = dbs( 'ticketbox', ['cat','name','table_name','table_id'] ) ){
		e();

	# insert the post into ticket post table
	} else if(! dbs('ticketbox_post',['ticketbox_id'=>$ticketbox_id,'user_id'=>$loggedUser_id,'text'] ) ){
		e();

	# connect the ticket to logged user
	} else if(! dbs( 'ticketbox_user', [ 'user_id'=>$loggedUser_id, 'ticketbox_id'=>$ticketbox_id, 'view'=>1 ] ) ){
		e();
		
	# connect the ticket to selected user / admin
	} else if(! dbs( 'ticketbox_user', [ 'user_id', 'ticketbox_id'=>$ticketbox_id ] ) ){
		ed();

	# texty
	} else {
		

		# the vars
		$vars['ticket_id'] = $ticketbox_id;
		$vars['ticket_name'] = $_REQUEST['name'];
		$vars['ticket_link'] = ticketbox_user_link( $ticketbox_id );
		$vars['ticket_adminlink'] = _URL."/?page=admin&cp=ticketbox_mg&func=ticketbox_mg_list&do=view&id=".$ticketbox_id;
		$vars['receiver_user_name'] = table( 'user', $_REQUEST['user_id'] , 'name' );
		$vars['sender_user_name'] = $rw_loggedUser['name'];


		# if its a support ticket
		if( $tctc_off ){
			echo texty( 'ticketbox_user_saveNew', $vars, $loggedUser_id, $convbox='transparent' );
		
		# if its a free client message
		} else if( $tctc_public ){
			echo texty('ticketbox_user_saveNew_to_client', $vars, [ $loggedUser_id , $_REQUEST['user_id'] ] , $convbox='transparent' );

		# if its a limited client message
		} else if( $tctc_private ){
			
			if( $lmtc = lmtc($_REQUEST['table_name']) ){
				$vars['item_title'] = $lmtc[0];
			} else {
				$vars['item_title'] = __('آیتم');
			}
			$vars['item_id'] = $_REQUEST['table_id'];
			$vars['item_name'] = table( $_REQUEST['table_name'], $_REQUEST['table_id'], 'name' );
			
			echo texty( 'ticketbox_user_saveNew_askFromSeller', $vars, [ $loggedUser_id , $_REQUEST['user_id'] ] , $convbox='transparent' );

		}
		

		return true;

	}

	return false;

}









