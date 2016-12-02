<?


$GLOBALS['do_action'][] = 'ticketbox_mg_view_save';

function ticketbox_mg_view_save(){

	// check if ticketid is owned by me

	if(! $user_id = admin_logged() ){
		ed();

	} else if(! $_REQUEST['ticketbox_id'] = intval($_REQUEST['ticketbox_id']) ){
		ed();

	} else if(! $_REQUEST['text'] = trim( strip_tags( $_REQUEST['text'] ) ) ){
		ed();

	} else if(! ticketbox_user( $_REQUEST['ticketbox_id'], $user_id ) ){
		ed();

	} else if(! dbs( 'ticketbox_post', [ 'ticketbox_id', 'user_id'=>$user_id, 'text' ] ) ){
		ed();
		
	} else {
		echo "OK";
	}

}


