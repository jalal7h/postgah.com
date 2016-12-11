<?

$GLOBALS['do_action'][] = 'ticketbox_view_save';

function ticketbox_view_save(){
	
	if(! $user_id = intval($_REQUEST['user_id']) ){
		ed();
	
	} else if( admin_logged() != $user_id and user_logged() != $user_id ){
		ed();
	}
	
	if(! $_REQUEST['ticketbox_id'] = intval($_REQUEST['ticketbox_id']) ){
		ed();

	} else if(! $_REQUEST['text'] = ticketbox_text_clean( $_REQUEST['text'] ) ){
		ed();

	} else if( !is_adminUser($user_id) and !ticketbox_user( $_REQUEST['ticketbox_id'], $user_id ) ){
		ed();

	} else if(! $id = dbs( 'ticketbox_post', [ 'ticketbox_id', 'user_id'=>$user_id, 'text' ] ) ){
		ed();
		
	} else {
		
		# 
		# date_updated on ticketbox
		dbs( 'ticketbox', [ 'date_updated'=>U() ], [ 'id'=>$_REQUEST['ticketbox_id'] ] );

		# 
		# set as new for foreign
		$foreign = ticketbox_user( $_REQUEST['ticketbox_id'], $user_id )['foreign'];
		ticketbox_setAsNew( $_REQUEST['ticketbox_id'], $foreign );

		# 
		# congra and display the new post
		echo "OK";
		echo ticketbox_view_post( table( 'ticketbox_post' , $id ) );
		
		# 
		# nxx texty ticketbox_view_save

		# 
		# die
		die();

	}
	
}


function ticketbox_text_clean( $text ){

	$text = strip_tags($text);
	$text = str_replace("'", "", $text );
	$text = trim($text);

	return $text;

}










