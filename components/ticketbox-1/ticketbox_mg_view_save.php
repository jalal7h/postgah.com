<?

$GLOBALS['do_action'][] = 'ticketbox_mg_view_save';

function ticketbox_mg_view_save(){
	
	if(! $user_id = admin_logged() ){
		ed();

	} else if(! $_REQUEST['ticketbox_id'] = intval($_REQUEST['ticketbox_id']) ){
		ed();

	} else if(! $_REQUEST['text'] = ticketbox_text_clean( $_REQUEST['text'] ) ){
		ed();

	} else if(! ticketbox_user( $_REQUEST['ticketbox_id'], $user_id ) ){
		ed();

	} else if(! $id = dbs( 'ticketbox_post', [ 'ticketbox_id', 'user_id'=>$user_id, 'text' ] ) ){
		ed();
		
	} else {
		echo "OK";
		echo ticketbox_mg_view_post( table( 'ticketbox_post' , $id ) );
		die();
	}
	
}


function ticketbox_text_clean( $text ){

	$text = strip_tags($text);
	$text = str_replace("'", "", $text );
	$text = trim($text);

	return $text;

}










