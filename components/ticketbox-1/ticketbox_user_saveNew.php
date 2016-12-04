<?

# jalal7h@gmail.com
# 2016/12/04
# 1.0

function ticketbox_user_saveNew(){

	if( ticketbox_client_to_client ){
		if(! $_REQUEST['user_id'] = intval($_REQUEST['user_id']) ){
			ed();
		}
	}

	if(! $current_user_id = user_logged() ){
		ed();
	
	} else if(! $_REQUEST['cat'] = intval($_REQUEST['cat']) ){
		e();

	} else if(! $_REQUEST['name'] = trim($_REQUEST['name']) ){
		e();

	} else if(! $_REQUEST['text'] = trim($_REQUEST['text']) ){
		e();

	#
	# ticketbox
	} else if(! $ticketbox_id = dbs( 'ticketbox', ['cat','name'] ) ){
		e();

	#
	# ticketbox post
	} else if(! dbs('ticketbox_post',['ticketbox_id'=>$ticketbox_id,'user_id'=>$current_user_id,'text'] ) ){
		e();

	#
	# ticketbox user
	} else if(! dbs( 'ticketbox_user', [ 'user_id'=>$current_user_id, 'ticketbox_id'=>$ticketbox_id ] ) ){
		e();
		
	} else {

		if( ticketbox_client_to_client ){
			if(! dbs( 'ticketbox_user', [ 'user_id', 'ticketbox_id'=>$ticketbox_id ] ) ){
				ed();
			}

		} else {
			if(! dbs( 'ticketbox_user', [ 'user_id'=>1, 'ticketbox_id'=>$ticketbox_id ] ) ){
				ed();
			}
		}

		return true;
		
	}

	return false;

}









